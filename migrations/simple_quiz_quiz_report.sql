create table quiz_report
(
    id         int auto_increment
        primary key,
    user_name  varchar(255)                       not null,
    quiz_id    int                                not null,
    created_at datetime default CURRENT_TIMESTAMP not null,
    constraint quiz_report_id_uindex
        unique (id)
);

