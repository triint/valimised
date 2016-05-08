<?php include "lang.php";?>
<!--Load the AJAX API-->

<script type="text/javascript" src="../assets/js/test.js"></script>
<script>
drawChart(<?=json_encode($query);?>);
</script>