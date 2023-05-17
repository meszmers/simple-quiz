<?php

namespace App\Services;

use App\Models\QuizReport;
use App\Models\QuizReportAnswer;
use App\Repositories\QuizReportAnswerRepository;

class QuizReportAnswerService
{

    private QuizReportAnswerRepository $quizReportAnswerRepository;

    public function __construct()
    {
        $this->quizReportAnswerRepository = new QuizReportAnswerRepository();
    }

    public function store(QuizReport $quizReport, int $questionId,int $answerId): ?QuizReportAnswer
    {
        if ($quizReport->isQuizReportAnswerValid($questionId, $answerId)) {
            return $this->quizReportAnswerRepository->store($quizReport, $questionId, $answerId);
        }

        return null;
    }
}