<?php

namespace App\Controllers;

use App\JsonResponse;
use App\Models\QuizReport;
use App\Redirect;
use App\Services\QuizReportAnswerService;
use App\Services\QuizReportService;
use App\Services\QuizReportStatsService;
use App\Services\QuizService;
use App\Services\QuizSessionService;
use App\View;

class QuizController
{
    private QuizService $quizService;
    private QuizReportService $quizReportService;
    private QuizReportAnswerService $quizReportAnswerService;
    private QuizReportStatsService $quizReportStatsService;
    private QuizSessionService $quizSessionService;

    public function __construct()
    {
        $this->quizService = new QuizService();
        $this->quizReportService = new QuizReportService();
        $this->quizReportAnswerService = new QuizReportAnswerService();
        $this->quizReportStatsService = new QuizReportStatsService();
        $this->quizSessionService = new QuizSessionService();
    }

    /**
     * @return View
     */
    public function quizSelection(): View
    {
        if ($this->quizSessionService->isSetCurrentQuizReportSession()) {
            $this->quizSessionService->unsetCurrentQuizReportId();
        }

        $quizzes = $this->quizService->getAllQuizzes();

        return new View('index.html', ['quizzes' => $quizzes]);
    }

    /**
     * @return Redirect
     */
    public function selectQuiz(): Redirect
    {
        $userName = $_POST['name'];
        $userSelectedQuizId = $_POST['quiz-id'];

        if (isset($userName) && isset($userSelectedQuizId)) {
            $quizReport = $this->quizReportService->store($userName, $userSelectedQuizId);

            if ($quizReport instanceof QuizReport) {
                $this->quizSessionService->storeCurrentQuizReportId($quizReport);
            }

            return new Redirect("/quiz");
        }

        return new Redirect('/');
    }

    /**
     * @return View|Redirect|JsonResponse
     */
    public function showQuiz(): View|Redirect|JsonResponse
    {
        if (!$this->quizSessionService->isSetCurrentQuizReportSession()) {
            return new Redirect('/');
        }

        $quizReport = $this->quizReportService
            ->show($this->quizSessionService->getCurrentQuizReportId());

        if ($quizReport instanceof QuizReport) {
            $quizReport->fetchQuizReportAnswers();
            $quizReport->fetchQuizProgressPercentage();

            $quiz = $this->quizService->getQuiz($quizReport->getQuizId());

            return new View('quiz.html', [
                'quiz' => $quiz,
                'quiz_report' => $quizReport
            ]);
        }

        return new View('404.html');
    }

    /**
     * @return View|Redirect
     */
    public function postQuizAnswer(): View|Redirect
    {
        if (!$this->quizSessionService->isSetCurrentQuizReportSession()) {
            return new Redirect('/');
        }

        $answerId = intval($_POST['answerId']);
        $questionId = intval($_POST['questionId']);

        $quizReport = $this->quizReportService
            ->show($this->quizSessionService->getCurrentQuizReportId());

        if ($quizReport instanceof QuizReport) {
            $this->quizReportAnswerService->store($quizReport, $questionId, $answerId);
            $quiz = $this->quizService->getQuiz($quizReport->getQuizId());
            $quizReport->fetchQuizReportAnswers();

            if (count($quizReport->getQuizReportAnswers()) === $quiz->getQuizQuestionCount()) {
                $quizReportStats = $this->quizReportStatsService->store($quizReport);
                $this->quizSessionService->unsetCurrentQuizReportId();

                return new View('quiz-report.html', [
                    'quiz_report' => $quizReport,
                    'quiz_report_stats' => $quizReportStats
                ]);
            }
            return new Redirect('/quiz');
        }

        return new Redirect('/');
    }
}