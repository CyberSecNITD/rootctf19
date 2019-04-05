CREATE DATABASE sqlInjection  ;
USE sqlInjection ;
CREATE TABLE Users (
    user_id int AUTO_INCREMENT,
    email varchar(255) UNIQUE NOT NULL,
    password varchar(255),
    user_agent varchar(255),
    PRIMARY KEY (user_id)
); 

-- For insertion INSERT INTO Users(first_name,last_name,username,password) VALUES('{username}','{password}')

