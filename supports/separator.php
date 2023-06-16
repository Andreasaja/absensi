<?php
function fseparator($jen,$input)
	{
	if ($jen == 1)
		{
		$var1 = explode (".",$input);
		$output = implode("",$var1);
		}
	if ($jen == 0)
		{
		$var2 = explode (".",$input);
		$len  = strlen($var2[0]);
		$maks = ceil($len/3);
		$j    = $len;
		for ($i=1;$i<$maks;$i++)
			{
			$j=$j-3;
			$array[$i] = substr($var2[0],$j,3);
			if ($j<0)
				{ break; }
			}
		$pos = abs($j);
		$output = substr($var2[0],0,$pos);

		for ($h=$i-1;$h>=0;$h--)
			{
			$output = $output.".".$array[$h];
			}
		$lenh = strlen($output);
		if (empty($var2[1]))
			{ $output = substr($output,0,$lenh-1); }
		else
			{ $output = substr($output,0,$lenh-1).",".$var2[1]; }
		}
	return $output;
	}
?>