<?php 
    include ('../supports/connection.php');
    include ('../supports/regglobalvar.php');
    include ('../supports/session.php');
    include ('../supports/menu.php');
    include ('../supports/cleantext.php');
    include ('../desain/formlinkstyle.html');
    if (isset($submit))
        { include ('../process/dokumen.php'); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script language="JavaScript" src="../scripts/calendar.js"></script>
<link rel="stylesheet" href="../scripts/calendar.css">
<title>FORM DATA DOKUMEN ABSENSI</title>
</head>
<body>
    <br><center><h2>FORM DATA DOKUMEN ABSENSI</h2></center><br>
    <form method="post" action="fdokumen.php" enctype="multipart/form-data" name="fdokumen" id="fdokumen">
        <table align="center" width="80%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="60%" class="h5">
            <b>PENCARIAN DATA :</b> ID : 
            <?php
                if (isset($keyword))
                    { echo "<input type='text' name='keyword' size='10' maxlength='10' value='".$keyword."'>"; }
                else
                    { 
                    echo "<input type='text' name='keyword' size='10' maxlength='10' placeholder='keyword'>";
                    $stglabs = date("d-m-Y");
                    }
                echo ", Tgl.Abs : <input type='text' name='stglabs' size='9' maxlength='10' value=".$stglabs.">
                <script language='JavaScript'>
                new tcal ({
                // form name
                'formname': 'fdokumen',
                // input name
                'controlname': 'stglabs'
                }); 
                </script>";
            ?>
            </td><td valign="top"><button name="submit_search" type="submit" value="search"class="btn btn-secondary btn-lg btn-block btn-sm">S E A R C H</button></td>
        </tr>
    </table><br>
    <table align="center" width="80%" border="0" bgcolor="#eeffff"><tr>
    <?php
        if (isset($keyword))
            { 
            $ttglabs  = date_create($stglabs);
            $ttglabs  = date_format($ttglabs,"Y-m-d");
            $qdokumen = $connection->query("select * from absensihr where kode = '$keyword' and tglabs = '$ttglabs';"); 
            if (mysqli_num_rows($qdokumen) > 0)
                {
                if ($aqdokumen = mysqli_fetch_array($qdokumen))
                    { 
                    $tidxah   = $aqdokumen[0]; 
                    $tlokasi  = $aqdokumen[4];
                    $qdokumen = $connection->query("select * from absensihr where idxah = '$tidxah';"); 
                    }
                }
            }
        if (isset($sidxah) and $sidxah > 0) 
            { 
            $qdokumen = $connection->query("select * from absensihr where idxah = '$sidxah';"); 
            $tidxah   = $sidxah; 
            $tlokasi  = $aqdokumen[4];
            }
        if (isset($tidxah) and $tidxah > 0)
            {
            if ($slokasi == "All")
                {
                if (mysqli_num_rows($qdokumen) > 0)
                    {
                    if ($aqdokumen = mysqli_fetch_array($qdokumen))
                        {
                        $ttglabs = date_create($aqdokumen[6]);
                        $ttglabs = date_format($ttglabs,"d-m-Y");
                        echo "<input type='hidden' name='tidxah' value='$aqdokumen[0]'>";
                        echo "<td width='30%'><a href='fdetimage.php?tidxah=$sidxah' target='newwindow'><img src='$aqdokumen[18]' width='350' height='400'></a><input name='tdokumen' type='file' size='100' class='btn btn-info btn-lg btn-sm btn-block'></td><td width='5%'></td>";
                        echo "<td valign='top'><table class='h5'><tr height='50'><td width='30%'>1. ID</td><td width='2%'>:</td><td><h3>".$aqdokumen[1] ."</h3></td></tr>";
                        echo "<tr height='50'><td>2. Nama</td><td>:</td><td><h3>".$aqdokumen[2]."</h3></td></tr>";
                        echo "<tr height='50'><td>3. Hari</td><td>:</td><td>".$aqdokumen[5]."</td></tr>";
                        echo "<tr height='50'><td>4. Tgl.Abs</td><td>:</td><td>".$ttglabs."</td></tr>";
                        echo "<tr height='50'><td>5. St.Abs</td><td>:</td><td><select name='tstabs'><option value='$aqdokumen[15]'>$aqdokumen[15]</option><option value='Ijin'>Ijin</option><option value='Sakit'>Sakit</option></select></td></tr>";
                        echo "<tr height='50'><td>6. Keterangan</td><td>:</td><td><input type='text' name='tketerangan' size='30' maxlength='30' value=".$aqdokumen[16]."></td></tr></table></td>";
                        }
                    }
                }
            else
                {
                if ($tlokasi == $slokasi)
                    {
                    if (mysqli_num_rows($qdokumen) > 0)
                        {
                        if ($aqdokumen = mysqli_fetch_array($qdokumen))
                            {
                            $ttglabs = date_create($aqdokumen[6]);
                            $ttglabs = date_format($ttglabs,"d-m-Y");
                            echo "<input type='hidden' name='tidxah' value='$aqdokumen[0]'>";
                            echo "<td width='30%'><a href='fdetimage.php?tidxah=$sidxah' target='newwindow'><img src='$aqdokumen[18]' width='350' height='400'></a><input name='tdokumen' type='file' size='100' class='btn btn-info btn-lg btn-sm btn-block'></td><td width='5%'></td>";
                            echo "<td valign='top'><table class='h5'><tr height='50'><td width='30%'>1. ID</td><td width='2%'>:</td><td><h3>".$aqdokumen[1] ."</h3></td></tr>";
                            echo "<tr height='50'><td>2. Nama</td><td>:</td><td><h3>".$aqdokumen[2]."</h3></td></tr>";
                            echo "<tr height='50'><td>3. Hari</td><td>:</td><td>".$aqdokumen[5]."</td></tr>";
                            echo "<tr height='50'><td>4. Tgl.Abs</td><td>:</td><td>".$ttglabs."</td></tr>";
                            echo "<tr height='50'><td>5. St.Abs</td><td>:</td><td><select name='tstabs'><option value='$aqdokumen[15]'>$aqdokumen[15]</option><option value='Masuk(C)'>Masuk(C)</option><option value='Sakit'>Sakit</option></select></td></tr>";
                            echo "<tr height='50'><td>6. Keterangan</td><td>:</td><td><input type='text' name='tketerangan' size='30' maxlength='30' value=".$aqdokumen[16]."></td></tr></table></td>";
                            }
                        }
                    }
                }
            }
    ?>
    </tr></table>
    <table align="center" width="80%" border="0" bgcolor="#ffffff"><tr><td width="50%"><button name="submit" type="submit" value="upload" class="btn btn-primary btn-lg btn-sm btn-block">Upload Dokumen (max.size 500kb, image type must be : jpeg/jpg/gif)</button></td><td><button name="submit" type="submit" value="update" class="btn btn-warning btn-lg btn-sm btn-block">Update</button></td><tr></table>
    </form>
</body>
</html>                                                                 
