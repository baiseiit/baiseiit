<?php

class_alias('\RedBeanPHP\R', '\Db');
Db::setup("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, false);

if(!Db::testConnection()) die("Failed to connect to database!\n");
