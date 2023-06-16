<?php
	switch ($submit) {
		case 'updmskrj':
		$qallpegawai = $connection->query("select idxpg,tgljoin from pegawai;");
		while ($aallpegawai = mysqli_fetch_array($qallpegawai))
			{
			$idxpg        = $aallpegawai[0];
			$tgljoin      = date_create($aallpegawai[1]);
			$tgljoin      = date_format($tgljoin,"Y-m-d");
			$masakrj      = calmasakrj($tgljoin);
			$qupdatemskrj = $connection->query("update pegawai set masakrj = '$masakrj' where idxpg='$idxpg';"); 
			}
		break;

		case 'new':
		// Only append blank record.
		$maxidx  = 0;
		$qmaxidx = $connection->query("select max(idxpg) from pegawai;");
		if ($amaxidx = mysqli_fetch_array($qmaxidx))
			{ $maxidx = $amaxidx[0]; }
		$idx     = $maxidx+1;
		$nama    = "-";
		$lokasi  = "Karanganyar";
		$new     = $connection->query("insert into pegawai (idxpg,lokasi,nama) values ('$idx','$lokasi','$nama');");
		break;

		case 'update':
		if (isset($maxcount))
			{
			for($counter1=1;$counter1<=$maxcount;$counter1++)
				{
				if(!empty($cupdate[$counter1]))
					{ 
					$tgljoin = date_create($ttgljoin[$counter1]);
					$tgljoin = date_format($tgljoin,"Y-m-d");
					$tgllhr  = date_create($ttgllhr[$counter1]);
					$tgllhr  = date_format($tgllhr,"Y-m-d");
					$isd     = 'T';
					$ism     = 'T';
					$masakrj = calmasakrj($tgljoin);
					if (!empty($cstaktif[$counter1]))
						{ $tstaktif = 'Y'; }
					else
						{ $tstaktif = 'T'; }
					switch ($tjabatan[$counter1]) {
						case 'Driver':
						$isd = 'Y';
						break;

						case 'Kepala Divisi/Sales/BDM':
						$ism = 'Y';
						break;

						case 'Marketing':
						$ism = 'Y';
						break;

						case 'Sales':
						$ism = 'Y';
						break;

						case 'Sales/Business Development':
						$ism = 'Y';
						break;

						case 'Sales/Teknisi':
						$ism = 'Y';
						break;

						case 'Sales Ass.Leader':
						$ism = 'Y';
						break;

						case 'Staff Marketing':
						$ism = 'Y';
						break;
					}
					$qupdate = $connection->query("update pegawai set kode = '$tkode[$counter1]',nama = '$tnama[$counter1]',perusahaan = '$tperusahaan[$counter1]',jabatan = '$tjabatan[$counter1]',tgljoin = '$tgljoin',masakrj = '$masakrj',status = '$tstatus[$counter1]',grup = '$tgrup[$counter1]',lokasi = '$tlokasi[$counter1]',jumhrkrj = '$tjumhrkrj[$counter1]',totcuti = '$ttotcuti[$counter1]',staktif = '$tstaktif',isd = '$isd',ism = '$ism',alamat = '$talamat[$counter1]',telpon = '$ttelpon[$counter1]',tgllhr = '$tgllhr',noktp = '$tnoktp[$counter1]',stnikah = '$tstnikah[$counter1]',agama = '$tagama[$counter1]',email = '$temail[$counter1]',nonpwp = '$tnonpwp[$counter1]',nobpjsks = '$tnobpjsks[$counter1]',nobpjstk = '$tnobpjstk[$counter1]' where idxpg='$tidxpg[$counter1]';"); 
					// Foto.	
					$tfototmpname = $_FILES["tfoto$counter1"]["tmp_name"];
					$tfotoname    = $_FILES["tfoto$counter1"]["name"];
				    $tfototype    = $_FILES["tfoto$counter1"]["type"];
				    $tfotosize    = $_FILES["tfoto$counter1"]["size"];
				    $tfotoaddress = "../images/" . $tfotoname;
				    if (isset($tfototmpname) and !empty($tfototmpname)) 
				        {
					    if ($tfototype = "image/jpeg" or $tfototype = "image/jpg" or $tfototype = "image/gif")
							{
							if ($tfotosize <= 500000)
								{
								move_uploaded_file($tfototmpname, $tfotoaddress);
									
					        	$qupdate = $connection->query("update pegawai set foto='$tfotoaddress' where idxpg ='$tidxpg[$counter1]';");
								}
							}
						}
					}
				}
			}
		break;

		case 'delete':
		if (isset($maxcount))
			{
			for($counter2=1;$counter2<=$maxcount;$counter2++)
				{
				if(!empty($cdelete[$counter2]))
					{ $qdelete = $connection->query("delete from pegawai where idxpg ='$tidxpg[$counter2]';"); }
				}
			break;
			}
		}
?>