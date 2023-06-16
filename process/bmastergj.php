<?php
	switch ($submit) {
		case 'new':
		// Only append blank record.
		$maxidx  = 0;
		$qmaxidx = $connection->query("select max(idxmg) from mastergj;");
		if ($amaxidx = mysqli_fetch_array($qmaxidx))
			{ $maxidx = $amaxidx[0]; }
		$idx      = $maxidx+1;
		$tglinput = date("Y-m-d");
		$tglmulpj = "1000-01-01";
		$new      = $connection->query("insert into mastergj (idxmg,tglinput,tglmulpj) values ('$idx','$tglinput','$tglmulpj');");
		break;

		case 'update':
		if (isset($maxcount))
			{
			for($counter1=1;$counter1<=$maxcount;$counter1++)
				{
				if(!empty($cupdate[$counter1]))
					{ 
					$qnama = $connection->query("select nama from pegawai where kode='$tkode[$counter1]';");
					if ($aqnama  = mysqli_fetch_array($qnama))
						{ $tnama = $aqnama[0]; }
					$tangsuran   = $ttotal[$counter1] / $tjangkapj[$counter1];
					$tglmulpj    = date_create($ttglmulpj[$counter1]);
					$tglmulpj    = date_format($tglmulpj,"Y-m-d");
					$tsisa       = $ttotal[$counter1] - ($tangsuran*$tjangkapj[$counter1]);
					$qupdate     = $connection->query("update mastergj set kode='$tkode[$counter1]',nama='$tnama',gpbl='$tgpbl[$counter1]',gphr='$tgphr[$counter1]',umhr='$tumhr[$counter1]',uthr='$tuthr[$counter1]',thdr='$tthdr[$counter1]',tlain='$ttlain[$counter1]',bpjstk='$tbpjstk[$counter1]',bpjsks='$tbpjsks[$counter1]',pph21='$tpph21[$counter1]',tglmulpj='$tglmulpj',jangkapj='$tjangkapj[$counter1]',total='$ttotal[$counter1]',realisasi='$trealisasi[$counter1]',angsuran='$tangsuran',nunpaid='$tnunpaid[$counter1]',ntelat='$tntelat[$counter1]' where idxmg ='$tidxmg[$counter1]';"); 
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
					{ $qdelete = $connection->query("delete from mastergj where idxmg ='$tidxmg[$counter2]';"); }
				}
			break;
			}
		}
?>