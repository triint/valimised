<?php include "lang.php";?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<div id="content">
		<a href="<?php echo base_url();?>index.php/statistics3">Kogu riigis</a>&nbsp
		<a href="<?php echo base_url();?>index.php/statistics4">Piirkonnati</a>&nbsp
		<a href="<?php echo base_url();?>index.php/statistics5">Parteide lõikes </a><br>
		<div id="contentrefr"></div>
	</div>
	<div id="chart_div"></div>
<script type="text/javascript" src="../assets/js/test.js"></script>
<script type="text/javascript">
loadChart();
$(document).ready (function () {
	$.ajaxSetup ({
        cache: false
    });
	$('#contentrefr').load ('/index.php/statistics2', 'update=true');
    var updater = setInterval (function () {
        $('div#contentrefr').load ('/index.php/statistic2', 'update=true');
    }, 5000);
});
</script>


