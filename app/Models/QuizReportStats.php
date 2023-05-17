<?php

namespace App\Models;

class QuizReportStats
{
    private int $id;
    private int $quizReportId;
    private int $answeredCorrectly;
    private int $questionCount;
    private string $createdAt;

    public function __construct(int $id, int $quizReportId, int $answeredCorrectly, int $questionCount, string $createdAt)
    {
        $this->id = $id;
        $this->quizReportId = $quizReportId;
        $this->answeredCorrectly = $answeredCorrectly;
        $this->questionCount = $questionCount;
        $this->createdAt = $createdAt;
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
    public function getQuizReportId(): int
    {
        return $this->quizReportId;
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
    public function getAnsweredCorrectly(): int
    {
        return $this->answeredCorrectly;
    }

    /**
     * @return int
     */
    public function getQuestionCount(): int
    {
        return $this->questionCount;
    }
}