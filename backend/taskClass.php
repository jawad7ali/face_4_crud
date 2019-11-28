<?php
class TaskClass{
    //Connection instance
    private $connection;
    //table name
    private $table_name = "tbl_tasks";
    //table columns
    public $id;
    public $title;
    public $description;
    public function __construct($connection){
        $this->connection = $connection;
    }
    //C
    public function create(){

        //echo $this->title;
        $form_data = array(
            ':title'  => $this->title,
            ':description'  => $this->description
        );
        $query = "INSERT INTO " . $this->table_name . " (title, description) VALUES(:title, :description)";
        $statement = $this->connection->prepare($query);
        $statement->execute($form_data);
        return $this->connection->lastInsertId();
    }
    //R
    public function read(){
        $query = "SELECT id, title, description FROM " . $this->table_name . " ORDER BY id DESC";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    //U
    public function update(){}
    //D
    public function delete(){}
}