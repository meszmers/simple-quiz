<?php

namespace App\Repositories;

use App\Databases\DatabasePDO;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use Exception;

class QuizQuestionRepository
{
    /**
     * @param Quiz $quiz
     * @return array
     */
    public function getQuizQuestions(Quiz $quiz): array
    {
        try {
            $quizAnswers = DatabasePDO::connection()
                ->fetchAllAssociative('SELECT * FROM simple_quiz.quiz_question WHERE quiz_id = ?', [$quiz->getId()]);

            return array_map(function ($quizAnswer) {
                return new QuizQuestion($quizAnswer['id'], $quizAnswer['quiz_id'], $quizAnswer['question'], $quizAnswer['updated_at'], $quizAnswer['created_at']);
            }, $quizAnswers);
        } catch (Exception $exception) {
            echo "DatabasePDO Exception: " . $exception->getMessage();
            die;
        }
    }

    /**
     * @param int $id
     * @return QuizQuestion|void|null
     */
    public function getQuizQuestionById(int $id)
    {
        try {
            $quizAnswer = DatabasePDO::connection()
                ->fetchAssociative('SELECT * FROM simple_quiz.quiz_question WHERE id = ?', [$id]);

            if ($quizAnswer) {
                return new QuizQuestion($quizAnswer['id'], $quizAnswer['quiz_id'], $quizAnswer['question'], $quizAnswer['updated_at'], $quizAnswer['created_at']);
            }

            return null;
        } catch (Exception $exception) {
            echo "DatabasePDO Exception: " . $exception->getMessage();
            die;
        }
    }
}