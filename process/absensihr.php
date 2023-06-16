<?php
	if (isset($submit))
		{
		switch ($submit) 
			{
			case 'sinchronyze':
			// Import data dari tabel temporary tambahkan ke tabel absensi harian.
			$qtabsensihr   = $connection->query("select * from tabsensihr;");
			while ($aqtabsensihr = mysqli_fetch_array($qtabsensihr))
				{
				$vtemp1    = "";
				$vtemp2    = "";
				$vtemp3    = "";
				$vtemp4    = "";
				$vtemp5    = "";
				$vtemp6    = "";
				$vtemp7    = "";
				$vtemp8    = "";
				$vtemp9    = "";
				$vtemp10   = "";
				$vtemp11   = "";
				$inoutels  = "";
				$telat     = 0;
				$lemburdt  = 0;
				$lembur    = 0;
				$lembur1   = 0;
				$lembur2   = 0;
				$tglabs    = date_create($aqtabsensihr[3]);
				$tglabs    = date_format($tglabs,"Y-m-d");
				$idxah     = 0;
				$maksidx   = 0;
				$qmaksidx  = $connection->query("select max(idxah) from absensihr;");
				if ($amaksidx = mysqli_fetch_array($qmaksidx))
					{ $maksidx = $amaksidx[0]; }
				$idxah   = $maksidx+1;
				$kode    = $aqtabsensihr[0];
				$nama    = $aqtabsensihr[1];
				$lokasi  = $aqtabsensihr[2];
				$jabatan = "-";
				// Jikalau id,nama,jabatan,lokasi sudah ada di table pegawai maka yang digunakan adalah nama pada tabel pegawai.
				$qnamapg = $connection->query("select nama,jabatan,lokasi from pegawai where kode = '$kode';");
				if ($aqnamapg = mysqli_fetch_array($qnamapg))
					{
					$nama    = $aqnamapg[0]; 
					$jabatan = $aqnamapg[1];
					$lokasi  = $aqnamapg[2];
					}
				// **********************************************************************************************
				$hari     = date('l', strtotime($aqtabsensihr[3]));
				$jammsk   = $aqtabsensihr[4];
				$jampul   = $aqtabsensihr[5];
				if ( isset ($aqtabsensihr[6]) and $aqtabsensihr[6] != '' )
					{ $vtemp1 = "| " . substr($aqtabsensihr[6],0,5) . " | "; }
				if ( isset ($aqtabsensihr[7]) and $aqtabsensihr[7] != '' )
					{ $vtemp2 = substr($aqtabsensihr[7],0,5) .  " | "; }
				if ( isset ($aqtabsensihr[8]) and $aqtabsensihr[8] != '' )
					{ $vtemp3 = substr($aqtabsensihr[8],0,5) .  " | "; }
				if ( isset ($aqtabsensihr[9]) and $aqtabsensihr[9] != '' )
					{ $vtemp5 = substr($aqtabsensihr[9],0,5) .  " | "; }
				if ( isset ($aqtabsensihr[10]) and $aqtabsensihr[10] != '' )
					{ $vtemp6 = substr($aqtabsensihr[10],0,5).  " | "; }
				if ( isset ($aqtabsensihr[11]) and $aqtabsensihr[11] != '' )
					{ $vtemp7 = substr($aqtabsensihr[11],0,5).  " | "; }
				if ( isset ($aqtabsensihr[12]) and $aqtabsensihr[12] != '' )
					{ $vtemp8 = substr($aqtabsensihr[12],0,5).  " | "; }
				if ( isset ($aqtabsensihr[13]) and $aqtabsensihr[13] != '' )
					{ $vtemp9 = substr($aqtabsensihr[13],0,5).  " | "; }
				if ( isset ($aqtabsensihr[14]) and $aqtabsensihr[14] != '' )
					{ $vtemp10 = substr($aqtabsensihr[14],0,5).  " | "; }
				if ( isset ($aqtabsensihr[15]) and $aqtabsensihr[15] != '' )
					{ $vtemp11 = substr($aqtabsensihr[15],0,5).  " |"; }
				if ( isset ($aqtabsensihr[16]) and $aqtabsensihr[16] != '' )
					{ $vtemp11 = substr($aqtabsensihr[16],0,5).  " |"; }
				$inoutels = $vtemp1.$vtemp2.$vtemp3.$vtemp4.$vtemp5.$vtemp6.$vtemp7.$vtemp8.$vtemp9.$vtemp10.$vtemp11;
				if (($jammsk != "00:00:00") or ($jampul != "00:00:00"))
					{ 
					$stabs = "Masuk"; 
					// Hitung telat,lembur base on Jam masuk = 08.00, pulang = 16.00
					$tjammsk = strtotime($aqtabsensihr[4]);
					$tjampul = strtotime($aqtabsensihr[5]);
					// Untuk jam masuk standard nasional pusat,cabang semua sama 08.00 pagi
					if ($tjammsk > strtotime('08:00:00'))
						{
						$telat   = floor(($tjammsk - strtotime('08:00:00')) / 60);
						if ($telat<0)
							{ $telat = 0; }
						}
					// Hitung Lemburan datang dibedakan hanya berdasarkan Ob/Bukan OB saja, tidak ada pembedaan berdasarkan lokasinya (OB masuk sebelum 07.30 mulai dihitung lembur, selain OB masuk sebelum 07.30 mulai dihitung lembur).
					if ($jabatan != "OB")
						{
						if ($tjammsk > strtotime('01:00:00') and $tjammsk < strtotime('07:30:00'))
							{ $lemburdt = abs(floor(($tjammsk - strtotime('08:00:00')) / 60)); }
						}
					else
						{
						if ($tjammsk > strtotime('01:00:00') and $tjammsk < strtotime('06:30:00'))
							{ $lemburdt = abs(floor(($tjammsk - strtotime('07:00:00')) / 60)); }
						}
					// Hitung Lembur Pulang selain Jakarta, pulang 16.00
					if ($tjampul > strtotime('16:00:00') and $lokasi != 'Jakarta')
						{
						$lembur  = floor(($tjampul - strtotime('16:00:00')) / 60);
						if ($lembur<0)
							{ $lembur = 0; }
						else 
							{ 
							if ($lembur>=60)
								{
								$lembur1 = 60;
								$lembur2 = $lembur - 60;
								}
							}
						}
					// Hitung Lembur Pulang Khusus Jakarta, pulang 17.00					
					if ($tjampul > strtotime('17:00:00') and $lokasi == 'Jakarta')
						{
						$lembur  = floor(($tjampul - strtotime('17:00:00')) / 60);
						if ($lembur<0)
							{ $lembur = 0; }
						else 
							{ 
							if ($lembur>=60)
								{
								$lembur1 = 60;
								$lembur2 = $lembur - 60;
								}
							}
						}
					// Khusus OB selain Jakarta jam masuk dan pulang beda, otomatis telat dan lembur juga beda.
					if ($jabatan == "OB" and $lokasi != "Jakarta")
						{
						if ($tjammsk > strtotime('07:00:00'))
							{
							$telat   = floor(($tjammsk - strtotime('07:00:00')) / 60);
							if ($telat<0)
								{ $telat = 0; }
							}
						if ($tjampul > strtotime('15:00:00'))
							{
							//$lembur  = floor(($tjampul - strtotime('16:00:00')) / 3600);
							$lembur  = floor(($tjampul - strtotime('15:00:00')) / 60);
							if ($lembur<0)
								{ $lembur = 0; }
							else 
								{ 
								if ($lembur>=60)
									{
									$lembur1 = 60;
									$lembur2 = $lembur - 60;
									}
								}
							}
						}
					// Sementara security tidak dihitung telat/lemburnya karena jam kerjanya berbeda dan kadang 1 hari bisa masuk 2 shift.
					if ($jabatan == "Security")
					    {
					    $telat    = 0;
					    $lemburdt = 0;
					    $lembur1  = 0;
					    $lembur2  = 0;
					    }
					}
				else
					{ $stabs = "Alpha"; }
				$stdok     = "T";
				$dokumen   = '../images/blank.jpg';
				$cek       = 1;
				$qcekabsen = $connection->query("select idxah from absensihr where kode='$kode' and tglabs='$tglabs';");
				if (mysqli_num_rows($qcekabsen) > 0)
					{
					if ($aqcekabsen = mysqli_fetch_array($qcekabsen))
						{ $qupdate = $connection->query("update absensihr set jammsk='$jammsk',jampul='$jampul',inoutels='$inoutels',telat='$telat',lemburdt='$lemburdt',lembur1='$lembur1',lembur2='$lembur2',stabs='$stabs',stdok='$stdok',dokumen='$dokumen',cek='$cek' where idxah='$aqcekabsen[0]';"); }
					}
				else
					{ 
					$qinsert = $connection->query("insert into absensihr (idxah,kode,nama,jabatan,lokasi,hari,tglabs,jammsk,jampul,inoutels,telat,lemburdt,lembur1,lembur2,stabs,stdok,dokumen,cek) values ('$idxah','$kode','$nama','$jabatan','$lokasi','$hari','$tglabs','$jammsk','$jampul','$inoutels','$telat','$lemburdt','$lembur1','$lembur2','$stabs','$stdok','$dokumen','$cek');"); }
				// Auto insert jikalau ada pegawai baru tapi belum ada di daftar pegawai.
				if (!empty($kode) and !empty($nama))
					{ 
					$qcpegawai  = $connection->query("select idxpg from pegawai where kode = '$kode';");
					$jqcpegawai = mysqli_num_rows($qcpegawai);
					if ($jqcpegawai == 0)
						{ 
						$tgljoin   = date("Y-m-d");
						$idxpg     = 0;
						$maksidx   = 0;
						$qmaksidx  = $connection->query("select max(idxpg) from pegawai;");
						if ($amaksidx = mysqli_fetch_array($qmaksidx))
							{ $maksidx = $amaksidx[0]; }
						$idxpg   = $maksidx+1;
						$qinsert = $connection->query("insert into pegawai (idxpg,kode,nama,perusahaan,jabatan,tgljoin,masakrj,status,grup,lokasi,jumhrkrj,totcuti,jumcuti,sisacuti,staktif) values ('$idxpg','$kode','$nama','New','New','$tgljoin','0 th 0 bl','New','New','$lokasi','0','0','0','0','Y');");
						}
					}
				}
			break;

			case 'autoalpha':
			$tglabs   = date_create($tglabs);
			$tglabs   = date_format($tglabs,"Y-m-d");
			$hari     = date('l', strtotime($tglabs));
			$stabs    = 'Alpha';
			$stdok    = 'T';
			$dokumen  = '../images/blank.jpg';
			$cek      = '1';
			$qpegawai = $connection->query("select kode,nama,jabatan,lokasi from pegawai where staktif = 'Y';");
			while ($aqpegawai = mysqli_fetch_array($qpegawai)) 
				{ 
				$kode    = $aqpegawai[0]; 
				$nama    = $aqpegawai[1];
				$jabatan = $aqpegawai[2];
				$lokasi  = $aqpegawai[3];
				$qabsensihr = $connection->query("select idxah from absensihr where kode = '$kode' and tglabs = '$tglabs';");
				if (mysqli_num_rows($qabsensihr) == 0)
					{
					$idxah     = 0;
    				$maksidx   = 0;
    				$qmaksidx  = $connection->query("select max(idxah) from absensihr;");
    				if ($amaksidx = mysqli_fetch_array($qmaksidx))
    					{ $maksidx = $amaksidx[0]; }
    				$idxah   = $maksidx+1;
    				$qinsert = $connection->query("insert into absensihr (idxah,kode,nama,jabatan,lokasi,hari,tglabs,stabs,stdok,dokumen,cek) values ('$idxah','$kode','$nama','$jabatan','$lokasi','$hari','$tglabs','$stabs','$stdok','$dokumen','$cek');"); 
					}
				// Khusus BGM Jakarta hari Sabtu libur.
				$qabsensihr = $connection->query("delete from absensihr where lokasi = 'Jakarta' and hari = 'Saturday';");	
				}
			break;
			
			case 'autoholiday':
			$tglabs   = date_create($tglabs);
			$tglabs   = date_format($tglabs,"Y-m-d");
			$hari     = date('l', strtotime($tglabs));
			$stabs    = 'Libur(S)';
			$stdok    = 'T';
			$dokumen  = '../images/blank.jpg';
			$cek      = '1';
			$qpegawai = $connection->query("select kode,nama,jabatan,lokasi from pegawai where staktif = 'Y';");
			while ($aqpegawai = mysqli_fetch_array($qpegawai)) 
				{ 
				$kode    = $aqpegawai[0]; 
				$nama    = $aqpegawai[1];
				$jabatan = $aqpegawai[2];
				$lokasi  = $aqpegawai[3];
				$qabsensihr = $connection->query("select idxah from absensihr where kode = '$kode' and tglabs = '$tglabs';");
				if (mysqli_num_rows($qabsensihr) == 0)
					{
					$idxah     = 0;
    				$maksidx   = 0;
    				$qmaksidx  = $connection->query("select max(idxah) from absensihr;");
    				if ($amaksidx = mysqli_fetch_array($qmaksidx))
    					{ $maksidx = $amaksidx[0]; }
    				$idxah   = $maksidx+1;
    				$qinsert = $connection->query("insert into absensihr (idxah,kode,nama,jabatan,lokasi,hari,tglabs,stabs,stdok,dokumen,cek) values ('$idxah','$kode','$nama','$jabatan','$lokasi','$hari','$tglabs','$stabs','$stdok','$dokumen','$cek');"); 
					}
				}
			break;
			
			case 'autocuti':
			$tglabs1   = date_create($tglabs);
			$tglabs2   = date_format($tglabs1,"Y-m-d");
			$hari     = date('l', strtotime($tglabs2));
			$stdok    = 'T';
			$dokumen  = '../images/blank.jpg';
			$cek      = '1';
			$qpegawai = $connection->query("select kode,nama,jabatan,lokasi,tgljoin from pegawai where staktif = 'Y';");
			while ($aqpegawai = mysqli_fetch_array($qpegawai)) 
				{ 
				$kode     = $aqpegawai[0]; 
				$nama     = $aqpegawai[1];
				$jabatan  = $aqpegawai[2];
				$lokasi   = $aqpegawai[3];
				$tgljoin  = $aqpegawai[4];
				$ttgljoin = new DateTime($tgljoin);
        		if ($ttgljoin > $tglabs1) 
        		    { $ceklmjoin = 0; }
        		$ceklmjoin = $tglabs1->diff($ttgljoin)->y;
				if ($ceklmjoin < 1)
				    { $stabs    = 'Unpaid'; }
				else
				    { $stabs    = 'Cuti'; }
				$qabsensihr = $connection->query("select idxah from absensihr where kode = '$kode' and tglabs = '$tglabs2';");
				if (mysqli_num_rows($qabsensihr) == 0)
					{
					$idxah     = 0;
    				$maksidx   = 0;
    				$qmaksidx  = $connection->query("select max(idxah) from absensihr;");
    				if ($amaksidx = mysqli_fetch_array($qmaksidx))
    					{ $maksidx = $amaksidx[0]; }
    				$idxah   = $maksidx+1;
    				$qinsert = $connection->query("insert into absensihr (idxah,kode,nama,jabatan,lokasi,hari,tglabs,stabs,stdok,dokumen,cek) values ('$idxah','$kode','$nama','$jabatan','$lokasi','$hari','$tglabs2','$stabs','$stdok','$dokumen','$cek');"); 
					}
				}
			break;

			case 'add':
			$nama     = "-";
			$telat    = 0;
			$lemburdt = 0;
			$lembur   = 0;
			$lembur1  = 0;
			$lembur2  = 0;
			$qnamapg  = $connection->query("select nama,jabatan,lokasi from pegawai where kode='$kode';");
			if ($aqnamapg = mysqli_fetch_array($qnamapg)) 
				{ 
				$nama    = $aqnamapg[0]; 
				$jabatan = $aqnamapg[1]; 
				$lokasi  = $aqnamapg[2]; 
				}
			$tglabs = date_create($tglabs);
			$tglabs = date_format($tglabs,"Y-m-d");
			$hari   = date('l', strtotime($tglabs));
			if (($jammsk != "00:00:00") or ($jampul != "00:00:00"))
				{ 
				//$stabs = "Masuk"; 
				// Hitung telat,lembur base on Jam masuk = 08.00, pulang = 16.00
				$tjammsk = strtotime($jammsk);
				$tjampul = strtotime($jampul);
				// Untuk jam masuk standard nasional pusat,cabang semua sama 08.00 pagi
				if ($tjammsk > strtotime('08:00:00'))
					{
					$telat   = floor(($tjammsk - strtotime('08:00:00')) / 60);
					if ($telat<0)
						{ $telat = 0; }
					}
				// Hitung Lemburan datang dibedakan hanya berdasarkan Ob/Bukan OB saja, tidak ada pembedaan berdasarkan lokasinya (OB masuk sebelum 07.30 mulai dihitung lembur, selain OB masuk sebelum 07.30 mulai dihitung lembur).
				if ($jabatan != "OB")
					{
					if ($tjammsk > strtotime('01:00:00') and $tjammsk < strtotime('07:30:00'))
						{ $lemburdt = abs(floor(($tjammsk - strtotime('08:00:00')) / 60)); }
					}
				else
					{
					if ($tjammsk > strtotime('01:00:00') and $tjammsk < strtotime('06:30:00'))
						{ $lemburdt = abs(floor(($tjammsk - strtotime('07:00:00')) / 60)); }
					}
				// Hitung Lembur Pulang selain Jakarta, pulang 16.00
				if ($tjampul > strtotime('16:00:00') and $lokasi != 'Jakarta')
					{
					$lembur  = floor(($tjampul - strtotime('16:00:00')) / 60);
					if ($lembur<0)
						{ $lembur = 0; }
					else 
						{ 
						if ($lembur>=60)
							{
							$lembur1 = 60;
							$lembur2 = $lembur - 60;
							}
						}
					}
				// Hitung Lembur Pulang Khusus Jakarta, pulang 17.00
				if ($tjampul > strtotime('17:00:00') and $lokasi == 'Jakarta')
					{
					$lembur  = floor(($tjampul - strtotime('17:00:00')) / 60);
					if ($lembur<0)
						{ $lembur = 0; }
					else 
						{ 
						if ($lembur>=60)
							{
							$lembur1 = 60;
							$lembur2 = $lembur - 60;
							}
						}
					}
				// Khusus OB selain Jakarta jam masuk dan pulang beda, otomatis telat dan lembur juga beda.
				if ($jabatan == "OB" and $lokasi != "Jakarta")
					{
					if ($tjammsk > strtotime('07:00:00'))
						{
						$telat   = floor(($tjammsk - strtotime('07:00:00')) / 60);
						if ($telat<0)
							{ $telat = 0; }
						}
					if ($tjampul > strtotime('15:00:00'))
						{
						$lembur  = floor(($tjampul - strtotime('15:00:00')) / 60);
						if ($lembur<0)
							{ $lembur = 0; }
						else 
							{ 
							if ($lembur>=60)
								{
								$lembur1 = 60;
								$lembur2 = $lembur - 60;
								}
							}
						}
					}
				// Sementara security tidak dihitung telat/lemburnya karena jam kerjanya berbeda
				if ($jabatan == "Security")
				    {
				    $telat    = 0;
				    $lemburdt = 0;
				    $lembur1  = 0;
				    $lembur2  = 0;
				    }
				}
			$stdok     = "T";
			$dokumen   = '../images/blank.jpg';
			$cek       = '2';
			$qcekabsen = $connection->query("select idxah from absensihr where kode='$kode' and tglabs='$tglabs';");
			if (mysqli_num_rows($qcekabsen) > 0)
				{
				if ($aqcekabsen = mysqli_fetch_array($qcekabsen))
					{ $qupdate = $connection->query("update absensihr set jammsk='$jammsk',jampul='$jampul',telat='$telat',lemburdt='$lemburdt',lembur1='$lembur1',lembur2='$lembur2',stabs='$stabs',stdok='$stdok',dokumen='$dokumen',cek='$cek' where idxah='$aqcekabsen[0]';"); }
				}
			else
				{ 
				$idxah     = 0;
				$maksidx   = 0;
				$qmaksidx  = $connection->query("select max(idxah) from absensihr;");
				if ($amaksidx = mysqli_fetch_array($qmaksidx))
					{ $maksidx = $amaksidx[0]; }
				$idxah   = $maksidx+1;
				$qinsert = $connection->query("insert into absensihr (idxah,kode,nama,jabatan,lokasi,hari,tglabs,jammsk,jampul,telat,lemburdt,lembur1,lembur2,stabs,stdok,cek) values ('$idxah','$kode','$nama','$jabatan','$lokasi','$hari','$tglabs','$jammsk','$jampul','$telat','$lemburdt','$lembur1','$lembur2','$stabs','$stdok','$cek');");
				}
			break;

			case 'update':
			for($counter=1;$counter<=$maxcount;$counter++)
				{
				if(!empty($cupdate[$counter]))
					{ 
					if (empty($tlemburby[$counter]))
					    { $tlemburby[$counter] = '0'; }
					$qupdate = $connection->query("update absensihr set lemburby='$tlemburby[$counter]',stabs='$tstabs[$counter]',keterangan='$tketerangan[$counter]' where idxah ='$tidxah[$counter]';");
					}
				}
			break;
			
			case 'delete':
			for($counter=1;$counter<=$maxcount;$counter++)
				{
				if(!empty($cdelete[$counter]))
					{ $qdelete = $connection->query("delete from absensihr where idxah ='$tidxah[$counter]';"); }
				}
			break;
			}
		}
?>