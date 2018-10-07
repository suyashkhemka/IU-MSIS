<?php

require '../../app/common.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
require 'commentPost.php';
//$comment = new Comment($_POST);
//$comment->create();
//echo json_encode($comment);
exit;
}
// 1. Go to the database and get all teams
$comments = Comment::fetchAll();
// 2. Convert to JSON
$json = json_encode($comments, JSON_PRETTY_PRINT);

// 3. Print
header('Content-Type: application/json');
echo $json;
