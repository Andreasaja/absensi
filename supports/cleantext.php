<?php
function cleantext($value="", $preserve="", $allowtag="")
	{
	if (empty($preserve))
		{
		$value = strip_tags($value,$allowtag);
		}
	$value = htmlspecialchars($value);
	return $value;
	}
?>