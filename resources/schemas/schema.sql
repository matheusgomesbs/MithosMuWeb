create table mw_banned_accounts (
    id integer identity(1, 1) primary key not null,
    account varchar(10) not null,
    cause ntext collate Latin1_General_CI_AS null,
    block_date datetime default getdate() not null,
    unblock_date datetime null,
    user_block_id integer null,
    status integer default 1 not null
);

create table mw_config (
    id integer identity(1, 1) primary key not null,
    config nvarchar(400) not null,
    body ntext collate Latin1_General_CI_AS null,
    type nvarchar(10) null
);

create table mw_services (
    id integer identity(1, 1) primary key not null,
    name nvarchar(250) not null,
    service varchar(250) not null,
    active integer not null,
    sequence integer not null,
    url varchar(250) null,
    parent_id integer null,
    allowed integer not null
);

create table mw_viptype_services (
    id integer identity(1, 1) primary key not null,
    viptype varchar(2) not null,
    service_id integer not null
);

create table mw_users (
    id integer identity(1, 1) primary key not null,
    name nvarchar(100) collate Latin1_General_CI_AS not null,
    email varchar(200) null,
    username varchar(40) not null,
    password varchar(60) not null,
    super_user integer default 0 not null,
    group_id integer not null
);

create table mw_user_groups (
    id integer identity(1, 1) primary key not null,
    name nvarchar(100) collate Latin1_General_CI_AS not null,
    access text null
);



create table mw_news (
    id integer identity(1, 1) primary key not null,
    title nvarchar(400) collate Latin1_General_CI_AS not null,
    slug varchar(400) not null,
    body ntext collate Latin1_General_CI_AS not null,
    link nvarchar(400) collate Latin1_General_CI_AS null,
    create_date datetime default getdate() not null,
    type varchar(100) not null,
    views integer default 0 not null,
    user_id integer
);

create table mw_helpdesk_tickets (
    id integer identity(1, 1) primary key not null,
    department nvarchar(200) collate Latin1_General_CI_AS not null,
    message ntext collate Latin1_General_CI_AS not null,
    create_date datetime default getdate() not null,
    update_date datetime null,
    status integer default 1 not null,
    account varchar(10) not null
);

create table mw_helpdesk_ticket_messages (
    id integer identity(1, 1) primary key not null,
    message ntext collate Latin1_General_CI_AS not null,
    admin integer default 0 not null,
    account varchar(10) not null,
    create_date datetime default getdate() not null,
    ticket_id integer not null
);

create table mw_packages (
    id integer identity(1, 1) primary key not null,
    package nvarchar(200) collate Latin1_General_CI_AS not null,
    description text,
    price numeric(10,2) not null,
    viptype integer,
    vipdays integer,
    coins text,
    active integer not null
);