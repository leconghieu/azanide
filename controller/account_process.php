<?php

session_start();

include 'database.php';
$conn = dbConnect();

if(isset($_POST['update'])){
    $name       = $_POST['Name'];
    $address    = $_POST['Address'];
    $phone      = $_POST['Phone'];
    $id         = $_POST['id'];
    $avatar_old = $_POST['avatar-old'];
    
//            Xu ly hinh 
    
    $avatar = $_FILES['avatar']; 


    $arrMimeType = [
        'image/png',
        'image/gif',
        'image/jpeg'
    ];
    if(in_array($avatar['type'], $arrMimeType)){
        if( $avatar['size'] <= 100000*1024 ){ //100kb

            $newName = 'avatar'.'-'.$avatar['name'];
            $link = '../avatar-user/'.$newName;
            move_uploaded_file(
                $avatar['tmp_name'],
                $link
            );
            $link = str_replace('../', '', $link);
            echo 'uploaded';
        }
        else{
            echo 'File too large!';
            return;
        }
    }
    else{
        $link = $avatar_old;
    }
    
    
    $sql = "UPDATE user SET name = '$name', phone = '$phone', address = '$address', avatar = '$link' WHERE id = '$id'";
    
    if ($conn->query($sql)) {
        # code...

        $_SESSION['login']['id']        = $id;
        $_SESSION['login']['name']      = $name;
        $_SESSION['login']['phone']     = $phone;
        $_SESSION['login']['address']   = $address;
        $_SESSION['login']['avatar']    = $link;


        header('location: ../account.php');

    } else {
        header('location: ../account.php');
    }
}
?>