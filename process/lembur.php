<?php
	if (isset($submit))
		{
		switch ($submit) 
			{
			case 'back':
			$qminid = $connection->query("select min(idxle) from lembur;");
			if ($aqminid = mysqli_fetch_array($qminid))
				{ $minid = $aqminid[0]; }
			if ($tidxle == $minid)
				{ $message = "Sudah sampai data terawal."; }
			else
				{
				do  
					{
					$tidxle--;
					$qlembur  = $connection->query("select * from lembur where idxle='$tidxle';");
					$jqlembur = mysqli_num_rows($qlembur);
					if ($jqlembur>0)
						{
						if ($aqlembur = mysqli_fetch_array($qlembur))
							{
							$tidxle = $aqlembur[0];
							break;
							}
						}
					} while (($jqlembur==0) and ($tidxle > $minid));
				}
			break;

			case 'next':
			$qmaksid = $connection->query("select max(idxle) from lembur;");
			if ($aqmaksid = mysqli_fetch_array($qmaksid))
				{ $maksid = $aqmaksid[0]; }
			if ($tidxle == $maksid)
				{ $message = "Sudah sampai data terakhir."; }
			else
				{
				do  
					{
					$tidxle++;
					$qlembur  = $connection->query("select * from lembur where idxle='$tidxle';");
					$jqlembur = mysqli_num_rows($qlembur);
					if ($jqlembur>0)
						{
						if ($aqlembur = mysqli_fetch_array($qlembur))
							{
							$tidxle = $aqlembur[0];
							break;
							}
						}
					} while (($jqlembur==0) and ($tidxle < $maksid));
				}
			break;

			case 'new':
			// Append blank, clear all column
			$idxle      = 0;
			$maksidxle  = 0;
			$qmaksidxle = $connection->query("select max(idxle) from lembur;");
			if ($amaksidxle  = mysqli_fetch_array($qmaksidxle))
				{ $maksidxle = $amaksidxle[0]; }
			$idxle   = $maksidxle+1;
			// Auto generate kodele
			$tdiv = "NN";
			switch ($sdivisi) {
				case 'Accounting':
				$tdiv = "AC";
				break;
				case 'Security':
				$tdiv = "SC";
				break;
				case 'Hrd':
				$tdiv = "HR";
				break;
				case 'Umum':
				$tdiv = "UM";
				break;
				case 'Gudang':
				$tdiv = "GD";
				break;
				case 'Finance':
				$tdiv = "FI";
				break;
				case 'Armada':
				$tdiv = "AR";
				break;
				case 'Piutang':
				$tdiv = "PI";
				break;				
			}
			$tbulan    = date('Y-m');
			$idx       = 0;
			$qcekindex = $connection->query("select idx from lebulan where bulan='$tbulan';");
			if ($aqcekindex = mysqli_fetch_array($qcekindex))
				{ 
				$idx     = $aqcekindex[0]+1; 
				$qupdate = $connection->query("update lebulan set idx='$idx' where bulan ='$tbulan';");	
				}
			else
				{ 
				$idx  = 1;	
				$qinsert = $connection->query("insert into lebulan (idx,bulan) values ('$idx','$tbulan');"); 
				}
			$vnol    = '';
			if ($idx < 10)
				{ $vnol = '00'; }
			else
				{
				if ($idx >= 10 and $idx < 100 )
					{ $vnol = '0'; }
				}
			$nbulan  = date('my');
			$kodele  = 'LE'.$tdiv.$nbulan.'.'.$vnol.$idx;
			$status  = "O";
			$tglpeng = date("Y-m-d");
			$tgllbr  = date("Y-m-d");
			$jammul  = "16:00";
			$jamsel  = "17:00";
			$lamalbr = '1';
			$appldr  = "T";
			$kodeldr = "-";
			$apphrd  = "T";
			$kodehrd = "-";
			// Set auto insert NIP,Nama Kepala Divisi dan Divisinya, per 1 divisi hanya ada 1 Kepala Divisi.
			$qkadiv  = $connection->query("select kode,nama from user where level='Kadiv' and divisi = '$sdivisi';");
			if ($aqkadiv = mysqli_fetch_array($qkadiv)) 
				{ 
				$kodeld = $aqkadiv[0]; 
				$namald = $aqkadiv[1]; 
				}
			$qinsert = $connection->query("insert into lembur (idxle,kodele,status,tglpeng,kode,nama,tgllbr,jammul,jamsel,lamalbr,kodeld,namald,divisi,appldr,kodeldr,apphrd,kodehrd) values('$idxle','$kodele','$status','$tglpeng','$skode','$snama','$tgllbr','$jammul','$jamsel','$lamalbr','$kodeld','$namald','$sdivisi','$appldr','$kodeldr','$apphrd','$kodehrd');");
			$tidxle  = $idxle;
			break;
			
			case 'update':
			// Data hanya bisa diubah jika belum di approve sama sekali.
			if ($tappldr !=  "Y" or $tapphrd != "Y" or $tstatus != "Approved")
				{
				$tglpeng  = date_create($ttglpeng);
				$tglpeng  = date_format($tglpeng,"Y-m-d");
				$tgllbr   = date_create($ttgllbr);
				$tgllbr   = date_format($tgllbr,"Y-m-d");
				// Menghitung lama lembur (dalam satuan jam).
				$njammul  = new DateTime($tjammul);
				$njamsel  = new DateTime($tjamsel);
				$lamalbr  = $njamsel->diff($njammul);
				$ljam     = $lamalbr->format('%h');
				$lmenit   = ($lamalbr->format('%i'))/60;
				if($lmenit >= 0 && $lmenit <= 9)
					{ $lmenit = "0".$lmenit; }
				$tlamalbr = $ljam+$lmenit;
			// Jika terjadi update data lewat page ini maka otomatis semua approval di cancel/ di set ="T"
				$appldr   = "T";
				$kodeldr  = "-";
				$apphrd   = "T";
				$kodehrd  = "-";
				if (($ljam>0) and !empty($tnoteslbr))
					{ $status = "P"; }
				else
					{ $status = "O"; }
				$qupdate  = $connection->query("update lembur set tglpeng='$tglpeng',tgllbr='$tgllbr',jammul='$tjammul',jamsel='$tjamsel',lamalbr='$tlamalbr',status='$status',noteslbr='$tnoteslbr',appldr='$appldr',kodeldr='$kodeldr',apphrd='$apphrd',kodehrd='$kodehrd' where idxle = '$tidxle';"); 
				}
			break;
			
			case 'delete':
				$qdelete  = $connection->query("delete from lembur where idxle ='$tidxle';");
				// Setelah delete, menuju ke data sebelumnya.
				$qminid = $connection->query("select min(idxle) from lembur;");
				if ($aqminid = mysqli_fetch_array($qminid))
					{ $minid = $aqminid[0]; }
				if ($tidxle == $minid)
					{ $message = "Sudah sampai data terawal."; }
				else
					{
					do  
						{
						$tidxle--;
						$qle  = $connection->query("select * from lembur where idxle='$tidxle';");
						$jqle = mysqli_num_rows($qle);
						if ($jqle>0)
							{
							if ($aqle = mysqli_fetch_array($qle))
								{
								$tidxle = $aqle[0];
								break;
								}
							}
						} while (($jqle==0) and ($tidxle > $minid));
					}
			break;
			}
		}
?>