<?php

namespace App\Repositories;

use App\Databases\DatabasePDO;
use App\Models\QuizReportStats;

class QuizReportStatsRepository
{
    const DB_TABLE_NAME = "quiz_report_stats";

    /**
     * @param int $quizReportId
     * @param int $answeredCorrectly
     * @param int $questionCount
     * @return QuizReportStats|void|null
     */
    public function store(int $quizReportId, int $answeredCorrectly, int $questionCount)
    {
        try {
            $quizReportInsert = DatabasePDO::connection()
                ->insert(QuizReportStatsRepository::DB_TABLE_NAME, [
                    'quiz_report_id' => $quizReportId,
                    'answered_correctly' => $answeredCorrectly,
                    'question_count' => $questionCount
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

    /**
     * @param int $id
     * @return QuizReportStats|void|null
     */
    public function show(int $id)
    {
        try {
            $quizReportStats = DatabasePDO::connection()
                ->fetchAssociative('SELECT * FROM simple_quiz.quiz_report_stats WHERE id = ?', [$id]);

            if (!empty($quizReportStats)) {
                return new QuizReportStats($quizReportStats['id'], $quizReportStats['quiz_report_id'],$quizReportStats['answered_correctly'], $quizReportStats['question_count'], $quizReportStats['created_at']);
            }

            return null;
        } catch (\Exception $exception) {
            echo "DatabasePDO Exception: " . $exception->getMessage();
            die;
        }
    }
}