create table quiz
(
    id         int auto_increment
        primary key,
    name       varchar(255) not null,
    created_at datetime     null,
    updated_at datetime     null,
    constraint quiz_id_uindex
        unique (id)
);

INSERT INTO simple_quiz.quiz (id, name, created_at, updated_at) VALUES (1, 'General Knowledge', '2023-05-16 19:20:49', '2023-05-16 19:20:49');
INSERT INTO simple_quiz.quiz (id, name, created_at, updated_at) VALUES (2, 'Science Trivia', '2023-05-16 19:54:16', '2023-05-16 19:54:16');
