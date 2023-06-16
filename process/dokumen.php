<?php
	if (isset($submit))
		{
		switch ($submit) 
			{
			case 'upload':
			
			$filetmpname = $_FILES["tdokumen"]["tmp_name"];
			$filename    = $_FILES["tdokumen"]["name"];
	        $filetype    = $_FILES["tdokumen"]["type"];
	        $filesize    = $_FILES["tdokumen"]["size"];
	        $fileaddress = "../images/" . $filename;
	        
	        if ($filetype = "image/jpeg" or $filetype = "image/jpg" or $filetype = "image/gif" )
				{
				if ($filesize <= 500000)
					{
					$stdok       = "Y";
					
					move_uploaded_file($filetmpname, $fileaddress);
					
	        		$qupdate     = $connection->query("update absensihr set stdok='$stdok',dokumen='$fileaddress' where idxah ='$tidxah';");
					}
				else { echo "Tidak bisa upload file, karena ukuran file lebih dari 500KB."; }
				}
			else { echo "Tidak bisa upload file, karena tipe file bukan jpg/jpeg/gif"; }
			break;
			
			case 'update':
			$qupdate = $connection->query("update absensihr set stabs='$tstabs',keterangan='$tketerangan' where idxah ='$tidxah';");
			break;
			}
		}
?>