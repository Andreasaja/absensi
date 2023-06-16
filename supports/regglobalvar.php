<?php
	foreach (['_GET', '_POST', '_COOKIE'] as $source)
		{
    	foreach ($$source as $key => $value) 
    		{ $GLOBALS[$key] = $value; }
		}
?>