	function loadChart()
	{
		google.charts.load('current', {'packages':['corechart']});
		google.charts.setOnLoadCallback(drawChart);
	}
      function drawChart(query) {
		//alert(query[0]['Votes']);
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Party');
        data.addColumn('number', 'Votes');
		//data.addRow(['test1',1]);
		//data.addRow(['test2',2]);
		for(var i=0;i<query.length;i++)
		{
			data.addRow([query[i]['Partei'],parseInt(query[i]['Votes'])]);
		}
        var options = {'title':'',
                       'width':700,
                       'height':450};
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
