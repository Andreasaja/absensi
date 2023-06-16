<?php 
    include ('../supports/connection.php');
    include ('../supports/regglobalvar.php');
    include ('../supports/session.php');
    include ('../supports/menu.php');
    include ('../supports/cleantext.php');
    include ('../supports/criptpertext.php');
    include ('../desain/formlinkstyle.html');
    if (isset($submit))
        { include ('../process/lembur.php'); }
?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script language="JavaScript" src="../scripts/calendar.js"></script>
<link rel="stylesheet" href="../scripts/calendar.css">
<title>FORM PENGAJUAN LEMBUR PEGAWAI</title>
</head>
<body>
    <br><center><h2>FORM PENGAJUAN LEMBUR PEGAWAI</h2></center>
    <?php 
        if (isset($message))
            { 
            echo "<script language='javascript'>";
            echo "alert('".$message."');";
            echo "</script>";
            }
    ?>
    <form method="post" action="flembur.php" enctype="multipart/form-data" name="flembur" id="flembur">
    <table align="center" width="90%" cellpadding="0" cellspacing="0"><tr height="40">
        <td width="37%" class="h5">
    <?php 
        if (isset($keyword))
            { echo "Pencarian data, inputkan kata kunci (No.Surat) : </td><td width='14%' class='h5'><input type='text' name='keyword' size='11' maxlength='11' value=".$keyword.">"; }
        else
            { echo "Pencarian data, inputkan kata kunci (No.Surat) : </td><td width='14%' class='h5'><input type='text' name='keyword' size='11' maxlength='11' placeholder='keyword'>"; }
    ?>
        </td><td width="20%" ><button name="submit_search" type="submit" value="search"class="btn btn-secondary btn-lg btn-block btn-sm">S E A R C H</button></td><td align="right"><b><a href="fblemburapp.php?username=<?php echo '$username';?> ?password=<?php echo '$password'; ?>" target="newwindow"> PAGE DATA BROWSING LEMBUR PEGAWAI</a></b></td>
    </tr></table>
    <?php
        if (isset($keyword) and !empty($keyword)) 
            { $qlembur = $connection->query("select * from lembur where kode = '$keyword';"); }
        else
            { 
            if (isset($tidxle))
                { $qlembur = $connection->query("select * from lembur where idxle = '$tidxle';"); }
            else
                { $qlembur = $connection->query("select * from lembur order by idxle asc limit 1;"); }
            }
        if  ($aqlembur = mysqli_fetch_array($qlembur))
            {
            $tidxle    = $aqlembur[0];
            switch ($aqlembur[2]) {
                case 'O':
                    $status = "Open";
                break;
                
                case 'P':
                    $status = "Process";
                break;

                case 'A':
                    $status = "Approved";
                break;

                case 'R':
                    $status = "Reject";
                break;

                default:
                    $status = "-";
                break;
            }
            $tglpeng  = date_create($aqlembur[3]);
            $tglpeng  = date_format($tglpeng,"d-m-Y");
            $tgllbr   = date_create($aqlembur[6]);
            $tgllbr   = date_format($tgllbr,"d-m-Y");
            echo "<input type='hidden' name='tidxle' value=".$aqlembur[0]."><input type='hidden' name='tstatus' value=".$aqlembur[2]."><input type='hidden' name='tappldr' value=".$aqlembur[14]."><input type='hidden' name='tapphrd' value=".$aqlembur[16].">";       
            echo "<table align='center' width='95%' border='0' bgcolor='#EEFFEE'><tr>";
            echo "<td align='center' valign='top'><br><table align='center' width='95%' border='0'>";
            echo "<tr height='35' bgcolor='#FF99FF'><td width='5%'></td><td width='10%'>No.Surat</td><td width='2%'>:</td><td>&nbsp <b>".$aqlembur[1]."</b></td></tr>";
            echo "<tr height='35' bgcolor='#CCFFCC'><td></td><td>Status</td><td>:</td><td>&nbsp ".$status."</td></tr>";
            echo "<tr height='40' bgcolor='#CCFFCC'><td></td><td valign='top'>Tgl.Pengajuan</td><td valign='top'>:</td><td valign='top'>&nbsp <input type='text' name='ttglpeng' size='8' maxlength='10' value=".$tglpeng.">
                <script language='JavaScript'>
                    new tcal ({
                    // form name
                    'formname': 'flembur',
                    // input name
                    'controlname': 'ttglpeng'
                    }); 
                </script></td></tr>";
            echo "<tr height='35' bgcolor='#FFCCAA'><td></td><td>NIP</td><td>:</td><td>&nbsp ".$aqlembur[4]." <input type='hidden' name='tkode' valign='$aqlembur[4]'></td></tr>";
            echo "<tr height='35' bgcolor='#FFCCAA'><td></td><td>Nama</td><td>:</td><td>&nbsp ".$aqlembur[5]." <input type='hidden' name='tnama' valign='$aqlembur[5]'></td></tr>";
            echo "<tr height='40' bgcolor='#AAFFDD'><td></td><td valign='bottom'>Tgl.Lembur</td><td valign='bottom'>:</td><td valign='bottom'>&nbsp <input type='text' name='ttgllbr' size='8' maxlength='10' value=".$tgllbr.">
                <script language='JavaScript'>
                    new tcal ({
                    // form name
                    'formname': 'flembur',
                    // input name
                    'controlname': 'ttgllbr'
                    }); 
                </script></td></tr>";
            echo "<tr height='35' bgcolor='#AAFFDD'><td></td><td>Jam</td><td>:</td><td>&nbsp <select name='tjammul'><option value='".$aqlembur[7]."'>".$aqlembur[7]."</option><option value='15.00'>15.00</option><option value='16.00'>16.00</option><option value='17.00'>17.00</option></select> sd <select name='tjamsel'><option value='".$aqlembur[8]."'>".$aqlembur[8]."</option><option value='17.00'>17.00</option><option value='18.00'>18.00</option><option value='19.00'>19.00</option><option value='19.30'>19.30</option></select> , Lama : ".$aqlembur[9]." jam<input type='hidden' name='tlamalbr' value='$aqlembur[9]'></td></tr>";
            echo "<tr height='130' bgcolor='#AAFFDD'><td></td><td valign='top'>Keterangan</td><td valign='top'>:</td><td><table border='0' width='97%'><tr><td width='50%' valign='top'>&nbsp <textarea name='newnotes' rows='5' cols='60'>new notes here...</textarea></td><td valign='top'><textarea readonly name='tnoteslbr' style='background-color:#DDDDDD';' rows='5' cols='60' >".$aqlembur[10]."</textarea><input type='hidden' name='tnoteslbr' value='".$aqlembur[10]."'></td></tr></table></td></tr>";
            echo "<tr height='20'><td></td></tr>";
            echo "</td></tr></table>";
            ?>
    <table align="center" width="95%" border="0" bgcolor="#ffffff"><tr><td width="10%"><button name="submit" type="submit" value="back" class="btn btn-success btn-lg btn-block">BACK</button></td><td width="10%"><button name="submit" type="submit" value="next" class="btn btn-success btn-lg btn-block">NEXT</button></td><td width="20%"><button name="submit" type="submit" value="new" class="btn btn-primary btn-lg btn-block">New</button></td><td width="20%"><button name="submit" type="submit" value="update" class="btn btn-warning btn-lg btn-block" onClick="javascript: return confirm('Apakah anda benar-benar akan meng-update data ini?');">Update</button></td><td width="20%"><button name="submit" type="submit" value="delete" class="btn btn-danger btn-lg btn-block" onClick="javascript: return confirm('Apakah anda benar-benar akan men-delete data ini?');">Delete</button></td></form><form method="post" action="../reports/rlembur.php" target="newwindow"><td width="20%"><button name="submit" type="submit" class="btn btn-info btn-lg btn-block">PRINT</button>
    <?php 
        echo "<input type='hidden' name='tidxle' value=".$tidxle.">";
    ?>
    </form></td></tr><tr><td></td><td></td><td></td><td></td><td></td></tr></table>
<?php 
    }
    echo "<input type='hidden' name='sidxus' value=".$sidxus."><input type='hidden' name='susername' value=".$susername."><input type='hidden' name='spassword' value=".$spassword."><input type='hidden' name='slevel' value=".$slevel.">";
?>
</body>
</html>                                                                 
