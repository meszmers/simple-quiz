create table quiz_question
(
    id         int auto_increment
        primary key,
    quiz_id    int          not null,
    question   varchar(255) null,
    updated_at datetime     null,
    created_at datetime     null,
    constraint quiz_question_id_uindex
        unique (id)
);

INSERT INTO simple_quiz.quiz_question (id, quiz_id, question, updated_at, created_at) VALUES (1, 1, 'Which planet is known as the "Red Planet"?', '2023-05-16 19:20:49', '2023-05-16 19:20:49');
INSERT INTO simple_quiz.quiz_question (id, quiz_id, question, updated_at, created_at) VALUES (2, 1, 'Who painted the Mona Lisa?', '2023-05-16 19:20:49', '2023-05-16 19:20:49');
INSERT INTO simple_quiz.quiz_question (id, quiz_id, question, updated_at, created_at) VALUES (3, 1, 'Who was the first President of the United States?', '2023-05-16 19:20:49', '2023-05-16 19:20:49');
INSERT INTO simple_quiz.quiz_question (id, quiz_id, question, updated_at, created_at) VALUES (4, 2, 'What is the chemical symbol for gold?', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question (id, quiz_id, question, updated_at, created_at) VALUES (5, 2, 'Which gas makes up the majority of the Earth''s atmosphere?', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question (id, quiz_id, question, updated_at, created_at) VALUES (6, 2, 'What is the unit of measurement for electric current?', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question (id, quiz_id, question, updated_at, created_at) VALUES (7, 2, 'What is the largest organ in the human body?', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question (id, quiz_id, question, updated_at, created_at) VALUES (8, 2, 'How many bones are there in the human body?', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question (id, quiz_id, question, updated_at, created_at) VALUES (9, 2, 'What is the chemical symbol for silver?', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question (id, quiz_id, question, updated_at, created_at) VALUES (10, 2, 'What is the boiling point of water in degrees Celsius?', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
