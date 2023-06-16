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
<title>REPORT DATA ABSENSI HARIAN</title>
</head>
<body>
    <br><center><h2>REPORT DATA ABSENSI HARIAN</h2></center><br>
    <?php
        if (isset($vcek) and $vcek == "ok")
            {
            $npawal  = date_create($pawal);
            $npawal  = date_format($npawal,"d-m-Y");
            $npakhir = date_create($pakhir);
            $npakhir = date_format($npakhir,"d-m-Y");
            echo "<p align='center' class='h5'>Periode : ".$npawal. " s/d " .$npakhir."</p>";
            }
    ?>   
    <div class="table-striped table-responsive">
        <table align="center" width="97%" border="1" bordercolor="#eeeeee" class="h9">
            <thead align="center">
                <tr height="30">
                    <th width="3%">&nbsp No</th>
                    <th width="5%">&nbsp ID</a></th>
                    <th width="10%">&nbsp Nama</a></th>
                    <th width="3%">Persh.</a></th>
                    <th width="8%">&nbsp Jabatan</a></th>
                    <th width="5%">&nbsp Lokasi</a></th>
                    <th width="5%">&nbsp Tgl.Join</a></th>
                    <th width="5%">&nbsp Status</a></th>
                    <th width="5%">&nbsp Hari</a></th>
                    <th width="5%">&nbsp Tgl.Abs</a></th>
                    <th width="4%">Jam Msk.</a></th>
                    <th width="4%">&nbsp Jam Pul.</a></th>
                    <th width="4%">&nbsp SPL(jam)</a></th>
                    <th width="4%">&nbsp Telat</a></th>
                    <th width="4%">&nbsp Lb.Dt</a></th>
                    <th width="4%">&nbsp Lb.Pl.1</a></th>
                    <th width="5%">&nbsp Lb.Pl.2</a></th>
                    <th width="4%">&nbsp St.Abs</a></th>
                    <th width="11%">&nbsp Keterangan</a></th>
                    <th width="3%">St.D</a></th>
                </tr>
            </thead>
            <tbody>
            <?php
                $counter1 = 0;
                if (isset($vcek) and $vcek == "ok")
                    {
                    $pawal  = date_create($pawal);
                    $pawal  = date_format($pawal,"Y-m-d");
                    $pakhir = date_create($pakhir);
                    $pakhir = date_format($pakhir,"Y-m-d");
                    if (isset($keyword) and !empty($keyword)) 
                        { 
                        switch ($filter) {
                            case 'kode':
                                if ($slokasi == "All")
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and kode like '$keyword%' order by tglabs,nama asc;"); }
                                else
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and lokasi = '$slokasi' and kode like '$keyword%' order by tglabs,nama asc;"); }
                                break;

                            case 'nama':
                                if ($slokasi == "All")
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and nama like '%$keyword%' order by tglabs,nama asc;"); }
                                else
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and lokasi = '$slokasi' and nama like '%$keyword%' order by tglabs,nama asc;"); }
                                break;

                            case 'jabatan':
                                if ($slokasi == "All")
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and jabatan = '$keyword' order by tglabs,jabatan asc;"); }
                                else
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and lokasi = '$slokasi' and jabatan = '$keyword' order by tglabs,jabatan asc;"); }
                                break;

                            case 'lokasi':
                                if ($slokasi == "All")
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and lokasi = '$keyword' order by tglabs,lokasi asc;"); }
                                else
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and lokasi = '$slokasi' order by tglabs,lokasi asc;"); }
                                break;
                        
                            case 'stabs':
                                if ($slokasi == "All")
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and stabs like '%$keyword%' order by tglabs,nama asc;"); }
                                else
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and lokasi = '$slokasi' and stabs like '%$keyword%' order by tglabs,nama asc;"); }
                                break;

                            case 'stdok':
                                if ($slokasi == "All")
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and stdok like '%$keyword%' order by tglabs,nama asc;"); }
                                else
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and lokasi = '$slokasi' and stdok like '%$keyword%' order by tglabs,nama asc;"); }
                                break;
                                
                            default:
                                if ($slokasi == "All")
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' order by tglabs,nama asc;"); }
                                else
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and lokasi = '$slokasi' order by tglabs,nama asc;"); }
                                break;
                            }
                        }
                    else { 
                        switch ($filter) {
                            case 'Tidak Masuk':
                                if ($slokasi == "All")
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and stabs != 'Masuk' and stabs != 'Masuk(C)' order by tglabs,nama asc;"); }
                                else
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and lokasi = '$slokasi' and stabs != 'Masuk' and stabs != 'Masuk(C)' order by tglabs,nama asc;"); }
                                break;
                        
                            case 'Terlambat':
                                if ($slokasi == "All")
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and telat > 0 order by tglabs,nama asc;"); }
                                else
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and lokasi = '$slokasi' and telat > 0 order by tglabs,nama asc;"); }
                                break;

                            case 'lemburby':
                                if ($slokasi == "All")
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and lemburby > 0 order by tglabs,nama asc;"); }
                                else
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and lokasi = '$slokasi' and lemburby > 0 order by tglabs,nama asc;"); }
                                break;
                            
                            case 'Lembur':
                                if ($slokasi == "All")
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and ( lemburdt > 0 or lembur1 > 0 or lembur2 > 0 ) order by tglabs,nama asc;"); }
                                else
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and lokasi = '$slokasi' and ( lemburdt > 0 or lembur1 > 0 or lembur2 > 0 ) order by tglabs,nama asc;"); }
                                break;

                            default:
                                if ($slokasi == "All")
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' order by tglabs,nama asc;"); }
                                else
                                  { $qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and lokasi = '$slokasi' and tglabs <= '$pakhir' order by tglabs,nama asc;"); }  
                                break;
                            }

                        }
                    }
                else
                    { 
                    if ($slokasi == "All")
                      { $qabsensihr = $connection->query("select * from absensihr order by tglabs,nama desc limit 100;"); }
                    else
                      { $qabsensihr = $connection->query("select * from absensihr where lokasi = '$slokasi' order by tglabs,nama desc limit 100;"); }
                    }
                if (mysqli_num_rows($qabsensihr) > 0)
                    {
                    $totlemburby = 0;
                    $tottelat    = 0;
                    $totlembur1  = 0;
                    $totlembur2  = 0;
                    while ($aqabsensihr = mysqli_fetch_array($qabsensihr))
                        {
                        $counter1           = $counter1+1;
                        $ttglabs[$counter1] = date_create($aqabsensihr[6]);
                        $ttglabs[$counter1] = date_format($ttglabs[$counter1],"d-m-Y");
                        $tketerangan        = str_replace(".","<br>",$aqabsensihr[16]);
                        $ttgljoin           = "-";
                        $tperusahaan        = "-";
                        $tjabatan           = $aqabsensihr[4];
                        $tstatus            = "-";
                        $totlemburby        = $totlemburby + $aqabsensihr[10];
                        $tottelat           = $tottelat + $aqabsensihr[11];
                        $totlemburdt        = $totlemburdt + $aqabsensihr[12];
                        $totlembur1         = $totlembur1 + $aqabsensihr[13];
                        $totlembur2         = $totlembur2 + $aqabsensihr[14];
                        $qpegawai           = $connection->query("select perusahaan,tgljoin,status from pegawai where kode='$aqabsensihr[1]';");
                        if ($aqpegawai = mysqli_fetch_array($qpegawai))
                            {
                            $tperusahaan = $aqpegawai[0];
                            $ttgljoin    = date_create($aqpegawai[1]);
                            $tgljoin     = date_format($ttgljoin,"d-m-Y");
                            $tstatus     = $aqpegawai[2];
                            }
                        echo "<tr height='20'>";
                        echo "<td align='right'>".$counter1." &nbsp<input type='hidden' name='tidxah[$counter1]' value='$aqabsensihr[0]'></td>";
                        echo "<td align='right'>&nbsp ".$aqabsensihr[1]." &nbsp</td>";
                        echo "<td>&nbsp ".$aqabsensihr[2]."</td>";
                        echo "<td>&nbsp ".$tperusahaan."</td>";
                        echo "<td>&nbsp ".$aqabsensihr[3]."</td>";
                        echo "<td>&nbsp ".$aqabsensihr[4]."</td>";
                        echo "<td>&nbsp ".$tgljoin."</td>";
                        echo "<td>&nbsp ".$tstatus."</td>";
                        echo "<td>&nbsp ".$aqabsensihr[5]."</td>";
                        echo "<td>&nbsp ".$ttglabs[$counter1]."</td>";
                        echo "<td>&nbsp ".$aqabsensihr[7]."</td>";
                        echo "<td>&nbsp ".$aqabsensihr[8]."</td>";
                        echo "<td align='right'>".$aqabsensihr[10]." jam&nbsp</td>";
                        echo "<td align='right'>".$aqabsensihr[11]." mnt.&nbsp</td>";
                        echo "<td align='right'>".$aqabsensihr[12]." mnt.&nbsp</td>";
                        echo "<td align='right'>".$aqabsensihr[13]." mnt.&nbsp</td>";
                        echo "<td align='right'>".$aqabsensihr[14]." mnt.&nbsp</td>";
                        echo "<td>&nbsp ".$aqabsensihr[15]."</td>";
                        echo "<td>".$tketerangan."</td>";
                        echo "<td>&nbsp ".$aqabsensihr[17]."</td>";
                        echo "</tr>";
                        }
                    echo "<tr height='30'><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td align='right'><b>".$totlemburby." jam</b>&nbsp</td><td align='right'><b>".$tottelat." mnt.</b>&nbsp</td><td align='right'><b>".$totlemburdt." mnt.</b>&nbsp</td><td align='right'><b>".$totlembur1." mnt.</b>&nbsp</td><td align='right'><b>".$totlembur2." mnt.</b>&nbsp</td><td></td><td></td><td></td><td></td></tr>";
                    echo "<input type='hidden' name='maxcount' value='$counter1'>";
                    }
                echo "<input type='hidden' name='sidxus' value=".$sidxus."><input type='hidden' name='susername' value=".$susername."><input type='hidden' name='spassword' value=".$spassword."><input type='hidden' name='slevel' value=".$slevel.">";
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>