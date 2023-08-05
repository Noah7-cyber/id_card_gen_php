CREATE DATABASE `idcard_gen`;

USE `idcard_gen`;

CREATE TABLE `user`(
    `id` INT(11) AUTO_INCREMENT PRIMARY KEY,
    `fullname` VARCHAR(255) NOT NULL,
    `matric_number` VARCHAR(255) NOT NULL,
    `gender` ENUM('Male', 'Female') NOT NULL,
    `passport` VARCHAR(255) NOT NULL,
    `level` INT(11) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `request` BOOLEAN DEFAULT 0 NOT NULL,
    `status` ENUM('approved', 'notapproved')NOT NULL DEFAULT 'notapproved'
     UNIQUE(matric_number)
);


CREATE TABLE `admin`(
    `id` INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `username` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL
)