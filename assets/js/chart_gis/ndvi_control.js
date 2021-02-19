$(document).ready(function () {
	var lokasi = document.getElementById("lokasi_Gis").value;
	$.ajax({
		url: site_url + "/GIS_Dashboard/trend_ndvi",
		method: "POST",
		data: {
			lokasi: lokasi
		},
		async: true,
		dataType: 'json',
		success: function (data) {
			am4core.ready(function () {

				// Themes begin
				am4core.useTheme(am4themes_animated);
				// Themes end

				var chart = am4core.create("line_ven", am4charts.XYChart);

				chart.data = [{
						"range": "0-0.05",
						"f-1": data[0].satu,
						"f-2": data[1].satu,
						"f-3": data[2].satu,
						"f-4": data[3].satu,
						"f-5": data[4].satu,
						"f-6": data[5].satu,
						"f-7": data[6].satu,
						"lineColor": "#d10e00"
					}, {
						"range": "0.05-0.1",
						"f-1": data[0].dua,
						"f-2": data[1].dua,
						"f-3": data[2].dua,
						"f-4": data[3].dua,
						"f-5": data[4].dua,
						"f-6": data[5].dua,
						"f-7": data[6].dua,
						"lineColor": "#f21000"

					}, {
						"range": "0.1-0.15",
						"f-1": data[0].tiga,
						"f-2": data[1].tiga,
						"f-3": data[2].tiga,
						"f-4": data[3].tiga,
						"f-5": data[4].tiga,
						"f-6": data[5].tiga,
						"f-7": data[6].tiga,
						"lineColor": "#ff1100"

					}, {
						"range": "0.15-0.2",
						"f-1": data[0].empat,
						"f-2": data[1].empat,
						"f-3": data[2].empat,
						"f-4": data[3].empat,
						"f-5": data[4].empat,
						"f-6": data[5].empat,
						"f-7": data[6].empat,
						"lineColor": "#ff4400"

					}, {
						"range": "0.2-0.25",
						"f-1": data[0].lima,
						"f-2": data[1].lima,
						"f-3": data[2].lima,
						"f-4": data[3].lima,
						"f-5": data[4].lima,
						"f-6": data[5].lima,
						"f-7": data[6].lima,
						"lineColor": "#ff6600"

					}, {
						"range": "0.25-0.3",
						"f-1": data[0].enam,
						"f-2": data[1].enam,
						"f-3": data[2].enam,
						"f-4": data[3].enam,
						"f-5": data[4].enam,
						"f-6": data[5].enam,
						"f-7": data[6].enam,
						"lineColor": "#ff8c00"

					}, {
						"range": "0.3-0.35",
						"f-1": data[0].tujuh,
						"f-2": data[1].tujuh,
						"f-3": data[2].tujuh,
						"f-4": data[3].tujuh,
						"f-5": data[4].tujuh,
						"f-6": data[5].tujuh,
						"f-7": data[6].tujuh,
						"lineColor": "#ffb700"

					}, {
						"range": "0.4-0.45",
						"f-1": data[0].delapan,
						"f-2": data[1].delapan,
						"f-3": data[2].delapan,
						"f-4": data[3].delapan,
						"f-5": data[4].delapan,
						"f-6": data[5].delapan,
						"f-7": data[6].delapan,
						"lineColor": "#ffd500"

					}, {
						"range": "0.45-0.5",
						"f-1": data[0].sembilan,
						"f-2": data[1].sembilan,
						"f-3": data[2].sembilan,
						"f-4": data[3].sembilan,
						"f-5": data[4].sembilan,
						"f-6": data[5].sembilan,
						"f-7": data[6].sembilan,
						"lineColor": "#fffb00"

					}, {
						"range": "0.5-0.55",
						"f-1": data[0].sepuluh,
						"f-2": data[1].sepuluh,
						"f-3": data[2].sepuluh,
						"f-4": data[3].sepuluh,
						"f-5": data[4].sepuluh,
						"f-6": data[5].sepuluh,
						"f-7": data[6].sepuluh,
						"lineColor": "#ffee00"
					},
					{
						"range": "0.55-0.6",
						"f-1": data[0].sebelas,
						"f-2": data[1].sebelas,
						"f-3": data[2].sebelas,
						"f-4": data[3].sebelas,
						"f-5": data[4].sebelas,
						"f-6": data[5].sebelas,
						"f-7": data[6].sebelas,
						"lineColor": "#fbff00"

					}, {
						"range": "0.6-0.65",
						"f-1": data[1].duabelas,
						"f-2": data[1].duabelas,
						"f-3": data[2].duabelas,
						"f-4": data[3].duabelas,
						"f-5": data[4].duabelas,
						"f-6": data[5].duabelas,
						"f-7": data[6].duabelas,
						"lineColor": "#e5ff00"

					}, {
						"range": "0.65-0.7",
						"f-1": data[0].tigabelas,
						"f-2": data[1].tigabelas,
						"f-3": data[2].tigabelas,
						"f-4": data[3].tigabelas,
						"f-5": data[4].tigabelas,
						"f-6": data[5].tigabelas,
						"f-7": data[6].tigabelas,
						"lineColor": "#ccff00"

					}, {
						"range": "0.7-0.75",
						"f-1": data[0].empatbelas,
						"f-2": data[1].empatbelas,
						"f-3": data[2].empatbelas,
						"f-4": data[3].empatbelas,
						"f-5": data[4].empatbelas,
						"f-6": data[5].empatbelas,
						"f-7": data[6].empatbelas,
						"lineColor": "#aeff00"

					}, {
						"range": "0.7-0.75",
						"f-1": data[0].limabelas,
						"f-2": data[1].limabelas,
						"f-3": data[2].limabelas,
						"f-4": data[3].limabelas,
						"f-5": data[4].limabelas,
						"f-6": data[5].limabelas,
						"f-7": data[6].limabelas,
						"lineColor": "#99ff00"

					}, {
						"range": "0.75-0.8",
						"f-1": data[0].enambelas,
						"f-2": data[1].enambelas,
						"f-3": data[2].enambelas,
						"f-4": data[3].enambelas,
						"f-5": data[4].enambelas,
						"f-6": data[5].enambelas,
						"f-7": data[6].enambelas,
						"lineColor": "#80ff00"

					}, {
						"range": "0.8-0.85",
						"f-1": data[0].tujuhbelas,
						"f-2": data[1].tujuhbelas,
						"f-3": data[2].tujuhbelas,
						"f-4": data[3].tujuhbelas,
						"f-5": data[4].tujuhbelas,
						"f-6": data[5].tujuhbelas,
						"f-7": data[6].tujuhbelas,
						"lineColor": "#66ff00"

					}, {
						"range": "0.85-0.9",
						"f-1": data[0].delapanbelas,
						"f-2": data[1].delapanbelas,
						"f-3": data[2].delapanbelas,
						"f-4": data[3].delapanbelas,
						"f-5": data[4].delapanbelas,
						"f-6": data[5].delapanbelas,
						"f-7": data[6].delapanbelas,
						"lineColor": "#51ff00"

					}, {
						"range": "0.9-0.95",
						"f-1": data[0].sembilanbelas,
						"f-2": data[1].sembilanbelas,
						"f-3": data[2].sembilanbelas,
						"f-4": data[3].sembilanbelas,
						"f-5": data[4].sembilanbelas,
						"f-6": data[5].sembilanbelas,
						"f-7": data[6].sembilanbelas,
						"lineColor": "#40ff00"

					}, {
						"range": "0.95-1",
						"f-1": data[0].duapuluh,
						"f-2": data[1].duapuluh,
						"f-3": data[2].duapuluh,
						"f-4": data[3].duapuluh,
						"f-5": data[4].duapuluh,
						"f-6": data[5].duapuluh,
						"f-7": data[6].duapuluh,
						"lineColor": "#00ff08"

					}
				];

				var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
				categoryAxis.renderer.grid.template.location = 0;
				categoryAxis.renderer.ticks.template.disabled = true;
				categoryAxis.renderer.line.opacity = 0;
				categoryAxis.renderer.grid.template.disabled = true;
				categoryAxis.renderer.minGridDistance = 40;
				categoryAxis.dataFields.category = "range";
				categoryAxis.startLocation = 0.4;
				categoryAxis.endLocation = 0.6;
				categoryAxis.fontSize = 10;

				var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
				valueAxis.tooltip.disabled = true;
				valueAxis.renderer.grid.template.disabled = true;
				valueAxis.renderer.labels.template.disabled = true;

				var series = chart.series.push(new am4charts.LineSeries());
				series.dataFields.categoryX = "range";
				series.name = "f-1";
				series.dataFields.valueY = "f-1";
				series.tooltipHTML = "<span style='font-size:14px; color:#000000;'><b>F-1 : </b></span><span style='font-size:14px; color:#000000;'><b>{valueY.value}%</b></span>";
				series.tooltipText = "[#000]{valueY.value}[/]";
				series.tooltip.getStrokeFromObject = true;
				series.tooltip.background.strokeWidth = 3;
				series.tooltip.getFillFromObject = false;
				series.strokeWidth = 7;
				series.propertyFields.stroke = "lineColor";


				var series2 = chart.series.push(new am4charts.LineSeries());
				series2.name = "f-2";
				series2.dataFields.categoryX = "range";
				series2.dataFields.valueY = "f-2";
				series2.tooltipHTML = "<span style='font-size:14px; color:#000000;'><b>F-2 : </b></span><span style='font-size:14px; color:#000000;'><b>{valueY.value}%</b></span>";
				series2.tooltipText = "[#000]{valueY.value}[/]";
				series2.tooltip.background.fill = am4core.color("#FFF");
				series2.tooltip.getFillFromObject = false;
				series2.tooltip.getStrokeFromObject = true;
				series2.tooltip.background.strokeWidth = 3;
				series2.strokeWidth = 7;
				series2.propertyFields.stroke = "lineColor";

				var series3 = chart.series.push(new am4charts.LineSeries());
				series3.name = "f-3";
				series3.dataFields.categoryX = "range";
				series3.dataFields.valueY = "f-3";
				series3.tooltipHTML = "<span style='font-size:14px; color:#000000;'><b>F-3 : </b></span><span style='font-size:14px; color:#000000;'><b>{valueY.value}%</b></span>";
				series3.tooltipText = "[#000]{valueY.value}[/]";
				series3.tooltip.background.fill = am4core.color("#FFF");
				series3.tooltip.getFillFromObject = false;
				series3.tooltip.getStrokeFromObject = true;
				series3.tooltip.background.strokeWidth = 3;
				series3.defaultState.transitionDuration = 1000;
				series3.strokeWidth = 7;
				series3.propertyFields.stroke = "lineColor";


				var series4 = chart.series.push(new am4charts.LineSeries());
				series4.name = "f-4";
				series4.dataFields.categoryX = "range";
				series4.dataFields.valueY = "f-4";
				series4.tooltipHTML = "<span style='font-size:14px; color:#000000;'><b>F-4 : </b></span><span style='font-size:14px; color:#000000;'><b>{valueY.value}%</b></span>";
				series4.tooltipText = "[#000]{valueY.value}[/]";
				series4.tooltip.background.fill = am4core.color("#FFF");
				series4.tooltip.getFillFromObject = false;
				series4.tooltip.getStrokeFromObject = true;
				series4.tooltip.background.strokeWidth = 3;
				series4.defaultState.transitionDuration = 1000;
				series4.strokeWidth = 7;
				series4.propertyFields.stroke = "lineColor";


				var series5 = chart.series.push(new am4charts.LineSeries());
				series5.name = "f-5";
				series5.dataFields.categoryX = "range";
				series5.dataFields.valueY = "f-5";
				series5.tooltipHTML = "<span style='font-size:14px; color:#000000;'><b>F-5 : </b></span><span style='font-size:14px; color:#000000;'><b>{valueY.value}%</b></span>";
				series5.tooltipText = "[#000]{valueY.value}[/]";
				series5.tooltip.background.fill = am4core.color("#FFF");
				series5.tooltip.getFillFromObject = false;
				series5.tooltip.getStrokeFromObject = true;
				series5.tooltip.background.strokeWidth = 3;
				series5.defaultState.transitionDuration = 1000;
				series5.strokeWidth = 7;
				series5.propertyFields.stroke = "lineColor";


				var series6 = chart.series.push(new am4charts.LineSeries());
				series6.name = "f-6";
				series6.dataFields.categoryX = "range";
				series6.dataFields.valueY = "f-6";
				series6.tooltipHTML = "<span style='font-size:14px; color:#000000;'><b>F-6 : </b></span><span style='font-size:14px; color:#000000;'><b>{valueY.value}%</b></span>";
				series6.tooltipText = "[#000]{valueY.value}[/]";
				series6.tooltip.background.fill = am4core.color("#FFF");
				series6.tooltip.getFillFromObject = false;
				series6.tooltip.getStrokeFromObject = true;
				series6.tooltip.background.strokeWidth = 3;
				series6.defaultState.transitionDuration = 1000;
				series6.strokeWidth = 7;
				series6.propertyFields.stroke = "lineColor";


				var series7 = chart.series.push(new am4charts.LineSeries());
				series7.name = "f-7";
				series7.dataFields.categoryX = "range";
				series7.dataFields.valueY = "f-7";
				series7.tooltipHTML = "<span style='font-size:14px; color:#000000;'><b>F-7 : </b></span><span style='font-size:14px; color:#000000;'><b>{valueY.value}%</b></span>";
				series7.tooltipText = "[#000]{valueY.value}[/]";
				series7.tooltip.background.fill = am4core.color("#FFF");
				series7.tooltip.getFillFromObject = false;
				series7.tooltip.getStrokeFromObject = true;
				series7.tooltip.background.strokeWidth = 3;
				series7.defaultState.transitionDuration = 1000;
				series7.strokeWidth = 4;
				series7.propertyFields.stroke = "lineColor";


				chart.cursor = new am4charts.XYCursor();

			}); // end am4core.ready()


		}
	});


	$('#lokasi_Gis').change(function () {
		var lokasi = $(this).val();
		$.ajax({
			url: site_url + "/GIS_Dashboard/trend_ndvi",
			method: "POST",
			data: {
				lokasi: lokasi
			},
			async: true,
			dataType: 'json',
			success: function (data) {
				am4core.ready(function () {

					// Themes begin
					am4core.useTheme(am4themes_animated);
					// Themes end

					var chart = am4core.create("line_ven", am4charts.XYChart);

					chart.data = [{
							"range": "0-0.05",
							"f-1": data[0].satu,
							"f-2": data[1].satu,
							"f-3": data[2].satu,
							"f-4": data[3].satu,
							"f-5": data[4].satu,
							"f-6": data[5].satu,
							"f-7": data[6].satu,
							"lineColor": "#d10e00"
						}, {
							"range": "0.05-0.1",
							"f-1": data[0].dua,
							"f-2": data[1].dua,
							"f-3": data[2].dua,
							"f-4": data[3].dua,
							"f-5": data[4].dua,
							"f-6": data[5].dua,
							"f-7": data[6].dua,
							"lineColor": "#f21000"

						}, {
							"range": "0.1-0.15",
							"f-1": data[0].tiga,
							"f-2": data[1].tiga,
							"f-3": data[2].tiga,
							"f-4": data[3].tiga,
							"f-5": data[4].tiga,
							"f-6": data[5].tiga,
							"f-7": data[6].tiga,
							"lineColor": "#ff1100"

						}, {
							"range": "0.15-0.2",
							"f-1": data[0].empat,
							"f-2": data[1].empat,
							"f-3": data[2].empat,
							"f-4": data[3].empat,
							"f-5": data[4].empat,
							"f-6": data[5].empat,
							"f-7": data[6].empat,
							"lineColor": "#ff4400"

						}, {
							"range": "0.2-0.25",
							"f-1": data[0].lima,
							"f-2": data[1].lima,
							"f-3": data[2].lima,
							"f-4": data[3].lima,
							"f-5": data[4].lima,
							"f-6": data[5].lima,
							"f-7": data[6].lima,
							"lineColor": "#ff6600"

						}, {
							"range": "0.25-0.3",
							"f-1": data[0].enam,
							"f-2": data[1].enam,
							"f-3": data[2].enam,
							"f-4": data[3].enam,
							"f-5": data[4].enam,
							"f-6": data[5].enam,
							"f-7": data[6].enam,
							"lineColor": "#ff8c00"

						}, {
							"range": "0.3-0.35",
							"f-1": data[0].tujuh,
							"f-2": data[1].tujuh,
							"f-3": data[2].tujuh,
							"f-4": data[3].tujuh,
							"f-5": data[4].tujuh,
							"f-6": data[5].tujuh,
							"f-7": data[6].tujuh,
							"lineColor": "#ffb700"

						}, {
							"range": "0.4-0.45",
							"f-1": data[0].delapan,
							"f-2": data[1].delapan,
							"f-3": data[2].delapan,
							"f-4": data[3].delapan,
							"f-5": data[4].delapan,
							"f-6": data[5].delapan,
							"f-7": data[6].delapan,
							"lineColor": "#ffd500"

						}, {
							"range": "0.45-0.5",
							"f-1": data[0].sembilan,
							"f-2": data[1].sembilan,
							"f-3": data[2].sembilan,
							"f-4": data[3].sembilan,
							"f-5": data[4].sembilan,
							"f-6": data[5].sembilan,
							"f-7": data[6].sembilan,
							"lineColor": "#fffb00"

						}, {
							"range": "0.5-0.55",
							"f-1": data[0].sepuluh,
							"f-2": data[1].sepuluh,
							"f-3": data[2].sepuluh,
							"f-4": data[3].sepuluh,
							"f-5": data[4].sepuluh,
							"f-6": data[5].sepuluh,
							"f-7": data[6].sepuluh,
							"lineColor": "#ffee00"
						},
						{
							"range": "0.55-0.6",
							"f-1": data[0].sebelas,
							"f-2": data[1].sebelas,
							"f-3": data[2].sebelas,
							"f-4": data[3].sebelas,
							"f-5": data[4].sebelas,
							"f-6": data[5].sebelas,
							"f-7": data[6].sebelas,
							"lineColor": "#fbff00"

						}, {
							"range": "0.6-0.65",
							"f-1": data[1].duabelas,
							"f-2": data[1].duabelas,
							"f-3": data[2].duabelas,
							"f-4": data[3].duabelas,
							"f-5": data[4].duabelas,
							"f-6": data[5].duabelas,
							"f-7": data[6].duabelas,
							"lineColor": "#e5ff00"

						}, {
							"range": "0.65-0.7",
							"f-1": data[0].tigabelas,
							"f-2": data[1].tigabelas,
							"f-3": data[2].tigabelas,
							"f-4": data[3].tigabelas,
							"f-5": data[4].tigabelas,
							"f-6": data[5].tigabelas,
							"f-7": data[6].tigabelas,
							"lineColor": "#ccff00"

						}, {
							"range": "0.7-0.75",
							"f-1": data[0].empatbelas,
							"f-2": data[1].empatbelas,
							"f-3": data[2].empatbelas,
							"f-4": data[3].empatbelas,
							"f-5": data[4].empatbelas,
							"f-6": data[5].empatbelas,
							"f-7": data[6].empatbelas,
							"lineColor": "#aeff00"

						}, {
							"range": "0.7-0.75",
							"f-1": data[0].limabelas,
							"f-2": data[1].limabelas,
							"f-3": data[2].limabelas,
							"f-4": data[3].limabelas,
							"f-5": data[4].limabelas,
							"f-6": data[5].limabelas,
							"f-7": data[6].limabelas,
							"lineColor": "#99ff00"

						}, {
							"range": "0.75-0.8",
							"f-1": data[0].enambelas,
							"f-2": data[1].enambelas,
							"f-3": data[2].enambelas,
							"f-4": data[3].enambelas,
							"f-5": data[4].enambelas,
							"f-6": data[5].enambelas,
							"f-7": data[6].enambelas,
							"lineColor": "#80ff00"

						}, {
							"range": "0.8-0.85",
							"f-1": data[0].tujuhbelas,
							"f-2": data[1].tujuhbelas,
							"f-3": data[2].tujuhbelas,
							"f-4": data[3].tujuhbelas,
							"f-5": data[4].tujuhbelas,
							"f-6": data[5].tujuhbelas,
							"f-7": data[6].tujuhbelas,
							"lineColor": "#66ff00"

						}, {
							"range": "0.85-0.9",
							"f-1": data[0].delapanbelas,
							"f-2": data[1].delapanbelas,
							"f-3": data[2].delapanbelas,
							"f-4": data[3].delapanbelas,
							"f-5": data[4].delapanbelas,
							"f-6": data[5].delapanbelas,
							"f-7": data[6].delapanbelas,
							"lineColor": "#51ff00"

						}, {
							"range": "0.9-0.95",
							"f-1": data[0].sembilanbelas,
							"f-2": data[1].sembilanbelas,
							"f-3": data[2].sembilanbelas,
							"f-4": data[3].sembilanbelas,
							"f-5": data[4].sembilanbelas,
							"f-6": data[5].sembilanbelas,
							"f-7": data[6].sembilanbelas,
							"lineColor": "#40ff00"

						}, {
							"range": "0.95-1",
							"f-1": data[0].duapuluh,
							"f-2": data[1].duapuluh,
							"f-3": data[2].duapuluh,
							"f-4": data[3].duapuluh,
							"f-5": data[4].duapuluh,
							"f-6": data[5].duapuluh,
							"f-7": data[6].duapuluh,
							"lineColor": "#00ff08"

						}
					];

					var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
					categoryAxis.renderer.grid.template.location = 0;
					categoryAxis.renderer.ticks.template.disabled = true;
					categoryAxis.renderer.line.opacity = 0;
					categoryAxis.renderer.grid.template.disabled = true;
					categoryAxis.renderer.minGridDistance = 40;
					categoryAxis.dataFields.category = "range";
					categoryAxis.startLocation = 0.4;
					categoryAxis.endLocation = 0.6;
					categoryAxis.fontSize = 10;

					var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
					valueAxis.tooltip.disabled = true;
					valueAxis.renderer.grid.template.disabled = true;
					valueAxis.renderer.labels.template.disabled = true;
					valueAxis.min = 0;
					valueAxis.max = 25;
					valueAxis.strictMinMax = true;
					valueAxis.renderer.minGridDistance = 0.5;

					var series = chart.series.push(new am4charts.LineSeries());
					series.dataFields.categoryX = "range";
					series.name = "f-1";
					series.dataFields.valueY = "f-1";
					series.tooltipHTML = "<span style='font-size:14px; color:#000000;'><b>F-1 : </b></span><span style='font-size:14px; color:#000000;'><b>{valueY.value}%</b></span>";
					series.tooltipText = "[#000]{valueY.value}[/]";
					series.tooltip.getStrokeFromObject = true;
					series.tooltip.background.strokeWidth = 3;
					series.tooltip.getFillFromObject = false;
					series.strokeWidth = 3;
					series.propertyFields.stroke = "lineColor";

					var series2 = chart.series.push(new am4charts.LineSeries());
					series2.name = "f-2";
					series2.dataFields.categoryX = "range";
					series2.dataFields.valueY = "f-2";
					series2.tooltipHTML = "<span style='font-size:14px; color:#000000;'><b>F-2 : </b></span><span style='font-size:14px; color:#000000;'><b>{valueY.value}%</b></span>";
					series2.tooltipText = "[#000]{valueY.value}[/]";
					series2.tooltip.background.fill = am4core.color("#FFF");
					series2.tooltip.getFillFromObject = false;
					series2.tooltip.getStrokeFromObject = true;
					series2.tooltip.background.strokeWidth = 3;
					series2.strokeWidth = 3;
					series2.propertyFields.stroke = "lineColor";


					var series3 = chart.series.push(new am4charts.LineSeries());
					series3.name = "f-3";
					series3.dataFields.categoryX = "range";
					series3.dataFields.valueY = "f-3";
					series3.tooltipHTML = "<span style='font-size:14px; color:#000000;'><b>F-3 : </b></span><span style='font-size:14px; color:#000000;'><b>{valueY.value}%</b></span>";
					series3.tooltipText = "[#000]{valueY.value}[/]";
					series3.tooltip.background.fill = am4core.color("#FFF");
					series3.tooltip.getFillFromObject = false;
					series3.tooltip.getStrokeFromObject = true;
					series3.tooltip.background.strokeWidth = 3;
					series3.defaultState.transitionDuration = 1000;
					series3.strokeWidth = 3;
					series3.propertyFields.stroke = "lineColor";


					var series4 = chart.series.push(new am4charts.LineSeries());
					series4.name = "f-4";
					series4.dataFields.categoryX = "range";
					series4.dataFields.valueY = "f-4";
					series4.tooltipHTML = "<span style='font-size:14px; color:#000000;'><b>F-4 : </b></span><span style='font-size:14px; color:#000000;'><b>{valueY.value}%</b></span>";
					series4.tooltipText = "[#000]{valueY.value}[/]";
					series4.tooltip.background.fill = am4core.color("#FFF");
					series4.tooltip.getFillFromObject = false;
					series4.tooltip.getStrokeFromObject = true;
					series4.tooltip.background.strokeWidth = 3;
					series4.defaultState.transitionDuration = 1000;
					series4.strokeWidth = 3;
					series4.propertyFields.stroke = "lineColor";


					var series5 = chart.series.push(new am4charts.LineSeries());
					series5.name = "f-5";
					series5.dataFields.categoryX = "range";
					series5.dataFields.valueY = "f-5";
					series5.tooltipHTML = "<span style='font-size:14px; color:#000000;'><b>F-5 : </b></span><span style='font-size:14px; color:#000000;'><b>{valueY.value}%</b></span>";
					series5.tooltipText = "[#000]{valueY.value}[/]";
					series5.tooltip.background.fill = am4core.color("#FFF");
					series5.tooltip.getFillFromObject = false;
					series5.tooltip.getStrokeFromObject = true;
					series5.tooltip.background.strokeWidth = 3;
					series5.defaultState.transitionDuration = 1000;
					series5.strokeWidth = 3;
					series5.propertyFields.stroke = "lineColor";



					var series6 = chart.series.push(new am4charts.LineSeries());
					series6.name = "f-6";
					series6.dataFields.categoryX = "range";
					series6.dataFields.valueY = "f-6";
					series6.tooltipHTML = "<span style='font-size:14px; color:#000000;'><b>F-6 : </b></span><span style='font-size:14px; color:#000000;'><b>{valueY.value}%</b></span>";
					series6.tooltipText = "[#000]{valueY.value}[/]";
					series6.tooltip.background.fill = am4core.color("#FFF");
					series6.tooltip.getFillFromObject = false;
					series6.tooltip.getStrokeFromObject = true;
					series6.tooltip.background.strokeWidth = 3;
					series6.defaultState.transitionDuration = 1000;
					series6.strokeWidth = 3;
					series6.propertyFields.stroke = "lineColor";


					var series7 = chart.series.push(new am4charts.LineSeries());
					series7.name = "f-7";
					series7.dataFields.categoryX = "range";
					series7.dataFields.valueY = "f-7";
					series7.tooltipHTML = "<span style='font-size:14px; color:#000000;'><b>F-7 : </b></span><span style='font-size:14px; color:#000000;'><b>{valueY.value}%</b></span>";
					series7.tooltipText = "[#000]{valueY.value}[/]";
					series7.tooltip.background.fill = am4core.color("#FFF");
					series7.tooltip.getFillFromObject = false;
					series7.tooltip.getStrokeFromObject = true;
					series7.tooltip.background.strokeWidth = 3;
					series7.defaultState.transitionDuration = 1000;
					series7.strokeWidth = 3;
					series7.propertyFields.fill = "#000";
					series7.propertyFields.stroke = "lineColor";


					chart.cursor = new am4charts.XYCursor();

				}); // end am4core.ready()
			}
		});
		return false;
	});
	$.ajax({
		url: site_url + "/GIS_Dashboard/legeda1_ndvi",
		method: "POST",
		data: {
			lokasi: lokasi
		},
		async: true,
		dataType: 'json',
		success: function (data) {
			if (data.length == 0) {
				document.getElementById("satu").innerHTML = 0 + '%';
				document.getElementById("dua").innerHTML = 0 + '%';
				document.getElementById("tiga").innerHTML = 0 + '%';
				document.getElementById("empat").innerHTML = 0 + '%';
				document.getElementById("lima").innerHTML = 0 + '%';
				document.getElementById("enam").innerHTML = 0 + '%';
			} else {
				document.getElementById("satu").innerHTML = data[0].satu + '%';
				document.getElementById("dua").innerHTML = data[0].dua + '%';
				document.getElementById("tiga").innerHTML = data[0].tiga + '%';
				document.getElementById("empat").innerHTML = data[0].empat + '%';
				document.getElementById("lima").innerHTML = data[0].lima + '%';
				document.getElementById("enam").innerHTML = data[0].enam + '%';
			}

		}
    });
    

	$('#lokasi_Gis').change(function () {
		var lokasi = $(this).val();
		$.ajax({
			url: site_url + "/GIS_Dashboard/legeda1_ndvi",
			method: "POST",
			data: {
				lokasi: lokasi
			},
			async: true,
			dataType: 'json',
			success: function (data) {
				if (data.length == 0) {
					document.getElementById("satu").innerHTML = 0 + '%';
					document.getElementById("dua").innerHTML = 0 + '%';
					document.getElementById("tiga").innerHTML = 0 + '%';
					document.getElementById("empat").innerHTML = 0 + '%';
					document.getElementById("lima").innerHTML = 0 + '%';
					document.getElementById("enam").innerHTML = 0 + '%';
				} else {
					document.getElementById("satu").innerHTML = data[0].satu + '%';
					document.getElementById("dua").innerHTML = data[0].dua + '%';
					document.getElementById("tiga").innerHTML = data[0].tiga + '%';
					document.getElementById("empat").innerHTML = data[0].empat + '%';
					document.getElementById("lima").innerHTML = data[0].lima + '%';
					document.getElementById("enam").innerHTML = data[0].enam + '%';
				}

			}
		});
		return false;
	});

	$.ajax({
		url: site_url + "/GIS_Dashboard/legeda2_ndvi",
		method: "POST",
		data: {
			lokasi: lokasi
		},
		async: true,
		dataType: 'json',
		success: function (data) {
			if (data.length == 0) {
				document.getElementById("satu1").innerHTML = 0 + '%';
				document.getElementById("dua1").innerHTML = 0 + '%';
				document.getElementById("tiga1").innerHTML = 0 + '%';
			} else {
                document.getElementById("satu1").innerHTML = data[0].satu1 + '%';
                document.getElementById("dua1").innerHTML = data[0].dua1 + '%';
                document.getElementById("tiga1").innerHTML = data[0].tiga1 + '%';
			}

		}
	});


	$('#lokasi_Gis').change(function () {
		var lokasi = $(this).val();
		$.ajax({
			url: site_url + "/GIS_Dashboard/legeda2_ndvi",
			method: "POST",
			data: {
				lokasi: lokasi
			},
			async: true,
			dataType: 'json',
			success: function (data) {
				if (data.length == 0) {
					document.getElementById("satu1").innerHTML = 0 + '%';
					document.getElementById("dua1").innerHTML = 0 + '%';
					document.getElementById("tiga1").innerHTML = 0 + '%';
				} else {
					document.getElementById("satu1").innerHTML = data[0].satu1 + '%';
					document.getElementById("dua1").innerHTML = data[0].dua1 + '%';
					document.getElementById("tiga1").innerHTML = data[0].tiga1 + '%';
				}

			}
		});
		return false;
	});


	$.ajax({
		url: site_url + "/GIS_Dashboard/date_ndvi",
		method: "POST",
		data: {
			lokasi: lokasi
		},
		async: true,
		dataType: 'json',
		success: function (data) {
			var html = '';
			var i;
			for (i = 0; i < data.length; i++) {
				html += '<option value="' + data[i].date + '&' + data[i].location + '&' + data[i].jenis + '&' + data[i].kategori + '&' + data[i].photo_id + '">' + data[i].date + '</option>';
			}
			$('#myCurrPictselector').html(html);

			if (data.length == 0) {
				document.getElementById("pictDate").innerHTML = "-";
				document.getElementById("popPict").innerHTML = "-";
				$("#mainContentImage,#popPict").attr(
					"src",
					"https://dummyimage.com/450x450/000/f59f00&text=No+Photo"
				);
				$("#pdfDownloadButton").attr(
					"href",
					"#"
				);
					document.querySelector("#executiveDescription").innerHTML =
						"Currently no Summary at this location";
				

			} else {
				jQuery.ajax({
					type: "POST",
					url: site_url + "/GIS_Dashboard/getPictByDateTime",
					data: {
						date: data[0].date,
						location: data[0].location,
						jenis: data[0].jenis,
						kategori: data[0].kategori,
					},
					dataType: "json",
					success: function (res) {
						$("#mainContentImage,#popPict").attr(
							"src",
							base_url + "/assets/upload/gis_pict/" + res[0].image
						);
						$("#pdfDownloadButton").attr(
							"href",
							base_url + "/assets/upload/gis_pdf/" + res[0].pdf
						);
						if (res[0].description != "") {
							document.querySelector("#executiveDescription").innerHTML =
								res[0].description;
						} else {
							document.querySelector("#executiveDescription").innerHTML =
								"Currently no Summary at this location";
						}
						document.getElementById("pictDate").innerHTML = res[0].date;
						document.getElementById("popPict").innerHTML = res[0].date;
					},
				});
			}

		}
	});


	$('#lokasi_Gis').change(function () {
		var lokasi = $(this).val();
		$.ajax({
			url: site_url + "/GIS_Dashboard/date_ndvi",
			method: "POST",
			data: {
				lokasi: lokasi
			},
			async: true,
			dataType: 'json',
			success: function (data) {
				var html = '';
				var i;
				for (i = 0; i < data.length; i++) {
					html += '<option value="' + data[i].date + '&' + data[i].location + '&' + data[i].jenis + '&' + data[i].kategori + '&' + data[i].photo_id + '">' + data[i].date + '</option>';
				}
				$('#myCurrPictselector').html(html);

				if (data.length == 0) {
					document.getElementById("pictDate").innerHTML = "-";
					document.getElementById("popPict").innerHTML = "-";
					$("#mainContentImage,#popPict").attr(
						"src",
						"https://dummyimage.com/450x450/000/f59f00&text=No+Photo"
					);
					$("#pdfDownloadButton").attr(
						"href",
						"#"
					);
						document.querySelector("#executiveDescription").innerHTML =
							"Currently no Summary at this location";
					

				} else {
					jQuery.ajax({
						type: "POST",
						url: site_url + "/GIS_Dashboard/getPictByDateTime",
						data: {
							date: data[0].date,
							location: data[0].location,
							jenis: data[0].jenis,
							kategori: data[0].kategori,
						},
						dataType: "json",
						success: function (res) {
							$("#mainContentImage,#popPict").attr(
								"src",
								base_url + "/assets/upload/gis_pict/" + res[0].image
							);
							$("#pdfDownloadButton").attr(
								"href",
								base_url + "/assets/upload/gis_pdf/" + res[0].pdf
							);
							if (res[0].description != "") {
								document.querySelector("#executiveDescription").innerHTML =
									res[0].description;
							} else {
								document.querySelector("#executiveDescription").innerHTML =
									"Currently no Summary at this location";
							}
							document.getElementById("pictDate").innerHTML = res[0].date;
							document.getElementById("popPict").innerHTML = res[0].date;
						},
					});
				}

			}
		});
		return false;
	});

});