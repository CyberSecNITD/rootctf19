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