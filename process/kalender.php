<?php
	if (isset($submit))
		{
		switch ($submit) 
			{
			case 'new':
			// Append blank, clear all column
			$idxka     = 0;
			$maksidx   = 0;
			$qmaksidx  = $connection->query("select max(idxka) from kalender;");
			if ($amaksidx = mysqli_fetch_array($qmaksidx))
				{ $maksidx = $amaksidx[0]; }
			$idxka    = $maksidx+1;
			$tanggal  = date("Y-m-d");
			$qinsert  = $connection->query("insert into kalender (idxka,tanggal) values('$idxka','$tanggal');");
			break;
			
			case 'update':
			for($counter=1;$counter<=$maxcount;$counter++)
				{
				if(!empty($cupdate[$counter]))
					{ 
					$tanggal = date_create($ttanggal[$counter]);
					$tanggal = date_format($tanggal,"Y-m-d");
					// Auto generate bulan,hari
					$bulan   = date("F", strtotime($tanggal));
					$tahun   = date("Y", strtotime($tanggal));
					$bulan   = $bulan . " " . $tahun;
					$hari    = date('l', strtotime($tanggal));
					$qupdate = $connection->query("update kalender set bulan='$bulan',hari='$hari',tanggal='$tanggal',keterangan='$tketerangan[$counter]' where idxka ='$tidxka[$counter]';");
					}
				}
			break;
			
			case 'delete':
				for($counter=1;$counter<=$maxcount;$counter++)
					{
					if(!empty($cdelete[$counter]))
						{ $qdelete = $connection->query("delete from kalender where idxka ='$tidxka[$counter]';"); }
					}
			break;
			}
		}
?>