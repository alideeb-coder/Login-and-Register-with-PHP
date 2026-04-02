  CREATE DATABASE IF NOT EXISTS user_platform;
  USE user_platform;
  CREATE TABLE IF NOT EXISTs users(
    id INT AUTO_INCREMENT PRIMARY KEY ,
    name varchar(250) not null,
    email varchar(255) not null,
    password varchar(255) not null,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  );