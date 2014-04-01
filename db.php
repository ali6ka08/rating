<?php 
	$q = mysql_query("
		SELECT * FROM general
	");
	$r = mysql_num_rows($q);
	if($r != 0)
	{
		while($t = mysql_fetch_assoc($q))
		{
			array_push($container_name,$t['p_name']);
			array_push($container_department,$t['p_department']);
		}
	}
?>
