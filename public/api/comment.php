<?php

require '../../app/common.php';

// 1. Go to the database and get all teams
$comments = Comment::fetchAll();
// 2. Convert to JSON
$json = json_encode($comments, JSON_PRETTY_PRINT);

// 3. Print
header('Content-Type: application/json');
echo $json;
