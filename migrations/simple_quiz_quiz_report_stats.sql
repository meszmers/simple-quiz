create table quiz_report_stats
(
    id                 int auto_increment
        primary key,
    quiz_report_id     int                                not null,
    answered_correctly int                                not null,
    question_count     int                                not null,
    created_at         datetime default CURRENT_TIMESTAMP not null,
    constraint quiz_report_stats_id_uindex
        unique (id)
);

