<?php
	function calmasakrj($tgljoin){
		$ttgljoin = new DateTime($tgljoin);
		$today    = new DateTime("today");
		if ($ttgljoin > $today) { 
		    exit("0 th 0 bl");
		}
		$y = $today->diff($ttgljoin)->y;
		$m = $today->diff($ttgljoin)->m;
		return $y." th ".$m." bl";
	}
?>