<?php

namespace App\Models;

use App\Repositories\QuizQuestionCorrectAnswerRepository;
use App\Repositories\QuizQuestionRepository;

class QuizReportAnswer
{
    private int $id;
    private int $quizReportId;
    private int $questionId;
    private int $answerId;
    private string $createdAt;

    public function __construct(int $id, int $quizReportId, int $questionId, int $answerId, string $createdAt)
    {
        $this->id = $id;
        $this->quizReportId = $quizReportId;
        $this->questionId = $questionId;
        $this->answerId = $answerId;
        $this->createdAt = $createdAt;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getAnswerId(): int
    {
        return $this->answerId;
    }

    /**
     * @return int
     */
    public function getQuestionId(): int
    {
        return $this->questionId;
    }

    /**
     * @return int
     */
    public function getQuizReportId(): int
    {
        return $this->quizReportId;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @return bool
     */
    public function isCorrect(): bool
    {
        $question = (new QuizQuestionRepository())->getQuizQuestionById($this->getQuestionId());

        if($question instanceof QuizQuestion) {
            $quizQuestionCorrectAnswer =  (new QuizQuestionCorrectAnswerRepository())->getQuestionCorrectAnswer($question);

            if ($quizQuestionCorrectAnswer instanceof QuizQuestionCorrectAnswer) {
                return $quizQuestionCorrectAnswer->getQuizQuestionAnswerId() === $this->getAnswerId();
            }
        }

        return false;
    }
}