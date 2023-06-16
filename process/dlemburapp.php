<?php
	if (isset($submit))
		{
		switch ($submit) 
			{
			case 'update':
			for($counter=1;$counter<=$maxcount;$counter++)
				{
				if(!empty($cupd[$counter]))
					{ 
					// Data bisa di update jikalau belum di approve dan belum di cek.
					//if ($appldrold[$counter] == 'T' and $apphrdold[$counter] == 'T')
					//	{
						// Menghitung lama lembur (dalam satuan jam).
						$njammul  = new DateTime($tjammul[$counter]);
						$njamsel  = new DateTime($tjamsel[$counter]);
						$lamalbr  = $njamsel->diff($njammul);
						$ljam     = $lamalbr->format('%h');
						$lmenit   = ($lamalbr->format('%i'))/60;
						if($lmenit >= 0 && $lmenit <= 9)
							{ $lmenit = "0".$lmenit; }
						$tlamalbr = $ljam+$lmenit;
						$qupdate  = $connection->query("update lembur set jammul='$tjammul[$counter]',jamsel='$tjamsel[$counter]',lamalbr='$tlamalbr',noteslbr='$tnoteslbr[$counter]' where idxle ='$tidxle[$counter]';");
						if ($tstatus[$counter] == "Reject")
    						{ $qupdate  = $connection->query("update lembur set status='$status',appldr='T',kodeldr='-',apphrd='T',kodehrd='-' where idxle ='$tidxle[$counter]';");	}
    					else
    					    {
    					    // Update approval khusus level Kadiv
    						if ($slevel == 'Kadiv')
    							{
    							if(!empty($cappldr[$counter]))
    								{ 
    								$tappldr = 'Y'; 
    								$kodeldr = $skode; 
    								}
    							else
    								{ 
    								$tappldr = 'T'; 
    								$kodeldr = ""; 
    								}
    							$qupdate  = $connection->query("update lembur set appldr='$tappldr',kodeldr='$kodeldr' where idxle ='$tidxle[$counter]';");
    							}
    						// Update approval khusus level Hrd
    						if ($slevel == 'Hrd')
    							{
    							if(!empty($capphrd[$counter]))
    								{ 
    								$status  = "A";
    								$tapphrd = 'Y'; 
    								$kodehrd = $skode; 
    								}
    							else
    								{
    								$status  = "P";
    								$tapphrd = "T"; 
    								$kodehrd = "-"; 
    								}
    							$qupdate  = $connection->query("update lembur set status='$status',apphrd='$tapphrd',kodehrd='$kodehrd' where idxle ='$tidxle[$counter]';");
    							}
    					    }
					    }
					}
				//}
			break;

			case 'delete':
			for($counter=1;$counter<=$maxcount;$counter++)
				{
				if(!empty($cdel[$counter]))
					{ $qdelete = $connection->query("delete from lembur where idxle ='$tidxle[$counter]';"); }
				}
			break;
			}
		}
?>