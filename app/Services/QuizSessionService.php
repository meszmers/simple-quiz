<?php

namespace App\Services;

use App\Models\QuizReport;

class QuizSessionService
{
    private static string $SESSION_VARIABLE_NAME = 'current_quiz_report_id';

    /**
     * @param QuizReport $quizReport
     * @return void
     */
    public function storeCurrentQuizReportId(QuizReport $quizReport): void
    {
        $_SESSION[self::$SESSION_VARIABLE_NAME] = $quizReport->getId();
    }

    /**
     * @return void
     */
    public function unsetCurrentQuizReportId(): void
    {
        unset($_SESSION[self::$SESSION_VARIABLE_NAME]);
    }

    /**
     * @return mixed
     */
    public function getCurrentQuizReportId(): mixed
    {
        return $_SESSION[self::$SESSION_VARIABLE_NAME] ?? null;
    }

    /**
     * @return bool
     */
    public function isSetCurrentQuizReportSession(): bool
    {
        return isset($_SESSION[self::$SESSION_VARIABLE_NAME]);
    }
}