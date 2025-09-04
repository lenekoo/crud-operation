<?php
require_once('connection.php');
require_once('classes/User.php');

$user = new User($conn);
$result = $user -> getAllUsers();

// $query ="select * from users_table order by user_id ";

// $stmt = $conn-> prepare($query);
// $stmt->execute();
// $result = $stmt->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" 
    rel="stylesheet" 
</head>
<body>
       
    <div class= "container pt-5">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mb-3 float-end" data-bs-toggle="modal" data-bs-target="#insertModal">
 Add
</button>
        <table class="table table-danger">
  <thead>
    <tr>
       
        <th scope="col">ID</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">Email</th>
        <th scope="col">Gender</th>
        <th scope="col">Address</th>
        <th scope="col">Date</th>

        <th scope="col">Actions</th>

    </tr>
  </thead>
  <tbody>
    <?php foreach($result as $user):?>
    <tr>
       
        <th scope="row"><?php echo $user-> user_id?></th>
        <td><?php echo $user-> first_name?></td>
        <td><?php echo $user-> last_name?></td>
        <td><?php echo $user-> email?></td>
        <td><?php echo $user-> gender?></td>
        <td><?php echo $user-> user_address?></td>
        <td><?php echo $user-> date_created?></td>
        <td><button type="button" class="btn btn-warning">Update</button>
    <button type="button" class="btn btn-danger">Delete</button>
    
</td>
    </tr>
    <?php endforeach?>
  </tbody>
</table>
</div>


<!-- Modal -->
<div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="backend/user_code.php" method="post">
    <div class="row g-3">
  <div class="col-12">
    <input type="text" class="form-control" placeholder="First name" aria-label="First name" name="first_name">
  </div>
      <div class="row g-3">
  <div class="col-12">
    <input type="text" class="form-control" placeholder="Last name" aria-label="Last name" name="last_name">
  </div>
    <div class="row g-3">
  <div class="col-12">
    <input type="text" class="form-control" placeholder="Email" aria-label="Email" name="email">
  </div>
    <div class="row g-3">
  <div class="col-12">
    <input type="text" class="form-control" placeholder="Gender" aria-label="Gender" name="gender">
  </div>
    <div class="row g-3">
  <div class="col-12">
    <input type="text" class="form-control" placeholder="Address" aria-label="Address" name="user_address">
  </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary" name="btn_save" >Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</html>