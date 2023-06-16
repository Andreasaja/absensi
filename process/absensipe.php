<?php
	if (isset($submit))
		{
		if ($submit == "rekapabsensi")
			{
			// Calculate sum dari absensi harian (masuk=total hari kerja-tidak masuk,tidak masuk = alpha+cuti+paid+unpaid+sakit).
			$pawal    = date_create($pawal);
	        $pawal    = date_format($pawal,"Y-m-d");
	        $pakhir   = date_create($pakhir);
	        $pakhir   = date_format($pakhir,"Y-m-d");
	        $qpegawai = $connection->query("select kode,nama,jabatan,lokasi from pegawai where staktif='Y';");
	        while ($aqpegawai = mysqli_fetch_array($qpegawai))
				{
				$totpaid     = 0;
				$totunpaid   = 0;
				$totalpha    = 0;
				$totcuti     = 0;
				$totsakit    = 0;
				$tottmasuk   = 0;
				$tottelat    = 0;
				$totlemburdt = 0;
				$totlembur1  = 0;
				$totlembur2  = 0;
				$kode        = $aqpegawai[0];
				$nama        = $aqpegawai[1];
				$jabatan     = $aqpegawai[2];
				$lokasi      = $aqpegawai[3];
				$qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and kode='$kode';");
				while ($aqabsensihr = mysqli_fetch_array($qabsensihr))
					{
					$tstabs = $aqabsensihr[15];
					switch ($tstabs) 
						{
						case 'Libur(S)':
						$totpaid = $totpaid + 1;
						break;

						case 'Masuk':
						$totpaid = $totpaid + 1;
						break;

						case 'Masuk(C)':
						$totpaid = $totpaid + 1;
						break;

						case 'Paid':
						$totpaid = $totpaid + 1;
						break;
							
						case 'Unpaid':
						$totunpaid = $totunpaid + 1;
						break;

						case 'Alpha':
						$totalpha = $totalpha + 1;
						break;
							
						case 'Cuti':
						$totcuti = $totcuti + 1;
						break;

						case 'Sakit':
						$totsakit = $totsakit + 1;
						break;
						}
					if ($aqabsensihr[11] > 0)
						{ $tottelat   = $tottelat + $aqabsensihr[11]; }
					if ($aqabsensihr[12] > 0)
						{ $totlemburdt = $totlemburdt + $aqabsensihr[12]; }
					if ($aqabsensihr[13] > 0)
						{ $totlembur1 = $totlembur1 + $aqabsensihr[13]; }
					if ($aqabsensihr[14] > 0)
						{ $totlembur2 = $totlembur2 + $aqabsensihr[14]; }
					}
				$tottmasuk = $totunpaid+$totalpha+$totcuti+$totsakit;
				// Basis perhitungan 25 hari kerja.
				$totmasuk     = 25 - $tottmasuk;
				$npawal  	  = date_create($pawal);
		        $npawal  	  = date_format($npawal,"d-m-Y");
		        $npakhir 	  = date_create($pakhir);
		        $npakhir 	  = date_format($npakhir,"d-m-Y");
				$periode 	  = $npawal . " - " . $npakhir;
				$qcabsensipe  = $connection->query("select idxpe from absensipe where periode='$periode' and kode='$kode';");
				if (mysqli_num_rows($qcabsensipe) == 0)
					{ 
					$idxpe     = 0;
					$maksidx   = 0;
					$qmaksidx  = $connection->query("select max(idxpe) from absensipe;");
					if ($amaksidx = mysqli_fetch_array($qmaksidx))
						{ $maksidx = $amaksidx[0]; }
					$idxpe    = $maksidx+1;
					$qinsert  = $connection->query("insert into absensipe (idxpe,periode,kode,nama,jabatan,lokasi,masuk,tmasuk,paid,unpaid,alpha,cuti,sakit,telat,lemburdt,lembur1,lembur2) values ('$idxpe','$periode','$kode','$nama','$jabatan','$lokasi','$totmasuk','$tottmasuk','$totpaid','$totunpaid','$totalpha','$totcuti','$totsakit','$tottelat','$totlemburdt','$totlembur1','$totlembur2');"); 
					}
				else
					{
					$qupdate = $connection->query("update absensipe set masuk='$totmasuk',tmasuk='$tottmasuk',paid='$totpaid',unpaid='$totunpaid',alpha='$totalpha',cuti='$totcuti',sakit='$totsakit',tottelat='$tottelat',totlemburdt='$totlemburdt',totlembur1='$totlembur1',totlembur2='$totlembur2' where periode='$periode' and kode='$kode';");
					}
				// Auto delete jika ada baris data yang tidak valid.
				$qdabsensipe  = $connection->query("delete from absensipe where kode=' ' and nama=' ';");
				}
			}
		else
			{
			$idxrp     = 0;
			$pawal     = date_create($pawal);
	        $pawal     = date_format($pawal,"Y-m-d");
	        $pakhir    = date_create($pakhir);
	        $pakhir    = date_format($pakhir,"Y-m-d");
	        $totmasuk  = 25 - $tottmasuk;
			$npawal    = date_create($pawal);
		    $npawal    = date_format($npawal,"d-m-Y");
		    $npakhir   = date_create($pakhir);
		    $npakhir   = date_format($npakhir,"d-m-Y");
			$periode   = $npawal . " - " . $npakhir;
			// Sementara hanya bisa untuk 1 periode saja
			$qtruncate  = $connection->query("truncate table rinabsensipe;");
			// Ambil data pegawai yang aktif
	        $qpegawai  = $connection->query("select kode from pegawai where staktif='Y';");
	        while ($aqpegawai = mysqli_fetch_array($qpegawai))
				{
				$totpaid     = 0;
				$totunpaid   = 0;
				$totalpha    = 0;
				$totcuti     = 0;
				$totsakit    = 0;
				$tottmasuk   = 0;
				$tottelat    = 0;
				$totlemburdt = 0;
				$totlembur1  = 0;
				$totlembur2  = 0;
				$kode        = $aqpegawai[0];
				$qabsensihr  = $connection->query("select * from absensihr where tglabs >= '$pawal' and tglabs <= '$pakhir' and kode='$kode';");
				while ($aqabsensihr = mysqli_fetch_array($qabsensihr))
					{
					$thari       = $aqabsensihr[5];
					$ttglabs     = $aqabsensihr[6];
					$tjammsk     = $aqabsensihr[7];
					$tjampul     = $aqabsensihr[8];
					$tlemburby   = $aqabsensihr[10];
					$ttelat      = $aqabsensihr[11];
					$tlemburdt   = $aqabsensihr[12];
					$tlembur1    = $aqabsensihr[13];
					$tlembur2    = $aqabsensihr[14];
					$tstabs      = $aqabsensihr[15];
					$tketerangan = $aqabsensihr[16];
					switch ($tstabs) 
						{
						case 'Libur(S)':
						$totpaid = $totpaid + 1;
						break;

						case 'Masuk':
						$totpaid = $totpaid + 1;
						break;

						case 'Masuk(C)':
						$totpaid = $totpaid + 1;
						break;

						case 'Paid':
						$totpaid = $totpaid + 1;
						break;
							
						case 'Unpaid':
						$totunpaid = $totunpaid + 1;
						break;

						case 'Alpha':
						$totalpha = $totalpha + 1;
						break;
							
						case 'Cuti':
						$totcuti = $totcuti + 1;
						break;

						case 'Sakit':
						$totsakit = $totsakit + 1;
						break;
						}
					if ($aqabsensihr[11] > 0)
						{ $tottelat   = $tottelat + $aqabsensihr[11]; }
					if ($aqabsensihr[12] > 0)
						{ $totlemburdt = $totlemburdt + $aqabsensihr[12]; }
					if ($aqabsensihr[13] > 0)
						{ $totlembur1 = $totlembur1 + $aqabsensihr[13]; }
					if ($aqabsensihr[14] > 0)
						{ $totlembur2 = $totlembur2 + $aqabsensihr[14]; }
					$tottmasuk = $totpaid+$totunpaid+$totalpha+$totcuti+$totsakit;
					$qcabsensipe  = $connection->query("select idxrp from rinabsensipe where tglabs='$ttglabs' and kode='$kode';");
					if (mysqli_num_rows($qcabsensipe) == 0)
						{ 
						$maksidx  = 0;
						$qmaksidx = $connection->query("select max(idxrp) from rinabsensipe;");
						if ($amaksidx = mysqli_fetch_array($qmaksidx))
							{ $maksidx = $amaksidx[0]; }
						$idxrp    = $maksidx+1;
						if (empty($tjammsk)) { $tjammsk='00:00:00'; }
						if (empty($tjampul)) { $tjampul='00:00:00'; }
						if (empty($tlemburby)) { $tlemburby='0'; }
						if (empty($ttelat)) { $ttelat='0'; }
						if (empty($tlemburdt)) { $tlemburdt='0'; }
						if (empty($tlembur1)) { $tlembur1='0'; }
						if (empty($tlembur2)) { $tlembur2='0'; }
						
						$qinsert  = $connection->query("insert into rinabsensipe (idxrp,periode,kode,hari,tglabs,jammsk,jampul,lemburby,telat,lemburdt,lembur1,lembur2,stabs,keterangan) values ('$idxrp','$periode','$kode','$thari','$ttglabs','$tjammsk','$tjampul','$tlemburby','$ttelat','$tlemburdt','$tlembur1','$tlembur2','$tstabs','$tketerangan');"); 
						}
					else
						{
						$qupdate = $connection->query("update rinabsensipe set hari='$thari',tglabs='$ttglabs',jammsk='$tjammsk',jampul='$tjampul',lemburby='$tlemburby',telat='$ttelat',lemburdt='$tlemburdt',lembur1='$tlembur1',lembur2='$tlembur2',stabs='$tstabs',keterangan='$tketerangan' where periode='$periode' and kode='$kode';"); 
						}
					}
				}
			// Insert into tperiode
			$qcperiode = $connection->query("select periode from tperiode where periode='$periode';");
			if (mysqli_num_rows($qcperiode) == 0)
				{ $qinsert = $connection->query("insert into tperiode (periode) values ('$periode');"); }
			}
		}
?>