<?php

namespace App\Models;

use App\Repositories\QuizQuestionAnswerRepository;
use App\Repositories\QuizQuestionCorrectAnswerRepository;

class QuizQuestion
{

    private int $id;
    private int $quizQuestionId;
    private string $question;
    private string $updatedAt;
    private string $createdAt;
    private array $quizQuestionAnswers;
    private QuizQuestionCorrectAnswer $correctQuizQuestion;

    public function __construct(int $id, int $quizQuestionId, string $question, string $updatedAt, string $createdAt)
    {
        $this->id = $id;
        $this->quizQuestionId = $quizQuestionId;
        $this->question = $question;
        $this->updatedAt = $updatedAt;
        $this->createdAt = $createdAt;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
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
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getQuestion(): string
    {
        return $this->question;
    }

    /**
     * @return int
     */
    public function getQuizQuestionId(): int
    {
        return $this->quizQuestionId;
    }

    /**
     * @return array
     */
    public function getQuizQuestionAnswers(): array
    {
        return $this->quizQuestionAnswers;
    }

    /**
     * @param QuizQuestionAnswer $quizQuestionAnswer
     * @return bool
     */
    public function isAnswerCorrect(QuizQuestionAnswer $quizQuestionAnswer): bool
    {
        return $quizQuestionAnswer->getId() === $this->correctQuizQuestion->getQuizQuestionAnswerId();
    }

    /**
     * @return void
     */
    public function fetchQuizQuestionAnswers(): void
    {
        $this->quizQuestionAnswers = (new QuizQuestionAnswerRepository())->getQuizQuestionAnswers($this);
    }


    /**
     * @return void
     */
    public function fetchQuizQuestionCorrectAnswer(): void
    {
        $this->correctQuizQuestion = (new QuizQuestionCorrectAnswerRepository())->getQuestionCorrectAnswer($this);
    }
}