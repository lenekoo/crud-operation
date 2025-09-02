<?php
/*$var1 = 12;
$var2 = "15";
$var3 = 4;
$var4 = true;

var_dump($var4);*/

/*$cars = array("Mustang", "Toyota", "BMW","tricycle");
//echo $cars[2];

foreach($cars as $car){
    echo "$car <br>"; 
}*/
//echo '<p>' . $variable1  * $variable2 . '<p>';

require_once('connection.php');

$result= $conn->query("select * from users_table"); 

$id = 2;
// $sql = "select * from users_table where user_id = ?";
// $stmt = $conn->prepare($sql);
// $stmt ->execute([$id]);
// $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// foreach($users as $user){
//     echo $user['first_name'] .  " " .  $user['last_name'].'<br>' ;

// }
$first_name = "test";
$last_name = "testwq";
$email = "test@gmail.com";
$gender = "male";
$user_address = "bogo city";

$sql = "insert into users_table(first_name,last_name,email,gender,user_address) 
values (:first_name,:last_name,:email,:gender,:user_address)";
$stmt = $conn->prepare($sql);
$stmt ->execute([
    'first_name' => $first_name,
    'last_name' => $last_name,
    'email' => $email,
    'gender' => $gender,
    'user_address' => $user_address,

]);
$sql = "select * from users_table order by user_id = desc";
$stmt = $conn->prepare($sql);
$stmt ->execute();


$result = $stmt->fetchAll(PDO::FETCH_ASSOC);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th> User ID </th>
              <th> First Name</th>
                <th> Last Name </th>
                  <th> Email </th>
                    <th> Gender </th>
                      <th> Address </th>
        </tr>
<?php foreach($result as $row):?>
        <tr>
            <td><?php echo $row['user_id']; ?></td>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['last_name']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['user_address']; ?></td>

        </tr>
        <?php endforeach ?>
    </table>
</body>
</html>
