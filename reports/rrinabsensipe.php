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
<title>REPORT DATA RINCI ABSENSI PERIODIKAL</title>
</head>
<body class="fullbody">
<?php 
    if (isset($tperiode))
        {
        if (isset($keyword) and !empty($keyword)) 
            { 
            switch ($filter) 
                {
                case 'kode':
                $qpegawai = $connection->query("select kode,nama,perusahaan,jabatan,lokasi from pegawai where kode like '%$keyword%' and staktif='Y' order by kode asc;"); 
                break;

                case 'nama':
                $qpegawai = $connection->query("select kode,nama,perusahaan,jabatan,lokasi from pegawai where nama like '%$keyword%' and staktif='Y' order by nama asc;"); 
                break;

                case 'jabatan':
                $qpegawai = $connection->query("select kode,nama,perusahaan,jabatan from pegawai where jabatan like '%$keyword%' and staktif='Y' order by jabatan asc;"); 
                break;

                case 'lokasi':
                $qpegawai = $connection->query("select kode,nama,perusahaan,jabatan,lokasi from pegawai where lokasi like '%$keyword%' and staktif='Y' order by jabatan asc;"); 
                break;
                }
            }
        else 
            { $qpegawai = $connection->query("select kode,nama,perusahaan,jabatan,lokasi from pegawai where staktif='Y' order by nama asc;"); }
        }
    else
        { $qpegawai = $connection->query("select kode,nama,perusahaan,jabatan,lokasi from pegawai where staktif='Y' order by nama asc;"); }
    $counter1=0;
    $counters=0;
    if (mysqli_num_rows($qpegawai) > 0)
        {
        while ($aqpegawai = mysqli_fetch_array($qpegawai))
            {
            $counter1++;
            $counters++;
            $tjabatan = $aqpegawai[3];
            //if ($counters==1)
            //    { echo "<br><br><br><br>"; }
            //else
            //    {  
            //    $counters = 0; 
            //    echo "<br><br><br><br><br><br><br><br><br><br><br><br>";    
            //    }
            echo "<table border='0' align='center' width='97%' class='h6' cellspacing='0' cellpadding='0'><tr height='20' bgcolor='#DDFFFF'><td width='3%' align='right'>".$counter1." . </td><td width='10%'>&nbsp NIP : ".$aqpegawai[0]."</td><td width='30%'>&nbsp Nama : ".$aqpegawai[1]."</td><td width='15%'>&nbsp Perusahaan : ".$aqpegawai[2]."</td><td width='28%'>&nbsp Jabatan : ".$tjabatan."</td><td>&nbsp Lokasi : ".$aqpegawai[4]."</td></tr></table>";
            $qrabsensipe = $connection->query("select * from rinabsensipe where periode='$tperiode' and kode='$aqpegawai[0]' order by kode,tglabs asc;");
            $counter2  = 0;
            $totlbrby  = 0;
            $tottelat  = 0;
            $totlbrdt  = 0;
            $totlbr1   = 0;
            $totlbr2   = 0;
            $totpaid   = 0;
            $totunpaid = 0;
            echo "<table align='center' width='97%' border='0' bordercolor='#EEEEEE' class='h8' cellspacing='0' cellpadding='0'><thead class='btn-warning'><tr><td width='5%'>No.</td><td width='13%'>Periode</td><td width='5%'>Hari</td><td width='7%'>Tanggal</td><td width='5%'>Jam Msk</td><td width='5%'>Jam Pul</td><td width='5%'>SPL</td><td width='5%'>Telat</td><td width='5%'>Lbr.Dt.</td><td width='5%'>Lbr.1</td><td width='5%'>Lbr.2</td><td width='5%'>Status</td><td>Keterangan</td></tr></thead>";
            echo "<tbody>";
            while ($aqrabsensipe = mysqli_fetch_array($qrabsensipe))
                {
                $counter2++;
                $tglabs   = date_create($aqrabsensipe[4]);  
                $tglabs   = date_format($tglabs,"d-m-Y"); 
                $totlbrby = $totlbrby+$aqrabsensipe[7];
                $tottelat = $tottelat+$aqrabsensipe[8];
                $totlbrdt = $totlbrdt+$aqrabsensipe[9];
                $totlbr1  = $totlbr1+$aqrabsensipe[10];
                $totlbr2  = $totlbr2+$aqrabsensipe[11];
                $tstabs   = $aqrabsensipe[12];
                if (($tstabs=="Libur(S)") or ($tstabs=="Masuk") or ($tstabs=="Masuk(C)") or ($tstabs=="Paid") or ($tstabs=="Cuti") or ($tstabs=="Sakit"))
                    { $totpaid=$totpaid+1; }
                if (($tstabs=="Alpha") or ($tstabs=="Unpaid"))
                    { $totunpaid=$totunpaid+1; }
                echo "<tr height='50'>";
                echo "<td align='right'>".$counter2." . </td>";
                echo "<td>&nbsp ".$aqrabsensipe[1]."</td>";
                echo "<td>&nbsp ".$aqrabsensipe[3]."</td>";
                echo "<td>&nbsp ".$tglabs."</td>";
                echo "<td>&nbsp ".$aqrabsensipe[5]."</td>";
                echo "<td>&nbsp ".$aqrabsensipe[6]."</td>";
                echo "<td align'right'>".$aqrabsensipe[7]." &nbsp</td>";
                echo "<td align'right'>".$aqrabsensipe[8]." &nbsp</td>";
                echo "<td align'right'>".$aqrabsensipe[9]." &nbsp</td>";
                echo "<td align'right'>".$aqrabsensipe[10]." &nbsp</td>";
                echo "<td align'right'>".$aqrabsensipe[11]." &nbsp</td>";
                echo "<td>&nbsp ".$aqrabsensipe[12]."</td>";
                echo "<td>&nbsp ".$aqrabsensipe[13]."</td>";
                echo "</tr>";
                }
            // Supaya banyak baris seragam sehingga bisa di set 2 pegawai per 1 lembar cetakan kertas portrait.
            for ($counter3=$counter2;$counter3<=34;$counter3++)
                {
                echo "<tr height='50'>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "</tr>";
                }
            if ($tjabatan=="Driver")
                { $totpaid=$totpaid+5; }
            echo "<tr class='h6' bgcolor='#EEEEEE'><td></td><td align='center'><b>Unpaid : ".$totunpaid."</b></td><td></td><td><b>Paid : ".$totpaid."</b></td><td></td><td align='right'><b>Total : </b></td><td><b>".$totlbrby."</b></td><td><b>".$tottelat."</b></td><td><b>".$totlbrdt."</b></td><td><b>".$totlbr1."</b></td><td><b>".$totlbr2."</b></td><td></td><td></td></tr></tbody></table>";
            }
        }
?>
</body>
</html>                                                                 
