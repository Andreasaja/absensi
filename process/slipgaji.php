<?php
	if (isset($submit))
		{
		switch ($submit) 
			{
			case 'csvsinchronyze':
			// Import data dari tabel temporary tambahkan ke tabel absensi harian.
			$qtslipgaji   = $connection->query("select * from tslipgaji;");
			while ($aqtslipgaji = mysqli_fetch_array($qtslipgaji))
				{
				$idxsg         = 0;
				$maksidx       = 0;
				$qmaksidx      = $connection->query("select max(idxsg) from slipgaji;");
				if ($amaksidx  = mysqli_fetch_array($qmaksidx))
					{ $maksidx = $amaksidx[0]; }
				$idxsg         = $maksidx+1;
				$cek           = 1;
				$tperiode      = $aqtslipgaji[0];
				$tkode         = $aqtslipgaji[1];
				$tnama         = $aqtslipgaji[2];
				$tperusahaan   = $aqtslipgaji[3];
				$temail        = $aqtslipgaji[4];
				$tnomorhp      = $aqtslipgaji[5];
				$tgapok        = criptper_text(1,$aqtslipgaji[6]);
				$tgapokhr      = criptper_text(1,$aqtslipgaji[7]);
				$tumaperhr     = criptper_text(1,$aqtslipgaji[8]);
				$tutrperhr     = criptper_text(1,$aqtslipgaji[9]);
				$thrkerja      = criptper_text(1,$aqtslipgaji[10]);
				$tlembur1      = criptper_text(1,$aqtslipgaji[11]);
				$tlembur2      = $aqtslipgaji[12];
				$tuma          = criptper_text(1,$aqtslipgaji[13]);
				$tutransport   = criptper_text(1,$aqtslipgaji[14]);
				$ttunkeh       = criptper_text(1,$aqtslipgaji[15]);
				$ttunlainnya   = criptper_text(1,$aqtslipgaji[16]);
				$tulembur      = criptper_text(1,$aqtslipgaji[17]);
				$tfreetepe1    = $aqtslipgaji[18];
				$tnomfreetepe1 = criptper_text(1,$aqtslipgaji[19]);
				$tfreetepe2    = $aqtslipgaji[20];
				$tnomfreetepe2 = criptper_text(1,$aqtslipgaji[21]);
				$tfreetepe3    = $aqtslipgaji[22];
				$tnomfreetepe3 = criptper_text(1,$aqtslipgaji[23]);
				$tfreetepe4    = $aqtslipgaji[24];
				$tnomfreetepe4 = criptper_text(1,$aqtslipgaji[25]);
				$tfreetepe5    = $aqtslipgaji[26];
				$tnomfreetepe5 = criptper_text(1,$aqtslipgaji[27]);
				$tfreetepe6    = $aqtslipgaji[28];
				$tnomfreetepe6 = criptper_text(1,$aqtslipgaji[29]);
				$tbpjstk       = criptper_text(1,$aqtslipgaji[30]);
				$tbpjsks       = criptper_text(1,$aqtslipgaji[31]);
				$tpph21        = criptper_text(1,$aqtslipgaji[32]);
				$tpinjaman     = criptper_text(1,$aqtslipgaji[33]);
				$tpotunle      = criptper_text(1,$aqtslipgaji[34]);
				$tterlambat    = criptper_text(1,$aqtslipgaji[35]);
				$tfreetepo1    = $aqtslipgaji[36];
				$tnomfreetepo1 = criptper_text(1,$aqtslipgaji[37]);
				$tfreetepo2    = $aqtslipgaji[38];
				$tnomfreetepo2 = criptper_text(1,$aqtslipgaji[39]);
				$ttotal        = criptper_text(1,$aqtslipgaji[40]);
				$qslipgaji     = $connection->query("select idxsg from slipgaji where kode='$tkode' and periode='$tperiode';");
				if (mysqli_num_rows($qslipgaji) > 0)
					{ $qupdate = $connection->query("update slipgaji set nama='$tnama',perusahaan='$tperusahaan',email='$temail',nomorhp='$tnomorhp',gapok='$tgapok',gapokhr='$tgapokhr',umaperhr='$tumaperhr',utrperhr='$tutrperhr',hrkerja='$thrkerja',lembur1='$tlembur1',lembur2='$tlembur2',uma='$tuma',utransport='$tutransport',tunkeh='$ttunkeh',tunlainnya='$ttunlainnya',ulembur='$tulembur',freetepe1='$tfreetepe1',nomfreetepe1='$tnomfreetepe1',freetepe2='$tfreetepe2',nomfreetepe2='$tnomfreetepe2',freetepe3='$tfreetepe3',nomfreetepe3='$tnomfreetepe3',freetepe4='$tfreetepe4',nomfreetepe4='$tnomfreetepe4',freetepe5='$tfreetepe5',nomfreetepe5='$tnomfreetepe5',freetepe6='$tfreetepe6',nomfreetepe6='$tnomfreetepe6',bpjstk='$tbpjstk',bpjsks='$tbpjsks',pph21='$tpph21',pinjaman='$tpinjaman',potunle='$tpotunle',terlambat='$tterlambat',freetepo1='$tfreetepo1',nomfreetepo1='$tnomfreetepo1',freetepo2='$tfreetepo2',nomfreetepo2='$tnomfreetepo2',total='$ttotal' where periode='$tperiode' and kode='$tkode';"); }
				else
					{ $qinsert = $connection->query("insert into slipgaji (idxsg,periode,kode,nama,perusahaan,email,nomorhp,gapok,gapokhr,umaperhr,utrperhr,hrkerja,lembur1,lembur2,uma,utransport,tunkeh,tunlainnya,ulembur,freetepe1,nomfreetepe1,freetepe2,nomfreetepe2,freetepe3,nomfreetepe3,freetepe4,nomfreetepe4,freetepe5,nomfreetepe5,freetepe6,nomfreetepe6,bpjstk,bpjsks,pph21,pinjaman,potunle,terlambat,freetepo1,nomfreetepo1,freetepo2,nomfreetepo2,total) values ('$idxsg','$tperiode','$tkode','$tnama','$tperusahaan','$temail','$tnomorhp','$tgapok','$tgapokhr','$tumaperhr','$tutrperhr','$thrkerja','$tlembur1','$tlembur2','$tuma','$tutransport','$ttunkeh','$ttunlainnya','$tulembur','$tfreetepe1','$tnomfreetepe1','$tfreetepe2','$tnomfreetepe2','$tfreetepe3','$tnomfreetepe3','$tfreetepe4','$tnomfreetepe4','$tfreetepe5','$tnomfreetepe5','$tfreetepe6','$tnomfreetepe6','$tbpjstk','$tbpjsks','$tpph21','$tpinjaman','$tpotunle','$tterlambat','$tfreetepo1','$tnomfreetepo1','$tfreetepo2','$tnomfreetepo2','$ttotal');"); }
				// Insert into tperiode
				$qcperiode = $connection->query("select periode from tperiode where periode='$tperiode';");
				if (mysqli_num_rows($qcperiode) == 0)
					{ $qinsert = $connection->query("insert into tperiode (periode) values ('$tperiode');"); }
			    }
			break;

			case 'websinchronyze':
			$pawal1  = date_create($pawal);
	        $pawal1  = date_format($pawal1,"Y-m-d");
	        $pakhir1 = date_create($pakhir);
	        $pakhir1 = date_format($pakhir1,"Y-m-d");
	        $pawal2  = date_create($pawal);
	        $pawal2  = date_format($pawal2,"d/m/Y");
	        $pakhir2 = date_create($pakhir);
            $pakhir2 = date_format($pakhir2,"d/m/Y");
            $periode = $pawal2. " - " .$pakhir2;
			// 1. Masukkan rekap totalan kolom2 absensi ke tabel slip gaji sesuai kolom2 nya.
			// 2. Masukkan data-data master gaji yang berupa data mandiri ke dalam tabel slip gaji.
			// 3. Lakukan perhitungan gabungan antara absensi,master gaji untuk menampilkan angka2 pada kolom slip 
			//    gaji.
			$qpegawai = $connection->query("select kode,nama,perusahaan,email,telpon from pegawai where staktif='Y';");
			while ($aqpegawai = mysqli_fetch_array($qpegawai))
				{
				// Reset semua angka nominal kolom slip gaji
				$thrkerja      = 0;
				$totunpaid     = 0;
				$tottelat      = 0;
				$totlemburby   = 0;
				$tlembur1      = 0;
				$tlembur2      = 0;
				$tgapok        = 0;
				$tgapokhr      = 0;
				$tumaperhr     = 0;
				$tutrperhr     = 0;
				$ttunkeh       = 0;
				$ttunlainnya   = 0;
				$tbpjstk       = 0;
				$tbpjsks       = 0;
				$tpph21        = 0;
				$tpinjaman     = 0;
				$tpotunle      = 0;
				$tterlambat    = 0;
				$tuma          = 0;
				$tutransport   = 0;
				$tulembur      = 0;
				$idxsg         = 0;
				$maksidx       = 0;
				$qmaksidx      = $connection->query("select max(idxsg) from slipgaji;");
				if ($amaksidx  = mysqli_fetch_array($qmaksidx))
					{ $maksidx = $amaksidx[0]; }
				$idxsg         = $maksidx+1;
				$tkode         = $aqpegawai[0];
				$tnama         = $aqpegawai[1];
				$tperusahaan   = $aqpegawai[2];
				$temail        = $aqpegawai[3];
				$tnomorhp      = $aqpegawai[4];
				// 1. Ambil data absensi
				$qabsensi     = $connection->query("select jammsk,jampul,lemburby,telat,stabs from absensihr where kode='$tkode' and tglabs >= '$pawal1' and tglabs <= '$pakhir1';");
				while ($aqabsensi = mysqli_fetch_array($qabsensi))
					{
					$tjammsk   = $aqabsensi[0];
					$tjampul   = $aqabsensi[1];
					$tlemburby = $aqabsensi[2];
					$ttelat    = $aqabsensi[3];
					$tstabs    = $aqabsensi[4];
					// a. Hitung jumlah hari masuk kerja dan jumlah hari unpaid/alpha.
					switch ($tstabs) 
						{
						case 'Libur(S)':
						$thrkerja = $thrkerja + 1;
						break;

						case 'Masuk':
						$thrkerja = $thrkerja + 1;
						break;

						case 'Masuk(C)':
						$thrkerja = $thrkerja + 1;
						break;

						case 'Paid':
						$thrkerja = $thrkerja + 1;
						break;
							
						case 'Unpaid':
						$totunpaid = $totunpaid + 1;
						break;

						case 'Alpha':
						$totunpaid = $totunpaid + 1;
						break;
							
						case 'Cuti':
						$thrkerja = $thrkerja + 1;
						break;

						case 'Sakit':
						$thrkerja = $thrkerja + 1;
						break;
						}
					// b. jumlah menit terlambat.
					if ($ttelat > 0)
						{ $tottelat   = $tottelat + $ttelat; }
					// c. jumlah jam lembur1 dan jam lembur 2 diambil dari data lemburby/spl
					if ($tlemburby >= 1)
						{ 
						$tlembur1 = $tlembur1 + 1; 
						$tlembur2 = $tlembur2 + ($tlemburby-1);
						}
					}
				/// 2. Ambil data master gaji
				$qmastergj     = $connection->query("select gpbl,gphr,umhr,uthr,thdr,tlain,bpjstk,bpjsks,pph21,angsuran,nunpaid,ntelat from mastergj where kode='$tkode';");
				while ($aqmastergj = mysqli_fetch_array($qmastergj))
					{
					$tgapok      = $aqmastergj[0];
					$tgapokhr    = $aqmastergj[1];
					$tumaperhr   = $aqmastergj[2];
					$tutrperhr   = $aqmastergj[3];
					$ttunkeh     = $aqmastergj[4];
					$ttunlainnya = $aqmastergj[5];
					$tbpjstk     = $aqmastergj[6];
					$tbpjsks     = $aqmastergj[7];
					$tpph21      = $aqmastergj[8];
					$tpinjaman   = $aqmastergj[9];
					$tpotunle    = $aqmastergj[10];
					$tterlambat  = $aqmastergj[11];
					}
				// Kolom2 perhitungan gabungan : tabel absensi dan tabel master gaji :
				// Uang makan bulanan
				$tuma        = round($thrkerja * $tumaperhr);
				// Uang transport bulanan
				$tutransport = round($thrkerja * $tutrperhr);
				// Nominal lembur 1
				//$tulembur   = ((30*$tgapokhr)/173)*1.5*$tlembur1;
				// Nominal lembur 2
				//$tulembur   = $tulembur + (((30*$tgapokhr)/173)*2*$tlembur2);
				// Potongan unleave/unpaid
				$tpotunle   = round($totunpaid * $tpotunle);
				// Potongan terlambat
				$tterlambat = round($tottelat * $tterlambat);
				// Total Gaji Diterima 
				$ttotal     = 0;
				$tgapok        = criptper_text(1,$tgapok);
				$tgapokhr      = criptper_text(1,$tgapokhr);
				$tumaperhr     = criptper_text(1,$tumaperhr);
				$tutrperhr     = criptper_text(1,$tutrperhr);
				$thrkerja      = criptper_text(1,$thrkerja);
				$tlembur1      = criptper_text(1,$tlembur1);
				$tlembur2      = $tlembur2;
				$tuma          = criptper_text(1,$tuma);
				$tutransport   = criptper_text(1,$tutransport);
				$ttunkeh       = criptper_text(1,$ttunkeh);
				$ttunlainnya   = criptper_text(1,$ttunlainnya);
				$tulembur      = criptper_text(1,$tulembur);
				$tnomfreetepe1 = criptper_text(1,0);
				$tnomfreetepe2 = criptper_text(1,0);
				$tnomfreetepe3 = criptper_text(1,0);
				$tnomfreetepe4 = criptper_text(1,0);
				$tnomfreetepe5 = criptper_text(1,0);
			    $tnomfreetepe6 = criptper_text(1,0);
				$tbpjstk       = criptper_text(1,$tbpjstk);
				$tbpjsks       = criptper_text(1,$tbpjsks);
				$tpph21        = criptper_text(1,$tpph21);
				$tpinjaman     = criptper_text(1,$tpinjaman);
				$tpotunle      = criptper_text(1,$tpotunle);
				$tterlambat    = criptper_text(1,$tterlambat);
				$tnomfreetepo1 = criptper_text(1,0);
				$tnomfreetepo2 = criptper_text(1,0);
				$ttotal        = criptper_text(1,0);
				// Masukkan hasil link : 1. kolom2 data absensi, 2. kolom2 data master gaji, 3. kolom gabungan ke dalam tabel slip gaji.
				// Input 5 variable : 1.$totpaid,2.$totunpaid,3.$tottelat,4.$totlembur1,5.$totlembur2 ke table slip gaji.
				$qslipgaji     = $connection->query("select idxsg from slipgaji where kode='$tkode' and periode='$tperiode';");
				// kolom-kolom yang belum ada nilainya : uma (uang makan bulanan = )
				if (mysqli_num_rows($qslipgaji) > 0)
					{ $qupdate = $connection->query("update slipgaji set nama='$tnama',perusahaan='$tperusahaan',email='$temail',nomorhp='$tnomorhp',gapok='$tgapok',gapokhr='$tgapokhr',umaperhr='$tumaperhr',utrperhr='$tutrperhr',hrkerja='$thrkerja',lembur1='$tlembur1',lembur2='$tlembur2',uma='$tuma',utransport='$tutransport',tunkeh='$ttunkeh',tunlainnya='$ttunlainnya',ulembur='$tulembur',nomfreetepe1='$tnomfreetepe1',nomfreetepe2='$tnomfreetepe2',nomfreetepe3='$tnomfreetepe3',nomfreetepe4='$tnomfreetepe4',nomfreetepe5='$tnomfreetepe5',nomfreetepe6='$tnomfreetepe6',bpjstk='$tbpjstk',bpjsks='$tbpjsks',pph21='$tpph21',pinjaman='$tpinjaman',potunle='$tpotunle',terlambat='$tterlambat',nomfreetepo1='$tnomfreetepo1',nomfreetepo2='$tnomfreetepo2',total='$ttotal' where periode='$periode' and kode='$tkode';"); }
				else
					{ $qinsert = $connection->query("insert into slipgaji (idxsg,periode,kode,nama,perusahaan,email,nomorhp,gapok,gapokhr,umaperhr,utrperhr,hrkerja,lembur1,lembur2,uma,utransport,tunkeh,tunlainnya,ulembur,nomfreetepe1,nomfreetepe2,nomfreetepe3,nomfreetepe4,nomfreetepe5,nomfreetepe6,bpjstk,bpjsks,pph21,pinjaman,potunle,terlambat,nomfreetepo1,nomfreetepo2,total) values ('$idxsg','$periode','$tkode','$tnama','$tperusahaan','$temail','$tnomorhp','$tgapok','$tgapokhr','$tumaperhr','$tutrperhr','$thrkerja','$tlembur1','$tlembur2','$tuma','$tutransport','$ttunkeh','$ttunlainnya','$tulembur','$tnomfreetepe1','$tnomfreetepe2','$tnomfreetepe3','$tnomfreetepe4','$tnomfreetepe5','$tnomfreetepe6','$tbpjstk','$tbpjsks','$tpph21','$tpinjaman','$tpotunle','$tterlambat','$tnomfreetepo1','$tnomfreetepo2','$ttotal');"); }
				// Insert into tperiode
				$qcperiode = $connection->query("select periode from tperiode where periode='$periode';");
				if (mysqli_num_rows($qcperiode) == 0)
					{ $qinsert = $connection->query("insert into tperiode (periode) values ('$periode');"); }
			    }
			break;

			case 'duplicate':
			$qdslipgaji = $connection->query("select * from slipgaji where periode = '$operiode';");
			while ($aqdslipgaji = mysqli_fetch_array($qdslipgaji))
				{ 
				$qceksg = $connection->query("select idxsg from slipgaji where periode='$nperiode' and kode='$aqdslipgaji[2]';");
				if (mysqli_num_rows($qceksg) == 0)
		        	{	
					$maxidx  = 0;
					$qmaxidx = $connection->query("select max(idxsg) from slipgaji;");
					if ($amaxidx = mysqli_fetch_array($qmaxidx))
						{ $maxidx = $amaxidx[0]; }
					$idxsg   = $maxidx+1;
					$qinsert = $connection->query("insert into slipgaji (idxsg,periode,kode,nama,perusahaan,email,nomorhp,gapok,gapokhr,umaperhr,utrperhr,hrkerja,lembur1,lembur2,uma,utransport,tunkeh,tunlainnya,ulembur,nomfreetepe1,nomfreetepe2,nomfreetepe3,nomfreetepe4,nomfreetepe5,nomfreetepe6,bpjstk,bpjsks,pph21,pinjaman,potunle,terlambat,nomfreetepo1,nomfreetepo2,total) values ('$idxsg','$nperiode','$aqdslipgaji[2]','$aqdslipgaji[3]','$aqdslipgaji[4]','$aqdslipgaji[5]','$aqdslipgaji[6]','$aqdslipgaji[7]','$aqdslipgaji[8]','$aqdslipgaji[9]','$aqdslipgaji[10]','$aqdslipgaji[11]','$aqdslipgaji[12]','$aqdslipgaji[13]','$aqdslipgaji[14]','$aqdslipgaji[15]','$aqdslipgaji[16]','$aqdslipgaji[17]','$aqdslipgaji[18]','$aqdslipgaji[20]','$aqdslipgaji[22]','$aqdslipgaji[24]','$aqdslipgaji[26]','$aqdslipgaji[28]','$aqdslipgaji[30]','$aqdslipgaji[31]','$aqdslipgaji[32]','$aqdslipgaji[33]','$aqdslipgaji[34]','$aqdslipgaji[35]','$aqdslipgaji[36]','$aqdslipgaji[38]','$aqdslipgaji[40]','$aqdslipgaji[41]');");
					}
				else
					{
					$qupdate = $connection->query("update slipgaji set nama='$aqdslipgaji[3]',perusahaan='$aqdslipgaji[4]',email='$aqdslipgaji[5]',nomorhp='$aqdslipgaji[6]',gapok='$aqdslipgaji[7]',gapokhr='$aqdslipgaji[8]',umaperhr='$aqdslipgaji[9]',utrperhr='$aqdslipgaji[10]',hrkerja='$aqdslipgaji[11]',lembur1='$aqdslipgaji[12]',lembur2='$aqdslipgaji[13]',uma='$aqdslipgaji[14]',utransport='$aqdslipgaji[15]',tunkeh='$aqdslipgaji[16]',tunlainnya='$aqdslipgaji[17]',ulembur='$aqdslipgaji[18]',bpjstk='$aqdslipgaji[31]',bpjsks='$aqdslipgaji[32]',pph21='$aqdslipgaji[33]',pinjaman='$aqdslipgaji[34]',potunle='$aqdslipgaji[35]',terlambat='$aqdslipgaji[36]',total='$aqdslipgaji[41]' where periode='$nperiode' and kode='$aqdslipgaji[2]';");
					}	
				}
			$fperiode = $nperiode;
			// Insert into tperiode
			$qcperiode = $connection->query("select periode from tperiode where periode='$nperiode';");
			if (mysqli_num_rows($qcperiode) == 0)
				{ $qinsert = $connection->query("insert into tperiode (periode) values ('$nperiode');"); }
			break;

			case 'mailbomber':
			// send to email
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
	                    $qslipgaji = $connection->query("select * from slipgaji where periode = '$fperiode' and perusahaan = '$keyword' order by tglabs,jabatan asc;"); 
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
					$to             = "-";
					$subject        = "-";
					$message        = "-";
					$headers        = "-";
					$tperiode       = $aqslipgaji[1];
					$tkode          = $aqslipgaji[2];
					$tnama          = $aqslipgaji[3];
					$tperusahaan    = $aqslipgaji[4];
					$temail         = $aqslipgaji[5];
					$tnomorhp       = $aqslipgaji[6];
					$tgapok         = intval(criptper_text(2,$aqslipgaji[7]));
	                $tgapokhr       = intval(criptper_text(2,$aqslipgaji[8]));
	                $tumaperhr      = intval(criptper_text(2,$aqslipgaji[9]));
	                $tutrperhr      = intval(criptper_text(2,$aqslipgaji[10]));
	                $thrkerja       = intval(criptper_text(2,$aqslipgaji[11]));
	                $tlembur1       = intval(criptper_text(2,$aqslipgaji[12]));
	                $tlembur2       = $aqslipgaji[13];
	                $tuma           = intval(criptper_text(2,$aqslipgaji[14]));
	                $tutransport    = intval(criptper_text(2,$aqslipgaji[15]));
	                $ttunkeh        = intval(criptper_text(2,$aqslipgaji[16]));
	                $ttunlainnya    = intval(criptper_text(2,$aqslipgaji[17]));
	                $tulembur       = intval(criptper_text(2,$aqslipgaji[18]));
	                $tnomfreetepe1  = intval(criptper_text(2,$aqslipgaji[20]));
	                $tnomfreetepe2  = intval(criptper_text(2,$aqslipgaji[22]));
	                $tnomfreetepe3  = intval(criptper_text(2,$aqslipgaji[24]));
	                $tnomfreetepe4  = intval(criptper_text(2,$aqslipgaji[26]));
	                $tnomfreetepe5  = intval(criptper_text(2,$aqslipgaji[28]));
	                $tnomfreetepe6  = intval(criptper_text(2,$aqslipgaji[30]));
	                $tbpjstk        = intval(criptper_text(2,$aqslipgaji[31]));
	                $tbpjsks        = intval(criptper_text(2,$aqslipgaji[32]));
	                $tpph21         = intval(criptper_text(2,$aqslipgaji[33]));
	                $tpinjaman      = intval(criptper_text(2,$aqslipgaji[34]));
	                $tpotunle       = intval(criptper_text(2,$aqslipgaji[35]));
	                $tterlambat     = intval(criptper_text(2,$aqslipgaji[36]));
	                $tnomfreetepo1  = intval(criptper_text(2,$aqslipgaji[38]));
	                $tnomfreetepo2  = intval(criptper_text(2,$aqslipgaji[40]));
	                $ttotal         = intval(criptper_text(2,$aqslipgaji[41]));
					$ntgapok        = number_format($tgapok,0,',','.');
					$ntgapokhr      = number_format($tgapokhr,0,',','.');
					$ntumaperhr     = number_format($tumaperhr,0,',','.');
					$ntutrperhr     = number_format($tutrperhr,0,',','.');
					$ntuma          = number_format($tuma,0,',','.');
					$ntutransport   = number_format($tutransport,0,',','.');
					$nttunkeh       = number_format($ttunkeh,0,',','.');
					$nttunlainnya   = number_format($ttunlainnya,0,',','.');
					$ntulembur      = number_format($tulembur,0,',','.');
					$tfreetepe1     = $aqslipgaji[19];
					$ntnomfreetepe1 = number_format($tnomfreetepe1,0,',','.');
					$tfreetepe2     = $aqslipgaji[21];
					$ntnomfreetepe2 = number_format($tnomfreetepe2,0,',','.');
					$tfreetepe3     = $aqslipgaji[23];
					$ntnomfreetepe3 = number_format($tnomfreetepe3,0,',','.');
					$tfreetepe4     = $aqslipgaji[25];
					$ntnomfreetepe4 = number_format($tnomfreetepe4,0,',','.');
					$tfreetepe5     = $aqslipgaji[27];
					$ntnomfreetepe5 = number_format($tnomfreetepe5,0,',','.');
					$tfreetepe6     = $aqslipgaji[29];
					$ntnomfreetepe6 = number_format($tnomfreetepe6,0,',','.');
					$ntbpjstk       = number_format($tbpjstk,0,',','.');
					$ntbpjsks       = number_format($tbpjsks,0,',','.');
					$ntpph21        = number_format($tpph21,0,',','.');
					$ntpinjaman     = number_format($tpinjaman,0,',','.');
					$ntpotunle      = number_format($tpotunle,0,',','.');
					$ntterlambat    = number_format($tterlambat,0,',','.');
					$tfreetepo1     = $aqslipgaji[37];
					$ntnomfreetepo1 = number_format($tnomfreetepo1,0,',','.');
					$tfreetepo2     = $aqslipgaji[39];
					$ntnomfreetepo2 = number_format($tnomfreetepo2,0,',','.');
					$nttotal        = number_format($ttotal,0,',','.');
					$totalpen       = $tgapok+$tuma+$tutransport+$ttunkeh+$ttunlainnya+$tulembur+$tnomfreetepe1+$tnomfreetepe2+$tnomfreetepe3+$tnomfreetepe4+$tnomfreetepe5+$tnomfreetepe6;
					$ntotalpen      = number_format($totalpen,0,',','.');
		            $totalpot       = $tbpjstk+$tbpjsks+$tpph21+$tpinjaman+$tpotunle+$tterlambat+$tnomfreetepo1+$tnomfreetepo2;
		            $ntotalpot      = number_format($totalpot,0,',','.');
		            $terima         = $ttotal;
		            $nterima        = number_format($terima,0,',','.');
					// To
					$to = $temail;
					// Subject
					$subject  = "SLIP GAJI KARYAWAN PERIODE : " . $tperiode;
					// Message Content
					$message .= "<table border='0' cellpadding='0' cellspacing='0' width='50%'><tr height='50' bgcolor='#AAAAFF'><td width='20%'></td><td width='25%'></td><td width='5%'></td><td width='40%'><b><u>SLIP GAJI KARYAWAN</u></b></td><td></td></tr>" ;
					$message .= "<tr bgcolor='#DDDDDD'><td></td><td>Nama</td><td>:</td><td align='right'>$tnama</td><td></td></tr>" ;
					$message .= "<tr bgcolor='#DDDDDD'><td></td><td>Perusahaan</td><td>:</td><td align='right'>$tperusahaan</td><td></td></tr>" ;
					$message .= "<tr bgcolor='#DDDDDD'><td></td><td>Periode</td><td>:</td><td align='right'>$tperiode</td><td></td></tr>" ;
					$message .= "<tr bgcolor='#DDDDFF'><td></td><td>DATA</td><td></td><td></td><td></td></tr>" ;
					$message .= "<tr bgcolor='#DDDDFF'><td></td><td>Gaji Pokok</td><td>:</td><td align='right'>$ntgapok</td><td></td></tr>" ;
					$message .= "<tr bgcolor='#DDDDFF'><td></td><td>Gaji Pokok/hr</td><td>:</td><td align='right'>$ntgapokhr</td><td></td></tr>" ;
					$message .= "<tr bgcolor='#DDDDFF'><td></td><td>Uang Makan/hr</td><td>:</td><td align='right'>$ntumaperhr</td><td></td></tr>" ;
					$message .= "<tr bgcolor='#DDDDFF'><td></td><td>Uang Tranport/hr</td><td>:</td><td align='right'>$ntutrperhr</td><td></td></tr>" ;
					$message .= "<tr bgcolor='#DDDDFF'><td></td><td>Hari kerja</td><td>:</td><td align='right'>$thrkerja</td><td></td></tr>" ;
					$message .= "<tr bgcolor='#DDDDFF'><td></td><td>Lembur 1</td><td>:</td><td align='right'>$tlembur1</td><td></td></tr>" ;
					$message .= "<tr bgcolor='#DDDDFF'><td></td><td>Lembur 2</td><td>:</td><td align='right'>$tlembur2</td><td></td></tr>" ;
					$message .= "<tr bgcolor='#DDEEFF'><td></td><td>PENDAPATAN</td><td></td><td></td><td></td></tr>" ;
					$message .= "<tr bgcolor='#DDEEFF'><td></td><td>Gaji Pokok</td><td>:</td><td align='right'>$ntgapok</td><td></td></tr>" ;
					$message .= "<tr bgcolor='#DDEEFF'><td></td><td>Uang Makan</td><td>:</td><td align='right'>$ntuma</td><td></td></tr>" ;
					$message .= "<tr bgcolor='#DDEEFF'><td></td><td>Uang Transport</td><td>:</td><td align='right'>$ntutransport</td><td></td></tr>" ;
					$message .= "<tr bgcolor='#DDEEFF'><td></td><td>Tunjangan Kehadiran</td><td>:</td><td align='right'>$nttunkeh</td><td></td></tr>" ;
					$message .= "<tr bgcolor='#DDEEFF'><td></td><td>Tunjangan Lainnya</td><td>:</td><td align='right'>$nttunlainnya</td><td></td></tr>" ;
					$message .= "<tr bgcolor='#DDEEFF'><td></td><td>Uang Lembur</td><td>:</td><td align='right'>$ntulembur</td><td></td></tr>" ;
					if ($tnomfreetepe1>0)
						{ $message .= "<tr bgcolor='#DDEEFF'><td></td><td>".$tfreetepe1."</td><td>:</td><td align='right'>".$ntnomfreetepe1."</td><td></td></tr>" ; }
					if ($tnomfreetepe2>0)
						{ $message .= "<tr bgcolor='#DDEEFF'><td></td><td>".$tfreetepe2."</td><td>:</td><td align='right'>".$ntnomfreetepe2."</td><td></td></tr>" ; }
					if ($tnomfreetepe3>0)
						{ $message .= "<tr bgcolor='#DDEEFF'><td></td><td>".$tfreetepe3."</td><td>:</td><td align='right'>".$ntnomfreetepe3."</td><td></td></tr>" ; }
					if ($tnomfreetepe4>0)
						{ $message .= "<tr bgcolor='#DDEEFF'><td></td><td>".$tfreetepe4."</td><td>:</td><td align='right'>".$ntnomfreetepe4."</td><td></td></tr>" ; }
					if ($tnomfreetepe5>0)
						{ $message .= "<tr bgcolor='#DDEEFF'><td></td><td>".$tfreetepe5."</td><td>:</td><td align='right'>".$ntnomfreetepe5."</td><td></td></tr>" ; }
					if ($tnomfreetepe6>0)
						{ $message .= "<tr bgcolor='#DDEEFF'><td></td><td>".$tfreetepe6."</td><td>:</td><td align='right'>".$ntnomfreetepe6."</td><td></td></tr>" ; }
					$message .= "<tr bgcolor='#DDEEFF'><td></td><td><b>Total Pendapatan</b></td><td><b>:</b></td><td align='right'><b>$ntotalpen</b></td><td></td></tr>" ;
					$message .= "<tr bgcolor='#FFEEEE'><td></td><td>POTONGAN</td><td></td><td></td><td></td></tr>" ;
					$message .= "<tr bgcolor='#FFEEEE'><td></td><td>BPJS TK</td><td>:</td><td align='right'>$ntbpjstk</td><td></td></tr>" ;
					$message .= "<tr bgcolor='#FFEEEE'><td></td><td>BPJS KS</td><td>:</td><td align='right'>$ntbpjsks</td><td></td></tr>" ;
					$message .= "<tr bgcolor='#FFEEEE'><td></td><td>PPH 21</td><td>:</td><td align='right'>$ntpph21</td><td></td></tr>" ;
					$message .= "<tr bgcolor='#FFEEEE'><td></td><td>Pinjaman</td><td>:</td><td align='right'>$ntpinjaman</td><td></td></tr>" ;
					$message .= "<tr bgcolor='#FFEEEE'><td></td><td>Unpaid/Leave</td><td>:</td><td align='right'>".$ntpotunle."</td><td></td></tr>" ;
					$message .= "<tr bgcolor='#FFEEEE'><td></td><td>Terlambat</td><td>:</td><td align='right'>".$ntterlambat."</td><td></td></tr>" ;
					if ($tnomfreetepo1>0)
						{ $message .= "<tr bgcolor='#FFEEEE'><td></td><td>".$tfreetepo1."</td><td>:</td><td align='right'>".$ntnomfreetepo1."</td><td></td></tr>" ; }
					if ($tnomfreetepo2>0)
						{ $message .= "<tr bgcolor='#FFEEEE'><td></td><td>".$tfreetepo2."</td><td>:</td><td align='right'>".$ntnomfreetepo2."</td><td></td></tr>" ; }
					$message .= "<tr bgcolor='#FFEEEE'><td></td><td><b>Total Potongan</b></td><td><b>:</b></td><td align='right'><b>$ntotalpot</b></td><td></td></tr>" ;
					$message .= "<tr bgcolor='#FFAAAA' height='50'><td></td><td><b>TOTAL TERIMA</b></td><td><b>:</b></td><td align='right'><b> Rp $nterima,00 </b></td><td></td></tr></table>" ;				
					// Always set content-type when sending HTML email
					$headers = "MIME-Version: 1.0" . "\r\n";
					$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
					// More headers
					$headers .= 'From: <hrd@sinargrafindo.com>' . "\r\n";
					//$headers .= 'Cc: elisa@basingapore.com' . "\r\n";
					//$headers .= 'Bcc: nikkei_m@yahoo.com' . "\r\n";
					mail($to,$subject,$message,$headers);
					} 
				}
			// send to whatsapp
			// send to telegram
			break;

			case 'mailsender':
			// send to email.
			for($counter=1;$counter<=$maxcount;$counter++)
				{
				if(!empty($cmsender[$counter]))
					{ 	
					$qslipgaji = $connection->query("select * from slipgaji where idxsg = '$tidxsg[$counter]';");
					if ($aqslipgaji = mysqli_fetch_array($qslipgaji))
						{ 
						$to             = "-";
						$subject        = "-";
						$message        = "-";
						$headers        = "-";
						$tperiode       = $aqslipgaji[1];
						$tkode          = $aqslipgaji[2];
						$tnama          = $aqslipgaji[3];
						$tperusahaan    = $aqslipgaji[4];
						$temail         = $aqslipgaji[5];
						$tnomorhp       = $aqslipgaji[6];
						$tgapok         = intval(criptper_text(2,$aqslipgaji[7]));
		                $tgapokhr       = intval(criptper_text(2,$aqslipgaji[8]));
		                $tumaperhr      = intval(criptper_text(2,$aqslipgaji[9]));
		                $tutrperhr      = intval(criptper_text(2,$aqslipgaji[10]));
		                $thrkerja       = intval(criptper_text(2,$aqslipgaji[11]));
		                $tlembur1       = intval(criptper_text(2,$aqslipgaji[12]));
		                $tlembur2       = $aqslipgaji[13];
		                $tuma           = intval(criptper_text(2,$aqslipgaji[14]));
		                $tutransport    = intval(criptper_text(2,$aqslipgaji[15]));
		                $ttunkeh        = intval(criptper_text(2,$aqslipgaji[16]));
		                $ttunlainnya    = intval(criptper_text(2,$aqslipgaji[17]));
		                $tulembur       = intval(criptper_text(2,$aqslipgaji[18]));
		                $tnomfreetepe1  = intval(criptper_text(2,$aqslipgaji[20]));
		                $tnomfreetepe2  = intval(criptper_text(2,$aqslipgaji[22]));
		                $tnomfreetepe3  = intval(criptper_text(2,$aqslipgaji[24]));
		                $tnomfreetepe4  = intval(criptper_text(2,$aqslipgaji[26]));
		                $tnomfreetepe5  = intval(criptper_text(2,$aqslipgaji[28]));
		                $tnomfreetepe6  = intval(criptper_text(2,$aqslipgaji[30]));
		                $tbpjstk        = intval(criptper_text(2,$aqslipgaji[31]));
		                $tbpjsks        = intval(criptper_text(2,$aqslipgaji[32]));
		                $tpph21         = intval(criptper_text(2,$aqslipgaji[33]));
		                $tpinjaman      = intval(criptper_text(2,$aqslipgaji[34]));
		                $tpotunle       = intval(criptper_text(2,$aqslipgaji[35]));
		                $tterlambat     = intval(criptper_text(2,$aqslipgaji[36]));
		                $tnomfreetepo1  = intval(criptper_text(2,$aqslipgaji[38]));
		                $tnomfreetepo2  = intval(criptper_text(2,$aqslipgaji[40]));
		                $ttotal         = intval(criptper_text(2,$aqslipgaji[41]));
						$ntgapok        = number_format($tgapok,0,',','.');
						$ntgapokhr      = number_format($tgapokhr,0,',','.');
						$ntumaperhr     = number_format($tumaperhr,0,',','.');
						$ntutrperhr     = number_format($tutrperhr,0,',','.');
						$ntuma          = number_format($tuma,0,',','.');
						$ntutransport   = number_format($tutransport,0,',','.');
						$nttunkeh       = number_format($ttunkeh,0,',','.');
						$nttunlainnya   = number_format($ttunlainnya,0,',','.');
						$ntulembur      = number_format($tulembur,0,',','.');
						$tfreetepe1     = $aqslipgaji[19];
						$ntnomfreetepe1 = number_format($tnomfreetepe1,0,',','.');
						$tfreetepe2     = $aqslipgaji[21];
						$ntnomfreetepe2 = number_format($tnomfreetepe2,0,',','.');
						$tfreetepe3     = $aqslipgaji[23];
						$ntnomfreetepe3 = number_format($tnomfreetepe3,0,',','.');
						$tfreetepe4     = $aqslipgaji[25];
						$ntnomfreetepe4 = number_format($tnomfreetepe4,0,',','.');
						$tfreetepe5     = $aqslipgaji[27];
						$ntnomfreetepe5 = number_format($tnomfreetepe5,0,',','.');
						$tfreetepe6     = $aqslipgaji[29];
						$ntnomfreetepe6 = number_format($tnomfreetepe6,0,',','.');
						$ntbpjstk       = number_format($tbpjstk,0,',','.');
						$ntbpjsks       = number_format($tbpjsks,0,',','.');
						$ntpph21        = number_format($tpph21,0,',','.');
						$ntpinjaman     = number_format($tpinjaman,0,',','.');
						$ntpotunle      = number_format($tpotunle,0,',','.');
						$ntterlambat    = number_format($tterlambat,0,',','.');
						$tfreetepo1     = $aqslipgaji[37];
						$ntnomfreetepo1 = number_format($tnomfreetepo1,0,',','.');
						$tfreetepo2     = $aqslipgaji[39];
						$ntnomfreetepo2 = number_format($tnomfreetepo2,0,',','.');
						$nttotal        = number_format($ttotal,0,',','.');
						$totalpen       = $tgapok+$tuma+$tutransport+$ttunkeh+$ttunlainnya+$tulembur+$tnomfreetepe1+$tnomfreetepe2+$tnomfreetepe3+$tnomfreetepe4+$tnomfreetepe5+$tnomfreetepe6;
						$ntotalpen      = number_format($totalpen,0,',','.');
			            $totalpot       = $tbpjstk+$tbpjsks+$tpph21+$tpinjaman+$tpotunle+$tterlambat+$tnomfreetepo1+$tnomfreetepo2;
			            $ntotalpot      = number_format($totalpot,0,',','.');
			            $terima         = $ttotal;
			            $nterima        = number_format($terima,0,',','.');
						// To
						$to = $temail;
						// Subject
						$subject  = "SLIP GAJI KARYAWAN PERIODE : " . $tperiode;
						// Message Content
						$message .= "<table border='0' cellpadding='0' cellspacing='0' width='50%'><tr height='50' bgcolor='#AAAAFF'><td width='20%'></td><td width='25%'></td><td width='5%'></td><td width='40%'><b><u>SLIP GAJI KARYAWAN</u></b></td><td></td></tr>" ;
						$message .= "<tr bgcolor='#DDDDDD'><td></td><td>Nama</td><td>:</td><td align='right'>$tnama</td><td></td></tr>" ;
						$message .= "<tr bgcolor='#DDDDDD'><td></td><td>Perusahaan</td><td>:</td><td align='right'>$tperusahaan</td><td></td></tr>" ;
						$message .= "<tr bgcolor='#DDDDDD'><td></td><td>Periode</td><td>:</td><td align='right'>$tperiode</td><td></td></tr>" ;
						$message .= "<tr bgcolor='#DDDDFF'><td></td><td>DATA</td><td></td><td></td><td></td></tr>" ;
						$message .= "<tr bgcolor='#DDDDFF'><td></td><td>Gaji Pokok</td><td>:</td><td align='right'>$ntgapok</td><td></td></tr>" ;
						$message .= "<tr bgcolor='#DDDDFF'><td></td><td>Gaji Pokok/hr</td><td>:</td><td align='right'>$ntgapokhr</td><td></td></tr>" ;
						$message .= "<tr bgcolor='#DDDDFF'><td></td><td>Uang Makan/hr</td><td>:</td><td align='right'>$ntumaperhr</td><td></td></tr>" ;
						$message .= "<tr bgcolor='#DDDDFF'><td></td><td>Uang Tranport/hr</td><td>:</td><td align='right'>$ntutrperhr</td><td></td></tr>" ;
						$message .= "<tr bgcolor='#DDDDFF'><td></td><td>Hari kerja</td><td>:</td><td align='right'>$thrkerja</td><td></td></tr>" ;
						$message .= "<tr bgcolor='#DDDDFF'><td></td><td>Lembur 1</td><td>:</td><td align='right'>$tlembur1</td><td></td></tr>" ;
						$message .= "<tr bgcolor='#DDDDFF'><td></td><td>Lembur 2</td><td>:</td><td align='right'>$tlembur2</td><td></td></tr>" ;
						$message .= "<tr bgcolor='#DDEEFF'><td></td><td>PENDAPATAN</td><td></td><td></td><td></td></tr>" ;
						$message .= "<tr bgcolor='#DDEEFF'><td></td><td>Gaji Pokok</td><td>:</td><td align='right'>$ntgapok</td><td></td></tr>" ;
						$message .= "<tr bgcolor='#DDEEFF'><td></td><td>Uang Makan</td><td>:</td><td align='right'>$ntuma</td><td></td></tr>" ;
						$message .= "<tr bgcolor='#DDEEFF'><td></td><td>Uang Transport</td><td>:</td><td align='right'>$ntutransport</td><td></td></tr>" ;
						$message .= "<tr bgcolor='#DDEEFF'><td></td><td>Tunjangan Kehadiran</td><td>:</td><td align='right'>$nttunkeh</td><td></td></tr>" ;
						$message .= "<tr bgcolor='#DDEEFF'><td></td><td>Tunjangan Lainnya</td><td>:</td><td align='right'>$nttunlainnya</td><td></td></tr>" ;
						$message .= "<tr bgcolor='#DDEEFF'><td></td><td>Uang Lembur</td><td>:</td><td align='right'>$ntulembur</td><td></td></tr>" ;
						if ($tnomfreetepe1>0)
							{ $message .= "<tr bgcolor='#DDEEFF'><td></td><td>".$tfreetepe1."</td><td>:</td><td align='right'>".$ntnomfreetepe1."</td><td></td></tr>" ; }
						if ($tnomfreetepe2>0)
							{ $message .= "<tr bgcolor='#DDEEFF'><td></td><td>".$tfreetepe2."</td><td>:</td><td align='right'>".$ntnomfreetepe2."</td><td></td></tr>" ; }
						if ($tnomfreetepe3>0)
							{ $message .= "<tr bgcolor='#DDEEFF'><td></td><td>".$tfreetepe3."</td><td>:</td><td align='right'>".$ntnomfreetepe3."</td><td></td></tr>" ; }
						if ($tnomfreetepe4>0)
							{ $message .= "<tr bgcolor='#DDEEFF'><td></td><td>".$tfreetepe4."</td><td>:</td><td align='right'>".$ntnomfreetepe4."</td><td></td></tr>" ; }
						if ($tnomfreetepe5>0)
							{ $message .= "<tr bgcolor='#DDEEFF'><td></td><td>".$tfreetepe5."</td><td>:</td><td align='right'>".$ntnomfreetepe5."</td><td></td></tr>" ; }
						if ($tnomfreetepe6>0)
							{ $message .= "<tr bgcolor='#DDEEFF'><td></td><td>".$tfreetepe6."</td><td>:</td><td align='right'>".$ntnomfreetepe6."</td><td></td></tr>" ; }
						$message .= "<tr bgcolor='#DDEEFF'><td></td><td><b>Total Pendapatan</b></td><td><b>:</b></td><td align='right'><b>$ntotalpen</b></td><td></td></tr>" ;
						$message .= "<tr bgcolor='#FFEEEE'><td></td><td>POTONGAN</td><td></td><td></td><td></td></tr>" ;
						$message .= "<tr bgcolor='#FFEEEE'><td></td><td>BPJS TK</td><td>:</td><td align='right'>$ntbpjstk</td><td></td></tr>" ;
						$message .= "<tr bgcolor='#FFEEEE'><td></td><td>BPJS KS</td><td>:</td><td align='right'>$ntbpjsks</td><td></td></tr>" ;
						$message .= "<tr bgcolor='#FFEEEE'><td></td><td>PPH 21</td><td>:</td><td align='right'>$ntpph21</td><td></td></tr>" ;
						$message .= "<tr bgcolor='#FFEEEE'><td></td><td>Pinjaman</td><td>:</td><td align='right'>$ntpinjaman</td><td></td></tr>" ;
						$message .= "<tr bgcolor='#FFEEEE'><td></td><td>Unpaid/Leave</td><td>:</td><td align='right'>".$ntpotunle."</td><td></td></tr>" ;
						$message .= "<tr bgcolor='#FFEEEE'><td></td><td>Terlambat</td><td>:</td><td align='right'>".$ntterlambat."</td><td></td></tr>" ;
						if ($tnomfreetepo1>0)
							{ $message .= "<tr bgcolor='#FFEEEE'><td></td><td>".$tfreetepo1."</td><td>:</td><td align='right'>".$ntnomfreetepo1."</td><td></td></tr>" ; }
						if ($tnomfreetepo2>0)
							{ $message .= "<tr bgcolor='#FFEEEE'><td></td><td>".$tfreetepo2."</td><td>:</td><td align='right'>".$ntnomfreetepo2."</td><td></td></tr>" ; }
						$message .= "<tr bgcolor='#FFEEEE'><td></td><td><b>Total Potongan</b></td><td><b>:</b></td><td align='right'><b>$ntotalpot</b></td><td></td></tr>" ;
						$message .= "<tr bgcolor='#FFAAAA' height='50'><td></td><td><b>TOTAL TERIMA</b></td><td><b>:</b></td><td align='right'><b> Rp $nterima,00 </b></td><td></td></tr></table>" ;				
						// Always set content-type when sending HTML email
						$headers = "MIME-Version: 1.0" . "\r\n";
						$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
						// More headers
						$headers .= 'From: <hrd@sinargrafindo.com>' . "\r\n";
						//$headers .= 'Cc: elisa@basingapore.com' . "\r\n";
						//$headers .= 'Bcc: nikkei_m@yahoo.com' . "\r\n";
						mail($to,$subject,$message,$headers);
						} 
					}
				}
			// send to whatsapp
			// send to telegram
			break;

			case 'new':
			// Only append blank record.
			$maxidx  = 0;
			$qmaxidx = $connection->query("select max(idxsg) from slipgaji;");
			if ($amaxidx = mysqli_fetch_array($qmaxidx))
				{ $maxidx = $amaxidx[0]; }
			$idxsg   = $maxidx+1;
			$periode = '00/00/0000 - 00/00/0000';
			$qinsert = $connection->query("insert into slipgaji (idxsg,periode,gapok,gapokhr,umaperhr,utrperhr,hrkerja,lembur1,lembur2,uma,utransport,tunkeh,tunlainnya,ulembur,nomfreetepe1,nomfreetepe2,nomfreetepe3,nomfreetepe4,nomfreetepe5,nomfreetepe6,bpjstk,bpjsks,pph21,pinjaman,potunle,terlambat,nomfreetepo1,nomfreetepo2,total) values ('$idxsg','$periode','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0','0');");
			$fperiode = $periode;
			// Insert into tperiode
			$qcperiode = $connection->query("select periode from tperiode where periode='$periode';");
			if (mysqli_num_rows($qcperiode) == 0)
				{ $qinsert = $connection->query("insert into tperiode (periode) values ('$periode');"); }
			break;

			case 'update':
			for($counter=1;$counter<=$maxcount;$counter++)
				{
				if(!empty($cupdate[$counter]))
					{ 
					$ntgapok        = preg_replace("/[^0-9]/", "", "$tgapok[$counter]");
					$ntgapokhr      = preg_replace("/[^0-9]/", "", "$tgapokhr[$counter]");
					$ntumaperhr     = preg_replace("/[^0-9]/", "", "$tumaperhr[$counter]");
					$ntutrperhr     = preg_replace("/[^0-9]/", "", "$tutrperhr[$counter]");
					$ntuma          = preg_replace("/[^0-9]/", "", "$tuma[$counter]");
					$ntutransport   = preg_replace("/[^0-9]/", "", "$tutransport[$counter]");
					$nttunkeh       = preg_replace("/[^0-9]/", "", "$ttunkeh[$counter]");
					$nttunlainnya   = preg_replace("/[^0-9]/", "", "$ttunlainnya[$counter]");
					$ntulembur      = preg_replace("/[^0-9]/", "", "$tulembur[$counter]");
					$ntnomfreetepe1 = preg_replace("/[^0-9]/", "", "$tnomfreetepe1[$counter]");
					$ntnomfreetepe2 = preg_replace("/[^0-9]/", "", "$tnomfreetepe2[$counter]");
					$ntnomfreetepe3 = preg_replace("/[^0-9]/", "", "$tnomfreetepe3[$counter]");
					$ntnomfreetepe4 = preg_replace("/[^0-9]/", "", "$tnomfreetepe4[$counter]");
					$ntnomfreetepe5 = preg_replace("/[^0-9]/", "", "$tnomfreetepe5[$counter]");
					$ntnomfreetepe6 = preg_replace("/[^0-9]/", "", "$tnomfreetepe6[$counter]");
					$ntbpjstk       = preg_replace("/[^0-9]/", "", "$tbpjstk[$counter]");
					$ntbpjsks       = preg_replace("/[^0-9]/", "", "$tbpjsks[$counter]");
					$ntpph21        = preg_replace("/[^0-9]/", "", "$tpph21[$counter]");
					$ntpinjaman     = preg_replace("/[^0-9]/", "", "$tpinjaman[$counter]");
					$ntpotunle      = preg_replace("/[^0-9]/", "", "$tpotunle[$counter]");
					$ntterlambat    = preg_replace("/[^0-9]/", "", "$tterlambat[$counter]");
					$ntnomfreetepo1 = preg_replace("/[^0-9]/", "", "$tnomfreetepo1[$counter]");
					$ntnomfreetepo2 = preg_replace("/[^0-9]/", "", "$tnomfreetepo2[$counter]");
					$nttotal        = preg_replace("/[^0-9]/", "", "$ttotal[$counter]");
					$ntgapok        = criptper_text(1,$ntgapok);
					$ntgapokhr      = criptper_text(1,$ntgapokhr);
					$ntumaperhr     = criptper_text(1,$ntumaperhr);
					$ntutrperhr     = criptper_text(1,$ntutrperhr);
					$nthrkerja      = criptper_text(1,$thrkerja[$counter]);
					$ntlembur1      = criptper_text(1,$tlembur1[$counter]);
					$ntlembur2      = $tlembur2[$counter];
					$ntuma          = criptper_text(1,$ntuma);
					$ntutransport   = criptper_text(1,$ntutransport);
					$nttunkeh       = criptper_text(1,$nttunkeh);
					$nttunlainnya   = criptper_text(1,$nttunlainnya);
					$ntulembur      = criptper_text(1,$ntulembur);
					$ntnomfreetepe1 = criptper_text(1,$ntnomfreetepe1);
					$ntnomfreetepe2 = criptper_text(1,$ntnomfreetepe2);
					$ntnomfreetepe3 = criptper_text(1,$ntnomfreetepe3);
					$ntnomfreetepe4 = criptper_text(1,$ntnomfreetepe4);
					$ntnomfreetepe5 = criptper_text(1,$ntnomfreetepe5);
					$ntnomfreetepe6 = criptper_text(1,$ntnomfreetepe6);
					$ntbpjstk       = criptper_text(1,$ntbpjstk);
					$ntbpjsks       = criptper_text(1,$ntbpjsks);
					$ntpph21        = criptper_text(1,$ntpph21);
					$ntpinjaman     = criptper_text(1,$ntpinjaman);
					$ntpotunle      = criptper_text(1,$ntpotunle);
					$ntterlambat    = criptper_text(1,$ntterlambat);
					$ntnomfreetepo1 = criptper_text(1,$ntnomfreetepo1);
					$ntnomfreetepo2 = criptper_text(1,$ntnomfreetepo2);
					$nttotal        = criptper_text(1,$nttotal);
					$qupdate        = $connection->query("update slipgaji set periode='$tperiode[$counter]',kode='$tkode[$counter]',nama='$tnama[$counter]',perusahaan='$tperusahaan[$counter]',email='$temail[$counter]',nomorhp='$tnomorhp[$counter]',gapok='$ntgapok',gapokhr='$ntgapokhr',umaperhr='$ntumaperhr',utrperhr='$ntutrperhr',hrkerja='$nthrkerja',lembur1='$ntlembur1',lembur2='$ntlembur2',uma='$ntuma',utransport='$ntutransport',tunkeh='$nttunkeh',tunlainnya='$nttunlainnya',ulembur='$ntulembur',freetepe1='$tfreetepe1[$counter]',nomfreetepe1='$ntnomfreetepe1',freetepe2='$tfreetepe2[$counter]',nomfreetepe2='$ntnomfreetepe2',freetepe3='$tfreetepe3[$counter]',nomfreetepe3='$ntnomfreetepe3',freetepe4='$tfreetepe4[$counter]',nomfreetepe4='$ntnomfreetepe4',freetepe5='$tfreetepe5[$counter]',nomfreetepe5='$ntnomfreetepe5',freetepe6='$tfreetepe6[$counter]',nomfreetepe6='$ntnomfreetepe6',bpjstk='$ntbpjstk',bpjsks='$ntbpjsks',pph21='$ntpph21',pinjaman='$ntpinjaman',potunle='$ntpotunle',terlambat='$ntterlambat',freetepo1='$tfreetepo1[$counter]',nomfreetepo1='$ntnomfreetepo1',freetepo2='$tfreetepo2[$counter]',nomfreetepo2='$ntnomfreetepo2',total='$nttotal' where idxsg ='$tidxsg[$counter]';");
					// Insert into tperiode
					$qcperiode = $connection->query("select periode from tperiode where periode='$tperiode[$counter]';");
					if (mysqli_num_rows($qcperiode) == 0)
						{ $qinsert = $connection->query("insert into tperiode (periode) values ('$tperiode[$counter]');"); }
					}
				}
			break;
			
			case 'delete':
			for($counter=1;$counter<=$maxcount;$counter++)
				{
				if(!empty($cdelete[$counter]))
					{ $qdelete = $connection->query("delete from slipgaji where idxsg ='$tidxsg[$counter]';"); }
				}
			break;
			}
		}
?>