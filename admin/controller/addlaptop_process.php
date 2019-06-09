<?php

include_once('../../controller/database.php');

if (isset($_POST['submit'])) {
    $name   = $_POST['txtName'];
    $brand  = $_POST['txtBrands'];
    //$spect  = $_POST['txtSpec'];
    $price  = $_POST['txtPrice'];
    
    $HW     = $_POST['txtHW'];
    $vga    = $_POST['txtVGA'];
    $ram    = $_POST['txtRam'];
    $cpu    = $_POST['txtCPU'];
    $model  = $_POST['txtModel'];
    $display= $_POST['txtDisplay'];
    $weight = $_POST['txtWeight'];
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
	
    
    foreach($_FILES['img']['name'] as $name1 => $value)
    {
        $name_img = stripslashes($_FILES['img']['name'][$name1]);
        $source_img = $_FILES['img']['tmp_name'][$name1];
        $path_img = "../imglaptop/" . $name_img;
        $link[] = trim(str_replace('../', '', $path_img));
        move_uploaded_file($source_img, $path_img);
    }

    $link = json_encode($link);
    
    
    
    //Check
    $conn = dbConnect();
    
    
    $sql = "INSERT INTO laptop(name, idbrands,price, specification, img) VALUES('$name', '$brand', '$price', '$spec', '$link')";
    
    echo '<br>'.$sql;
    
    $rs     = $conn->query($sql);
    if($rs){
        header('Location: ../indexlaptop.php');
    }else{
        var_dump($rs);
    }
}


?>