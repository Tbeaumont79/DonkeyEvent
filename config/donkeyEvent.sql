DROP DATABASE IF EXISTS donkeyevent;
CREATE DATABASE donkeyevent;

USE donkeyevent;

CREATE TABLE roles (
    role_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(50)
);

CREATE TABLE users (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  firstname VARCHAR(60),
  lastname VARCHAR(60),
  gender VARCHAR(40),
  password VARCHAR(60),
  email VARCHAR(255),
  tel VARCHAR(70),
  role_id INT,
  CONSTRAINT FK_roleid FOREIGN KEY (role_id) REFERENCES roles(role_id) ON DELETE CASCADE
);
