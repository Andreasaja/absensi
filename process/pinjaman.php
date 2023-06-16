<?php
	if (isset($submit))
		{
		switch ($submit) 
			{
			case 'new':
			// Append blank, clear all column
			$idxpj      = 0;
			$maksidxpj  = 0;
			$qmaksidxpj = $connection->query("select max(idxpj) from pinjaman;");
			if ($amaksidxpj  = mysqli_fetch_array($qmaksidxpj))
				{ $maksidxpj = $amaksidxpj[0]; }
			$idxpj      = $maksidxpj+1;
			$tglbayar   = date("Y-m-d");
			$qinsert    = $connection->query("insert into pinjaman (idxpj,tglbayar) values('$idxpj','$tglbayar');");
			$tidxpj     = $idxpj;
			break;
			
			case 'update':
			for($counter=1;$counter<=$maxcount;$counter++)
				{
				if(!empty($cupdate[$counter]))
					{ 
					$qnama = $connection->query("select nama from pegawai where kode='$tkode[$counter]';");
					if ($aqnama  = mysqli_fetch_array($qnama))
						{ $tnama = $aqnama[0]; }
					$tglbayar    = date_create($ttglbayar[$counter]);
					$tglbayar    = date_format($tglbayar,"Y-m-d");
					$qupdate     = $connection->query("update pinjaman set kode='$tkode[$counter]',nama='$tnama',tglmulai='$tglmulai',tgllunas='$tgllunas',jangka='$tjangka',total='$ttotal[$counter]',realisasi='$trealisasi[$counter]',tglbayar='$tglbayar',nomorang='$tnomorang[$counter]',bayar='$tbayar[$counter]',titip='$ttitip[$counter]',sisa='$tsisa[$counter]' where idxpj ='$tidxpj[$counter]';"); 
					}
				}
			break;

			case 'delete':
			for($counter=1;$counter<=$maxcount;$counter++)
				{
				if(!empty($cdelete[$counter]))
					{ $qdelete = $connection->query("delete from pinjaman where idxpj ='$tidxpj[$counter]';"); }
				}
			break;
			}
		}
?>