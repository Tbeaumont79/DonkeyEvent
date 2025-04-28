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

CREATE TABLE country(
  country_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name VARCHAR(100)
);

CREATE TABLE city(
  city_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  country_id INT,
  name VARCHAR(70),
  CONSTRAINT FK_country_id FOREIGN KEY (country_id) REFERENCES country(country_id) ON DELETE CASCADE

);

CREATE TABLE category(
  category_id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name VARCHAR(100)
);


CREATE TABLE events (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  city_id INT,
  category_id INT,
  date_event DATE,
  name VARCHAR(60),
  price FLOAT,
  CONSTRAINT FK_city_id FOREIGN KEY (city_id) REFERENCES city(city_id) ON DELETE CASCADE,
  CONSTRAINT FK_category_id FOREIGN KEY (category_id) REFERENCES category(category_id) ON DELETE CASCADE
);

