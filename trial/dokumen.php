<?php
	if (isset($submit))
		{
		switch ($submit) 
			{
			case 'upload':
			$awal  = rand(100,999);
			$akhir = md5($awal);
			$all   = $awal.$akhir;
			$len   = strlen($all);
			$part  = substr($all,3,$len);
			echo "awal  = ".$awal."<br>";
			echo "akhir = ".$akhir."<br>";
			echo "len   = ".$len."<br>";
			echo "all   = ".$all."<br>";
			echo "part  = ".$part;
			//$filename   = $_FILES['tdokumen']['name'];
	        //$filetype   = $_FILES['tdokumen']['type'];
	        //$filesize   = $_FILES['tdokumen']['size'];
	        //$fileaddress = "/home/brib2881/public_html/absensi/images/" . $filename;
	        //$fileaddress = "http:www.britegroup.my.id/absensi/images/" . $filename;
	        //if ($filetype = "image/jpeg" or $filetype = "image/jpg" or $filetype = "image/gif" )
			//	{
			//	if ($filesize <= 500000)
			//		{
			//		if (move_uploaded_file(basename($filename),$fileaddress)) 
			//			{ 
			//			//move_uploaded_file(basename($_FILES['tdokumen']['name']),$fileaddress);
			//			//echo "Dokumen : ". $filename . " berhasil diupload.";  
			//			$tstabs      = cleantext($tstabs);
			//			$tketerangan = cleantext($tketerangan);
			//			$stdok       = "Y";
	        //			$qupdate     = $connection->query("update absensihr set stabs='$tstabs',keterangan='$tketerangan',stdok='$stdok',dokumen='$filedest' where idxah ='$tidxah';");
			//			}
			//		}
			//	else { echo "Tidak bisa upload file, karena ukuran file lebih dari 500KB."; }
			//	}
			//else { echo "Tidak bisa upload file, karena tipe file bukan jpg/jpeg/gif"; }
			//$dir = "../images/" . $filename;
			//echo $filename;
			//$url = "/home/brib2881/public_html/absensi/images/" . $filename;
			//echo $url;
			//if (move_uploaded_file($filename,$url)) 
			//	{ echo "Sukses upload"; }
			//else
			//	{ echo "Gagal upload"; }
			//echo $url;
			//echo $dir;
		//if ($foto_type = "foto/pjpeg" || $foto_type = "foto/pjpg" || $foto_type = "foto/gif")
		//	{
		//	if ($foto_size <= 100000)
		//		{
			//	$qmaks  = "select max(idx) from product;";
			//	$hqmaks = mysql_query($qmaks);
			//	if ($amaks = mysql_fetch_array($hqmaks))
			//		{
			//		$maks = $amaks[0];
			//		}
			//	$idx = $maks+1;
			//	$qinsert = "insert into product (idx,nama,jenis,merk,harga,ket,foto,prev) values ('$idx','$nama','$jenis','$merk','$harga','$ket','$dir','$prev');";
			//	$hinsert = mysql_query($qinsert);

			//	if ($hinsert>0)
			//		{
			//		echo "<p>Proses upload data produk anda telah berhasil.</p>";
			//		echo "<hr><hr><br>";
			//		}
			//	else 
			//		{
			//		echo "<p>Maaf. Gagal koneksi ke database, cobalah beberapa saat lagi.</p>";
			//		echo "<hr><hr><br>";
			//		}
			//	}
			//	else { echo "Tidak bisa upload data produk, karena ukuran file lebih dari 100kb.";}
			//}
			//else { echo "Tidak bisa upload data produk, karena tipe file tidak sesuai. Tipe file foto atau tabel harus jpg/jpeg/gif";}
			break;

			case 'update':
			$qupdate = $connection->query("update absensihr set stabs='$tstabs',keterangan='$keterangan' where idxah ='$tidxah';");
			break;
			
			case 'delete':
			$qdelete = $connection->query("delete from absensihr where idxah ='$tidxah[$counter]';");
			break;
			}
		}
?>