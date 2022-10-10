<?php

return [
    "DB_DIR" => __DIR__ . "/database/",
    "DB_USERNAME" => "ebubekiryazgan",
    "DB_PASSWORD" => "root",
	"THEME" => "theme1",
	"DEVELOPMENT" => true,
	"BASE_URL" => "http://localhost/eko-freamwork",
	"LOCALE" => $_COOKIE['lang'] ?? 'en',
	"TIMEZONE" => 'Europe/Istanbul'
];