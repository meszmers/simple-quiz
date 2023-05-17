create table quiz_question_correct_answer
(
    quiz_question_id        int not null
        primary key,
    quiz_question_answer_id int not null
);

INSERT INTO simple_quiz.quiz_question_correct_answer (quiz_question_id, quiz_question_answer_id) VALUES (1, 1);
INSERT INTO simple_quiz.quiz_question_correct_answer (quiz_question_id, quiz_question_answer_id) VALUES (2, 5);
INSERT INTO simple_quiz.quiz_question_correct_answer (quiz_question_id, quiz_question_answer_id) VALUES (3, 9);
INSERT INTO simple_quiz.quiz_question_correct_answer (quiz_question_id, quiz_question_answer_id) VALUES (4, 15);
INSERT INTO simple_quiz.quiz_question_correct_answer (quiz_question_id, quiz_question_answer_id) VALUES (5, 21);
INSERT INTO simple_quiz.quiz_question_correct_answer (quiz_question_id, quiz_question_answer_id) VALUES (6, 27);
INSERT INTO simple_quiz.quiz_question_correct_answer (quiz_question_id, quiz_question_answer_id) VALUES (7, 35);
INSERT INTO simple_quiz.quiz_question_correct_answer (quiz_question_id, quiz_question_answer_id) VALUES (8, 41);
INSERT INTO simple_quiz.quiz_question_correct_answer (quiz_question_id, quiz_question_answer_id) VALUES (9, 51);
INSERT INTO simple_quiz.quiz_question_correct_answer (quiz_question_id, quiz_question_answer_id) VALUES (10, 63);
