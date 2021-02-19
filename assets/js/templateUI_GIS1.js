$(document).ready(function () {
  //change page content based on upper combo box
  //console.log($("#myCurrPictselector").val());
  $("#myCurrPictselector").change(function () {
    var pageArr = $("#myCurrPictselector").val().split("&");
    var date = pageArr[0];
    var location = pageArr[1];
    var jenis = pageArr[2];
    var kategori = pageArr[3];
    var photo_id = pageArr[4];
    jQuery.ajax({
      type: "POST",
      url: site_url + "/GIS_Dashboard/getPictByDateTime",
      data: {
        date: date,
        location: location,
        jenis: jenis,
        kategori: kategori,
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
        document.getElementById("popPict").innerHTML = "-";
      },
    });
    if (page == "WL") {
      jQuery.ajax({
        type: "POST",
        url: site_url + "/GIS_Dashboard/getWatterLogging",
        data: {
          photo_id: photo_id,
        },
        dataType: "json",
        success: function (res) {
          console.log(myChart2);
          newWaterLoggingData = [
            parseFloat(res[0].Dry),
            parseFloat(res[0].Moist),
            parseFloat(res[0].Wet),
            parseFloat(res[0].Very_Wet),
            parseFloat(res[0].Flood),
          ];
          myChart2.data.datasets[0].data = newWaterLoggingData;
          myChart2.update();
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
          ).innerHTML = total.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        },
      });
    }
  });
  //change page content based on upper combo box
  //upload photo
  $("#locChooser").change(function () {
    var newOptions;
    var comboBox = $("#myLocation");
    if (document.getElementById("uploadLocChooser1").checked) {
      // if (comboBox.hasClass("select2")) {
      //   comboBox.select2("destroy");
      //   comboBox.removeClass("select2");
      // }
      newOptions = {
        "Plantation Group 1": "PG1",
        "Plantation Group 2": "PG2",
        "Plantation Group 3": "PG3",
      };
    } else if (document.getElementById("uploadLocChooser2").checked) {
      // if (comboBox.hasClass("select2")) {
      //   comboBox.select2("destroy");
      //   comboBox.removeClass("select2");
      // }
      newOptions = {
        "Wilayah 1": "W01",
        "Wilayah 2": "W02",
        "Wilayah 3": "W03",
        "Wilayah 4": "W04",
        "Wilayah 5": "W05",
        "Wilayah 6": "W06",
        "Wilayah 7": "W07",
        "Wilayah 8": "W08",
        "Wilayah 9": "W09",
        "Wilayah 11": "W11",
        "Wilayah 12": "W12",
        "Wilayah 13": "W13",
        "Wilayah 14": "W14",
      };
    } else if (document.getElementById("uploadLocChooser3").checked) {
      newOptions = {};
      var locList = JSON.parse(locationList);
      for (let i = 0; i < locList.length; i++) {
        newOptions[locList[i].lokasi] = locList[i].lokasi;
      }
      // comboBox.addClass("select2");
      // comboBox.select2();
    }
    comboBox.empty();
    $.each(newOptions, function (key, value) {
      comboBox.append($("<option></option>").attr("value", value).text(key));
    });
  });

  $("#myJenis").change(function () {
    var containerImg = $("#containerPrevImage");
    var containerInpt = $("#containerFileInput");
    var containerWL = $("#containerWaterLoggingInput");
    var excel = $("#buttomexcel");
    var formexcel = $("#formexcel");
    if ($(this).val() == "DSM-Water Logging") {
      containerImg.addClass("on-water-logging");
      containerInpt.addClass("col-lg-1");
      containerInpt.addClass("on-water-logging");
      containerWL.removeClass("display-none");
    } else {
      if (!containerWL.hasClass("display-none")) {
        containerImg.removeClass("on-water-logging");
        containerInpt.removeClass("col-lg-1");
        containerInpt.removeClass("on-water-logging");
        containerWL.addClass("display-none");
      }
    }
    if ($(this).val() == "NDVI-NDVI" ||
    $(this).val() == "NDVI-Plant Weight" ||
    $(this).val() == "NDVI-Plant Disease" ||
    $(this).val() == "NDVI-Sufficiency Of Water" ||
    $(this).val() == "NDVI-Suggestion") {
      excel.show();
      formexcel.show();
    }else{
      excel.hide();
      formexcel.hide();
    }
    
  });

  $("#newPostImage").change(function () {
    imagePreview(this, "#prevUploadImg");
  });
  $("#newPostPDF").change(function () {
    previewPDF(this);
  });
  $("#newPostExcel").change(function () {
    previewExcel(this);
  });

  $("#ImageUploadButton").on("click", function () {
    if (!$("#ImageUploadButton").hasClass("uploading")) {
      if ($("#myJenis").val() == "DSM-Water Logging") {
        let wlInput = $(".input-water-logging");
        let tot = 0;
        for (let i = 0; i < wlInput.length; i++) {
          tot += parseFloat(wlInput.eq(i).val());
        }
        if (
          $("#newPostImage").val() != "" &&
          $("#newPostPDF").val() != "" &&
          tot != 0
        ) {
          let dry = parseFloat($(".input-water-logging").eq(0).val());
          let moist = parseFloat($(".input-water-logging").eq(1).val());
          let wet = parseFloat($(".input-water-logging").eq(2).val());
          let veryWet = parseFloat($(".input-water-logging").eq(3).val());
          let flood = parseFloat($(".input-water-logging").eq(4).val());
          let obj = {
            Dry: dry,
            Moist: moist,
            Wet: wet,
            Very_Wet: veryWet,
            Flood: flood,
          };
          uploadImageAndData(obj, "gis_dsm_water_logging");
          $("#ImageUploadButton").addClass("uploading");
        } else {
          document.querySelector("#alertModalText").innerHTML =
            "Please input all required value";
          openPictPop("unModal");
        }
      } else {
        if ($("#newPostImage").val() != "" && $("#newPostPDF").val() != "") {
          uploadImage();
          $("#ImageUploadButton").addClass("uploading");
        } else {
          document.querySelector("#alertModalText").innerHTML =
            "Please insert both Image and Pdf file";
          openPictPop("unModal");
        }
      }
    }
  });
  //upload photo end
  //change sidebar location
  $("#lokasiGis").change(function () {
    if (page != "UPLD") {
      window.location.href =
        site_url +
        "/GIS_Dashboard/" +
        subpage +
        "?page=" +
        page +
        "&loc=" +
        loc +
        "&currLoc=" +
        $("#lokasiGis").val();
    } else {
      window.location.href =
        site_url +
        "/GIS_Dashboard/Upload?loc=" +
        loc +
        "&currLoc=" +
        $("#lokasiGis").val();
    }
  });
  //change sidebar location end
  //adjust sidebar menu
  $(".gis-sidebar-link").on("click", function () {
    var idx = $(this).index();
    var smList = $(".gis-sidebar-link");
    if ($(this).hasClass("inactive")) {
      if ($("#uploadButton").hasClass("active")) {
        $("#uploadButton").removeClass("active");
        $("#uploadButton").addClass("inactive");
      }
      for (let i = 0; i < smList.length; i++) {
        if (smList.eq(i).parent().hasClass("show-sub")) {
          smList.eq(i).parent().removeClass("show-sub");
          if (smList.eq(i).hasClass("active")) {
            smList.eq(i).removeClass("active");
            smList.eq(i).addClass("inactive");
          }
          if (smList.eq(i).hasClass("semi-inactive")) {
            smList.eq(i).removeClass("semi-inactive");
            smList.eq(i).addClass("inactive");
          }
          var smListChild = $(this)
            .parent()
            .children(".gis-sidebar-submenu")
            .children(".gis-sidebar-submenu-item");

          for (let j = 0; j < smListChild.length; j++) {
            if (smListChild.eq(j).hasClass("active")) {
              smListChild.eq(j).removeClass("active");
              smListChild.eq(j).addClass("inactive");
            }
          }
        }
      }
      $(this).addClass("active");
      $(this).removeClass("inactive");
      $(this).parent().addClass("show-sub");
    }
  });

  $(".gis-sidebar-submenu-item").on("click", function () {
    var csmList = $(".gis-sidebar-submenu-item");
    // var idx = $(this).parent().parent().children(".gis-sidebar-link");
    //console.log(idx);
    if (!$(this).hasClass("active")) {
      if (
        $(this)
          .parent()
          .parent()
          .children(".gis-sidebar-link")
          .hasClass("active")
      ) {
        $(this)
          .parent()
          .parent()
          .children(".gis-sidebar-link")
          .removeClass("active");
        $(this)
          .parent()
          .parent()
          .children(".gis-sidebar-link")
          .addClass("inactive");
      } else {
        for (let i = 0; i < csmList.length; i++) {
          if (csmList.eq(i).hasClass("active")) {
            csmList.eq(i).removeClass("active");
            csmList.eq(i).addClass("inactive");
          }
        }
      }

      $(this).addClass("active");
      $(this).removeClass("inactive");
    }
  });
  $("#uploadButton").on("click", function () {
    var smList = $(".gis-sidebar-link");
    if (!$(this).hasClass("active")) {
      for (let i = 0; i < smList.length; i++) {
        if (smList.eq(i).parent().hasClass("show-sub")) {
          smList.eq(i).parent().removeClass("show-sub");
          if (smList.eq(i).hasClass("active")) {
            smList.eq(i).removeClass("active");
            smList.eq(i).addClass("inactive");
          }
          if (smList.eq(i).hasClass("semi-inactive")) {
            smList.eq(i).removeClass("semi-inactive");
            smList.eq(i).addClass("inactive");
          }
          var smListChild = $(this)
            .parent()
            .children(".gis-sidebar-submenu")
            .children(".gis-sidebar-submenu-item");

          for (let j = 0; j < smListChild.length; j++) {
            if (smListChild.eq(j).hasClass("active")) {
              smListChild.eq(j).removeClass("active");
              smListChild.eq(j).addClass("inactive");
            }
          }
        }
      }
      $(this).addClass("active");
      $(this).removeClass("inactive");
    }
  });

  //adjust sidebar menu end
  $("#pictOverlayGis, #pictOverlayGis2").on("click", function () {
    openPictPop("pictModal");
  });

  //get url parameter
  let objParam = getParams(window.location.href);
  //adjust header text and navbar active

  //adjust header text and navbar active end
  $("#logOutButton").on("click", function () {
    $("#myModal").modal();
  });
  //toggle navbar width
  $("#sidebarTogleGIS").click(function () {
    adjustSidebar();
  });
  //end toggle navbar width
  //back button
  $("#backButton").click(function () {
    window.location.href = site_url + "/GIS_Dashboard/";
  });
  //back button end
});

//adjust sidebar width
function adjustSidebar() {
  let sidebar = $("#sidebar");
  let content = $("#content");
  let linktext = $(".link-text");
  if (!sidebar.hasClass("gis-custom-sidebar-fullsize")) {
    sidebar.addClass("gis-custom-sidebar-fullsize");
    content.addClass("gis-content-fullsize");
    linktext.addClass("link-text-clicked");
  } else {
    sidebar.removeClass("gis-custom-sidebar-fullsize");
    content.removeClass("gis-content-fullsize");
    linktext.removeClass("link-text-clicked");
  }
}
//adjust sidebar width end

//get url parameter
var getParams = function (url) {
  var params = {};
  var parser = document.createElement("a");
  parser.href = url;
  var query = parser.search.substring(1);
  var vars = query.split("&");
  for (var i = 0; i < vars.length; i++) {
    var pair = vars[i].split("=");
    params[pair[0]] = decodeURIComponent(pair[1]);
  }
  return params;
};
//get url parameter end

//get int value from parameter
function getNum(str) {
  let num = parseInt(str.match(/\d+/));
  return num;
}
//end get int value from parameter

function getNumPG(str) {
  let pg = getNum(str);
  if (pg < 5) {
    return "PG1";
  } else if (pg < 9) {
    return "PG2";
  } else {
    return "PG3";
  }
}

function popClose(id) {
  const overlay = document.getElementById("overlay");
  const modal = document.getElementById(id);
  modal.classList.remove("active");
  overlay.classList.remove("active");
}

function openPictPop(key) {
  const overlay = document.getElementById("overlay");
  const modal = document.getElementById(key);
  if (modal == null) return;
  modal.classList.add("active");
  overlay.classList.add("active");
  overlay.addEventListener("click", () => {
    modal.classList.remove("active");
    overlay.classList.remove("active");
  });
}

function lowerPopClose(id) {
  const overlay = document.getElementById("overlayLower");
  const modal = document.getElementById(id);
  modal.classList.remove("active");
  overlay.classList.remove("active");
}

function openLowerPop(key) {
  const overlay = document.getElementById("overlayLower");
  const modal = document.getElementById(key);
  if (modal == null) return;
  modal.classList.add("active");
  overlay.classList.add("active");
  overlay.addEventListener("click", () => {
    modal.classList.remove("active");
    overlay.classList.remove("active");
  });
}

function imagePreview(input, previewID) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $(previewID).attr("src", e.target.result);
    };
    reader.readAsDataURL(input.files[0]); // convert to base64 string
  }
}

function previewPDF(input) {
  if (input.files && input.files[0]) {
    var filename = input.files[0].name;
    document.querySelector("#newPostPDFNames").innerHTML = filename;
  }
  var element = document.getElementById("newPostPDFNames");
  if (isElementOverflowing(element)) {
    wrapContentsInMarquee(element);
  }
}

function previewExcel(input) {
  if (input.files && input.files[0]) {
    var filename = input.files[0].name;
    document.querySelector("#newPostExcelName").innerHTML = filename;
  }
  var element = document.getElementById("newPostExcelName");
  if (isElementOverflowing(element)) {
    wrapContentsInMarquee(element);
  }
}
// change image url to file object
function dataURLtoFile(dataurl, filename) {
  var arr = dataurl.split(","),
    mime = arr[0].match(/:(.*?);/)[1],
    bstr = atob(arr[1]),
    n = bstr.length,
    u8arr = new Uint8Array(n);

  while (n--) {
    u8arr[n] = bstr.charCodeAt(n);
  }

  return new File([u8arr], filename, { type: mime });
}
// change image url to file object end

function isElementOverflowing(element) {
  var overflowX = element.offsetWidth < element.scrollWidth,
    overflowY = element.offsetHeight < element.scrollHeight;

  return overflowX || overflowY;
}

function wrapContentsInMarquee(element) {
  var marquee = document.createElement("marquee"),
    contents = element.innerText;

  marquee.innerText = contents;
  element.innerHTML = "";
  element.appendChild(marquee);
}

function getCurrDate() {
  var d = new Date();
  var arrMonth = [
    "Januari",
    "Februari",
    "Maret",
    "April",
    "Mei",
    "Juni",
    "Juli",
    "Agustus",
    "September",
    "Oktober",
    "November",
    "Desember",
  ];
  var month = d.getMonth();
  var day = d.getDate();

  return (
    (day < 10 ? "0" : "") + day + " " + arrMonth[month] + " " + d.getFullYear()
  );
}

function getCurrTime() {
  var d = new Date();
  var hour = d.getHours();
  var minute = d.getMinutes();
  var second = d.getSeconds();
  return hour + ":" + minute + ":" + second;
}

// untuk pilih page
function getPageFromJenis(myJenis) {
  if (myJenis == "NDVI") {
    return "HOME";
  } else if (myJenis == "Plant Weight") {
    return "PW";
  } else if (myJenis == "Plant Disease") {
    return "PD";
  } else if (myJenis == "Sufficiency Of Water") {
    return "SOW";
  } else if (myJenis == "Suggestion") {
    return "SUG";
  } else if (myJenis == "DSM") {
    return "HOME";
  } else if (myJenis == "Water Flow") {
    return "WF";
  } else if (myJenis == "Water Direction") {
    return "WD";
  } else if (myJenis == "Water Logging") {
    return "WL";
  } else if (myJenis == "RGB") {
    return "RGB";
  } else if (myJenis == "Design Location") {
    return "DL";
  } else if (myJenis == "Rainfall") {
    return "RF";
  } else if (myJenis == "Temperature") {
    return "TM";
  } else if (myJenis == "Humidity") {
    return "HU";
  } else if (myJenis == "Soil Moisture") {
    return "SM";
  } else if (myJenis == "Soil Texture") {
    return "ST";
  } else if (myJenis == "Road & Drainage") {
    return "RD";
  }
}
// untuk pilih page end
