<?php

namespace App\Repositories;

use App\Databases\DatabasePDO;
use App\Models\QuizReport;
use App\Models\QuizReportAnswer;
use Exception;

class QuizReportAnswerRepository
{
    const DB_TABLE_NAME = "quiz_report_answer";

    /**
     * @param int $id
     * @return QuizReportAnswer|void|null
     */
    public function show(int $id)
    {
        try {
            $quizReportAnswer = DatabasePDO::connection()
                ->fetchAssociative('SELECT * FROM simple_quiz.quiz_report_answer WHERE id = ?', [$id]);

            if (!empty($quiz)) {
                return new QuizReportAnswer($quiz['id'], $quiz['user_name'], $quiz['quiz_id'], $quiz['created_at']);
            }

            return null;
        } catch (\Exception $exception) {
            echo "DatabasePDO Exception: " . $exception->getMessage();
            die;
        }
    }

    /**
     * @param QuizReport $quizReport
     * @param int $questionId
     * @param int $answerId
     * @return QuizReportAnswer|null
     */
    public function store(QuizReport $quizReport, int $questionId, int $answerId): ?QuizReportAnswer
    {
        try {
            $quizReportAnswerInsert = DatabasePDO::connection()
                ->insert(QuizReportAnswerRepository::DB_TABLE_NAME, [
                    'quiz_report_id' => $quizReport->getId(),
                    'question_id' => $questionId,
                    'answer_id' => $answerId
                ]);

            if ($quizReportAnswerInsert) {
                return $this->show(DatabasePDO::connection()->lastInsertId());
            }

            return null;
        } catch (Exception $exception) {
            echo "DatabasePDO Exception: " . $exception->getMessage();
            die;
        }
    }

    /**
     * @param QuizReport $quizReport
     * @return QuizReportAnswer[]|void
     */
    public function index(QuizReport $quizReport)
    {
        try {
            $quizzes = DatabasePDO::connection()
                ->fetchAllAssociative('SELECT * FROM simple_quiz.quiz_report_answer WHERE quiz_report_id = ?', [$quizReport->getId()]);

            return array_map(function ($quiz) {
                return new QuizReportAnswer($quiz['id'], $quiz['quiz_report_id'], $quiz['question_id'], $quiz['answer_id'], $quiz['created_at'],);
            }, $quizzes);

        } catch (Exception $exception) {
            echo "DatabasePDO Exception: " . $exception->getMessage();
            die;
        }
    }
}