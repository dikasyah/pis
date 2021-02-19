var lokasi = document.getElementById("lokasi_Gis").value;
$.ajax({
    url: site_url + "/GIS_Dashboard/date_wf",
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
        url: site_url + "/GIS_Dashboard/date_wf",
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