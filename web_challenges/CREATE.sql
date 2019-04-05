-- XSS Automated

CREATE DATABASE xssAutomated  ;
USE xssAutomated ;
CREATE TABLE Users (
    user_id int AUTO_INCREMENT,
    email varchar(255) UNIQUE NOT NULL,
    password varchar(255),
    PRIMARY KEY (user_id)
); 

-- For insertion INSERT INTO Users(first_name,last_name,username,password) VALUES('{username}','{password}')

CREATE TABLE BlogPosts(

    blog_id int AUTO_INCREMENT,
    user_id int ,
    title varchar(255) UNIQUE NOT NULL ,
    content text,

    PRIMARY KEY (blog_id),
    CONSTRAINT `fk_user_id`
		FOREIGN KEY (user_id) REFERENCES Users (user_id)

);

-- SQL Injection 

CREATE DATABASE sqlInjection  ;
USE sqlInjection ;
CREATE TABLE Users (
    user_id int AUTO_INCREMENT,
    email varchar(255) UNIQUE NOT NULL,
    password varchar(255),
    user_agent varchar(255),
    PRIMARY KEY (user_id)
); 


INSERT INTO Users(email,password,user_agent) VALUES('admin@rootCtf19.com','fc4b5fd6816f75a7c81fc8eaa9499d6a299bd803397166e8c4cf9280b801d62c','rootCtf19{flag_sql_injection}') ;