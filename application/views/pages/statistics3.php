<?php include "lang.php";?>
<table>
<tr>
<th></th>
<?foreach($areas as $area)
echo "<th>" . $area . "</th>";?>
</tr>
<?php
foreach($areavotes as $votes)
{
	echo "<tr>";
	echo "<td>" . $votes['Partei'] . "</td>";
	foreach($areas as $area)
	{
		if(array_key_exists($area,$votes['Data']))
		{
			echo "<td>" . $votes['Data'][$area] . "</td>";
		}
		else
		{
			echo "<td>0</td>";
		}
	}
	echo "</tr>";
}

?>
</table>

