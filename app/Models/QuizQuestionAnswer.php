<?php

namespace App\Models;

class QuizQuestionAnswer
{
    private int $id;
    private int $quizQuestionId;
    private int $orderNr;
    private string $answer;
    private string $createdAt;
    private string $updatedAt;

    public function __construct(int $id, int $quizQuestionId, int $orderNr, string $answer, string $createdAt, string $updatedAt)
    {
        $this->id = $id;
        $this->quizQuestionId = $quizQuestionId;
        $this->orderNr = $orderNr;
        $this->answer = $answer;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    /**
     * @return string
     */
    public function getAnswer(): string
    {
        return $this->answer;
    }

    /**
     * @return int
     */
    public function getOrderNr(): int
    {
        return $this->orderNr;
    }

    /**
     * @return int
     */
    public function getQuizQuestionId(): int
    {
        return $this->quizQuestionId;
    }
}