<html>
<body>
<?php
    include ('../supports/connection.php');

    $fpath = "select * from trialimage";
    $var   = mysqli_query($connection,$fpath);

    while($row = mysqli_fetch_array($var))
	    {
 	    $fimagename   = $row["fimagename"];
 	    $fimagefolder = $row["folder"];
 	    $fimage       = $image_path.$image_name;
 	    echo "<img src='$fimage' width='100' height='100'>";
	    }
?>
</body>
</html>