<?php

namespace App;

use App\Controllers\QuizController;

class Routes
{
    /**
     * @return array
     */
    public function getRoutes(): array
    {
        return [
            $this->createRoute('GET', '/', [QuizController::class, 'quizSelection']),
            $this->createRoute('POST', '/', [QuizController::class, 'selectQuiz']),
            $this->createRoute('GET', '/quiz', [QuizController::class, 'showQuiz']),
            $this->createRoute('POST', '/quiz/answer', [QuizController::class, 'postQuizAnswer'])
        ];
    }

    /**
     * @param string $method
     * @param string $route
     * @param array $handler
     * @return Route
     */
    private function createRoute(string $method, string $route, array $handler): Route
    {
        return new Route($method, $route, $handler);
    }
}