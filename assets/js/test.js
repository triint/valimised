var data;
function loadChart(query)
{
	data=query;
	google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(rdy);
}
function rdy()
{
	drawChart(data);
	//alert("a");
}
function drawChart(query) {
    var data = new google.visualization.DataTable();
    data.addColumn('string', 'Party');
    data.addColumn('number', 'Votes');
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

	
     