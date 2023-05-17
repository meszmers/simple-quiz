<?php

namespace App\Models;

use App\Repositories\QuizQuestionRepository;
use App\Repositories\QuizReportAnswerRepository;
use App\Repositories\QuizRepository;

class QuizReport
{
    private int $id;
    private string $userName;
    private int $quizId;
    private string $createdAt;
    private array $quizReportAnswers;
    private float $quizProgressPercentage;

    public function __construct(int $id, string $userName, int $quizId, string $createdAt)
    {
        $this->id = $id;
        $this->userName = $userName;
        $this->quizId = $quizId;
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
    public function getQuizId(): int
    {
        return $this->quizId;
    }

    /**
     * @return string
     */
    public function getUserName(): string
    {
        return $this->userName;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @return array
     */
    public function getQuizReportAnswers(): array
    {
        return $this->quizReportAnswers;
    }

    /**
     * @return float
     */
    public function getQuizProgressPercentage(): float
    {
        return $this->quizProgressPercentage;
    }

    /**
     * @param int $questionId
     * @param int $answerId
     * @return bool
     */
    public function isQuizReportAnswerValid(int $questionId, int $answerId): bool
    {
        $quiz = (new QuizRepository())->show($this->getQuizId());

        if ($quiz instanceof Quiz) {
            $quiz->fetchQuizQuestions();

            foreach ($quiz->getQuizQuestions() as $quizQuestion) {

                if ($quizQuestion instanceof QuizQuestion) {
                    if ($quizQuestion->getId() === $questionId) {
                        $quizQuestion->fetchQuizQuestionAnswers();

                        foreach ($quizQuestion->getQuizQuestionAnswers() as $quizQuestionAnswer) {
                            if ($quizQuestionAnswer instanceof QuizQuestionAnswer) {

                                if ($quizQuestionAnswer->getId() === $answerId) {
                                    return true;
                                }
                            }
                        }
                    }
                }
            }
        }

        return false;
    }

    /**
     * @return void
     */
    public function fetchQuizReportAnswers(): void
    {
        $this->quizReportAnswers = (new QuizReportAnswerRepository())->index($this);
    }

    public function fetchQuizProgressPercentage(): void
    {
        $this->fetchQuizReportAnswers();
        $answeredQuestions = count($this->quizReportAnswers);

        $quiz = (new QuizRepository())->show($this->getQuizId());

        if ($quiz instanceof Quiz) {
            $quizQuestionCount = count((new QuizQuestionRepository())->getQuizQuestions($quiz));

            $this->quizProgressPercentage = ($answeredQuestions / $quizQuestionCount) * 100;
        }
    }

}