<?php

namespace App\Models;

class QuizQuestionCorrectAnswer
{
    private int $quizQuestionId;
    private int $quizQuestionAnswerId;

    public function __construct(int $quizQuestionId, int $quizQuestionAnswerId)
    {
        $this->quizQuestionId = $quizQuestionId;
        $this->quizQuestionAnswerId = $quizQuestionAnswerId;
    }

    /**
     * @return int
     */
    public function getQuizQuestionId(): int
    {
        return $this->quizQuestionId;
    }

    /**
     * @return int
     */
    public function getQuizQuestionAnswerId(): int
    {
        return $this->quizQuestionAnswerId;
    }
}