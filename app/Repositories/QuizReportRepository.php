<?php

namespace App\Repositories;

use App\Databases\DatabasePDO;
use App\Models\QuizReport;

class QuizReportRepository
{
    const DB_TABLE_NAME = "quiz_report";

    /**
     * @param int $id
     * @return QuizReport|void|null
     */
    public function show(int $id)
    {
        try {
            $quizReport = DatabasePDO::connection()
                ->fetchAssociative('SELECT * FROM simple_quiz.quiz_report WHERE id = ?', [$id]);

            if (!empty($quizReport)) {
                return new QuizReport($quizReport['id'], $quizReport['user_name'], $quizReport['quiz_id'], $quizReport['created_at']);
            }

            return null;
        } catch (\Exception $exception) {
            echo "DatabasePDO Exception: " . $exception->getMessage();
            die;
        }
    }

    /**
     * @param string $userName
     * @param int $quizId
     * @return QuizReport|null
     */
    public function store(string $userName, int $quizId): ?QuizReport
    {
        try {
            $quizReportInsert = DatabasePDO::connection()
                ->insert(QuizReportRepository::DB_TABLE_NAME, [
                    'user_name' => $userName,
                    'quiz_id' => $quizId,
                ]);

            if ($quizReportInsert) {
                return $this->show(DatabasePDO::connection()->lastInsertId());
            }

            return null;
        } catch (\Exception $exception) {
            echo "DatabasePDO Exception: " . $exception->getMessage();
            die;
        }
    }
}