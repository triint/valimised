<?php include "lang.php";?>
<script defer src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" async src="https://www.gstatic.com/charts/loader.js"></script>

	<div id="content">
		<a href="<?php echo base_url();?>index.php/statistics?type=all">Kogu riigis</a>&nbsp
		<a href="<?php echo base_url();?>index.php/statistics?type=area">Piirkonnati</a>&nbsp
		<a href="<?php echo base_url();?>index.php/statistics?type=candidate">Kandidaatide lõikes</a>
		<a href="<?php echo base_url();?>index.php/statistics?type=party">Parteide lõikes</a>&nbsp
		<br>
		<div id="contentrefr"></div>
	</div>
	<div id="chart_div"></div>
	
<script  type="text/javascript">
window.onload = function(){
$(document).ready (function () {
	$.ajaxSetup ({
        cache: false
    });
	$('#contentrefr').load ('/index.php/<?=$refr?>?load=1', 'update=true');
    var updater = setInterval (function () {
        $('div#contentrefr').load ('/index.php/<?=$refr?>?load=0', 'update=true');
    }, 5000);
});
}
</script>


