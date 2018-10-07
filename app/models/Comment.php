<?php

class Comment
{
  public $id;
  public $comment;

  public function __construct($data) {
    $this->id = isset($data['id']) ? intval($data['id']) : null;
    $this->comment = $data['comment'];

  }

  public function create() {

    $db = new PDO(DB_SERVER, DB_USER, DB_PW);
    $sql = 'INSERT Comments(comment)
            VALUES (?)';
    $statement = $db->prepare($sql);
    $success = $statement->execute([
        $this->comment
    ]);
    $this->id = $db->lastInsertId();
    if (!$success) {
      //TODO: Better error handling
      die ('Bad SQL on insert');
    }

  }

  public static function fetchAll() {
    // 1. Connect to the database
    $db = new PDO(DB_SERVER, DB_USER, DB_PW);

    // 2. Prepare the query
    $sql = 'SELECT * FROM Comments';
    $statement = $db->prepare($sql);

    // 3. Run the query
    $success = $statement->execute();

    // 4. Handle the results
    $arr = [];
    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
      $theComment =  new Comment($row);
      array_push($arr, $theComment);
    }

    return $arr;
  }

}
