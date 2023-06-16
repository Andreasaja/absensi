<?php 
    include ('../supports/connection.php');
    include ('../supports/regglobalvar.php');
    include ('../supports/session.php');
    include ('../supports/menu.php');
    include ('../supports/cleantext.php');
    include ('../supports/criptpertext.php');
    include ('../desain/formlinkstyle.html');
    if (isset($submit))
        { include ('../process/slipgaji.php'); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script language="JavaScript" src="../scripts/calendar.js"></script>
<link rel="stylesheet" href="../scripts/calendar.css">
<?php   include ('../supports/slipgajifnum.html');  ?>
<title>FORM DATA SLIP GAJI PERIODIKAL</title>
</head>
<body>
    <br><center><h2>FORM DATA SLIP GAJI PERIODIKAL</h2></center><br>
    <?php 
        if (isset($message))
            { 
            echo "<script language='javascript'>";
            echo "alert('".$message."');";
            echo "</script>";
            }
    ?>
    <form method="post" action="fslipgaji.php" enctype="multipart/form-data" name="fslipgaji" id="fslipgaji">
    <table align="center" width="97%" border="0" bgcolor="#ffffff"><tr><td width="40%"><b>Periode Penghitungan Auto Payroll :</b>
    <?php 
        if (!isset($pawal))
            { $pawal = date("d-m-Y"); }
        if (!isset($pakhir))
            { $pakhir = date("d-m-Y"); }
        echo "<input type='text' class='h7' name='pawal' size='9' maxlength='10' value=".$pawal.">
            <script language='JavaScript'>
            new tcal ({
            // form name
            'formname': 'fslipgaji',
            // input name
            'controlname': 'pawal'
            }); 
            </script> to &nbsp";
        echo "<input type='text' class='h7' name='pakhir' size='9' maxlength='10' value=".$pakhir.">
            <script language='JavaScript'>
            new tcal ({
            // form name
            'formname': 'fslipgaji',
            // input name
            'controlname': 'pakhir'
            }); 
            </script>";
    ?>
    </td><td width="30%"><button name="submit" type="submit" value="websinchronyze" class="btn btn-info btn-lg btn-block">WEB SINCHRONYZE DATA SLIP GAJI</button></td><td><button name="submit" type="submit" value="csvsinchronyze" class="btn btn-primary btn-lg btn-block">CSV SINCHRONYZE DATA SLIP GAJI</button></td></table>
    <table bgcolor="#99FF99" align="center" width="97%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="80%" class="h6"> &nbsp 
            <b>PENCARIAN DATA</b> : Periode : 
            <?php 
                echo "<select name='fperiode'>";
                if (isset($fperiode))
                    { echo "<option value='$fperiode'>". $fperiode . "</option>"; }
                $qperiode  = $connection->query("select periode from tperiode;");
                while($aqperiode = mysqli_fetch_array($qperiode))
                    { echo "<option value='$aqperiode[0]'>". $aqperiode[0] . "</option>"; }
                echo "</select>";

                if (isset($keyword))
                    { echo ", Filter : <select name='filter'><option value='kode'>ID</option><option value='nama'>Nama</option><option value='perusahaan'>Perusahaan</option><option value='email'>Email</option><option value='nomorhp'>No.HP</option></select> &nbsp, kata kunci : <input type='text' name='keyword' size='30' maxlength='30' value='".$keyword."' class='h5'>"; }
                else
                    { echo ", Filter : <select name='filter'><option value='kode'>ID</option><option value='nama'>Nama</option><option value='perusahaan'>Perusahaan</option><option value='email'>Email</option><option value='nomorhp'>No.HP</option></select> &nbsp, kata kunci : <input type='text' name='keyword' size='30' maxlength='30' placeholder='keyword' class='h5'>"; }
            ?>
            </td><td valign="top"><button name="submit_search" type="submit" value="search"class="btn btn-secondary btn-lg btn-block btn-sm">S E A R C H</button><input type="hidden" name="vcek" value="ok"></td>
        </tr>
    </table><br>
    <table bgcolor="#FF9999" align="center" width="97%" cellpadding="0" cellspacing="0">
        <tr>
            <td width="80%" class="h6"> &nbsp 
            <b>DUPLICATE DATA BY PERIODE</b> : Periode Lama : 
            <?php 
                echo "<select name='operiode'>";
                $qperiode  = $connection->query("select periode from tperiode;");
                while($aqperiode = mysqli_fetch_array($qperiode))
                    { echo "<option value='$aqperiode[0]'>". $aqperiode[0] . "</option>"; }
                echo "</select>, duplicate data to Periode baru : <input type='text' name='nperiode' size='25' maxlength='25'>";
            ?>
            </td><td valign="top"><button name="submit" type="submit" value="duplicate" class="btn btn-warning btn-lg btn-block btn-sm">D U P L I C A T E</button></td>
        </tr>
    </table><br>
    <table align="center" width="97%" border="0" bgcolor="#ffffff"><tr><td width="20%"><button name="submit" type="submit" value="new" class="btn btn-primary btn-lg btn-block btn-sm">NEW</button></td><td width="30%"><button name="submit" type="submit" value="update" class="btn btn-warning btn-lg btn-block btn-sm">UPDATE</button></td><td><button name="submit" type="submit" value="delete" class="btn btn-danger btn-lg btn-block btn-sm">DELETE</button></td></tr></table>
    <div class="table-striped table-hover table-responsive">
        <table align="center" width="390%" border="1" bordercolor="#eeeeee" class="h8">
            <thead class="btn-primary">
                <tr>
                    <th width="1%">&nbsp No</th>
                    <th width="0.5%">Upd.</th>
                    <th width="0.5%">Del.</th>
                    <th width="0.5%">MS.</th>
                    <th width="3.5%">&nbsp Periode</a></th>
                    <th width="2%">&nbsp ID</a></th>
                    <th width="4%">&nbsp Nama</a></th>
                    <th width="3.5%">&nbsp Perusahaan</a></th>
                    <th width="5%">&nbsp Email</a></th>
                    <th width="2.5%">&nbsp Nomor Hp</a></th>
                    <th width="2%">&nbsp Gaji Pk.</a></th>
                    <th width="2%">&nbsp Gaji Pk./hr.</a></th>
                    <th width="2%">&nbsp UM/hr.</a></th>
                    <th width="2%">&nbsp UT/hr.</a></th>
                    <th width="1.5%">Hr.Krj.</a></th>
                    <th width="1.5%">Lemb.1</a></th>
                    <th width="1.5%">Lemb.2</a></th>
                    <th width="2%">&nbsp UM</a></th>
                    <th width="2%">&nbsp UT</a></th>
                    <th width="2%">&nbsp TK</a></th>
                    <th width="2%">&nbsp TL</a></th>
                    <th width="2%">&nbsp UL</a></th>
                    <th width="3.2%">Free Text Pen.1</a></th>
                    <th width="1.8%">Nom FTPen.1</a></th>
                    <th width="3.2%">Free Text Pen.2</a></th>
                    <th width="1.8%">Nom FTPen.2</a></th>
                    <th width="3.2%">Free Text Pen.3</a></th>
                    <th width="1.8%">Nom FTPen.3</a></th>
                    <th width="3.2%">&nbsp Free Text Pen.4</a></th>
                    <th width="1.8%">Nom FTPen.4</a></th>
                    <th width="3.2%">Free Text Pen.5</a></th>
                    <th width="1.8%">Nom FTPen.5</a></th>
                    <th width="3.2%">Free Text Pen.6</a></th>
                    <th width="1.8%">Nom FTPen.6</a></th>
                    <th width="2%">BPJS-TK</a></th>
                    <th width="2%">BPJS-KS</a></th>
                    <th width="2%">PPH 21</a></th>
                    <th width="2%">Pinjaman</a></th>
                    <th width="2%">Pot.Unp/Lev</a></th>
                    <th width="2%">Terlambat</a></th>
                    <th width="3.2%">Free Text Pot.1</a></th>
                    <th width="1.8%">Nom FTPot.1</a></th>
                    <th width="3.2%">Free Text Pot.2</a></th>
                    <th width="1.8%">Nom FTPot.2</a></th>
                    <th width="2%">&nbsp Terima</a></th>
                    <th width="0.5%">Print</a></th>
                </tr>
            </thead>
            <tbody>
            <?php
                $counter1 = 0;
                if (isset($fperiode))
                    {
                    if (isset($keyword) and !empty($keyword)) 
                        { 
                        switch ($filter) {
                            case 'kode':
                                $qslipgaji = $connection->query("select * from slipgaji where periode = '$fperiode' and kode like '$keyword%' order by perusahaan,nama asc;"); 
                                break;

                            case 'nama':
                                $qslipgaji = $connection->query("select * from slipgaji where periode = '$fperiode' and nama like '%$keyword%' order by perusahaan,nama asc;"); 
                                break;

                            case 'perusahaan':
                                $qslipgaji = $connection->query("select * from slipgaji where periode = '$fperiode' and perusahaan = '$keyword' order by perusahaan,nama asc;"); 
                                break;
                            
                            case 'email':
                                $qslipgaji = $connection->query("select * from slipgaji where periode = '$fperiode' and email like '%$keyword%' order by perusahaan,nama asc;"); 
                                break;

                            case 'nomorhp':
                                $qslipgaji = $connection->query("select * from slipgaji where periode = '$fperiode' and nomorhp like '%$keyword%' order by perusahaan,nama asc;"); 
                                break;
                            }
                        }
                    else { $qslipgaji = $connection->query("select * from slipgaji where periode = '$fperiode' order by perusahaan,nama asc;"); }
                    }
                else
                    { $qslipgaji = $connection->query("select * from slipgaji order by perusahaan,nama asc limit 100;"); }
                if (mysqli_num_rows($qslipgaji) > 0)
                    {
                    while ($aqslipgaji = mysqli_fetch_array($qslipgaji))
                        {
                        $counter1      = $counter1+1;
                        $tgapok        = intval(criptper_text(2,$aqslipgaji[7]));
                        $tgapokhr      = intval(criptper_text(2,$aqslipgaji[8]));
                        $tumaperhr     = intval(criptper_text(2,$aqslipgaji[9]));
                        $tutrperhr     = intval(criptper_text(2,$aqslipgaji[10]));
                        $thrkerja      = intval(criptper_text(2,$aqslipgaji[11]));
                        $tlembur1      = intval(criptper_text(2,$aqslipgaji[12]));
                        $tlembur2      = $aqslipgaji[13];
                        $tuma          = intval(criptper_text(2,$aqslipgaji[14]));
                        $tutransport   = intval(criptper_text(2,$aqslipgaji[15]));
                        $ttunkeh       = intval(criptper_text(2,$aqslipgaji[16]));
                        $ttunlainnya   = intval(criptper_text(2,$aqslipgaji[17]));
                        $tulembur      = intval(criptper_text(2,$aqslipgaji[18]));
                        $tnomfreetepe1 = intval(criptper_text(2,$aqslipgaji[20]));
                        $tnomfreetepe2 = intval(criptper_text(2,$aqslipgaji[22]));
                        $tnomfreetepe3 = intval(criptper_text(2,$aqslipgaji[24]));
                        $tnomfreetepe4 = intval(criptper_text(2,$aqslipgaji[26]));
                        $tnomfreetepe5 = intval(criptper_text(2,$aqslipgaji[28]));
                        $tnomfreetepe6 = intval(criptper_text(2,$aqslipgaji[30]));
                        $tbpjstk       = intval(criptper_text(2,$aqslipgaji[31]));
                        $tbpjsks       = intval(criptper_text(2,$aqslipgaji[32]));
                        $tpph21        = intval(criptper_text(2,$aqslipgaji[33]));
                        $tpinjaman     = intval(criptper_text(2,$aqslipgaji[34]));
                        $tpotunle      = intval(criptper_text(2,$aqslipgaji[35]));
                        $tterlambat    = intval(criptper_text(2,$aqslipgaji[36]));
                        $tnomfreetepo1 = intval(criptper_text(2,$aqslipgaji[38]));
                        $tnomfreetepo2 = intval(criptper_text(2,$aqslipgaji[40]));
                        $ttotal        = intval(criptper_text(2,$aqslipgaji[41]));
                        echo "<tr>";
                        echo "<td align='right'>".$counter1." &nbsp<input type='hidden' name='tidxsg[$counter1]' value='$aqslipgaji[0]'></td>";
                        echo "<td bgcolor='#FF9933'>&nbsp <input type='checkbox' name='cupdate[$counter1]'></td>";    
                        echo "<td bgcolor='#FF6666'>&nbsp <input type='checkbox' name='cdelete[$counter1]'></td>";
                        echo "<td bgcolor='#99DDDD'>&nbsp <input type='checkbox' name='cmsender[$counter1]'></td>";    
                        echo "<td>&nbsp <input type='text' name='tperiode[$counter1]' size='25' maxlength='25' value='".$aqslipgaji[1]."'> &nbsp</td>";
                        echo "<td>&nbsp <input type='text' name='tkode[$counter1]' size='8' maxlength='8' value='".$aqslipgaji[2]."'> &nbsp</td>";
                        echo "<td>&nbsp <input type='text' name='tnama[$counter1]' size='30' maxlength='30' value='".$aqslipgaji[3]."'> &nbsp</td>";
                        echo "<td>&nbsp <select name='tperusahaan[$counter1]'><option value='$aqslipgaji[4]'>$aqslipgaji[4]</option><option value='PT.Aneka Grafindo'>PT.Aneka Grafindo</option><option value='PT.Sinar Grafindo'>PT.Sinar Grafindo</option><option value='PT.Sumber Tirta Sejati'>PT.Sumber Tirta Sejati</option><option value='PT.Mitra Bhinneka Sarana'>PT.Mitra Bhinneka Sarana</option></select></td>";
                        echo "<td>&nbsp <input type='text' name='temail[$counter1]' size='40' maxlength='50' value='".$aqslipgaji[5]."'> &nbsp</td>";
                        echo "<td>&nbsp <input type='text' name='tnomorhp[$counter1]' size='15' maxlength='15' value='".$aqslipgaji[6]."'> &nbsp</td>";
                        echo "<td align='right'><input type='text' name='tgapok[$counter1]' style='text-align:right;' onKeyUp='fnumfor_tgapok($counter1,this.value)' id='tgapok$counter1' size='9' maxlength='9' value='".number_format($tgapok,0,',','.')."'> &nbsp</td>";
                        echo "<td align='right'><input type='text' name='tgapokhr[$counter1]' style='text-align:right;' onKeyUp='fnumfor_tgapokhr($counter1,this.value)' id='tgapokhr$counter1' size='9' maxlength='9' value='".number_format($tgapokhr,0,',','.')."'> &nbsp</td>";
                        echo "<td align='right'><input type='text' name='tumaperhr[$counter1]' style='text-align:right;' onKeyUp='fnumfor_tumaperhr($counter1,this.value)' id='tumaperhr$counter1' size='7' maxlength='7' value='".number_format($tumaperhr,0,',','.')."'> &nbsp</td>";
                        echo "<td align='right'><input type='text' name='tutrperhr[$counter1]' style='text-align:right;' onKeyUp='fnumfor_tutrperhr($counter1,this.value)' id='tutrperhr$counter1' size='7' maxlength='7' value='".number_format($tutrperhr,0,',','.')."'> &nbsp</td>";
                        echo "<td align='right'><input type='text' name='thrkerja[$counter1]' style='text-align:right;' size='2' maxlength='2' value='".$thrkerja."'> &nbsp</td>";
                        echo "<td align='right'><input type='text' name='tlembur1[$counter1]' style='text-align:right;' onKeyUp='fnumfor_tlembur1($counter1,this.value)' id='tlembur1$counter1' size='6' maxlength='6' value='".$tlembur1."'> &nbsp</td>";
                        echo "<td align='right'><input type='text' name='tlembur2[$counter1]' style='text-align:right;' id='tlembur2$counter1' size='6' maxlength='6' value='".$tlembur2."'> &nbsp</td>";
                        echo "<td align='right'><input type='text' name='tuma[$counter1]' style='text-align:right;' onKeyUp='fnumfor_tuma($counter1,this.value)' id='tuma$counter1' size='7' maxlength='7' value='".number_format($tuma,0,',','.')."'> &nbsp</td>";
                        echo "<td align='right'><input type='text' name='tutransport[$counter1]' style='text-align:right;' onKeyUp='fnumfor_tutransport($counter1,this.value)' id='tutransport$counter1' size='7' maxlength='7' value='".number_format($tutransport,0,',','.')."'> &nbsp</td>";
                        echo "<td align='right'><input type='text' name='ttunkeh[$counter1]' style='text-align:right;' onKeyUp='fnumfor_ttunkeh($counter1,this.value)' id='ttunkeh$counter1' size='7' maxlength='9' value='".number_format($ttunkeh,0,',','.')."'> &nbsp</td>";
                        echo "<td align='right'><input type='text' name='ttunlainnya[$counter1]' style='text-align:right;' onKeyUp='fnumfor_ttunlainnya($counter1,this.value)' id='ttunlainnya$counter1' size='7' maxlength='7' value='".number_format($ttunlainnya,0,',','.')."'> &nbsp</td>";
                        echo "<td align='right'><input type='text' name='tulembur[$counter1]' style='text-align:right;' onKeyUp='fnumfor_tulembur($counter1,this.value)' id='tulembur$counter1' size='7' maxlength='7' value='".number_format($tulembur,0,',','.')."'> &nbsp</td>";
                        echo "<td>&nbsp <input type='text' name='tfreetepe1[$counter1]' size='24' maxlength='30' value='".$aqslipgaji[19]."'> &nbsp</td>";
                        echo "<td align='right'><input type='text' name='tnomfreetepe1[$counter1]' style='text-align:right;' onKeyUp='fnumfor_tnomfreetepe1($counter1,this.value)' id='tnomfreetepe1$counter1' size='7' maxlength='7' value='".number_format($tnomfreetepe1,0,',','.')."'> &nbsp</td>";
                        echo "<td>&nbsp <input type='text' name='tfreetepe2[$counter1]' size='24' maxlength='30' value='".$aqslipgaji[21]."'> &nbsp</td>";
                        echo "<td align='right'><input type='text' name='tnomfreetepe2[$counter1]' style='text-align:right;' onKeyUp='fnumfor_tnomfreetepe2($counter1,this.value)' id='tnomfreetepe2$counter1' size='7' maxlength='7' value='".number_format($tnomfreetepe2,0,',','.')."'> &nbsp</td>";
                        echo "<td>&nbsp <input type='text' name='tfreetepe3[$counter1]' size='24' maxlength='30' value='".$aqslipgaji[23]."'> &nbsp</td>";
                        echo "<td align='right'><input type='text' name='tnomfreetepe3[$counter1]' style='text-align:right;' onKeyUp='fnumfor_tnomfreetepe3($counter1,this.value)' id='tnomfreetepe3$counter1' size='7' maxlength='7' value='".number_format($tnomfreetepe3,0,',','.')."'> &nbsp</td>";
                        echo "<td>&nbsp <input type='text' name='tfreetepe4[$counter1]' size='24' maxlength='30' value='".$aqslipgaji[25]."'> &nbsp</td>";
                        echo "<td align='right'><input type='text' name='tnomfreetepe4[$counter1]' style='text-align:right;' onKeyUp='fnumfor_tnomfreetepe4($counter1,this.value)' id='tnomfreetepe4$counter1' size='7' maxlength='7' value='".number_format($tnomfreetepe4,0,',','.')."'> &nbsp</td>";
                        echo "<td>&nbsp <input type='text' name='tfreetepe5[$counter1]' size='24' maxlength='30' value='".$aqslipgaji[27]."'> &nbsp</td>";
                        echo "<td align='right'><input type='text' name='tnomfreetepe5[$counter1]' style='text-align:right;' onKeyUp='fnumfor_tnomfreetepe5($counter1,this.value)' id='tnomfreetepe5$counter1' size='7' maxlength='7' value='".number_format($tnomfreetepe5,0,',','.')."'> &nbsp</td>";
                        echo "<td>&nbsp <input type='text' name='tfreetepe6[$counter1]' size='24' maxlength='30' value='".$aqslipgaji[29]."'> &nbsp</td>";
                        echo "<td align='right'><input type='text' name='tnomfreetepe6[$counter1]' style='text-align:right;' onKeyUp='fnumfor_tnomfreetepe6($counter1,this.value)' id='tnomfreetepe6$counter1' size='7' maxlength='7' value='".number_format($tnomfreetepe6,0,',','.')."'> &nbsp</td>";
                        echo "<td align='right'><input type='text' name='tbpjstk[$counter1]' style='text-align:right;' onKeyUp='fnumfor_tbpjstk($counter1,this.value)' id='tbpjstk$counter1' size='7' maxlength='7' value='".number_format($tbpjstk,0,',','.')."'> &nbsp</td>";
                        echo "<td align='right'><input type='text' name='tbpjsks[$counter1]' style='text-align:right;' onKeyUp='fnumfor_tbpjsks($counter1,this.value)' id='tbpjsks$counter1' size='7' maxlength='7' value='".number_format($tbpjsks,0,',','.')."'> &nbsp</td>";
                        echo "<td align='right'><input type='text' name='tpph21[$counter1]' style='text-align:right;' onKeyUp='fnumfor_tpph21($counter1,this.value)' id='tpph21$counter1' size='7' maxlength='9' value='".number_format($tpph21,0,',','.')."'> &nbsp</td>";
                        echo "<td align='right'><input type='text' name='tpinjaman[$counter1]' style='text-align:right;' onKeyUp='fnumfor_tpinjaman($counter1,this.value)' id='tpinjaman$counter1' size='7' maxlength='8' value='".number_format($tpinjaman,0,',','.')."'> &nbsp</td>";
                        echo "<td align='right'><input type='text' name='tpotunle[$counter1]' style='text-align:right;' onKeyUp='fnumfor_tpotunle($counter1,this.value)' id='tpotunle$counter1' size='7' maxlength='8' value='".number_format($tpotunle,0,',','.')."'> &nbsp</td>";
                        echo "<td align='right'><input type='text' name='tterlambat[$counter1]' style='text-align:right;' onKeyUp='fnumfor_tterlambat($counter1,this.value)' id='tterlambat$counter1' size='7' maxlength='7' value='".number_format($tterlambat,0,',','.')."'> &nbsp</td>";
                        echo "<td>&nbsp <input type='text' name='tfreetepo1[$counter1]' size='24' maxlength='30' value='".$aqslipgaji[37]."'> &nbsp</td>";
                        echo "<td align='right'><input type='text' name='tnomfreetepo1[$counter1]' style='text-align:right;' onKeyUp='fnumfor_tnomfreetepo1($counter1,this.value)' id='tnomfreetepo1$counter1' size='7' maxlength='7' value='".number_format($tnomfreetepo1,0,',','.')."'> &nbsp</td>";
                        echo "<td>&nbsp <input type='text' name='tfreetepo2[$counter1]' size='24' maxlength='30' value='".$aqslipgaji[39]."'> &nbsp</td>";
                        echo "<td align='right'><input type='text' name='tnomfreetepo2[$counter1]' style='text-align:right;' onKeyUp='fnumfor_tnomfreetepo2($counter1,this.value)' id='tnomfreetepo2$counter1' size='7' maxlength='7' value='".number_format($tnomfreetepo2,0,',','.')."'> &nbsp</td>";
                        echo "<td align='right'><input type='text' name='ttotal[$counter1]' style='text-align:right;' onKeyUp='fnumfor_ttotal($counter1,this.value)' id='ttotal$counter1' size='10' maxlength='10' value='".number_format($ttotal,0,',','.')."'> &nbsp</td>";
                        echo "<td>&nbsp <a href='../reports/rrslipgaji.php?tidxsg=$aqslipgaji[0]' target='newwindow''>Prin</a></td>";   
                        echo "</tr>";
                        }
                    echo "<input type='hidden' name='maxcount' value='$counter1'>";
                    }
                echo "<input type='hidden' name='sidxus' value=".$sidxus."><input type='hidden' name='susername' value=".$susername."><input type='hidden' name='spassword' value=".$spassword."><input type='hidden' name='slevel' value=".$slevel.">";
            ?>
            </tbody>
        </table>
    </div>
    <table align="center" width="97%" border="0" bgcolor="#ffffff"><tr><td width="10%"><button name="submit" type="submit" value="new" class="btn btn-primary btn-lg btn-block btn-sm">NEW</button></td><td width="10%"><button name="submit" type="submit" value="update" class="btn btn-warning btn-lg btn-block btn-sm">UPDATE</button></td><td width="10%"><button name="submit" type="submit" value="delete" class="btn btn-danger btn-lg btn-block btn-sm">DELETE</button></td><td width="15%"><button name="submit" type="submit" value="mailsender" class="btn btn-info btn-lg btn-block btn-sm">MAIL SENDER</button></td><td width="15%"><button name="submit" type="submit" value="mailbomber" class="btn btn-danger btn-lg btn-block btn-sm">MAIL BOMBER</button></td></form><form method="post" action="../reports/rbslipgaji.php" target="newwindow"><td width="20%"><button name="submit" type="submit" class="btn btn-secondary btn-lg btn-block btn-sm">PRINT BROWSE SLIP GAJI</button>
    <?php 
        if (isset($vcek)) 
            { echo "<input type='hidden' name='vcek' value='$vcek'>"; }
        if (isset($fperiode)) 
            { echo "<input type='hidden' name='fperiode' value='$fperiode'>"; }
        if (isset($filter)) 
            { echo "<input type='hidden' name='filter' value='$filter'>"; }
        if (isset($keyword)) 
            { echo "<input type='hidden' name='keyword' value='$keyword'>"; }
    ?>
    </form></td><form method="post" action="../reports/rdslipgaji.php" target="newwindow"><td width="20%"><button name="submit" type="submit" class="btn btn-secondary btn-lg btn-block btn-sm">PRINT DAFTAR SLIP GAJI</button>
    <?php 
        if (isset($vcek)) 
            { echo "<input type='hidden' name='vcek' value='$vcek'>"; }
        if (isset($fperiode)) 
            { echo "<input type='hidden' name='fperiode' value='$fperiode'>"; }
        if (isset($filter)) 
            { echo "<input type='hidden' name='filter' value='$filter'>"; }
        if (isset($keyword)) 
            { echo "<input type='hidden' name='keyword' value='$keyword'>"; }
    ?>
    </form></td></tr></table>
</body>
</html>                                                                 
