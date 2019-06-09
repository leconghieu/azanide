<?php 
include '../controller/database.php';
$conn = dbConnect();
if(isset($_POST['Edit'])){
    $name   = $_POST['txtName'];
    $price  = $_POST['txtPrice'];
    $brand  = $_POST['txtBrands'];
    $id     = $_POST['id'];
    $HW     = $_POST['txtHW'];
    $vga    = $_POST['txtVGA'];
    $ram    = $_POST['txtRam'];
    $cpu    = $_POST['txtCPU'];
    $model  = $_POST['txtModel'];
    $display= $_POST['txtDisplay'];
    $weight = $_POST['txtWeight'];
    $images_old = $_POST['images'];

    $images_old = json_decode($images_old, true);

    
    $spec   = array(
        'VGA'       => $vga,
        'Ram'       => $ram,
        'CPU'       => $cpu,
        'HW'        => $HW,
        'model'     => $model,
        'display'   => $display,
        'weight'    => $weight
    );

    $spec = json_encode($spec);

    $link = array();

	if (empty($_FILES['img']['name'][0])) {
        # code...
        $link = $images_old;

    } else {

        foreach($_FILES['img']['name'] as $name1 => $value)
        {
            $name_img = stripslashes($_FILES['img']['name'][$name1]);
            $source_img = $_FILES['img']['tmp_name'][$name1];
            $path_img = "imglaptop/" . $name_img;
            $link[] = $path_img;
            move_uploaded_file($source_img, $path_img);
        }
    }
    
    $link = json_encode($link);
	
    
    $sqlupdate = "UPDATE laptop SET name = '$name', price = '$price', idbrands = '$brand', specification = '$spec', img = '$link' WHERE id = '$id' ";

    $rs = $conn->query($sqlupdate);

    if($rs){
        header('Location: indexlaptop.php');
    }
}


include('HF/header.php');
$check = $_GET['id'];
$sql = "SELECT * FROM laptop WHERE id = '$check' ";
$rs = $conn->query($sql);
$row = mysqli_fetch_assoc($rs);

$images = json_decode($row['img'], true);

$sql2 = "SELECT * FROM brands";     
$rs2 = $conn->query($sql2);
$spec =  json_decode($row['specification'], true);
?>

        <div class="container">
            <center><h1>Edit Laptop</h1></center>
            <form action=""  method="post" enctype="multipart/form-data">
                <div class="row">

                    <div class="col-6" style="padding-top: 8px;">

                        <input hidden type="text" value="<?=$check?>" name="id">
                <div class="form-group">
                    <label>Name:</label>
                    <input id="input" type="text" name="txtName" class="form-control" value="<?=$row['name']?>" required=""
                     oninvalid="this.setCustomValidity('Please enter name of laptop')" oninput="setCustomValidity('')">
                </div>

                <div class="form-group">
                    <label>Price:</label>
                    <input type="text" name="txtPrice" class="form-control" value="<?=$row['price']?>" required=""
                     oninvalid="this.setCustomValidity('Please enter price of laptop')" oninput="setCustomValidity('')">
                </div>
                <div class="form-group">
                    <label>Display:</label><br/>
                    <input type="text" name="txtDisplay" class="form-control" value="<?=$spec['display']?>" required=""
                     oninvalid="this.setCustomValidity('Please enter display of laptop')" oninput="setCustomValidity('')">
                </div>
                <div class="form-group">
                    <label>Weight (Inc.Battery):</label><br/>
                    <input type="text" name="txtWeight" class="form-control" value="<?=$spec['weight']?>" required=""
                     oninvalid="this.setCustomValidity('Please enter weight of laptop')" oninput="setCustomValidity('')">
                </div>
                <div class="form-group">
                    <label>Brands:</label>
                    <select class="form-control" name="txtBrands">
                        <?php
                        while($row2 = mysqli_fetch_assoc($rs2)){
                            $select = '';
                            if ($row['idbrands'] == $row2['id'] ) {
                                $select = 'selected';
                            }
                        ?>
                            <option <?=$select?> value="<?=$row2['id']?>"><?=$row2['brand']?></option>
                        <?php
                        }
                        ?>
                        </select>

                    </div>
                    
                    <div class="form-group">
                        <label>Image:</label><br/>
                        <?php 
                        foreach ($images as $image) {
                            # code...
                        ?>
                        <img src="<?=$image?>" alt="avatar" class="img-fluid" width="250px" height="250px;">
                        <?php
                        }
                        ?>
                        <input type="file" name="img[]" multiple="true">
                        <input type="text" name="images" hidden value='<?=$row['img']?>'>
                    </div>
                    </div>

                    <div class="col-6" style="padding-top: 8px;">
                            <div class="form-group">
                                <label>Model:</label>
                                <br/>
                                <input type="text" name="txtModel" class="form-control" value="<?=$spec['model']?>" required=""
                     oninvalid="this.setCustomValidity('Please enter model of laptop')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label>CPU:</label>
                                <br/>
                                <input type="text" name="txtCPU" class="form-control" value="<?=$spec['CPU']?>" required=""
                     oninvalid="this.setCustomValidity('Please enter CPU of laptop')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label>Ram:</label>
                                <input type="text" name="txtRam" class="form-control" value="<?=$spec['Ram']?>" required=""
                     oninvalid="this.setCustomValidity('Please enter RAM of laptop')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label>Hardware:</label>
                                <input type="text" name="txtHW" class="form-control" value="<?=$spec['HW']?>" required=""
                     oninvalid="this.setCustomValidity('Please enter hardware of laptop')" oninput="setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <label>Card VGA:</label>
                                <input type="text" name="txtVGA" class="form-control" value="<?=$spec['VGA']?>" required=""
                     oninvalid="this.setCustomValidity('Please enter Card VGA of laptop')" oninput="setCustomValidity('')">
                            </div>
                    </div>
                </div>
            <button type="submit" name="Edit" class="btn btn-primary btn-block">Submit</button>
        </form>     
    </div>
            


              
       




<?php 


include('HF/footer.php');
?>