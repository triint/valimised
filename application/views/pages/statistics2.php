<?php include "lang.php";?>
<table>
	<tr><th> <?=$str_party[$lang]?> </th><th> <?=$str_votes[$lang]?> </th></tr>
	<?php foreach($query as $row)
	{?>
	<tr> <td> <?=$row['Partei']?> </td><td> <?=$row['Votes']?> </td></tr>
	<?}?>
</table>
