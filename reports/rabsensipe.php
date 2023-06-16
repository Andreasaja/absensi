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
<title>REPORT DATA ABSENSI PERIODIKAL</title>
</head>
<body>
    <br><center><h2>REPORT DATA ABSENSI PERIODIKAL</h2></center><br>
        <table align="center" width="97%" border="1" bordercolor="#eeeeee" class="h9">
            <thead align="center">   
                <tr height="20">
                    <th width="3%">&nbsp No</th>
                    <th width="10%">&nbsp Periode</a></th>
                    <th width="4%">&nbsp ID</a></th>
                    <th width="11%">&nbsp Nama</a></th>
                    <th width="3%">&nbsp Persh.</a></th>
                    <th width="11%">&nbsp Jabatan</a></th>
                    <th width="6%">&nbsp Lokasi</a></th>
                    <th width="5%">Tgl.Join</a></th>
                    <th width="5%">&nbsp Status</a></th>
                    <th width="4%">&nbsp Masuk</a></th>
                    <th width="5%">T.Masuk</a></th>
                    <th width="3%">Paid</a></th>
                    <th width="4%">Unpaid</a></th>
                    <th width="3%">Alpha</a></th>
                    <th width="3%">Cuti</a></th>
                    <th width="3%">Sakit</a></th>
                    <th width="5%">&nbsp Telat</a></th>
                    <th width="4%">LemburDt</a></th>
                    <th width="4%">&nbsp Lembur1</a></th>
                    <th width="4%">&nbsp Lembur2</a></th>
                </tr>
            </thead>
            <tbody>
            <?php
                $counter1 = 0;
                if (isset($tperiode))
                    {
                    if (isset($keyword) and !empty($keyword)) 
                        { 
                        switch ($filter) {
                            case 'kode':
                                $qabsensipe = $connection->query("select * from absensipe where periode = '$tperiode' and kode like '%$keyword%' order by kode asc;"); 
                                break;

                            case 'nama':
                                $qabsensipe = $connection->query("select * from absensipe where periode = '$tperiode' and nama like '%$keyword%' order by nama asc;"); 
                                break;

                            case 'jabatan':
                                $qabsensipe = $connection->query("select * from absensipe where periode = '$tperiode' and jabatan like '%$keyword%' order by jabatan asc;"); 
                                break;

                            case 'lokasi':
                                $qabsensipe = $connection->query("select * from absensipe where periode = '$tperiode' and lokasi like '%$keyword%' order by jabatan asc;"); 
                                break;
                            }
                        }
                    else { $qabsensipe = $connection->query("select * from absensipe where periode = '$tperiode' order by nama asc;"); }
                    }
                else
                    { $qabsensipe = $connection->query("select * from absensipe order by nama asc;"); }
                if (mysqli_num_rows($qabsensipe) > 0)
                    {
                    while ($aqabsensipe = mysqli_fetch_array($qabsensipe))
                        {
                        $ttgljoin    = "-";
                        $tperusahaan = "-";
                        $tjabatan    = "-";
                        $tstatus     = "-";
                        $lokasi      = "-";
                        $qpegawai = $connection->query("select perusahaan,tgljoin,status,lokasi from pegawai where kode='$aqabsensipe[2]';");
                        if ($aqpegawai = mysqli_fetch_array($qpegawai))
                            {
                            $ttgljoin    = date_create($aqpegawai[1]);
                            $ttgljoin    = date_format($ttgljoin,"d-m-Y");
                            $tperusahaan = $aqpegawai[0];
                            $tstatus     = $aqpegawai[2];
                            $tlokasi     = $aqpegawai[3];
                            }
                        $counter1 = $counter1+1;
                        echo "<tr>";
                        echo "<td align='right'>".$counter1." &nbsp</td>";
                        echo "<td>&nbsp ".$aqabsensipe[1]."</td>";
                        echo "<td>&nbsp ".$aqabsensipe[2]."</td>";
                        echo "<td>&nbsp ".$aqabsensipe[3]."</td>";
                        echo "<td>&nbsp ".$tperusahaan."</td>";
                        echo "<td>&nbsp ".$aqabsensipe[4]."</td>";
                        echo "<td>&nbsp ".$tlokasi."</td>";
                        echo "<td>&nbsp ".$ttgljoin."</td>";
                        echo "<td>&nbsp ".$tstatus."</td>";
                        echo "<td align='right'>".$aqabsensipe[6]." &nbsp</td>";
                        echo "<td align='right'>".$aqabsensipe[7]." &nbsp</td>";
                        echo "<td align='right'>".$aqabsensipe[8]." &nbsp</td>";
                        echo "<td align='right'>".$aqabsensipe[9]." &nbsp</td>";
                        echo "<td align='right'>".$aqabsensipe[10]." &nbsp</td>";
                        echo "<td align='right'>".$aqabsensipe[11]." &nbsp</td>";
                        echo "<td align='right'>".$aqabsensipe[12]." &nbsp</td>";
                        if ($aqabsensipe[13]>0)
                            { echo "<td align='right' bgcolor='#FFDDDD'>".$aqabsensipe[13]." mnt.&nbsp</td>"; }
                        else
                            { echo "<td align='right'>".$aqabsensipe[13]." mnt.&nbsp</td>"; }
                        echo "<td align='right'>".$aqabsensipe[14]." mnt.&nbsp</td>";
                        echo "<td align='right'>".$aqabsensipe[15]." mnt.&nbsp</td>";
                        echo "<td align='right'>".$aqabsensipe[16]." mnt.&nbsp</td>";
                        echo "</tr>";
                        }
                    }
            ?>
            </tbody>
        </table>
</body>
</html>                                                                 
