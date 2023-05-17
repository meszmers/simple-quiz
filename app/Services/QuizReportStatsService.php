<?php

namespace App\Services;

use App\Models\QuizReport;
use App\Models\QuizReportAnswer;
use App\Repositories\QuizReportStatsRepository;

class QuizReportStatsService
{
    private QuizReportStatsRepository $quizReportStatsRepository;

    public function __construct()
    {
        $this->quizReportStatsRepository = new QuizReportStatsRepository();
    }

    public function store(QuizReport $quizReport)
    {
        $quizReport->fetchQuizReportAnswers();
        $quizReportAnswers = $quizReport->getQuizReportAnswers();

        $questionCount = count($quizReportAnswers);
        $correctAnswers = 0;

        // Return count of current answers
        foreach ($quizReportAnswers as $quizReportAnswer) {
            if ($quizReportAnswer instanceof QuizReportAnswer) {
                if ($quizReportAnswer->isCorrect()) {
                    $correctAnswers +=1;
                }
            }
        }

        return $this->quizReportStatsRepository->store($quizReport->getId(), $correctAnswers, $questionCount);
    }
}