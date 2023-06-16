<?php
	switch ($submit)
		{
		case 'new':	
		// Only append blank record.
		$maxidx  = 0;
		$qmaxidx = $connection->query("select max(idxus) from user;");
		if ($amaxidx = mysqli_fetch_array($qmaxidx))
			{ $maxidx = $amaxidx[0]; }
		$idxus = $maxidx+1;
		$new   = $connection->query("insert into user (idxus) values ('$idxus');");
		break;

		case 'update':
		for($counter1=1;$counter1<=$maxcount;$counter1++)
			{
			if(!empty($cupdate[$counter1]))
				{
				include ('user_checkbox2.php');
				$npassword = md5($tpassword[$counter1]);
				$qupdate   = $connection->query("update user set kode='$tkode[$counter1]',nama='$tnama[$counter1]',divisi='$tdivisi[$counter1]',username='$tusername[$counter1]',password='$npassword',level='$tlevel[$counter1]',lokasi='$tlokasi[$counter1]',fuser='$tfuser',fkalender='$tfkalender',fpegawai='$tfpegawai',flembur='$tflembur',flemburapp='$tflemburapp',fabsensihr='$tfabsensihr',fabsensipe='$tfabsensipe',fmastergj='$tfmastergj',fslipgaji='$tfslipgaji',fdokumen='$tfdokumen' where idxus ='$tidxus[$counter1]';");
				}
			}
		break;

		case 'delete':
		for($counter2=1;$counter2<=$maxcount;$counter2++)
			{
			if(!empty($cdelete[$counter2]))
				{ $qdelete = $connection->query("delete from user where idxus ='$tidxus[$counter2]';");	}
			}
		break;
		}
?>