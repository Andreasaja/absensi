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
<title>REPORT DAFTAR RINCIAN PINJAMAN PEGAWAI</title>
</head>
<body>
    <br><center><h2>FORM RINCIAN PINJAMAN PEGAWAI</h2></center><br>
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
        <table align="center" width="95%" border="1" bordercolor="#eeeeee" class="h7">
            <thead align="center">
                <tr height="30">
                    <th width="4%" class="h8">&nbsp No</th>
                    <th width="8%" class="h8">&nbsp NIP</a></th>
                    <th width="20%" class="h8">&nbsp Nama</a></th>
                    <th width="7%" class="h8">&nbsp Tgl.Mulai</a></th>
                    <th width="7%" class="h8">&nbsp Tgl.Lunas</a></th>
                    <th width="4%" class="h8">Jangka</a></th>
                    <th width="8%" class="h8">&nbsp Plafon</a></th>
                    <th width="8%" class="h8">&nbsp Realiasi</a></th>
                    <th width="7%" class="h8">&nbsp Tgl.Bayar</a></th>
                    <th width="5%" class="h8">Ang.ke-</a></th>
                    <th width="7%" class="h8">&nbsp Nominal</a></th>
                    <th width="8%" class="h8">&nbsp Sudah Bayar</a></th>
                    <th width="8%" class="h8">&nbsp Kurang Bayar</a></th>
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
                    if (isset($keyword) and !empty($keyword)) {
                        switch ($filter) {
                            case 'kode':
                            $qpph21  = $connection->query("select * from pinjaman where tglbayar >= '$pawal' and tglbayar <= '$pakhir' and kode = '$keyword' order by tglbayar,kode asc;"); 
                            break;

                            case 'nama':
                            $qpph21  = $connection->query("select * from pinjaman where tglbayar >= '$pawal' and tglbayar <= '$pakhir' and nama like '%$keyword%' order by tglbayar,nama asc;"); 
                            break;
                            }
                        }
                    else
                        { $qpph21   = $connection->query("select * from pinjaman where tglbayar >= '$pawal' and tglbayar <= '$pakhir' order by tglbayar,nama asc;"); }
                    }
                else
                    { $qpph21   = $connection->query("select * from pinjaman order by tglbayar,nama asc limit 100;"); }
                if (mysqli_num_rows($qpph21) > 0)
                    {
                    while ($aqpinjaman = mysqli_fetch_array($qpph21))
                        {
                        $counter1 = $counter1+1;
                        $tglmulai  = date_create($aqpinjaman[3]);
                        $tglmulai  = date_format($tglmulai,"d-m-Y");
                        $tgllunas  = date_create($aqpinjaman[4]);
                        $tgllunas  = date_format($tgllunas,"d-m-Y");
                        $tglbayar  = date_create($aqpinjaman[8]);
                        $tglbayar  = date_format($tglbayar,"d-m-Y");
                        echo "<tr height='20'><td align='right'><b>".$counter1."</b> &nbsp</td>";
                        echo "<td>&nbsp ".$aqpinjaman[1]."</td>";
                        echo "<td>&nbsp ".$aqpinjaman[2]."</td>";
                        echo "<td>&nbsp ".$tglmulai."</td>";
                        echo "<td>&nbsp ".$tgllunas."</td>";
                        echo "<td align='right'>".$aqpinjaman[5]." &nbsp</td>";
                        echo "<td align='right'>".number_format($aqpinjaman[6],0,',','.')." &nbsp</td>";
                        echo "<td align='right'>".number_format($aqpinjaman[7],0,',','.')." &nbsp</td>";
                        echo "<td>&nbsp ".$tglbayar."</td>";
                        echo "<td align='right'>".$aqpinjaman[9]." &nbsp</td>";
                        echo "<td align='right'>".number_format($aqpinjaman[10],0,',','.')." &nbsp</td>";
                        echo "<td align='right'>".number_format($aqpinjaman[11],0,',','.')." &nbsp</td>";
                        echo "<td align='right'>".number_format($aqpinjaman[12],0,',','.')." &nbsp</td>";
                        }
                    }
                echo "<input type='hidden' name='sidxus' value=".$sidxus."><input type='hidden' name='susername' value=".$susername."><input type='hidden' name='spassword' value=".$spassword."><input type='hidden' name='slevel' value=".$slevel.">";
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>