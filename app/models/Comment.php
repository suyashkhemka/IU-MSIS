<?php

class Comment
{
  public $id;
  public $comment;

  public function __construct($data) {
    $this->id = isset($data['id']) ? intval($data['id']) : null;
<<<<<<< HEAD
    $this->comment = isset($data['comment']) ? $data['comment'] : "testcomment";
=======
    $this->comment = isset($data['id']) ? $data['comment'] : null;
>>>>>>> 333eec22cf015df4fcea2708103fc06e70adcd69

  }

  public function create() {
    die($this->comment);
    $db = new PDO(DB_SERVER, DB_USER, DB_PW);
    $sql = 'INSERT Comments(comment)
            VALUES (?)';
    $statement = $db->prepare($sql);
    $success = $statement->execute([
        $this->comment
    ]);
    if (!$success) {
      //TODO: Better error handling
      die ('Bad SQL on insert');
    }
    $this->id = $db->lastInsertId();
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
