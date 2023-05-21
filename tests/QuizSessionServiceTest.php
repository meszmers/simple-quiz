<?php

use App\Models\QuizReport;
use App\Services\QuizSessionService;
use PHPUnit\Framework\TestCase;

class QuizSessionServiceTest extends TestCase
{
    public function test_Session_VariableLogic()
    {
        $env = Dotenv\Dotenv::createImmutable(__DIR__ . '/..', '.env');
        $env->load();

        $sessionService = new QuizSessionService();
        $quizReport = new QuizReport(rand(1, 1000), 'RandomName', rand(1, 100), '2017-01-17 16:22:44');

        $sessionService->storeCurrentQuizReportId($quizReport);

        // Check if correct id is set
        self::assertTrue($sessionService->isSetCurrentQuizReportSession());
        self::assertSame($quizReport->getId(), $sessionService->getCurrentQuizReportId());

        $sessionService->unsetCurrentQuizReportId();

        // Check if current id is not set after unsetCurrentQuizReportId() method
        self::assertFalse($sessionService->isSetCurrentQuizReportSession());
        self::assertSame(null, $sessionService->getCurrentQuizReportId());
    }
}