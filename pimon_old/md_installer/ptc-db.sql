CREATE DATABASE IF NOT EXISTS PTC_Dashboard_Registry;
USE PTC_Dashboard_Registry;

CREATE TABLE registry (IP VARCHAR(20) NOT NULL, hostname VARCHAR(20) NOT NULL, checkin_time DATETIME, PRIMARY KEY (IP,hostname));
CREATE TABLE list (url VARCHAR(200), time INT);
CREATE TABLE status (on_off  VARCHAR(3));
CREATE TABLE url_list (IP VARCHAR(20), url VARCHAR(200), time INT);
