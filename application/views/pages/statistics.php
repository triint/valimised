<?php include "lang.php";?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js" type="text/javascript"></script>

	<div id="content">
		
	</div>



<script type="text/javascript">
$(document).ready (function () {
	$.ajaxSetup ({
        cache: false
    });
	$('#content').load ('/index.php/statistics2', 'update=true');
    var updater = setInterval (function () {
        $('div#content').load ('/index.php/statistics2', 'update=true');
    }, 1000);
});
</script>