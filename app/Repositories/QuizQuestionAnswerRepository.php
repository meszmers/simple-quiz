<?php

namespace App\Repositories;

use App\Databases\DatabasePDO;
use App\Models\QuizQuestion;
use App\Models\QuizQuestionAnswer;
use Exception;

class QuizQuestionAnswerRepository
{
    /**
     * @param QuizQuestion $quizQuestion
     * @return array|null
     */
    public function getQuizQuestionAnswers(QuizQuestion $quizQuestion): ?array
    {
        try {
            $quizAnswers = DatabasePDO::connection()
                ->fetchAllAssociative('SELECT * FROM simple_quiz.quiz_question_answer WHERE quiz_question_id = ? ORDER BY order_nr ASC', [$quizQuestion->getId()]);

            return array_map(function ($quizAnswer) {
                return new QuizQuestionAnswer($quizAnswer['id'], $quizAnswer['quiz_question_id'], $quizAnswer['order_nr'], $quizAnswer['answer'], $quizAnswer['created_at'], $quizAnswer['updated_at']);
            }, $quizAnswers);
        } catch (Exception $exception) {
            echo "DatabasePDO Exception: " . $exception->getMessage();
            die;
        }
    }

    /**
     * @param int $id
     * @return QuizQuestionAnswer|null
     */
    public function getQuizQuestionAnswerById(int $id): ?QuizQuestionAnswer
    {
        try {
            $quizAnswer =  DatabasePDO::connection()
                ->fetchAssociative('SELECT * FROM simple_quiz.quiz_question_answer WHERE id = ?', [$id]);

            if ($quizAnswer) {
                return new QuizQuestionAnswer($quizAnswer['id'], $quizAnswer['quiz_question_id'], $quizAnswer['order_nr'], $quizAnswer['answer'], $quizAnswer['created_at'], $quizAnswer['updated_at']);
            }
            return null;
        } catch (Exception $exception) {
            echo "DatabasePDO Exception: " . $exception->getMessage();
            die;
        }
    }
}