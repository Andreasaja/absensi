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
<title>REPORT DETAIL DATA MASTER GAJI</title>
</head>
<body>
    <hr width="90%">
    <center><h1 class="h3 mb-3 font-weight-normal">REPORT DETAIL DATA MASTER GAJI</h1></center>
    <hr width="90%">
    <?php
        if (isset($keyword) and !empty($keyword)) 
            { $qmastergj  = $connection->query("select * from mastergj where kodemg = '$keyword';"); }
        else
            { 
            if (isset(($tidxmg)))
                { $qmastergj  = $connection->query("select * from mastergj where idxmg = '$tidxmg';"); }
            else
                { $qmastergj  = $connection->query("select * from mastergj order by idxmg desc limit 1;"); }
            }
        if  ($aqmastergj = mysqli_fetch_array($qmastergj))
            {
            $tidxmg    = $aqmastergj[0];
            $dtglinput = date_create($aqmastergj[1]);
            $dtglinput = date_format($dtglinput,"d-m-Y");
            $dtglmulpj = date_create($aqmastergj[13]);
            $dtglmulpj = date_format($dtglmulpj,"d-m-Y");
            $dtgllunas = date_create($aqmastergj[14]);
            $dtgllunas = date_format($dtgllunas,"d-m-Y");
            echo "<table align='center' width='60%' border='0'><tr height='35'><td width='18%'>Tgl.Input</td><td width='2%'>:</td><td width='20%' align='right'>".$dtglinput." &nbsp</td><td width='15%'></td><td width='18%'></td><td width='3%'></td><td align='right'></td></tr>";
            echo "<tr height='35'><td>NIP</td><td>:</td><td align='right'>".$aqmastergj[2]." &nbsp</td><td></td><td>PPH21</td><td>:</td><td align='right'>".number_format($aqmastergj[12],0,',','.')." &nbsp</td></tr>";
            echo "<tr height='35'><td>Nama</td><td>:</td><td align='right'>".$aqmastergj[3]."  &nbsp</td><td></td><td>Unpaid/hr</td><td>:</td><td align='right'>".number_format($aqmastergj[20],0,',','.')." &nbsp</td></tr>";
            echo "<tr height='35'><td>Gapok/bl</td><td>:</td><td align='right'>".number_format($aqmastergj[4],0,',','.')." &nbsp</td><td></td><td>Terlambat</td><td>:</td><td align='right'>".number_format($aqmastergj[21],0,',','.')." &nbsp</td></tr>";
            echo "<tr height='35'><td>Gapok/hr</td><td>:</td><td align='right'>".number_format($aqmastergj[5],0,',','.')." &nbsp</td><td></td><td>Tgl.mulai pinjam</td><td>:</td><td align='right'>".$dtglmulpj." &nbsp</td></tr>";
            echo "<tr height='35'><td>UM/hr</td><td>:</td><td align='right'>".number_format($aqmastergj[6],0,',','.')." &nbsp</td><td></td><td>Tgl.Pelunasan</td><td>:</td><td align='right'>".$dtgllunas." &nbsp</td></tr>";
            echo "<tr height='35'><td>UT/hr</td><td>:</td><td align='right'>".number_format($aqmastergj[7],0,',','.')." &nbsp</td><td></td><td>Jangka pinjam</td><td>:</td><td align='right'>".$aqmastergj[15]." &nbsp</td></tr>";
            echo "<tr height='35'><td>Tun.Hdr</td><td>:</td><td align='right'>".number_format($aqmastergj[8],0,',','.')." &nbsp</td><td></td><td>Plafon</td><td>:</td><td align='right'>".number_format($aqmastergj[16],0,',','.')." &nbsp</td></tr>";
            echo "<tr height='35'><td>Tun.Lainnya</td><td>:</td><td align='right'>".number_format($aqmastergj[9],0,',','.')." &nbsp</td><td></td><td>Realisasi</td><td>:</td><td align='right'>".number_format($aqmastergj[17],0,',','.')." &nbsp</td></tr>";
            echo "<tr height='35'><td>BPJSTK</td><td>:</td><td align='right'>".number_format($aqmastergj[10],0,',','.')." &nbsp</td><td></td><td>Angsuran</td><td>:</td><td align='right'>". number_format($aqmastergj[18],0,',','.') ." &nbsp</td></tr>";
            echo "<tr height='35'><td>BPJSKS</td><td>:</td><td align='right'>".number_format($aqmastergj[11],0,',','.')." &nbsp</td><td></td><td>Sisa</td><td>:</td><td align='right'>". number_format($aqmastergj[19],0,',','.') ." &nbsp</td></tr></table>";
            }
    ?>
    <hr width="90%">
</body>
</html>                                                                 
