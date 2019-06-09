<?php 

include('HF/header.php');
include("../controller/database.php");
    #1. Connect to database
    
    $conn = dbConnect();
    $sql = "SELECT * FROM user";
    $sql2 ="SELECT * FROM contact";
    
    #2. Excute query
    $conn->query($sql);
    $statement =  $conn->query($sql);
    $count =  $statement->num_rows;

    
    $statement2 =  $conn->query($sql2);

?>



                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">User</h1>
                    <div class="container">      
                    <table class="table table-bordered" >
                       
                        <thead>
                        <tr style="text-align: center">
                            <th>Avatar</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Gender</th>
                            <th colspan="2">Action</th>
                            
                        </tr>
                        </thead>
                    <?php
                        if($count == 0){
                            die("Nothing in database!");
                        }else{
                            while($fields = $statement->fetch_array()){
                    ?>  
                        <tbody >
                            
                        <tr >
                            <td ><img src="../<?=$fields['avatar']?>" alt="Avatar" class="avatar">
                              <style>
                              .avatar {
                                vertical-align: middle;
                                width: 50px;
                                height: 50px;
                                border-radius: 50%;
                              }
                              </style>
                            </td>
                            <td class="center-text"><?=$fields['name']?></td>
                            <td class="center-text"><?=$fields['email']?></td>
                            <td class="center-text"><?=$fields['address']?></td>
                            <td class="center-text"><?php
                               if($fields['gender'] == 0){
                                  echo 'Male';
                               }else{
                                 echo 'Female';
                               }
                            ?></td>          
                            <td><a href="controller/edit.php?id=<?= $fields['id']?>"  data-toggle="modal"
                             data-target="#myModal<?=$fields['id']?>"><i class="fas fa-edit"></i></a></td> 
                            <td><a href="#" data-toggle="modal" data-target="#deleteUser"><i class="fas fa-trash-alt"></i></a></td> 
                        </tr>
           
                  
                        <style>
                          .center-text {
                            width: 400px;
                            height: 20px;
                            font-size: 14px;
                            line-height: 20px;
                            text-align: center;
                          }
                        </style>
 <!-- ** Edit user modal -->
<div class="container">
  <!-- The Modal -->
  <div class="modal fade" id="myModal<?=$fields['id']?>">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
<form method="POST" action="controller/edit.php">
  <input type="text" hidden readonly  value="<?=$fields['id']?>" name="txtID" >
  <div class="form-group">
    <label for="text">Name:</label> 
    <input type="text" class="form-control" value="<?=$fields['name']?>" 
          placeholder="Enter name" name="txtName" required>
  </div>
  <div class="form-group">
    <label for="text">Email:</label>
    <input type="email" class="form-control" value="<?=$fields['email']?>"
          placeholder="Enter email" name="txtEmail" required>
  </div>
  <div class="form-group">
    <label for="text">Address:</label>
    <input type="text" class="form-control" value="<?=$fields['address']?>"
          placeholder="Enter address" name="txtAddress" required>
  </div>
  <div class="form-group">
  <label for="text">Gender:</label> 
    <select  value="<?=$fields['gender']?>" class="form-control" name="txtGender">
      <option value="0">Male</option>
      <option value="1">Female</option>
    </select>
  </div>


        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="submit">OK</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
        </form>        
      </div>
    </div>
  </div>
  
      <!-- ** Delete User Model -->
<div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to delete?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Delete" below if you are ready to delete user</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="controller/delete.php?id=<?= $fields['id']?>">Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>
                        </tbody> 
                        <?php } }?>
                    </table>
                    </div>
                    
                   
                <!-- /.container-fluid -->
 
<div class='container'>
  <table class="table">
      <thead class="thead-dark">
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Subject</th>
          <th scope="col">Opinion</th>
      </thead>
      <tbody>
          <?php
          
            while($field = mysqli_fetch_assoc($statement2))
            {
          ?>
          <tr>
          <td><?= $field['Name']; ?></td>
          <td><?= $field['Email']; ?></td>
          <td><?= $field['Subject']; ?></td>
          <td><?= $field['Opinion']; ?></td>
          </tr>
          <?php
            }
          ?>
      </tbody>
  </table>
</div>




<?php 

include('HF/footer.php');


?> 
