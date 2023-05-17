create table quiz_question_answer
(
    id               int auto_increment
        primary key,
    quiz_question_id int           not null,
    order_nr         int default 0 not null,
    answer           varchar(255)  not null,
    created_at       datetime      null,
    updated_at       datetime      null,
    constraint quiz_question_answer_id_uindex
        unique (id)
);

INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (1, 1, 1, 'Venus', '2023-05-16 19:20:49', '2023-05-16 19:20:49');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (2, 1, 2, 'Mars', '2023-05-16 19:20:49', '2023-05-16 19:20:49');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (3, 1, 3, 'Jupiter', '2023-05-16 19:20:49', '2023-05-16 19:20:49');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (4, 1, 4, 'Saturn', '2023-05-16 19:20:49', '2023-05-16 19:20:49');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (5, 2, 1, 'Leonardo da Vinci', '2023-05-16 19:20:49', '2023-05-16 19:20:49');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (6, 2, 2, 'Vincent van Gogh', '2023-05-16 19:20:49', '2023-05-16 19:20:49');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (7, 2, 3, 'Pablo Picasso', '2023-05-16 19:20:49', '2023-05-16 19:20:49');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (8, 2, 4, 'Michelangelo', '2023-05-16 19:20:49', '2023-05-16 19:20:49');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (9, 3, 1, 'George Washington', '2023-05-16 19:20:49', '2023-05-16 19:20:49');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (10, 3, 2, 'Thomas Jefferson', '2023-05-16 19:20:49', '2023-05-16 19:20:49');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (11, 3, 3, 'John Adams', '2023-05-16 19:20:49', '2023-05-16 19:20:49');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (12, 3, 4, 'Benjamin Franklin', '2023-05-16 19:20:49', '2023-05-16 19:20:49');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (13, 3, 5, 'James Madison', '2023-05-16 19:20:49', '2023-05-16 19:20:49');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (14, 3, 6, 'Alexander Hamilton', '2023-05-16 19:20:49', '2023-05-16 19:20:49');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (15, 4, 1, 'Au', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (16, 4, 2, 'Ag', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (17, 4, 3, 'Fe', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (18, 4, 4, 'Cu', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (19, 4, 5, 'Pt', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (20, 4, 6, 'Hg', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (21, 5, 1, 'Nitrogen', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (22, 5, 2, 'Oxygen', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (23, 5, 3, 'Carbon dioxide', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (24, 5, 4, 'Hydrogen', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (25, 5, 5, 'Argon', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (26, 5, 6, 'Neon', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (27, 6, 1, 'Ampere', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (28, 6, 2, 'Volt', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (29, 6, 3, 'Watt', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (30, 6, 4, 'Ohm', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (31, 6, 5, 'Joule', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (32, 6, 6, 'Tesla', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (33, 6, 7, 'Coulomb', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (34, 7, 1, 'Liver', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (35, 7, 2, 'Skin', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (36, 7, 3, 'Heart', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (37, 7, 4, 'Brain', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (38, 7, 5, 'Lungs', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (39, 7, 6, 'Kidneys', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (40, 7, 7, 'Stomach', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (41, 8, 1, '206', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (42, 8, 2, '212', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (43, 8, 3, '198', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (44, 8, 4, '224', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (45, 8, 5, '190', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (46, 8, 6, '230', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (47, 8, 7, '250', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (48, 8, 8, '180', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (49, 8, 9, '270', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (50, 8, 10, '196', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (51, 9, 1, 'Ag', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (52, 9, 2, 'Au', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (53, 9, 3, 'Si', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (54, 9, 4, 'Pb', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (55, 9, 5, 'Sn', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (56, 9, 6, 'Cu', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (57, 9, 7, 'Fe', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (58, 9, 8, 'Mg', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (59, 9, 9, 'Al', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (60, 9, 10, 'Zn', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (61, 9, 11, 'C', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (62, 9, 12, 'Hg', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (63, 10, 1, '100', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (64, 10, 2, '0', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (65, 10, 3, '50', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
INSERT INTO simple_quiz.quiz_question_answer (id, quiz_question_id, order_nr, answer, created_at, updated_at) VALUES (66, 10, 4, '200', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
