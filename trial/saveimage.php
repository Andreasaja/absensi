<?php
    include ('../supports/connection.php');
    
    $folder    = "../images/";
    $fimagename = $_FILES["fimage"]["name"];
    $fimagesize = $_FILES["fimage"]["size"];
    $fimagetype = $_FILES["fimage"]["type"];
    
    echo "size : " . $fimagesize;
    echo "type : " . $fimagetype;
    
    if ($fimagetype = "image/jpeg" or $fimagetype = "image/jpg" or $fimagetype = "image/gif" )
		{
		if ($fimagesize <= 500000)
		    {
            move_uploaded_file($_FILES["fimage"]["tmp_name"], "$folder".$_FILES["fimage"]["name"]);
            $insert_path = "INSERT INTO trialimage VALUES ('$folder','$fimagename')";
            $var         = mysqli_query($connection,$insert_path);
		    }
		}
?>