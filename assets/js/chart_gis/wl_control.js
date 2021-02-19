var lokasi = document.getElementById("lokasi_Gis").value;
$.ajax({
  url: site_url + "/GIS_Dashboard/date_wl",
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

      document.querySelector("#executiveDescription").innerHTML = "Currently no Summary at this location";


      newWaterLoggingData = [
        parseFloat(0),
        parseFloat(0),
        parseFloat(0),
        parseFloat(0),
        parseFloat(0),
      ];

      am4core.ready(function () {

        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end

        // Create chart instance
        var chart = am4core.create("distribution", am4charts.PieChart);
        chart.logo.disabled = true;
        // Add data

        var label = chart.chartContainer.createChild(am4core.Label);
        label.text = "No Data Show";
        label.align = "center";

      }); // end am4core.ready()
      console.log(total);
      total = 0;
      for (let i = 0; i < mydata2.datasets[0].data.length; i++) {
        total += mydata2.datasets[0].data[i];
        valLegend = "#val" + (i + 1);
        document.querySelector(
            valLegend
          ).innerHTML = mydata2.datasets[0].data[i]
          .toString()
          .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      }
      document.querySelector(
        "#valTot"
      ).innerHTML = total.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");



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

      jQuery.ajax({
        type: "POST",
        url: site_url + "/GIS_Dashboard/getWatterLogging",
        data: {
          photo_id: data[0].photo_id,
        },
        dataType: "json",
        success: function (res) {


          newWaterLoggingData = [
            parseFloat(res[0].Dry),
            parseFloat(res[0].Moist),
            parseFloat(res[0].Wet),
            parseFloat(res[0].Very_Wet),
            parseFloat(res[0].Flood),
          ];
          am4core.ready(function () {

            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            // Create chart instance
            var chart = am4core.create("distribution", am4charts.PieChart);
            chart.logo.disabled = true;
            // Add data
            chart.data = [{
              "country": "Dry",
              "litres": newWaterLoggingData[0],
              "color": am4core.color("#FF0000")
            }, {
              "country": "Moist",
              "litres": newWaterLoggingData[1],
              "color": am4core.color("#FFFF01")
            }, {
              "country": "Wet",
              "litres": newWaterLoggingData[2],
              "color": am4core.color("#FFBC01")
            }, {
              "country": "Very Wet",
              "litres": newWaterLoggingData[3],
              "color": am4core.color("#1C8D00")
            }, {
              "country": "Flood",
              "litres": newWaterLoggingData[4],
              "color": am4core.color("#0434F6")
            }];

            // Add and configure Series
            var pieSeries = chart.series.push(new am4charts.PieSeries());
            pieSeries.dataFields.value = "litres";
            pieSeries.dataFields.category = "country";
            pieSeries.slices.template.stroke = am4core.color("#fff");
            pieSeries.slices.template.strokeOpacity = 1;
            pieSeries.slices.template.propertyFields.fill = "color";
            pieSeries.labels.template.fontSize = 10.5;
            pieSeries.labels.template.fontWeight = "bold";

            chart.hiddenState.properties.radius = am4core.percent(0);


          }); // end am4core.ready()
          console.log(total);
          total = 0;
          for (let i = 0; i < mydata2.datasets[0].data.length; i++) {
            total += mydata2.datasets[0].data[i];
            valLegend = "#val" + (i + 1);
            document.querySelector(
                valLegend
              ).innerHTML = mydata2.datasets[0].data[i]
              .toString()
              .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
          }
          document.querySelector(
            "#valTot"
          ).innerHTML = total.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        },
      });
    }

  }
});


$('#lokasi_Gis').change(function () {
  var lokasi = $(this).val();
  $.ajax({
    url: site_url + "/GIS_Dashboard/date_wl",
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

        document.querySelector("#executiveDescription").innerHTML = "Currently no Summary at this location";



        newWaterLoggingData = [
          parseFloat(0),
          parseFloat(0),
          parseFloat(0),
          parseFloat(0),
          parseFloat(0),
        ];

        am4core.ready(function () {

          // Themes begin
          am4core.useTheme(am4themes_animated);
          // Themes end

          // Create chart instance
          var chart = am4core.create("distribution", am4charts.PieChart);
          chart.logo.disabled = true;
          // Add data

          var label = chart.chartContainer.createChild(am4core.Label);
          label.text = "No Data Show";
          label.align = "center";

        }); // end am4core.ready()
        console.log(newWaterLoggingData);
        total = 0;
        for (let i = 0; i < newWaterLoggingData.length; i++) {
          total += newWaterLoggingData[i];
          valLegend = "#val" + (i + 1);
          document.querySelector(
              valLegend
            ).innerHTML = newWaterLoggingData[i]
            .toString()
            .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
        document.querySelector(
          "#valTot"
        ).innerHTML = total.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");



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

        jQuery.ajax({
          type: "POST",
          url: site_url + "/GIS_Dashboard/getWatterLogging",
          data: {
            photo_id: data[0].photo_id,
          },
          dataType: "json",
          success: function (res) {

            newWaterLoggingData = [
              parseFloat(res[0].Dry),
              parseFloat(res[0].Moist),
              parseFloat(res[0].Wet),
              parseFloat(res[0].Very_Wet),
              parseFloat(res[0].Flood),
            ];
            am4core.ready(function () {

              // Themes begin
              am4core.useTheme(am4themes_animated);
              // Themes end

              // Create chart instance
              var chart = am4core.create("distribution", am4charts.PieChart);
              chart.logo.disabled = true;
              // Add data
              chart.data = [{
                "country": "Dry",
                "litres": newWaterLoggingData[0],
                "color": am4core.color("#FF0000")
              }, {
                "country": "Moist",
                "litres": newWaterLoggingData[1],
                "color": am4core.color("#FFFF01")
              }, {
                "country": "Wet",
                "litres": newWaterLoggingData[2],
                "color": am4core.color("#FFBC01")
              }, {
                "country": "Very Wet",
                "litres": newWaterLoggingData[3],
                "color": am4core.color("#1C8D00")
              }, {
                "country": "Flood",
                "litres": newWaterLoggingData[4],
                "color": am4core.color("#0434F6")
              }];

              // Add and configure Series
              var pieSeries = chart.series.push(new am4charts.PieSeries());
              pieSeries.dataFields.value = "litres";
              pieSeries.dataFields.category = "country";
              pieSeries.slices.template.stroke = am4core.color("#fff");
              pieSeries.slices.template.strokeOpacity = 1;
              pieSeries.slices.template.propertyFields.fill = "color";
              pieSeries.labels.template.fontSize = 10.5;
              pieSeries.labels.template.fontWeight = "bold";

              // This creates initial animation
              pieSeries.hiddenState.properties.opacity = 1;
              pieSeries.hiddenState.properties.endAngle = -10;
              pieSeries.hiddenState.properties.startAngle = -10;

              chart.hiddenState.properties.radius = am4core.percent(0);


            }); // end am4core.ready()
            console.log(total);
            total = 0;
            for (let i = 0; i < newWaterLoggingData.length; i++) {
              total += newWaterLoggingData[i];
              valLegend = "#val" + (i + 1);
              document.querySelector(
                  valLegend
                ).innerHTML = newWaterLoggingData[i]
                .toString()
                .replace(/\B(?=(\d{3})+(?!\d))/g, ".");
            }
            document.querySelector(
              "#valTot"
            ).innerHTML = total.toFixed(2).toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
          },
        });
      }

    }
  });
  return false;
});