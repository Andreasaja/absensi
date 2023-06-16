<?php
	$tglabs    = $aqabsensihr[6];
	$tjammsk   = $aqabsensihr[7];
	$tjampul   = $aqabsensihr[8];
	$ttelat    = $aqabsensihr[11];
	$ctelat    = "DT";
	$tlemburby = $aqabsensihr[10];
	$tpawal    = $pawal;
	$tpawal    = date('Y-m-d', strtotime($tpawal));
	$tpakhir   = $pakhir;
	$tpakhir   = date('Y-m-d', strtotime($tpakhir));
	if ($tpawal <= $tpakhir)
		{
		if ($tglabs = $tpawal)
			{ 
			$hari1   = date('d-m-Y', strtotime($tglabs));
			if ($ttelat<=0)
				{ $hari1   = $hari1."<br><br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			else
				{ $hari1   = $hari1."<br>".$ctelat."<br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			$qupdate = $connection->query("update rabsensipe set hari1='$hari1' where periode='$periode' and kode='$kode';"); 
			}
		}	
	$tpawal = strtotime($pawal);
	$tpawal = date('Y-m-d', strtotime("+1 day",$tpawal));
	if ($tpawal <= $tpakhir)
		{
		if ($tglabs = $tpawal)
			{ 
			$hari2   = date('d-m-Y', strtotime($tglabs));
			if ($ttelat<=0)
				{ $hari2   = $hari2."<br><br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			else
				{ $hari2   = $hari2."<br>".$ctelat."<br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			$qupdate = $connection->query("update rabsensipe set hari2='$hari2' where periode='$periode' and kode='$kode';"); 
			}	
		}
	$tpawal = strtotime($pawal);
	$tpawal = date('Y-m-d', strtotime("+2 day",$tpawal));
	if ($tpawal <= $tpakhir)
		{
		if ($tglabs = $tpawal)
			{ 
			$hari3   = date('d-m-Y', strtotime($tglabs));
			if ($ttelat<=0)
				{ $hari3   = $hari3."<br><br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			else
				{ $hari3   = $hari3."<br>".$ctelat."<br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			$qupdate = $connection->query("update rabsensipe set hari3='$hari3' where periode='$periode' and kode='$kode';"); 
			}		
		}	
	$tpawal = strtotime($pawal);
	$tpawal = date('Y-m-d', strtotime("+3 day",$tpawal));
	if ($tpawal <= $tpakhir)
		{
		if ($tglabs = $tpawal)
			{ 
			$hari4   = date('d-m-Y', strtotime($tglabs));
			if ($ttelat<=0)
				{ $hari4   = $hari4."<br><br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			else
				{ $hari4   = $hari4."<br>".$ctelat."<br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			$qupdate = $connection->query("update rabsensipe set hari4='$hari4' where periode='$periode' and kode='$kode';"); 
			}		
		}
	$tpawal = strtotime($pawal);
	$tpawal = date('Y-m-d', strtotime("+4 day",$tpawal));
	if ($tpawal <= $tpakhir)
		{
		if ($tglabs = $tpawal)
			{ 
			$hari5   = date('d-m-Y', strtotime($tglabs));
			if ($ttelat<=0)
				{ $hari5   = $hari5."<br><br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			else
				{ $hari5   = $hari5."<br>".$ctelat."<br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			$qupdate = $connection->query("update rabsensipe set hari5='$hari5' where periode='$periode' and kode='$kode';"); 
			}	
		}	
	$tpawal = strtotime($pawal);
	$tpawal = date('Y-m-d', strtotime("+5 day",$tpawal));
	if ($tpawal <= $tpakhir)
		{
		if ($tglabs = $tpawal)
			{ 
			$hari6   = date('d-m-Y', strtotime($tglabs));
			if ($ttelat<=0)
				{ $hari6   = $hari6."<br><br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			else
				{ $hari6   = $hari6."<br>".$ctelat."<br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			$qupdate = $connection->query("update rabsensipe set hari6='$hari6' where periode='$periode' and kode='$kode';"); 
			}	
		}	
	$tpawal = strtotime($pawal);
	$tpawal = date('Y-m-d', strtotime("+6 day",$tpawal));
	if ($tpawal <= $tpakhir)
		{
		if ($tglabs = $tpawal)
			{ 
			$hari7   = date('d-m-Y', strtotime($tglabs));
			if ($ttelat<=0)
				{ $hari7   = $hari7."<br><br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			else
				{ $hari7   = $hari7."<br>".$ctelat."<br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			$qupdate = $connection->query("update rabsensipe set hari7='$hari7' where periode='$periode' and kode='$kode';"); 
			}		
		}
	$tpawal = strtotime($pawal);
	$tpawal = date('Y-m-d', strtotime("+7 day",$tpawal));
	if ($tpawal <= $tpakhir)
		{
		if ($tglabs = $tpawal)
			{ 
			$hari8   = date('d-m-Y', strtotime($tglabs));
			if ($ttelat<=0)
				{ $hari8   = $hari8."<br><br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			else
				{ $hari8   = $hari8."<br>".$ctelat."<br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }	
			$qupdate = $connection->query("update rabsensipe set hari8='$hari8' where periode='$periode' and kode='$kode';"); 
			}		
		}
	$tpawal = strtotime($pawal);
	$tpawal = date('Y-m-d', strtotime("+8 day",$tpawal));
	if ($tpawal <= $tpakhir)
		{
		if ($tglabs = $tpawal)
			{ 
			$hari9   = date('d-m-Y', strtotime($tglabs));	
			if ($ttelat<=0)
				{ $hari9   = $hari9."<br><br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			else
				{ $hari9   = $hari9."<br>".$ctelat."<br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			$qupdate = $connection->query("update rabsensipe set hari9='$hari9' where periode='$periode' and kode='$kode';"); 
			}	
		}	
	$tpawal = strtotime($pawal);
	$tpawal = date('Y-m-d', strtotime("+9 day",$tpawal));
	if ($tpawal <= $tpakhir)
		{
		if ($tglabs = $tpawal)
			{ 
			$hari10  = date('d-m-Y', strtotime($tglabs));
			if ($ttelat<=0)
				{ $hari10   = $hari10."<br><br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			else
				{ $hari10   = $hari10."<br>".$ctelat."<br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }			$qupdate = $connection->query("update rabsensipe set hari10='$hari10' where periode='$periode' and kode='$kode';"); 
			}	
		}	
	$tpawal = strtotime($pawal);
	$tpawal = date('Y-m-d', strtotime("+10 day",$tpawal));
	if ($tpawal <= $tpakhir)
		{
		if ($tglabs = $tpawal)
			{ 
			$hari11  = date('d-m-Y', strtotime($tglabs));
			if ($ttelat<=0)
				{ $hari11   = $hari11."<br><br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			else
				{ $hari11   = $hari11."<br>".$ctelat."<br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			$qupdate = $connection->query("update rabsensipe set hari11='$hari11' where periode='$periode' and kode='$kode';"); 
			}		
		}
	$tpawal = strtotime($pawal);
	$tpawal = date('Y-m-d', strtotime("+11 day",$tpawal));
	if ($tpawal <= $tpakhir)
		{
		if ($tglabs = $tpawal)
			{ 
			$hari12  = date('d-m-Y', strtotime($tglabs));
			if ($ttelat<=0)
				{ $hari12   = $hari12."<br><br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			else
				{ $hari12   = $hari12."<br>".$ctelat."<br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			$qupdate = $connection->query("update rabsensipe set hari12='$hari12' where periode='$periode' and kode='$kode';"); 
			}	
		}	
	$tpawal = strtotime($pawal);
	$tpawal = date('Y-m-d', strtotime("+12 day",$tpawal));
	if ($tpawal <= $tpakhir)
		{
		if ($tglabs = $tpawal)
			{ 
			$hari13  = date('d-m-Y', strtotime($tglabs));
			if ($ttelat<=0)
				{ $hari13   = $hari13."<br><br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			else
				{ $hari13   = $hari13."<br>".$ctelat."<br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			$qupdate = $connection->query("update rabsensipe set hari13='$hari13' where periode='$periode' and kode='$kode';"); 
			}		
		}
	$tpawal = strtotime($pawal);
	$tpawal = date('Y-m-d', strtotime("+13 day",$tpawal));
	if ($tpawal <= $tpakhir)
		{
		if ($tglabs = $tpawal)
			{ 
			$hari14  = date('d-m-Y', strtotime($tglabs));
			if ($ttelat<=0)
				{ $hari14   = $hari14."<br><br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			else
				{ $hari14   = $hari14."<br>".$ctelat."<br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			$qupdate = $connection->query("update rabsensipe set hari14='$hari14' where periode='$periode' and kode='$kode';"); 
			}
		}		
	$tpawal = strtotime($pawal);
	$tpawal = date('Y-m-d', strtotime("+14 day",$tpawal));
	if ($tpawal <= $tpakhir)
		{
		if ($tglabs = $tpawal)
			{ 
			$hari15  = date('d-m-Y', strtotime($tglabs));
			if ($ttelat<=0)
				{ $hari15   = $hari15."<br><br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			else
				{ $hari15   = $hari15."<br>".$ctelat."<br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			$qupdate = $connection->query("update rabsensipe set hari15='$hari15' where periode='$periode' and kode='$kode';"); 
			}
		}		
	$tpawal = strtotime($pawal);
	$tpawal = date('Y-m-d', strtotime("+15 day",$tpawal));
	if ($tpawal <= $tpakhir)
		{
		if ($tglabs = $tpawal)
			{ 
			$hari16  = date('d-m-Y', strtotime($tglabs));	
			if ($ttelat<=0)
				{ $hari16   = $hari16."<br><br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			else
				{ $hari16   = $hari16."<br>".$ctelat."<br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			$qupdate = $connection->query("update rabsensipe set hari16='$hari16' where periode='$periode' and kode='$kode';"); 
			}	
		}	
	$tpawal = strtotime($pawal);
	$tpawal = date('Y-m-d', strtotime("+16 day",$tpawal));
	if ($tpawal <= $tpakhir)
		{
		if ($tglabs = $tpawal)
			{ 
			$hari17  = date('d-m-Y', strtotime($tglabs));
			if ($ttelat<=0)
				{ $hari17   = $hari17."<br><br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			else
				{ $hari17   = $hari17."<br>".$ctelat."<br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			$qupdate = $connection->query("update rabsensipe set hari17='$hari17' where periode='$periode' and kode='$kode';"); 
			}		
		}
	$tpawal = strtotime($pawal);
	$tpawal = date('Y-m-d', strtotime("+17 day",$tpawal));
	if ($tpawal <= $tpakhir)
		{
		if ($tglabs = $tpawal)
			{ 
			$hari18  = date('d-m-Y', strtotime($tglabs));
			if ($ttelat<=0)
				{ $hari18   = $hari18."<br><br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			else
				{ $hari18   = $hari18."<br>".$ctelat."<br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			$qupdate = $connection->query("update rabsensipe set hari18='$hari18' where periode='$periode' and kode='$kode';"); 
			}		
		}
	$tpawal = strtotime($pawal);
	$tpawal = date('Y-m-d', strtotime("+18 day",$tpawal));
	if ($tpawal <= $tpakhir)
		{
		if ($tglabs = $tpawal)
			{ 
			$hari19  = date('d-m-Y', strtotime($tglabs));	
			if ($ttelat<=0)
				{ $hari19   = $hari19."<br><br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			else
				{ $hari19   = $hari19."<br>".$ctelat."<br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			$qupdate = $connection->query("update rabsensipe set hari19='$hari19' where periode='$periode' and kode='$kode';"); 
			}		
		}
	$tpawal = strtotime($pawal);
	$tpawal = date('Y-m-d', strtotime("+19 day",$tpawal));
	if ($tpawal <= $tpakhir)
		{
		if ($tglabs = $tpawal)
			{ 
			$hari20  = date('d-m-Y', strtotime($tglabs));
			if ($ttelat<=0)
				{ $hari20   = $hari20."<br><br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			else
				{ $hari20   = $hari20."<br>".$ctelat."<br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			$qupdate = $connection->query("update rabsensipe set hari20='$hari20' where periode='$periode' and kode='$kode';"); 
			}	
		}	
	$tpawal = strtotime($pawal);
	$tpawal = date('Y-m-d', strtotime("+20 day",$tpawal));
	if ($tpawal <= $tpakhir)
		{
		if ($tglabs = $tpawal)
			{ 
			$hari21  = date('d-m-Y', strtotime($tglabs));	
			if ($ttelat<=0)
				{ $hari21   = $hari21."<br><br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			else
				{ $hari21   = $hari21."<br>".$ctelat."<br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			$qupdate = $connection->query("update rabsensipe set hari21='$hari21' where periode='$periode' and kode='$kode';"); 
			}		
		}
	$tpawal = strtotime($pawal);
	$tpawal = date('Y-m-d', strtotime("+21 day",$tpawal));
	if ($tpawal <= $tpakhir)
		{
		if ($tglabs = $tpawal)
			{ 
			$hari22  = date('d-m-Y', strtotime($tglabs));
			if ($ttelat<=0)
				{ $hari22   = $hari22."<br><br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			else
				{ $hari22   = $hari22."<br>".$ctelat."<br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			$qupdate = $connection->query("update rabsensipe set hari22='$hari22' where periode='$periode' and kode='$kode';"); 
			}	
		}	
	$tpawal = strtotime($pawal);
	$tpawal = date('Y-m-d', strtotime("+22 day",$tpawal));
	if ($tpawal <= $tpakhir)
		{
		if ($tglabs = $tpawal)
			{ 
			$hari23  = date('d-m-Y', strtotime($tglabs));
			if ($ttelat<=0)
				{ $hari23   = $hari23."<br><br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			else
				{ $hari23   = $hari23."<br>".$ctelat."<br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			$qupdate = $connection->query("update rabsensipe set hari23='$hari23' where periode='$periode' and kode='$kode';"); 
			}	
		}	
	$tpawal = strtotime($pawal);
	$tpawal = date('Y-m-d', strtotime("+23 day",$tpawal));
	if ($tpawal <= $tpakhir)
		{
		if ($tglabs = $tpawal)
			{ 
			$hari24  = date('d-m-Y', strtotime($tglabs));
			if ($ttelat<=0)
				{ $hari24   = $hari24."<br><br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			else
				{ $hari24   = $hari24."<br>".$ctelat."<br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			$qupdate = $connection->query("update rabsensipe set hari24='$hari24' where periode='$periode' and kode='$kode';"); 
			}	
		}	
	$tpawal = strtotime($pawal);
	$tpawal = date('Y-m-d', strtotime("+24 day",$tpawal));
	if ($tpawal <= $tpakhir)
		{
		if ($tglabs = $tpawal)
			{ 
			$hari25  = date('d-m-Y', strtotime($tglabs));
			if ($ttelat<=0)
				{ $hari25   = $hari25."<br><br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			else
				{ $hari25   = $hari25."<br>".$ctelat."<br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			$qupdate = $connection->query("update rabsensipe set hari25='$hari25' where periode='$periode' and kode='$kode';"); 
			}	
		}	
	$tpawal = strtotime($pawal);
	$tpawal = date('Y-m-d', strtotime("+25 day",$tpawal));
	if ($tpawal <= $tpakhir)
		{
		if ($tglabs = $tpawal)
			{ 
			$hari26  = date('d-m-Y', strtotime($tglabs));
			if ($ttelat<=0)
				{ $hari26   = $hari26."<br><br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			else
				{ $hari26   = $hari26."<br>".$ctelat."<br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			$qupdate = $connection->query("update rabsensipe set hari26='$hari26' where periode='$periode' and kode='$kode';"); 
			}
		}
	$tpawal = strtotime($pawal);
	$tpawal = date('Y-m-d', strtotime("+26 day",$tpawal));
	if ($tpawal <= $tpakhir)
		{
		if ($tglabs = $tpawal)
			{ 
			$hari27  = date('d-m-Y', strtotime($tglabs));
			if ($ttelat<=0)
				{ $hari27   = $hari27."<br><br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			else
				{ $hari27   = $hari27."<br>".$ctelat."<br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			$qupdate = $connection->query("update rabsensipe set hari27='$hari27' where periode='$periode' and kode='$kode';"); 
			}
		}
	$tpawal = strtotime($pawal);
	$tpawal = date('Y-m-d', strtotime("+27 day",$tpawal));
	if ($tpawal <= $tpakhir)
		{
		if ($tglabs = $tpawal)
			{ 
			$hari28  = date('d-m-Y', strtotime($tglabs));
			if ($ttelat<=0)
				{ $hari28   = $hari28."<br><br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			else
				{ $hari28   = $hari28."<br>".$ctelat."<br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			$qupdate = $connection->query("update rabsensipe set hari28='$hari28' where periode='$periode' and kode='$kode';"); 
			}	
		}
	$tpawal = strtotime($pawal);
	$tpawal = date('Y-m-d', strtotime("+28 day",$tpawal));
	if ($tpawal <= $tpakhir)
		{
		if ($tglabs = $tpawal)
			{ 
			$hari29  = date('d-m-Y', strtotime($tglabs));
			if ($ttelat<=0)
				{ $hari29   = $hari29."<br><br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			else
				{ $hari29   = $hari29."<br>".$ctelat."<br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			$qupdate = $connection->query("update rabsensipe set hari29='$hari29' where periode='$periode' and kode='$kode';"); 
			}	
		}
	$tpawal = strtotime($pawal);
	$tpawal = date('Y-m-d', strtotime("+29 day",$tpawal));
	if ($tpawal <= $tpakhir)
		{
		if ($tglabs = $tpawal)
			{ 
			$hari30  = date('d-m-Y', strtotime($tglabs));
			if ($ttelat<=0)
				{ $hari30   = $hari30."<br><br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			else
				{ $hari30   = $hari30."<br>".$ctelat."<br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			$qupdate = $connection->query("update rabsensipe set hari30='$hari30' where periode='$periode' and kode='$kode';"); 
			}	
		}
	$tpawal = strtotime($pawal);
	$tpawal = date('Y-m-d', strtotime("+30 day",$tpawal));
	if ($tpawal <= $tpakhir)
		{
		if ($tglabs = $tpawal)
			{ 
			$hari31  = date('d-m-Y', strtotime($tglabs));
			if ($ttelat<=0)
				{ $hari31   = $hari31."<br><br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			else
				{ $hari31   = $hari31."<br>".$ctelat."<br>".$tlemburby."<br>".$tjammsk."<br>".$tjampul; }
			$qupdate = $connection->query("update rabsensipe set hari31='$hari31' where periode='$periode' and kode='$kode';"); 
			}	
		}	
?>