<?php

// include  "database.php" =  "warning only"
// include_once
// require   //=  "with error"
require_once "database.php";


class Request{
  public $id = " ";
  public $leave_id  = "";
  public $employee_name = "";
  public $start_date = "";
  public $end_date = "";
  public $leave_types = "";

protected $db;

public function __construct(){

    $this->db = new Database();

}
public function addLeaves(){
    $sql = "INSERT INTO leaves (employee_name, start_date, end_date, leave_type_id)
            VALUES (:employee_name, :start_date, :end_date, :leave_type_id)";
    $query = $this->db->connect()->prepare($sql);

    $query->bindParam(":employee_name", $this->employee_name);
    $query->bindParam(":start_date", $this->start_date);
    $query->bindParam(":end_date", $this->end_date);
    $query->bindParam(":leave_type_id", $this->leave_types);

    return $query->execute();
}

public function UpdateLeaves(){
    $sql = "UPDATE leaves SET employee_name=:employee_name,start_date=:start_date,end_date=:end_date,leave_type_id=:leave_type_id WHERE leave_id=:leave_id";
            
    $query = $this->db->connect()->prepare($sql);

    $query->bindParam(":employee_name", $this->employee_name);
    $query->bindParam(":start_date", $this->start_date);
    $query->bindParam(":end_date", $this->end_date);
    $query->bindParam(":leave_type_id", $this->leave_types);
    $query->bindParam(":leave_id", $this->leave_id);

if ($query->execute()) {
    return true;  // or return $query->rowCount();
} else {
    return false;
}

}


public function viewLeaves(){
    $sql = "SELECT l.leave_id, l.employee_name, l.start_date, l.end_date, lt.type_name
            FROM leaves l
            JOIN leave_types lt ON l.leave_type_id = lt.leave_type_id
            ORDER BY l.leave_id ASC";
    $query = $this->db->connect()->prepare($sql);

    if($query->execute()){
        return $query->fetchAll(PDO::FETCH_ASSOC);
    } else {
        return null;
    }
}


public function getRequestById($leave_id) {
    $sql = "SELECT * FROM leaves WHERE leave_id =:leave_id";
    $query = $this->db->connect()->prepare($sql);
    $query->bindParam(":leave_id", $leave_id);
    $query->execute();
    return $query->fetch();
}


public function deleteRequestLeave() {
    $sql = "DELETE FROM leaves WHERE leave_id=:leave_id";
    $query = $this->db->connect()->prepare($sql);
    $query->bindParam(":leave_id", $this->leave_id);
    return $query->execute();
}


}   

// public function getBookById($id) {
//     $sql = "SELECT * FROM book WHERE id = :id";
//     $query = $this->db->connect()->prepare($sql);
//     $query->bindParam(":id", $id);
//     $query->execute();
//     return $query->fetch();
// }

// public function updateBook() {
//     $sql = "UPDATE book SET title=:title, author=:author, genre=:genre, publication_year=:publication_year WHERE id=:id";
//     $query = $this->db->connect()->prepare($sql);
//     $query->bindParam(":id", $this->id);
//     $query->bindParam(":title", $this->title);
//     $query->bindParam(":author", $this->author);
//     $query->bindParam(":genre", $this->genre);
//     $query->bindParam(":publication_year", $this->publication_year);
//     return $query->execute();
// }

// public function deleteBook() {
//     $sql = "DELETE FROM book WHERE id=:id";
//     $query = $this->db->connect()->prepare($sql);
//     $query->bindParam(":id", $this->id);
//     return $query->execute();
// }



// }

// // $obj = new addProduct();
// // $obj->name = "keyboard";
// // $obj->category = "PC Parts";
// // $obj->price = 1000;

// // $obj->addProduct();
