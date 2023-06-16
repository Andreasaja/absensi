<aside class="sidebar">
	<nav>
		<ul class="sidebar__nav">
			<?php
				$qmenu = $connection->query("select fuser,fpegawai,fkalender,flembur,flemburapp,fabsensihr,fabsensipe,fmastergj,fslipgaji,fdokumen from user where idxus='$sidxus';");
				while ($aqmenu = mysqli_fetch_array($qmenu))
					{
					if ($aqmenu[0] == 1)
						{ echo "<li style='background-color:#CCFFFF;'><br><a href='fuser.php' class='sidebar__nav__link'><span class='sidebar__nav__text'>Data User</span></a></li>"; }
					else
						{ echo "<li style='background-color:#CCFFFF;'><br><a href='#' class='sidebar__nav__link'><span class='sidebar__nav__text'><i>Blank</i></span></a></li>"; }
					if ($aqmenu[1] == 1)
						{ echo "<li style='background-color:#CCFFFF;'><a href='fkalender.php' class='sidebar__nav__link'><span class='sidebar__nav__text'>Data Kalender</span></a></li>"; }
					else
						{ echo "<li style='background-color:#CCFFFF;'><a href='#' class='sidebar__nav__link'><span class='sidebar__nav__text'><i>Blank</i></span></a></li>"; }
					if ($aqmenu[2] == 1)
						{ echo "<li style='background-color:#CCFFFF;'><a href='fpegawai.php' class='sidebar__nav__link'><span class='sidebar__nav__text'>Data Pegawai</span></a></li>"; }
					else
						{ echo "<li style='background-color:#CCFFFF;'><a href='#' class='sidebar__nav__link'><span class='sidebar__nav__text'><i>Blank</i></span></a></li>"; }
					if ($aqmenu[3] == 1)
						{ echo "<li style='background-color:#CCFFFF;'><a href='flembur.php' class='sidebar__nav__link'><span class='sidebar__nav__text'>Pengajuan Lembur Karyawan</span></a></li>"; }
					else
						{ echo "<li style='background-color:#CCFFFF;'><a href='#' class='sidebar__nav__link'><span class='sidebar__nav__text'><i>Blank</i></span></a></li>"; }
					if ($aqmenu[4] == 1)
						{ echo "<li style='background-color:#CCFFFF;'><a href='fdlemburapp.php' class='sidebar__nav__link'><span class='sidebar__nav__text'>Approval Lembur Karyawan</span></a></li>"; }
					else
						{ echo "<li style='background-color:#CCFFFF;'><a href='#' class='sidebar__nav__link'><span class='sidebar__nav__text'><i>Blank</i></span></a></li>"; }
					if ($aqmenu[5] == 1)
						{ echo "<li style='background-color:#CCFFFF;'><a href='fabsensihr.php' class='sidebar__nav__link'><span class='sidebar__nav__text'>Data Absensi Harian</span></a></li>"; }
					else
						{ echo "<li style='background-color:#CCFFFF;'><a href='#' class='sidebar__nav__link'><span class='sidebar__nav__text'><i>Blank</i></span></a></li>"; }
					if ($aqmenu[6] == 1)
						{ echo "<li style='background-color:#33dddd;'><a href='fabsensipe.php' class='sidebar__nav__link'><span class='sidebar__nav__text'>Data Rekap Absensi Periodikal</span></a></li>"; }
					else
						{ echo "<li style='background-color:#33dddd;'><a href='#' class='sidebar__nav__link'><span class='sidebar__nav__text'><i>Blank</i></span></a></li>"; }
					if ($aqmenu[7] == 1)
						{ echo "<li style='background-color:#CCFFFF;'><a href='fdmastergj.php' class='sidebar__nav__link'><span class='sidebar__nav__text'>Data Master Gaji Karyawan</span></a></li>"; }
					else
						{ echo "<li style='background-color:#CCFFFF;'><a href='#' class='sidebar__nav__link'><span class='sidebar__nav__text'><i>Blank</i></span></a></li>"; }
					if ($aqmenu[8] == 1)
						{ echo "<li style='background-color:#CCFFFF;'><a href='fslipgaji.php' class='sidebar__nav__link'><span class='sidebar__nav__text'>Data Slip Gaji</span></a></li>"; }
					else
						{ echo "<li style='background-color:#CCFFFF;'><a href='#' class='sidebar__nav__link'><span class='sidebar__nav__text'><i>Blank</i></span></a></li>"; }
					if ($aqmenu[9] == 1)
						{ echo "<li style='background-color:#CCFFFF;'><a href='fdokumen.php' class='sidebar__nav__link'><span class='sidebar__nav__text'>Data Dokumen</span></a></li>"; }
					else
						{ echo "<li style='background-color:#CCFFFF;'><a href='#' class='sidebar__nav__link'><span class='sidebar__nav__text'><i>Blank</i></span></a></li>"; }
					}
			?>
			<li>
				<span class="sidebar__nav__text"><form method="post" action="../supports/logout.php"><button name="submit" type="submit" value="close" class="btn btn-dark btn-lg btn-block">C L O S E</button></span></form>
			</li>
		</ul>
	</nav>
</aside>