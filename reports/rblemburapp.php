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
<title>REPORT BROWSING LEMBUR KARYAWAN</title>
</head>
<body>
    <br><center><h2>REPORT BROWSING LEMBUR KARYAWAN</h2></center><br>
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
                    <th width="3%">No</th>
                    <th width="15%">Kadiv.</th>
                    <th width="10%">No.Surat (Status)</th>
                    <th width="6%">Tgl.Pengajuan</th>
                    <th width="15%">Staff</th>   
                    <th width="15%">Tgl/Jam/Lama Lembur</th>
                    <th width="26%">Keterangan</th>  
                    <th width="5%">App.1</th>    
                    <th width="5%">App.2</th>
                </tr>
            </thead>
            <tbody>
    <?php
        $counter = 0;
        // Load setelah filter.
        if (isset($vcek) and $vcek == "ok")
            {
            $pawal  = date_create($pawal);
            $pawal  = date_format($pawal,"Y-m-d");
            $pakhir = date_create($pakhir);
            $pakhir = date_format($pakhir,"Y-m-d");
            switch ($slevel) 
                {
                case 'Hrd':
                if (isset($keyword) and !empty($keyword)) 
                    { 
                    switch ($filter) {
                        case 'kodeldr':
                        $qbrowse  = $connection->query("select * from lembur where tglpeng >= '$pawal' and tglpeng <= '$pakhir' and kodeldr = '$keyword' order by kodesp asc;"); 
                        break;

                        case 'namaldr':
                        $qbrowse  = $connection->query("select * from lembur where tglpeng >= '$pawal' and tglpeng <= '$pakhir' and namaldr like '%$keyword%' order by company asc;"); 
                        break;

                        case 'kode':
                        $qbrowse  = $connection->query("select * from lembur where tglpeng >= '$pawal' and tglpeng <= '$pakhir' and kode = '$keyword' order by namacu asc;"); 
                        break;

                        case 'nama':
                        $qbrowse  = $connection->query("select * from lembur where tglpeng >= '$pawal' and tglpeng <= '$pakhir' and nama like '%$keyword%' order by namasa asc;"); 
                        break;
                        }
                    }
                else 
                    { $qbrowse   = $connection->query("select * from lembur where tglpeng >= '$pawal' and tglpeng <= '$pakhir' order by kodesp asc;"); }
                break;
                
                case 'Kadiv':
                if (isset($keyword) and !empty($keyword)) 
                    { 
                    switch ($filter) {
                        case 'kodeldr':
                        $qbrowse  = $connection->query("select * from lembur where divisi='$sdivisi' and tglpeng >= '$pawal' and tglpeng <= '$pakhir' and kodeldr = '$keyword' order by kodesp asc;"); 
                        break;

                        case 'namaldr':
                        $qbrowse  = $connection->query("select * from lembur where divisi='$sdivisi' and tglpeng >= '$pawal' and tglpeng <= '$pakhir' and namaldr like '%$keyword%' order by company asc;"); 
                        break;

                        case 'kode':
                        $qbrowse  = $connection->query("select * from lembur where divisi='$sdivisi' and  tglpeng >= '$pawal' and tglpeng <= '$pakhir' and kode = '$keyword' order by namacu asc;"); 
                        break;

                        case 'nama':
                        $qbrowse  = $connection->query("select * from lembur where divisi='$sdivisi' and  tglpeng >= '$pawal' and tglpeng <= '$pakhir' and nama like '%$keyword%' order by namasa asc;"); 
                        break;
                        }
                    }
                else 
                    { $qbrowse   = $connection->query("select * from lembur where  divisi='$sdivisi' and tglpeng >= '$pawal' and tglpeng <= '$pakhir' order by kodesp asc;"); }
                break;

                default:
                if (isset($keyword) and !empty($keyword)) 
                    { 
                    switch ($filter) {
                        case 'kodeldr':
                        $qbrowse  = $connection->query("select * from lembur where kode='$skode' and tglpeng >= '$pawal' and tglpeng <= '$pakhir' and kodeldr = '$keyword' order by kodesp asc;"); 
                        break;

                        case 'namaldr':
                        $qbrowse  = $connection->query("select * from lembur where kode='$skode' and tglpeng >= '$pawal' and tglpeng <= '$pakhir' and namaldr like '%$keyword%' order by company asc;"); 
                        break;

                        case 'kode':
                        $qbrowse  = $connection->query("select * from lembur where kode='$skode' and  tglpeng >= '$pawal' and tglpeng <= '$pakhir' and kode = '$keyword' order by namacu asc;"); 
                        break;

                        case 'nama':
                        $qbrowse  = $connection->query("select * from lembur where kode='$skode' and  tglpeng >= '$pawal' and tglpeng <= '$pakhir' and nama like '%$keyword%' order by namasa asc;"); 
                        break;
                        }
                    }
                else 
                    { $qbrowse   = $connection->query("select * from lembur where kode='$skode' and tglpeng >= '$pawal' and tglpeng <= '$pakhir' order by kodesp asc;"); }
                break;
                }
            }
        else
        // Load awal.
            { 
            switch ($slevel) {
                case 'Hrd':
                $qbrowse   = $connection->query("select * from lembur order by kode desc limit 100;");
                break;

                case 'Kadiv':
                $qbrowse   = $connection->query("select * from lembur where divisi='$sdivisi' order by kode desc limit 50;");
                break;
              
                default:
                $qbrowse   = $connection->query("select * from lembur where kode='$skode' order by kode desc limit 10;");
                break;
                }
            }
        while  ($aqbrowse = mysqli_fetch_array($qbrowse))
            {
            $counter++;
            $tidxle   = $aqbrowse[0];
            $dtglpeng = date_create($aqbrowse[3]);
            $ttglpeng = date_format($dtglpeng,"d-m-Y");
            $dtgllbr  = date_create($aqbrowse[6]);
            $ttgllbr  = date_format($dtgllbr,"d-m-Y");
            switch ($aqbrowse[2]) {
                case 'O':
                    $status = "Open";
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
            echo "<input type='hidden' name='tidxle' value=".$aqbrowse[0]."><input type='hidden' name='tkodele' value=".$aqbrowse[1].">";            
            echo "<tr><td align='right'>&nbsp ".$counter." &nbsp</td>";
            echo "<td>&nbsp ".$aqbrowse[11]." - ".$aqbrowse[12]." - ".$aqbrowse[13]."</td>";
            echo "<td>&nbsp ".$aqbrowse[1] ." ( ".$status." )</td>";
            echo "<td>&nbsp ".$ttglpeng."</td>";
            echo "<td>&nbsp ".$aqbrowse[4]." - " .$aqbrowse[5]. "</td>";
            echo "<td>&nbsp ".$ttgllbr." | ".$aqbrowse[7]." - ".$aqbrowse[8]." | ".$aqbrowse[9]."</td>";
            echo "<td>&nbsp ".$aqbrowse[10]."</td>";
            echo "<td>&nbsp ".$aqbrowse[14]." ( " .$aqbrowse[15]. " )</td>";
            echo "<td>&nbsp ".$aqbrowse[16]." ( " .$aqbrowse[17]. " )</td></tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>