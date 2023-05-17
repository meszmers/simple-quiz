<?php

namespace App\Repositories;

use App\Databases\DatabasePDO;
use Exception;
use App\Models\Quiz;

class QuizRepository
{
    /**
     * @return Quiz[]|void
     */
    public function index()
    {
        try {
            $quizzes = DatabasePDO::connection()
                ->fetchAllAssociative('SELECT * FROM simple_quiz.quiz');

            return array_map(function ($quiz) {
                return new Quiz($quiz['id'], $quiz['name'], $quiz['created_at'], $quiz['updated_at']);
            }, $quizzes);

        } catch (Exception $exception) {
            echo "DatabasePDO Exception: " . $exception->getMessage();
            die;
        }
    }

    /**
     * @param int $id
     * @return Quiz|void|null
     */
    public function show(int $id)
    {
        try {
            $quiz = DatabasePDO::connection()
                ->fetchAssociative('SELECT * FROM simple_quiz.quiz WHERE id = ?', [$id]);

            if (!empty($quiz)) {
                return new Quiz($quiz['id'], $quiz['name'], $quiz['created_at'], $quiz['updated_at']);
            }

            return null;

        } catch (Exception $exception) {
            echo "DatabasePDO Exception: " . $exception->getMessage();
            die;
        }
    }
}