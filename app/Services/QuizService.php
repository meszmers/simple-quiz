<?php

namespace App\Services;

use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Repositories\QuizRepository;

class QuizService
{
    private QuizRepository $quizRepository;

    public function __construct()
    {
        $this->quizRepository = new QuizRepository();
    }

    /**
     * @return Quiz[]|void
     */
    public function getAllQuizzes()
    {
        return $this->quizRepository->index();
    }

    /**
     * @param int $quizId
     * @return Quiz|null
     */
    public function getQuiz(int $quizId): ?Quiz
    {
        $quiz = $this->quizRepository->show($quizId);

        if ($quiz instanceof Quiz) {
            $quiz->fetchQuizQuestions();

            foreach ($quiz->getQuizQuestions() as $quizQuestion) {

                if ($quizQuestion instanceof QuizQuestion) {
                    $quizQuestion->fetchQuizQuestionAnswers();
                    $quizQuestion->fetchQuizQuestionCorrectAnswer();
                }
            }
            return $quiz;
        }

        return null;
    }
}