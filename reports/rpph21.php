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
<title>REPORT DAFTAR RINCIAN PPH21 PEGAWAI</title>
</head>
<body>
    <br><center><h2>FORM RINCIAN PPH21 PEGAWAI</h2></center><br>
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
        <table align="center" width="70%" border="1" bordercolor="#eeeeee" class="h7">
            <thead align="center">
                <tr height="30">
                    <th width="3%" class="h8">&nbsp No</th>
                    <th width="8%" class="h8">&nbsp Tgl.Input</a></th>
                    <th width="10%" class="h8">&nbsp NIP</a></th>
                    <th width="25%" class="h8">&nbsp Nama</a></th>
                    <th width="9%" class="h8">&nbsp PH/tahun</a></th>
                    <th width="9%" class="h8">&nbsp PTKP/tahun</a></th>
                    <th width="9%" class="h8">&nbsp PKP/tahun</a></th>
                    <th width="9%" class="h8">&nbsp Bonus THR</a></th>
                    <th width="9%" class="h8">&nbsp PPH21/tahun</a></th>
                    <th width="9%" class="h8">&nbsp PPH21/bulan</a></th>
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
                            $qpph21  = $connection->query("select * from rinpph21 where tglinpp >= '$pawal' and tglinpp <= '$pakhir' and kode = '$keyword' order by tglinpp,kode asc;"); 
                            break;

                            case 'nama':
                            $qpph21  = $connection->query("select * from rinpph21 where tglinpp >= '$pawal' and tglinpp <= '$pakhir' and nama like '%$keyword%' order by tglinpp,nama asc;"); 
                            break;
                            }
                        }
                    else
                        { $qpph21   = $connection->query("select * from rinpph21 where tglinpp >= '$pawal' and tglinpp <= '$pakhir' order by tglinpp,nama asc;"); }
                    }
                else
                    { $qpph21   = $connection->query("select * from rinpph21 order by tglinpp,nama asc limit 100;"); }
                if (mysqli_num_rows($qpph21) > 0)
                    {
                    while ($aqpph21 = mysqli_fetch_array($qpph21))
                        {
                        $counter1 = $counter1+1;
                        $tglinpp  = date_create($aqpph21[1]);
                        $tglinpp  = date_format($tglinpp,"d-m-Y");
                        echo "<tr height='20'><td align='right'><b>".$counter1."</b> &nbsp</td>";
                        echo "<td>&nbsp ".$tglinpp."</td>";
                        echo "<td>&nbsp ".$aqpph21[2]."</td>";
                        echo "<td>&nbsp ".$aqpph21[3]."</td>";
                        echo "<td align='right'>".number_format($aqpph21[4],0,',','.')." &nbsp</td>";
                        echo "<td align='right'>".number_format($aqpph21[5],0,',','.')." &nbsp</td>";
                        echo "<td align='right'>".number_format($aqpph21[6],0,',','.')." &nbsp</td>";
                        echo "<td align='right'>".number_format($aqpph21[7],0,',','.')." &nbsp</td>";
                        echo "<td align='right'>".number_format($aqpph21[8],0,',','.')." &nbsp</td>";
                        echo "<td align='right'>".number_format($aqpph21[9],0,',','.')." &nbsp</td>";
                        }
                    }
                echo "<input type='hidden' name='sidxus' value=".$sidxus."><input type='hidden' name='susername' value=".$susername."><input type='hidden' name='spassword' value=".$spassword."><input type='hidden' name='slevel' value=".$slevel.">";
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>