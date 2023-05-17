<?php

namespace App\Models;

use App\Repositories\QuizQuestionRepository;

class Quiz
{
    private int $id;
    private string $name;
    private string $createdAt;
    private string $updatedAt;
    private array $quizQuestions;

    public function __construct(int $id, string $name, string $createdAt, string $updatedAt)
    {
        $this->id = $id;
        $this->name = $name;
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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    /**
     * @return array
     */
    public function getQuizQuestions(): array
    {
        return $this->quizQuestions;
    }

    /**
     * @return int
     */
    public function getQuizQuestionCount(): int
    {
        return count($this->getQuizQuestions());
    }

    /**
     * @return void
     */
    public function fetchQuizQuestions(): void
    {
        $quizQuestions = (new QuizQuestionRepository())->getQuizQuestions($this);

        $this->quizQuestions = $quizQuestions;
    }
}