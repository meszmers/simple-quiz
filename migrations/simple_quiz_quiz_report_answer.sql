create table quiz_report_answer
(
    id             int auto_increment
        primary key,
    quiz_report_id int                                not null,
    question_id    int                                not null,
    answer_id      int                                not null,
    created_at     datetime default CURRENT_TIMESTAMP not null,
    constraint quiz_report_answer_id_uindex
        unique (id)
);

