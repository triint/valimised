<?php include "lang.php";?>
<table>
<tr>
<th></th>
<th><?=$str_votes[$lang]?> </th>
</tr>
<?php
foreach($candvotes as $votes)
{
	echo "<tr>";
	echo "<td>" . $votes['N']/*$votes->N*/ . "</td>";
	echo "<td>" . $votes['C']/*$votes->C*/ . "</td>";
	echo "</tr>";
}
?>
</table>