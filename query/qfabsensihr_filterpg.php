<?php
	include ('../supports/connection.php');
	$filterpg = $_GET['filterpg'];
	if ($filterpg != "")
		{
		$qfilterpg  = $connection->query("select kode,nama from pegawai where nama like '$filterpg%' order by nama asc;");
		if (mysqli_num_rows($qfilterpg)>0)
			{
			echo "<select name='kode' style='width: 350px;'>";
			while($aqfilterpg = mysqli_fetch_array($qfilterpg))
				{ echo "<option value='$aqfilterpg[0]'>". $aqfilterpg[1] . "</option>"; }
			echo "</select>";
			}
		}
	else
		{
		$qfilterpg  = $connection->query("select kode,nama from pegawai order by nama asc;");
		$jqfilterpg = mysqli_num_rows($qfilterpg);
		if ($jqfilterpg>0)
			{
			echo "<select name='kode' style='width: 350px;'>";
			while($aqfilterpg = mysqli_fetch_array($qfilterpg))
				{ echo "<option value='$aqfilterpg[0]'>". $aqfilterpg[1] . "</option>"; }
			echo "</select>";
			}
		}
?>