<?php 

include('HF/header.php');

include '../controller/database.php';
$conn = dbConnect();
$sql = "SELECT * FROM brands";
$rs = $conn->query($sql);

?>

<div class="container">
    <center><h1>Add Laptop</h1></center>
    
       <form action="uploadprocess.php"  method="post" enctype="multipart/form-data">
           <div class="row">
        <div class="col-6" style="padding-top: 1px;">
            
                <div class="form-group">
                    <label>Name:</label>
                    <input type="text" name="txtName" class="form-control" required=""
                     oninvalid="this.setCustomValidity('Please enter name of laptop')" oninput="setCustomValidity('')">
                </div>
                
                <div class="form-group">
                    <label>Price:</label>
                    <input type="text" name="txtPrice" class="form-control" required=""
                     oninvalid="this.setCustomValidity('Please enter price of laptop. E.g: 3000')" oninput="setCustomValidity('')">
                </div>
                
                <div class="form-group">
                <label>Display:</label><br/>
                <input type="text" name="txtDisplay" class="form-control" required="" 
                     oninvalid="this.setCustomValidity('Please enter display of laptop')" oninput="setCustomValidity('')"> 
                </div>
                <div class="form-group">
                <label>Weight (Inc.Battery):</label><br/>
                <input type="text" name="txtWeight" class="form-control" required="" 
                     oninvalid="this.setCustomValidity('Please enter weight of laptop. E.g: 3kg')" oninput="setCustomValidity('')">
                </div>
                <div class="form-group">
                    <label>Brands:</label>
                    
                    <select class="form-control" name="txtBrands">
                    <?php
                    while($row = mysqli_fetch_assoc($rs)){
                    ?>
                        <option selected value="<?=$row['id']?>"><?=$row['brand']?></option>
                    <?php
                    }
                    ?>
                    </select>
                    
                </div>
                <div class="form-group">
                    <label>Image:</label><br/>
                    
                    <input type="file" name="img[]" multiple="true">
                </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label>Model:</label><br/>
                <input type="text" name="txtModel" class="form-control" required="" 
                     oninvalid="this.setCustomValidity('Please enter model of laptop')" oninput="setCustomValidity('')">
            </div>
            <div class="form-group">
                <label>CPU:</label><br/>
                <input type="text" name="txtCPU" class="form-control" required="" 
                     oninvalid="this.setCustomValidity('Please enter CPU of laptop')" oninput="setCustomValidity('')">
            </div>
            <div class="form-group">
                <label>Ram:</label>
                <input type="text" name="txtRam" class="form-control" required="" 
                     oninvalid="this.setCustomValidity('Please enter RAM of laptop')" oninput="setCustomValidity('')">
            </div>
            <div class="form-group">
                <label>Hardware:</label>
                <input type="text" name="txtHW" class="form-control" required="" 
                     oninvalid="this.setCustomValidity('Please enter hardware of laptop')" oninput="setCustomValidity('')">
            </div>
            <div class="form-group">
                <label>Card VGA:</label>
                <input type="text" name="txtVGA" class="form-control" required="" 
                     oninvalid="this.setCustomValidity('Please enter Card VGA of laptop')" oninput="setCustomValidity('')">
            </div>
        </div>
           </div>
                <button type="submit" name="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
  
</div>


              
       




<?php 

include('HF/footer.php');
?>