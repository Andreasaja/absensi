<?php 
    include ('../supports/connection.php');
    include ('../supports/regglobalvar.php');
    include ('../supports/session.php');
    include ('../supports/menu.php');
    include ('../supports/cleantext.php');
    include ('../supports/criptpertext.php');
    include ('../desain/formlinkstyle.html');
    if (isset($submit))
        { include ('../process/dmastergj.php'); }
?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script language="JavaScript" src="../scripts/calendar.js"></script>
<link rel="stylesheet" href="../scripts/calendar.css">
<?php   include ('../supports/mastergajifnum.html');  ?>
<title>FORM DETAIL DATA MASTER GAJI PEGAWAI</title>
</head>
<body>
    <br><center><h2>FORM DETAIL DATA MASTER GAJI PEGAWAI</h2></center>
    <?php 
        if (isset($message))
            { 
            echo "<script language='javascript'>";
            echo "alert('".$message."');";
            echo "</script>";
            }
    ?>
    <form method="post" action="fdmastergj.php" enctype="multipart/form-data" name="fdmastergj" id="fdmastergj">
    <table align="center" width="90%" cellpadding="0" cellspacing="0"><tr height="40">
        <td width="37%" class="h5">
    <?php 
        if (isset($keyword))
            { echo "Pencarian data, inputkan kata kunci (No.NIP.) : </td><td width='14%' class='h5'><input type='text' name='keyword' size='11' maxlength='11' value=".$keyword.">"; }
        else
            { echo "Pencarian data, inputkan kata kunci (No.NIP.) : </td><td width='14%' class='h5'><input type='text' name='keyword' size='11' maxlength='11' placeholder='keyword'>"; }
    ?>
        </td><td width="30%" ><button name="submit_search" type="submit" value="search"class="btn btn-secondary btn-lg btn-block btn-sm">S E A R C H</button></td><td align="right"><b><a href="fbmastergj.php?username=<?php echo '$username';?> ?password=<?php echo '$password'; ?>" target="newwindow"> PAGE DATA REPORTING</a></b></td>
    </tr></table>
    <?php
        if (isset($keyword) and !empty($keyword)) 
            { $qmastergj = $connection->query("select * from mastergj where kode = '$keyword';"); }
        else
            { 
            if (isset($tidxmg))
                { $qmastergj = $connection->query("select * from mastergj where idxmg = '$tidxmg';"); }
            else
                { $qmastergj = $connection->query("select * from mastergj order by idxmg desc limit 1;"); }
            }
        if  ($aqmastergj = mysqli_fetch_array($qmastergj))
            {
            $tidxmg    = $aqmastergj[0];
            $vkode     = $aqmastergj[2];
            $tglinput  = date_create($aqmastergj[1]);
            $tglinput  = date_format($tglinput,"d-m-Y");
            $tglmulpj  = date_create($aqmastergj[13]);
            $tglmulpj  = date_format($tglmulpj,"d-m-Y");
            $tgllunas  = date_create($aqmastergj[14]);
            $tgllunas  = date_format($tgllunas,"d-m-Y");
            echo "<input type='hidden' name='tidxmg' value=".$aqmastergj[0].">";       
            echo "<table align='center' width='95%' border='0' bgcolor='#EEFFEE'><tr>";
            echo "<td align='center' valign='top'><br><table align='center' width='90%' border='0'>";
            echo "<tr height='35' bgcolor='#FFEECC'><td width='7%'></td><td width='10%'>Tgl.Input</td><td width='2%'>:</td><td width='40%'>&nbsp ".$tglinput."</td><td width='3%'></td><td width='15%'></td><td width='3%'></td><td width='15%'></td><td></td></tr>";
            echo "<tr height='35' bgcolor='#FFEECC'><td></td><td>NIP</td><td>:</td><td>&nbsp <select name='tkode'><option value='$aqmastergj[2]'>$aqmastergj[2]</option>";
            $qkode = $connection->query("select kode,nama from pegawai where lokasi != 'Jakarta' order by kode asc;");
            while($aqkode = mysqli_fetch_array($qkode))
                { echo "<option value='$aqkode[0]'>". $aqkode[0] . " || ". $aqkode[1] ."</option>"; }
            echo "</select></td><td></td><td>PPH21</td><td>:</td><td>&nbsp <input type='text' name='tpph21' id='tpph21' style='text-align:right;' onKeyUp='fnumfor_tpph21(this.value)' size='8' maxlength='10' value='".number_format($aqmastergj[12],0,',','.')."'>&nbsp <a href='fpph21.php?vkode=$vkode' target='newwindow''>Rincian</a></td><td></td></tr>";
            echo "<tr height='35' bgcolor='#FFEECC'><td></td><td>Nama</td><td>:</td><td>&nbsp ".$aqmastergj[3]."</td><td></td><td>Unpaid/hr</td><td>:</td><td>&nbsp <input type='text' name='tnunpaid' id='tnunpaid' style='text-align:right;' onKeyUp='fnumfor_tnunpaid(this.value)' size='8' maxlength='10' value='".number_format($aqmastergj[20],0,',','.')."'></td><td></td></tr>";
            echo "<tr height='35' bgcolor='#FFEECC'><td></td><td>Gapok/bl</td><td>:</td><td>&nbsp <input type='text' name='tgpbl' id='tgpbl' style='text-align:right;' onKeyUp='fnumfor_tgpbl(this.value)' size='8' maxlength='10' value='".number_format($aqmastergj[4],0,',','.')."'></td><td></td><td>Terlambat/hr</td><td>:</td><td>&nbsp <input type='text' name='tntelat' id='tntelat' style='text-align:right;' onKeyUp='fnumfor_tntelat(this.value)' size='8' maxlength='10' value='".number_format($aqmastergj[21],0,',','.')."'></td><td></td></tr>";
            echo "<tr height='35' bgcolor='#FFEECC'><td></td><td>Gapok/hr</td><td>:</td><td>&nbsp <input type='text' name='tgphr' id='tgphr' style='text-align:right;' onKeyUp='fnumfor_tgphr(this.value)' size='8' maxlength='10' value='".number_format($aqmastergj[5],0,',','.')."'></td><td bgcolor='#FFAABB'></td><td bgcolor='#FFAABB'>Tgl.mulai pinjam</td><td bgcolor='#FFAABB'>:</td><td bgcolor='#FFAABB'>&nbsp <input type='text' name='ttglmulpj' size='8' maxlength='10' value=".$tglmulpj.">
                <script language='JavaScript'>
                    new tcal ({
                    // form name
                    'formname': 'fdmastergj',
                    // input name
                    'controlname': 'ttglmulpj'
                    }); 
                </script></td><td bgcolor='#FFAABB'></td></tr>";
            echo "<tr height='35' bgcolor='#FFEECC'><td></td><td>UM/hr</td><td>:</td><td>&nbsp <input type='text' name='tumhr' id='tumhr' style='text-align:right;' onKeyUp='fnumfor_tumhr(this.value)' size='8' maxlength='8' value='".number_format($aqmastergj[6],0,',','.')."'></td><td bgcolor='#FFAABB'></td><td bgcolor='#FFAABB'>Tgl.Pelunasan</td><td bgcolor='#FFAABB'>:</td><td bgcolor='#FFAABB'>&nbsp <input type='text' name='ttgllunas' size='8' maxlength='10' value=".$tgllunas.">
                <script language='JavaScript'>
                    new tcal ({
                    // form name
                    'formname': 'fdmastergj',
                    // input name
                    'controlname': 'ttgllunas'
                    }); 
                </script></td><td bgcolor='#FFAABB'></td></tr>";   
            echo "<tr height='35' bgcolor='#FFEECC'><td></td><td>UT/hr</td><td>:</td><td>&nbsp <input type='text' name='tuthr' id='tuthr' style='text-align:right;' onKeyUp='fnumfor_tuthr(this.value)' size='8' maxlength='8' value='".number_format($aqmastergj[7],0,',','.')."'></td><td bgcolor='#FFAABB'></td><td bgcolor='#FFAABB'>Jangka pinjam</td><td bgcolor='#FFAABB'>:</td><td align='right' bgcolor='#FFAABB'><input type='text' name='tjangkapj' size='3' maxlength='3' style='text-align:right;' value='$aqmastergj[15]'>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td><td bgcolor='#FFAABB'></td></tr>";  
            echo "<tr height='35' bgcolor='#FFEECC'><td></td><td>Tun.Hdr</td><td>:</td><td>&nbsp <input type='text' name='tthdr' id='tthdr' style='text-align:right;' onKeyUp='fnumfor_tthdr(this.value)' size='8' maxlength='10' value='".number_format($aqmastergj[8],0,',','.')."'></td><td bgcolor='#FFAABB'></td><td bgcolor='#FFAABB'>Plafon</td><td bgcolor='#FFAABB'>:</td><td bgcolor='#FFAABB'>&nbsp <input type='text' name='ttotal' id='ttotal' style='text-align:right;' onKeyUp='fnumfor_trealisasi(this.value)' size='8' maxlength='10' value='".number_format($aqmastergj[16],0,',','.')."'></td><td bgcolor='#FFAABB'></td></tr>";
            echo "<tr height='35' bgcolor='#FFEECC'><td></td><td>Tun.Lainnya</td><td>:</td><td>&nbsp <input type='text' name='ttlain' id='ttlain' style='text-align:right;' onKeyUp='fnumfor_ttlain(this.value)' size='8' maxlength='10' value='".number_format($aqmastergj[9],0,',','.')."'></td><td bgcolor='#FFAABB'></td><td bgcolor='#FFAABB'>Realisasi</td><td bgcolor='#FFAABB'>:</td><td bgcolor='#FFAABB'>&nbsp <input type='text' name='trealisasi' id='trealisasi' style='text-align:right;' onKeyUp='fnumfor_ttotal(this.value)' size='8' maxlength='10' value='".number_format($aqmastergj[17],0,',','.')."'></td><td bgcolor='#FFAABB'></td></tr>";   
            echo "<tr height='35' bgcolor='#FFEECC'><td></td><td>BPJSTK</td><td>:</td><td>&nbsp <input type='text' name='tbpjstk' id='tbpjstk' style='text-align:right;' onKeyUp='fnumfor_tbpjstk(this.value)' size='8' maxlength='8' value='".number_format($aqmastergj[10],0,',','.')."'></td><td bgcolor='#FFAABB'></td><td bgcolor='#FFAABB'>Angsuran</td><td bgcolor='#FFAABB'>:</td><td bgcolor='#FFAABB'><table border='0' width='100%' bgcolor='#FFAABB'><tr><td width='63%' align='right'>". number_format($aqmastergj[18],0,',','.') ."</td><td></td></tr></table></td><td bgcolor='#FFAABB'></td></tr>";
            echo "<tr height='35' bgcolor='#FFEECC'><td></td><td>BPJSKS</td><td>:</td><td>&nbsp <input type='text' name='tbpjsks' id='tbpjsks' style='text-align:right;' onKeyUp='fnumfor_tbpjsks(this.value)' size='8' maxlength='8' value='".number_format($aqmastergj[11],0,',','.')."'></td><td bgcolor='#FFAABB' align='right'><input type='checkbox' name='cupdtang'> &nbsp</td><td bgcolor='#FFAABB'>Sisa</td><td bgcolor='#FFAABB'>:</td><td bgcolor='#FFAABB'><table border='0' width='100%' bgcolor='#FFAABB'><tr><td width='63%' align='right'>". number_format($aqmastergj[19],0,',','.') ."</td><td align='right'><a href='fpinjaman.php?vkode=$vkode' target='newwindow''>Rincian</a></td></tr></table></td><td bgcolor='#FFAABB'></td></tr></table></td></tr>";
            echo "<tr height='20'><td></td></tr>";
            echo "</td></tr></table>";
            ?>
    <br><table align="center" width="95%" border="0" bgcolor="#ffffff"><tr><td width="10%"><button name="submit" type="submit" value="back" class="btn btn-sm btn-success btn-lg btn-block">BACK</button></td><td width="10%"><button name="submit" type="submit" value="next" class="btn btn-sm btn-success btn-lg btn-block">NEXT</button></td><td width="20%"><button name="submit" type="submit" value="new" class="btn btn-sm btn-primary btn-lg btn-block">New</button></td><td width="20%"><button name="submit" type="submit" value="update" class="btn btn-sm btn-warning btn-lg btn-block" onClick="javascript: return confirm('Apakah anda benar-benar akan meng-update data ini?');">Update</button></td><td width="20%"><button name="submit" type="submit" value="delete" class="btn btn-sm btn-danger btn-lg btn-block" onClick="javascript: return confirm('Apakah anda benar-benar akan men-delete data ini?');">Delete</button></td></form><form method="post" action="../reports/rdmastergj.php" target="newwindow"><td width="20%"><button name="submit" type="submit" class="btn btn-sm btn-info btn-lg btn-block">PRINT</button>
    <?php 
        echo "<input type='hidden' name='tidxmg' value=".$tidxmg.">";
    ?>
    </form></td></tr></table>
<?php 
    }
    echo "<input type='hidden' name='sidxus' value=".$sidxus."><input type='hidden' name='susername' value=".$susername."><input type='hidden' name='spassword' value=".$spassword."><input type='hidden' name='slevel' value=".$slevel.">";
?>
</body>
</html>                                                                 
