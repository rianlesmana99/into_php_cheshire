<?php

session_start();
// Ini yang disebut dengan midleware
if (!isset($_SESSION["user_id"])) {
    header("Location: /firts_project/pages/login.php?message=harus+login+terlebih+dahulu!");
}