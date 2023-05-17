<?php

namespace App\Services;

use App\Models\QuizReport;
use App\Repositories\QuizReportRepository;
use App\Repositories\QuizRepository;

class QuizReportService
{
    private QuizReportRepository $quizReportRepository;
    private QuizRepository $quizRepository;

    public function __construct()
    {
        $this->quizReportRepository = new QuizReportRepository();
        $this->quizRepository = new QuizRepository();
    }

    /**
     * @param int $id
     * @return QuizReport|void|null
     */
    public function show(int $id)
    {
        return $this->quizReportRepository->show($id);
    }

    /**
     * @param string $userName
     * @param int $quizId
     * @return QuizReport|null
     */
    public function store(string $userName, int $quizId): ?QuizReport
    {
        $quizzes = $this->quizRepository->index();
        $quizIdIsValid = false;

        // Check if quizId is valid
        foreach ($quizzes as $quiz) {
            if ($quiz->getId() === $quizId) {
                $quizIdIsValid = true;
                break;
            }
        }

        if ($quizIdIsValid) {
            return $this->quizReportRepository->store($userName, $quizId);
        }

        return null;
    }
}