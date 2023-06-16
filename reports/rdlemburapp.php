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
<title>REPORT APPROVAL LEMBUR KARYAWAN</title>
</head>
<body>
    <hr width="95%">
    <center><h1 class="h3 mb-3 font-weight-normal">REPORT APPROVAL LEMBUR KARYAWAN</h1></center>
    <hr width="95%">
    <?php
        if (isset($keyword) and !empty($keyword)) 
            { 
            if ($filter == "kode")
                { $qkoplbr = $connection->query("select * from lembur where kode = '$keyword';"); }
            else
                { $qkoplbr = $connection->query("select * from lembur where nama = '$keyword';"); }
            }
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
            $dtglpeng = date_create($aqlembur[2]);
            $dtglpeng = date_format($dtglpeng,"d-m-Y");
            $dtgllbr  = date_create($aqlembur[6]);
            $dtgllbr  = date_format($dtgllbr,"d-m-Y");
            echo "<table width='40%' align='center' border='0'><tr><td>";
            echo "<tr height='25'><td width='30%'>KEPALA DIVISI</td><td width='2%'>:</td><td></td></tr>";
            echo "<tr height='25'><td>NIP</td><td>:</td><td>".$aqlembur[11]."</td></tr>";
            echo "<tr height='25'><td>Nama</td><td>:</td><td>".$aqlembur[12]."</td></tr>";
            echo "<tr height='25'><td>Divisi</td><td>:</td><td>".$aqlembur[13]."</td></tr>"; 
            echo "</table>";
            echo "<table width='95%' align='center' border='1'>";
            echo "<tr>";
            echo "<td width='3%' class='h8' align='center' bgcolor='#DDDDDD'>No</td>";
            echo "<td width='7%' class='h8' align='center' bgcolor='#DDDDDD'>No.Surat</td>";
            echo "<td width='%' class='h8' align='center' bgcolor='#DDDDDD'>Status</td>";
            echo "<td width='6%' class='h8' align='center' bgcolor='#DDDDDD'>Tgl.Pengajuan</td>";
            echo "<td width='6%' class='h8' align='center' bgcolor='#DDDDDD'>NIP</td>";  
            echo "<td width='16%' class='h8' align='center' bgcolor='#DDDDDD'>Nama</td>";    
            echo "<td width='6%' class='h8' align='center' bgcolor='#DDDDDD'>Tgl.Lembur</td>";
            echo "<td width='17%' class='h8' align='center' bgcolor='#DDDDDD'>Jam Lembur</td>";
            echo "<td width='22%' class='h8' align='center' bgcolor='#DDDDDD'>Keterangan</td>";  
            echo "<td width='1%' class='h8' align='center' bgcolor='#DDDDDD'>App.1</td>";    
            echo "<td width='5%' class='h8' align='center' bgcolor='#DDDDDD'>Nama</td>";
            echo "<td width='1%' class='h8' align='center' bgcolor='#DDDDDD'>App.2</td>";
            echo "<td width='5%' class='h8' align='center' bgcolor='#DDDDDD'>Nama</td>";
            echo "</tr>";
            $counter  = 0;
            $qitemlbr = $connection->query("select * from lembur where idxle = '$tidxle' order by kode asc;"); 
            while ($aqitemlbr = mysqli_fetch_array($qitemlbr))
                {
                $counter++;
                echo "<tr class='h7'><td align='right'>".$counter." &nbsp</td><td>&nbsp ".$aqitemlbr[1]."</td><td>&nbsp ".$aqitemlbr[2]."</td><td>&nbsp ".$dtglpeng."</td><td>&nbsp ".$aqitemlbr[4]."</td><td>&nbsp ".$aqitemlbr[5]."</td><td>&nbsp ".$dtgllbr."</td><td>&nbsp ".$aqitemlbr[7]."sd ".$aqitemlbr[8]." Lama : ".$aqitemlbr[9]." jam</td><td>&nbsp ".$aqitemlbr[10]."</td><td>&nbsp ".$aqitemlbr[14]."</td><td>&nbsp ".$aqitemlbr[15]."</td><td>&nbsp ".$aqitemlbr[16]."</td><td>&nbsp ".$aqitemlbr[17]."</td></tr>";
                }
            echo "</table>";
            }
    ?>
</body>
</html>                                                                 
