<?php
$pdo = new PDO('mysql:host=localhost;dbname=manneringmvc; charset=utf8', 'root', 'suntzuronin200');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);