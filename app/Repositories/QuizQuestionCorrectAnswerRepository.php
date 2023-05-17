<?php

namespace App\Repositories;

use App\Databases\DatabasePDO;
use App\Models\QuizQuestion;
use App\Models\QuizQuestionCorrectAnswer;

class QuizQuestionCorrectAnswerRepository
{
    /**
     * @param QuizQuestion $quizQuestion
     * @return QuizQuestionCorrectAnswer|null
     */
    public function getQuestionCorrectAnswer(QuizQuestion $quizQuestion): ?QuizQuestionCorrectAnswer
    {
        try {
            $correctAnswer = DatabasePDO::connection()
                ->fetchAssociative('SELECT * FROM simple_quiz.quiz_question_correct_answer WHERE quiz_question_id = ?', [$quizQuestion->getId()]);

            if (!empty($correctAnswer)) {
                return new QuizQuestionCorrectAnswer($correctAnswer['quiz_question_id'], $correctAnswer['quiz_question_answer_id']);
            }

            return null;
        } catch (\Exception $exception) {
            echo "DatabasePDO Exception: " . $exception->getMessage();
            die;
        }
    }
}