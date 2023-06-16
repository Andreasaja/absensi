<?php
	if (isset($submit))
		{
		switch ($submit) 
			{
			case 'new':
			// Append blank, clear all column
			$idxpp      = 0;
			$maksidxpp  = 0;
			$qmaksidxpp = $connection->query("select max(idxpp) from rinpph21;");
			if ($amaksidxpp  = mysqli_fetch_array($qmaksidxpp))
				{ $maksidxpp = $amaksidxpp[0]; }
			$idxpp      = $maksidxpp+1;
			$tglinpp   = date("Y-m-d");
			$qinsert    = $connection->query("insert into rinpph21 (idxpp,tglinpp) values('$idxpp','$tglinpp');");
			$tidxpp     = $idxpp;
			break;
			
			case 'update':
			for($counter=1;$counter<=$maxcount;$counter++)
				{
				if(!empty($cupdate[$counter]))
					{ 
					$qnama = $connection->query("select nama from pegawai where kode='$tkode[$counter]';");
					if ($aqnama  = mysqli_fetch_array($qnama))
						{ $tnama = $aqnama[0]; }
					$qupdate     = $connection->query("update rinpph21 set kode='$tkode[$counter]',nama='$tnama',phtahun='$tphtahun[$counter]',bonthr='$tbonthr[$counter]',ptkpth='$tptkpth[$counter]',pkpth='$tpkpth[$counter]',pphth='$tpphth[$counter]',pphbl='$tpphbl[$counter]' where idxpp ='$tidxpp[$counter]';"); 
					// update table master gaji bagian kolom pph21/bulan dengan data yang terbaru.
					$qupdate     = $connection->query("update mastergj set pph21='$tpphbl[$counter]' where kode ='$tkode[$counter]';"); 
					}
				}
			break;

			case 'delete':
			for($counter=1;$counter<=$maxcount;$counter++)
				{
				if(!empty($cdelete[$counter]))
					{ $qdelete = $connection->query("delete from rinpph21 where idxpp ='$tidxpp[$counter]';"); }
				}
			break;
			}
		}
?>