<?php 
    include ('../supports/connection.php');
    include ('../supports/regglobalvar.php');
    include ('../supports/session.php');
    include ('../desain/reportlinkstyle.html');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>REPORT PENGAJUAN LEMBUR PEGAWAI</title>
</head>
<body>
    <hr width="90%">
    <center><h1 class="h3 mb-3 font-weight-normal">REPORT PENGAJUAN LEMBUR PEGAWAI</h1></center>
    <hr width="90%">
    <?php
        if (isset($keyword) and !empty($keyword)) 
            { $qlembur  = $connection->query("select * from lembur where kodele = '$keyword';"); }
        else
            { 
            if (isset(($tidxle)))
                { $qlembur  = $connection->query("select * from lembur where idxle = '$tidxle';"); }
            else
                { $qlembur  = $connection->query("select * from lembur order by idxle desc limit 1;"); }
            }
        if  ($aqlembur = mysqli_fetch_array($qlembur))
            {
            $tidxle   = $aqlembur[0];
            switch ($aqlembur[2]) {
                case 'O':
                    $status = "Open";
                break;
                
                case 'A':
                    $status = "Approved";
                break;

                case 'Reject':
                    $status = "Reject";
                break;

                default:
                    $status = "-";
                break;
            }
            $dtglpeng = date_create($aqlembur[3]);
            $dtglpeng = date_format($dtglpeng,"d-m-Y");
            $dtgllbr  = date_create($aqlembur[6]);
            $dtgllbr  = date_format($dtgllbr,"d-m-Y");
            echo "<table align='center' width='70%' border='0'>";
            echo "<tr height='25'><td width='10%'></td><td width='10%'>No.Surat</td><td width='2%'>:</td><td width='45%'>&nbsp <b>".$aqlembur[1]."</b></td></tr>";
            echo "<tr height='25'><td></td><td>Status</td><td>:</td><td>&nbsp ".$status."</td></tr>";
            echo "<tr height='25'><td></td><td>Tgl.Pengajuan</td><td width='2%'>:</td><td width='45%'>&nbsp ".$dtglpeng."</td></tr>";
            echo "<tr height='25'><td></td><td>NIP</td><td>:</td><td>&nbsp ".$aqlembur[4]."</td></tr>";
            echo "<tr height='25'><td></td><td>Nama</td><td>:</td><td>&nbsp ".$aqlembur[5]."</td></tr>";
            echo "<tr height='25'><td></td><td>Tgl.Lembur</td><td>:</td><td>&nbsp ".$dtgllbr."</td></tr>";
            echo "<tr height='25'><td></td><td>Jam</td><td>:</td><td>&nbsp ".$aqlembur[7]." sd ".$aqlembur[8].", Lama : ".$aqlembur[9]." jam</td></tr>";
            echo "<tr height='25'><td></td><td valign='top'>Keterangan</td><td valign='top'>:</td><td>&nbsp ".$aqlembur[10]."</td></tr></table>";
            }
    ?>
    <hr width="90%">
</body>
</html>                                                                 
