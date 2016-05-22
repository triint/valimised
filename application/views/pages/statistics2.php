<?php include "lang.php";?>
<script type="text/javascript" src="../assets/js/test.js"></script>
<?php if(isset($_GET['load'])): if($_GET['load']==1):?>	
<script>
loadChart(<?=json_encode($query);?>);
</script>
<?php else:?>

<script>
drawChart(<?=json_encode($query);?>);
</script>
<?php endif;?>
<?php endif;?>
