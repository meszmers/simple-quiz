<?php

use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\QuizQuestionAnswer;
use App\Services\QuizService;
use PHPUnit\Framework\TestCase;

class QuizServiceTest extends TestCase
{
    public function test_All_Quiz_Retrieval()
    {
        $env = Dotenv\Dotenv::createImmutable(__DIR__ . '/..', '.env');
        $env->load();

        $quizzes = (new QuizService())->getAllQuizzes();

        foreach ($quizzes as $quiz) {
            // Check if the quiz is returned to the type of Quiz::class
            self::assertInstanceOf(Quiz::class, $quiz);

            if ($quiz instanceof Quiz) {
                $quiz->fetchQuizQuestions();
                $quizQuestions = $quiz->getQuizQuestions();

                foreach ($quizQuestions as $quizQuestion) {
                    // Check if the question is returned to the type of QuizQuestion::class
                    self::assertInstanceOf(QuizQuestion::class, $quizQuestion);

                    if ($quizQuestion instanceof QuizQuestion) {
                        // Check if question is related to quiz
                        self::assertSame($quiz->getId(), $quizQuestion->getQuizQuestionId());

                        $quizQuestion->fetchQuizQuestionAnswers();
                        $quizQuestionAnswers = $quizQuestion->getQuizQuestionAnswers();

                        foreach ($quizQuestionAnswers as $quizQuestionAnswer) {
                            // Check if the answer is returned to the type of QuizQuestionAnswer::class
                            self::assertInstanceOf(QuizQuestionAnswer::class, $quizQuestionAnswer);

                            if ($quizQuestionAnswer instanceof QuizQuestionAnswer) {
                                // Check if answer is related to question
                                self::assertSame($quizQuestion->getId(), $quizQuestionAnswer->getQuizQuestionId());
                            }
                        }
                    }
                }
            }
        }
    }

    public function test_Show_Quiz_Service_Method()
    {
        $quizId = 1;

        $env = Dotenv\Dotenv::createImmutable(__DIR__ . '/..', '.env');
        $env->load();

        $quiz = (new QuizService())->getQuiz($quizId);

        self::assertInstanceOf(Quiz::class, $quiz);

        if ($quiz instanceof Quiz) {
            self::assertSame($quizId, $quiz->getId());
        }
    }
}