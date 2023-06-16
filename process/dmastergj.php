<?php
	if (isset($submit))
		{
		switch ($submit) 
			{
			case 'back':
			$qminid = $connection->query("select min(idxmg) from mastergj;");
			if ($aqminid = mysqli_fetch_array($qminid))
				{ $minid = $aqminid[0]; }
			if ($tidxmg == $minid)
				{ $message = "Sudah sampai data terawal."; }
			else
				{
				do  
					{
					$tidxmg--;
					$qmastergj  = $connection->query("select * from mastergj where idxmg='$tidxmg';");
					$jqmastergj = mysqli_num_rows($qmastergj);
					if ($jqmastergj>0)
						{
						if ($aqmastergj = mysqli_fetch_array($qmastergj))
							{
							$tidxmg = $aqmastergj[0];
							break;
							}
						}
					} while (($jqmastergj==0) and ($tidxmg > $minid));
				}
			break;

			case 'next':
			$qmaksid = $connection->query("select max(idxmg) from mastergj;");
			if ($aqmaksid = mysqli_fetch_array($qmaksid))
				{ $maksid = $aqmaksid[0]; }
			if ($tidxmg == $maksid)
				{ $message = "Sudah sampai data terakhir."; }
			else
				{
				do  
					{
					$tidxmg++;
					$qmastergj  = $connection->query("select * from mastergj where idxmg='$tidxmg';");
					$jqmastergj = mysqli_num_rows($qmastergj);
					if ($jqmastergj>0)
						{
						if ($aqmastergj = mysqli_fetch_array($qmastergj))
							{
							$tidxmg = $aqmastergj[0];
							break;
							}
						}
					} while (($jqmastergj==0) and ($tidxmg < $maksid));
				}
			break;

			case 'new':
			// Append blank, clear all column
			$idxmg      = 0;
			$maksidxmg  = 0;
			$qmaksidxmg = $connection->query("select max(idxmg) from mastergj;");
			if ($amaksidxmg  = mysqli_fetch_array($qmaksidxmg))
				{ $maksidxmg = $amaksidxmg[0]; }
			$idxmg      = $maksidxmg+1;
			$tglinput   = date("Y-m-d");
			$qinsert    = $connection->query("insert into mastergj (idxmg,tglinput) values('$idxmg','$tglinput');");
			$tidxmg     = $idxmg;
			break;
			
			case 'update':
			$qnama = $connection->query("select nama from pegawai where kode='$tkode';");
			if ($aqnama  = mysqli_fetch_array($qnama))
				{ $tnama = $aqnama[0]; }
			$ttotal     = preg_replace("/[^0-9]/", "", "$ttotal");
			$tangsuran  = $ttotal / $tjangkapj;
			$ttglmulpj  = date_create($ttglmulpj);
			$ttglmulpj  = date_format($ttglmulpj,"Y-m-d");
			$ttgllunas  = date_create($ttgllunas);
			$ttgllunas  = date_format($ttgllunas,"Y-m-d");
			$tsisa      = $ttotal - ($tangsuran*$tjangkapj);
			$tgpbl      = preg_replace("/[^0-9]/", "", "$tgpbl");
			$tgphr      = preg_replace("/[^0-9]/", "", "$tgphr");
			$tumhr      = preg_replace("/[^0-9]/", "", "$tumhr");
			$tuthr      = preg_replace("/[^0-9]/", "", "$tuthr");
			$tthdr      = preg_replace("/[^0-9]/", "", "$tthdr");
			$ttlain     = preg_replace("/[^0-9]/", "", "$ttlain");
			$tnlembur1  = preg_replace("/[^0-9]/", "", "$tnlembur1");
			$tnlembur2  = preg_replace("/[^0-9]/", "", "$tnlembur2");
			$tbpjstk    = preg_replace("/[^0-9]/", "", "$tbpjstk");
			$tbpjsks    = preg_replace("/[^0-9]/", "", "$tbpjsks");
			$tpph21     = preg_replace("/[^0-9]/", "", "$tpph21");
			$tuthr      = preg_replace("/[^0-9]/", "", "$tuthr");
			$trealisasi = preg_replace("/[^0-9]/", "", "$trealisasi");
			$tnunpaid   = preg_replace("/[^0-9]/", "", "$tnunpaid");
			$tntelat    = preg_replace("/[^0-9]/", "", "$tntelat");
			$qupdate    = $connection->query("update mastergj set kode='$tkode',nama='$tnama',gpbl='$tgpbl',gphr='$tgphr',umhr='$tumhr',uthr='$tuthr',thdr='$tthdr',tlain='$ttlain',bpjstk='$tbpjstk',bpjsks='$tbpjsks',pph21='$tpph21',tglmulpj='$ttglmulpj',tgllunas='$ttgllunas',jangkapj='$tjangkapj',total='$ttotal',realisasi='$trealisasi',angsuran='$tangsuran',nunpaid='$tnunpaid',ntelat='$tntelat' where idxmg ='$tidxmg';"); 
			// Hapus jadwal angsuran yang lama dan input ulang data angsuran yang baru.
			if (!empty($cupdtang))
				{
				$qdelpinj       = $connection->query("delete from pinjaman where kode='$tkode';");
				$titip          = 0;
				$sisa           = $ttotal;
				//
				for($counter=0;$counter<$tjangkapj;$counter++)
					{
					$nomorang   = $counter+1;	
					$titip      = $titip+$tangsuran;
					$sisa	    = $sisa-$tangsuran;
					$tglbayar   = date("Y-m-t",strtotime("+$counter month"));
					$idxpj      = 0;
					$maksidxpj  = 0;
					$qmaksidxpj = $connection->query("select max(idxpj) from pinjaman;");
					if ($amaksidxpj  = mysqli_fetch_array($qmaksidxpj))
						{ $maksidxpj = $amaksidxpj[0]; }
					$idxpj      = $maksidxpj+1;
					$qinsert    = $connection->query("insert into pinjaman (idxpj,kode,nama,tglmulai,tgllunas,jangka,total,realisasi,tglbayar,nomorang,bayar,titip,sisa) values('$idxpj','$tkode','$tnama','$ttglmulpj','$ttgllunas','$tjangkapj','$ttotal','$trealisasi','$tglbayar','$nomorang','$tangsuran','$titip','$sisa');");
					}
				}
			break;

			case 'delete':
			$qdelete  = $connection->query("delete from mastergj where idxmg ='$tidxmg';");
			// Setelah delete, menuju ke data sebelumnya.
			$qminid = $connection->query("select min(idxmg) from mastergj;");
			if ($aqminid = mysqli_fetch_array($qminid))
				{ $minid = $aqminid[0]; }
			if ($tidxmg == $minid)
				{ $message = "Sudah sampai data terawal."; }
			else
				{
				do  
					{
					$tidxmg--;
					$qol  = $connection->query("select * from mastergj where idxmg='$tidxmg';");
					$jqol = mysqli_num_rows($qol);
					if ($jqol>0)
						{
						if ($aqol = mysqli_fetch_array($qol))
							{
							$tidxmg = $aqol[0];
							break;
							}
						}
					} while (($jqol==0) and ($tidxmg > $minid));
				}
			break;
			}
		}
?>