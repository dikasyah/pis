<?php echo $header; ?>
<?php echo $navbar; ?>
<script>
	var site_url = '<?=site_url()?>';
	var base_url = '<?=base_url()?>';
	var page = '<?=$page?>';
	var loc = '<?=$loc?>';
	var currLoc = '<?=$currLoc?>';
	var locationList = '<?=$locationList?>';
	var authorization = '<?=$authorization[0]->authorization?>';
</script>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">


			<!--Main content-->

			<div class="card">
				<div class="card-header center-text">
					<span class="submenu-main-title-gis">Upload Photo</span>
				</div>
				<div class="card-body p-0">
					<div class="row d-flex justify-content-center">
						<div class="col-md-6">
							<div class="py-2" id="containerPrevImage">
								<img width="100%" height="100%" style="" id="prevUploadImg"
									src="https://dummyimage.com/450x450/000/f59f00&text=Preview+Photo">
							</div>
						</div>
						<div class="col-md-6 mt-2">
							<div class="row">
								<div class="col-md-6">
									<div class="row">
										<div class="col-4">
											<h3 style="font-weight:bold; font-size:15px;" class="mt-2 float-right">
												Location:</h3>
										</div>
										<div class="col-6">
											<select class="form-control upload-select select2" id="myLocation">
												<?php foreach ($listLokasi as $listlok): ?>
												<option value="<?php echo $listlok->lokasi ?>">
													<?php echo $listlok->lokasi ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-4">
											<h3 style="font-weight:bold; font-size:15px;" class="mt-2 float-right">
												Jenis:</h3>
										</div>
										<div class="col-6">
											<select class="form-control upload-select" id="myJenis">

											</select>
										</div>
									</div>
								</div>
							</div>

							<div class="row d-flex justify-content-center">
								<div class="col-3 mt-2">
									<input type="file" name="newPostImage" id="newPostImage" class="input-file-post"
										accept="image/x-png,image/gif,image/jpeg" />
									<label for="newPostImage">Upload</label>
								</div>
								<div class="col-3 mt-2">
									<input type="file" name="newPostPDF" id="newPostPDF" class="input-file-post"
										accept="application/pdf" />
									<label for="newPostPDF">PDF</label>
								</div>
								<div class="col-3 mt-2" id="buttomexcel">
									<input type="hidden" name="id_photo" id="id_photo" value="" />
									<input type="file" name="newPostExcel" id="newPostExcel" class="input-file-post"
										accept="application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" />
									<label for="newPostExcel">EXCEL</label>

								</div>
							</div>

							<div class="mr-1 ml-1"
								style="border:2px  solid black; border-radius:3px; height:30px; margin-bottom:5px; display:flex; justify-content:center; align-items:center; ">
								<span style="font-size:13px; font-weight:500;" id="newPostPDFNames">PDF Name</span>
							</div>
							<div id="formexcel">
								<div class="mr-1 ml-1"
									style="border:2px  solid black; border-radius:3px; height:30px; margin-bottom:5px; display:flex; justify-content:center; align-items:center; ">
									<span style="font-size:13px; font-weight:500;" id="newPostExcelName">Excel
										Name</span>
								</div>
							</div>

							<div class=" display-none" id="containerWaterLoggingInput">
								<table style=" width:100%;  border:3px solid black;height:140px; ">
									<tbody style="">
										<tr>
											<td style="width:20%; font-weight:500; padding-left:10px;">
												Dry
											</td>
											<td style="width:75%;"><input type="number" name="Dry" id="Dry"
													class="input-water-logging" value="0"
													style="width:100px; float:right; margin-right:5px;"></input>
											</td>
											<td style="width:5%; font-weight:500;">Ha
											</td>
										</tr>
										<tr>
											<td style="width:20%; font-weight:500;  padding-left:10px;">
												Moist</td>
											<td style="width:75%;"><input type="number" name="Moist" id="Moist"
													class="input-water-logging" value="0"
													style="width:100px; float:right; margin-right:5px;"></input>
											</td>
											<td style="width:5%; font-weight:500;">Ha
											</td>
										</tr>
										<tr>
											<td style="width:20%; font-weight:500;  padding-left:10px;">
												Wet
											</td>
											<td style="width:75%;"><input type="number" name="Wet" id="Wet"
													class="input-water-logging" value="0"
													style="width:100px; float:right; margin-right:5px;"></input>
											</td>
											<td style="width:5%; font-weight:500;">Ha
											</td>
										</tr>
										<tr>
											<td style="width:20%; font-weight:500;  padding-left:10px;">
												Very
												Wet</td>
											<td style="width:75%;"><input type="number" name="VeryWet" id="VeryWet"
													class="input-water-logging" value="0"
													style="width:100px; float:right; margin-right:5px;"></input>
											</td>
											<td style="width:5%; font-weight:500;">Ha
											</td>
										</tr>
										<tr>
											<td style="width:20%; font-weight:500;  padding-left:10px;">
												Flood</td>
											<td style="width:75%;"><input type="number" name="Flood" id="Flood"
													class="input-water-logging" value="0"
													style="width:100px; float:right; margin-right:5px;"></input>
											</td>
											<td style="width:5%; font-weight:500;">Ha
											</td>
										</tr>
									</tbody>
								</table>
							</div>

							<textarea type="text" name="description" id="description" class="form-control"
								placeholder="Picture Description"></textarea>

							<div class="row d-flex justify-content-center mt-1 mb-1">
								<span id="ImageUploadButton">Save</span></td>
							</div>
						</div>
					</div>
				</div>
			</div>



		</div><!-- /.container-fluid -->
	</div>
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
	<strong class="float-left mb-2">Copyright &copy; 2021 <a href="#">Gis Dashboard</a>.</strong>
	<span class="float-left mb-2">All rights reserved.</span>
	<div class="float-right d-none d-sm-inline-block mb-2">
		<b>Version</b> 2.0.0
	</div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>


<div class="modal fade" id="unModal">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">Alert</div>
				<div class="title-pop ml-3" id="pictPopDate"></div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p id="alertModalText">Please insert both Image and Pdf file</p>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
</div>

<div class="modal fade" id="notifModal">
	<div class="modal-dialog modal-md">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title">Notification</div>
				<div class="title-pop ml-3" id="pictPopDate"></div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p>File has been uploaded successfully</p>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
</div>
<!--overlay for pop-->
<div class="" id="overlay"></div>
<div class="display-none" id="overlay2"></div>
<img class="display-none" id="loadingSpinner" src="<?php echo base_url()?>/assets/images/spinner.svg">
<!--overlay for pop end-->
<!-- pop up end -->
<script>
	var myauth = authorization.split(".");
	auth1 = myauth.includes("NDVI");
	auth2 = myauth.includes("DSM");
	auth3 = myauth.includes("Sensor");
	auth4 = myauth.includes("Other");
	var newJenis = {};
	var comboJenis = $("#myJenis");
	if (auth1) {
		newJenis["NDVI"] = "NDVI-NDVI";
		newJenis["NDVI - Level Of Greennes"] = "NDVI-Level Of Greennes";
	}
	if (auth2) {
		newJenis["DSM"] = "DSM-DSM";
		newJenis["DSM - Water Flow"] = "DSM-Water Flow";
		newJenis["DSM - Water Direction"] = "DSM-Water Direction";
		newJenis["DSM - Water Logging"] = "DSM-Water Logging";
		newJenis["DSM - RGB"] = "DSM-RGB"
		newJenis["DSM - Design Location"] = "DSM-Design Location";
		newJenis["DSM - Design Deal"] = "DSM-Design Deal";
	}
	if (auth3) {
		newJenis["Sensor - Rainfall"] = "Sensor-Rainfall";
		newJenis["Sensor - Temperature"] = "Sensor-Temperature";
		newJenis["Sensor - Humidity"] = "Sensor-Humidity";
		newJenis["Sensor - Soil Moisture"] = "Sensor-Soil Moisture";
	}
	if (auth4) {
		newJenis["Other - Soil Texture"] = "Other-Soil Texture";
		newJenis["Other - Road & Drainage"] = "Other-Road & Drainage";
	}

	comboJenis.empty();
	$.each(newJenis, function (key, value) {
		comboJenis.append($("<option></option>").attr("value", value).text(key));
	});
</script>


<!-- jQuery -->
<script src="<?php echo base_url('/assets/plugins/jquery/jquery.min.js');?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('/assets/plugins/jquery-ui/jquery-ui.min.js');?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('/assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<!-- AdminLTE App -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<script src="<?php echo base_url('/assets/dist/js/adminlte.js');?>"></script>
<script src="<?php echo base_url('/assets/js/plugins/compressor.min.js');?>"></script>
<script src="<?php echo base_url('/assets/js/uploadGis.js');?>"></script>
<script src="<?php echo base_url('/assets/js/templateUI_GIS.js');?>"></script>
<script src="<?php echo base_url('/assets/plugins/select2/js/select2.full.min.js');?>"></script>
</body>

</html>