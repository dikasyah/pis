function uploadImageAndData(tbldata, tblname) {
  let time = getCurrTime();
  let date = getCurrDate();
  let uplJenis = $("#myJenis").val().split("-");
  let xCategory = uplJenis[0];
  let xJenis = uplJenis[1];
  var location = $("#myLocation").val();
  var id_photo = $("#id_photo").val();
  var description = $("#description").val();
  const file = document.getElementById("newPostImage");
  const pdf = document.getElementById("newPostPDF");
  const xlsx = document.getElementById("newPostExcel");
  const formData = new FormData();
  let name = file.files[0].name.split(".");
  let extension = name[name.length - 1];
  formData.append("tbldata", JSON.stringify(tbldata));
  formData.append("tblname", tblname);
  formData.append("image", file.files[0]);
  formData.append("pdf", pdf.files[0]);
  formData.append("xlsx", xlsx.files[0]);
  formData.append("id_photo", id_photo);
  formData.append("extension", extension);
  formData.append("location", location);
  formData.append("jenis", xJenis);
  formData.append("kategori", xCategory);
  formData.append("description", description);
  formData.append("date", date);
  formData.append("time", time);
  jQuery.ajax({
    type: "POST",
    url: site_url + "/GIS_Dashboard/uploadImageAndData",
    data: formData,
    processData: false,
    contentType: false,
    beforeSend: function () {
      $("#loadingSpinner").removeClass("display-none");
      $("#overlay2").removeClass("display-none");
    },

    success: function (res) {
      $("#loadingSpinner").addClass("display-none");
      $("#overlay2").addClass("display-none");
      openPictPop("notifModal");
      document.querySelector("#newPostPDFNames").innerHTML = "PDF name";
      document.querySelector("#newPostExcelName").innerHTML = "Excel name";
      $("#prevUploadImg").attr("src", base_url + "/assets/images/default.jpg");
      $("#newPostImage").val("");
      $("#newPostPDF").val("");
      $("#newPostExcel").val("");
      $("#ImageUploadButton").removeClass("uploading");

      $.ajax({
        url: site_url + "/GIS_Dashboard/id_photo",
        method: "GET",
        async: true,
        dataType: 'json',
        success: function (data) {
          var x = parseInt(data[0].photo_id);
          document.getElementById("id_photo").value = x+1;
        }
      });
    },
  });
}

function uploadImage() {
  let uplJenis = $("#myJenis").val().split("-");
  let xCategory = uplJenis[0];
  let xJenis = uplJenis[1];
  var location = $("#myLocation").val();
  var description = $("#description").val();
  var id_photo = $("#id_photo").val();
  const file = document.getElementById("newPostImage");
  const pdf = document.getElementById("newPostPDF");
  const xlsx = document.getElementById("newPostExcel");
  const formData = new FormData();

  let name = file.files[0].name.split(".");
  let extension = name[name.length - 1];

  formData.append("image", file.files[0]);
  formData.append("pdf", pdf.files[0]);
  formData.append("xlsx", xlsx.files[0]);
  formData.append("id_photo", id_photo);
  formData.append("extension", extension);
  formData.append("location", location);
  formData.append("jenis", xJenis);
  formData.append("kategori", xCategory);
  formData.append("description", description);
  jQuery.ajax({
    type: "POST",
    url: site_url + "/GIS_Dashboard/uploadPict",
    data: formData,
    processData: false,
    contentType: false,
    beforeSend: function () {
      $("#loadingSpinner").removeClass("display-none");
      $("#overlay2").removeClass("display-none");
    },

    success: function (res) {
      // var percentage = 0;
      // var timer = setInterval(function () {
      //   percentage += 20;
      //   progress_bar_process(percentage, timer);
      // }, 1000);
      $("#loadingSpinner").addClass("display-none");
      $("#overlay2").addClass("display-none");
      openPictPop("notifModal");
      document.querySelector("#newPostPDFNames").innerHTML = "PDF name";
      document.querySelector("#newPostExcelName").innerHTML = "Excel name";
      $("#prevUploadImg").attr("src", base_url + "/assets/images/default.jpg");
      $("#newPostImage").val("");
      $("#newPostPDF").val("");
      $("#newPostExcel").val("");
      $("#ImageUploadButton").removeClass("uploading");

      $.ajax({
        url: site_url + "/GIS_Dashboard/id_photo",
        method: "GET",
        async: true,
        dataType: 'json',
        success: function (data) {
          var x = parseInt(data[0].photo_id);
          document.getElementById("id_photo").value = x+1;
        }
      });
    },
  });
}

//make input number can't null (min 0)
const numInputs = document.querySelectorAll("input[type=number]");

numInputs.forEach(function (input) {
  input.addEventListener("change", function (e) {
    if (e.target.value == "") {
      e.target.value = 0;
    }
  });
});
//make input number can't null (min 0) end

function progress_bar_process(percentage, timer) {
  $(".progress-bar").css("width", percentage + "%");
  if (percentage > 100) {
    clearInterval(timer);
    $("#progressBar").addClass("display-none");
    $(".progress-bar").css("width", "0%");
  }
}
$.ajax({
  url: site_url + "/GIS_Dashboard/id_photo",
  method: "GET",
  async: true,
  dataType: 'json',
  success: function (data) {
    var x = parseInt(data[0].photo_id);
    document.getElementById("id_photo").value = x+1;
  }
});