<?php
class User{
private $conn;

public function __construct($conn)
{
    $this->conn = $conn;

}
public function getAllUsers(){
$query ="select * from users_table order by user_id desc limit 10";
$stmt = $this-> conn->query($query);
$stmt -> execute();
$result = $stmt->fetchAll(PDO::FETCH_OBJ);
return $result; 
}
public function addUser($first_name,$last_name,
    $email,$gender,$user_address){
    $query = "insert into users_table (first_name,last_name,email,gender
    ,user_address) values (?,?,?,?,?)";
    $stmt = $this->conn->prepare($query);
    $result = $stmt->execute([$first_name,$last_name,
    $email,$gender,$user_address]);
    return $return;
}
}

?>
