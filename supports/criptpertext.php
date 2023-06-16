<?php
	function criptper_text($jenis,$value)
	{
	// Enkripsi
	if ($jenis == "1")
		{ 
		$vencript = "";
		$vresult  = "";
		$lvaluev  = strlen($value);
		for ($counter=0;$counter<=$lvaluev-1;$counter++)
			{
			$var1 = rand(0,9);
			$var2 = substr($value,$counter,1);
			if (($var1+$var2) < 10)
				{ 
				$var3 = $var1; 
				$var4 = $var2+$var3;
				}
			else
				{ 
				$var3 = 0; 
				$var4 = $var2+$var3;
				}
			$vencript = $vencript.$var3;
			$vresult  = $vresult.$var4;
			}
		$vrand1  = rand(0,99999);
		$lvalue1 = strlen($vrand1);
		$vrand2  = rand(0,99999);
		$nvalue  = $lvalue1.$vrand1.$lvaluev.$vencript.$vresult.$vrand2; 
		}
	// Deskripsi
	if ($jenis == "2")
		{
		$vreal    = "";
		$lvalue1  = substr($value,0,1);
		$vrand1   = substr($value,1,$lvalue1);
		$vtemp1   = $lvalue1+1;
		$lvaluev  = intval(substr($value,$vtemp1,1));
		$vtemp2   = $vtemp1+1;
		$vencript = substr($value,$vtemp2,$lvaluev);
		$vtemp3   = $vtemp2+$lvaluev;
		$vresult  = substr($value,$vtemp3,$lvaluev);
		for ($counter=0;$counter<=$lvaluev-1;$counter++)
			{
			$var1  = intval(substr($vencript,$counter,1));
			$var2  = intval(substr($vresult,$counter,1));
			$var3  = $var2-$var1;
			$vreal = $vreal.$var3;
			}
		$nvalue = $vreal;
		}
	return ($nvalue);
	}
	//$tesvalue = criptper_text("1","9900000");
	//$tesvalue = criptper_text("2","59577870085471998547153374");
	//echo $tesvalue;
?>