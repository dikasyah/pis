<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Digital Plantation - PIS</title>
	<link rel="icon" href="<?=base_url()?>/assets/images/logo-ggf.png" type="image/png">
	<script>
		var site_url = '<?=site_url()?>';
		var base_url = '<?=base_url()?>';
		var page = '<?=$page?>';
		var loc = '<?=$loc?>';
		var currLoc = '<?=$currLoc?>';
		var locationList = '<?=$locationList?>';
		var authorization = '<?=$authorization[0]->authorization?>';
	</script>
	<style type="text/css">
		::selection {
			background-color: #E13300;
			color: white;
		}

		::-moz-selection {
			background-color: #E13300;
			color: white;
		}

		body {
			background-color: #fff;
			margin: 40px;
			font: 13px/20px normal Helvetica, Arial, sans-serif;
			color: #4F5155;
		}

		a {
			color: #003399;
			background-color: transparent;
			font-weight: normal;
		}

		h1 {
			color: #444;
			background-color: transparent;
			border-bottom: 1px solid #D0D0D0;
			font-size: 19px;
			font-weight: normal;
			margin: 0 0 14px 0;
			padding: 14px 15px 10px 15px;
		}


		code {
			font-family: Consolas, Monaco, Courier New, Courier, monospace;
			font-size: 12px;
			background-color: #f9f9f9;
			border: 1px solid #D0D0D0;
			color: #002166;
			display: block;
			margin: 14px 0 14px 0;
			padding: 12px 10px 12px 10px;
		}

		#body {
			margin: 0 15px 0 15px;

		}


		p.footer {
			text-align: right;
			font-size: 11px;
			border-top: 1px solid #D0D0D0;
			line-height: 32px;
			padding: 0 10px 0 10px;
			margin: 20px 0 0 0;
		}


		#container {
			margin: 5px;
			border: 1px solid #D0D0D0;
			box-shadow: 0 0 8px #D0D0D0;
		}
	</style>
	<?php
		echo $style;
		echo $script;
	?>

</head>

<body>
	<div id="wrapper">
		<?php echo $navbar; ?>
		<div id="content" class="gis-content gis-content-fullsize">
			<?php echo $header; ?>
			<!--Main content-->
			<div class="row px-4 pt-0">
				<div class="card full-wdith">
					<div class="card-header  py-0 center-text">
						<span class="submenu-main-title-gis">Upload Photo</span>
					</div>
					<div class="card-body p-0">
						<table id="profilePageSelector" style="width:100%;" class=ml-2>
							<tbody>
								<!-- <tr>
                                <td style="width:9%; font-weight:bold; padding-left:8px; font-size:18px;">Option</td>
                                <td style="width:1%">:</td>
                                <td style="padding-left:10px; height:50px;" >
                                    <form id="locChooser">
                                        <input type="radio" name="uploadLocChooser" id="uploadLocChooser1" value="PG" checked><label for="uploadLocChooser1">Plantation Group</label>
                                        <input type="radio" name="uploadLocChooser" id="uploadLocChooser2" value="Wil "><label for="uploadLocChooser2">Wilayah</label>
                                        <input type="radio" name="uploadLocChooser" id="uploadLocChooser3" value="Lok"><label for="uploadLocChooser3">Lokasi</label>
                                    </form>
                                </td>
                            </tr> -->

								<tr>
									<td style="width:100%; vertical-align: top; height:250px;">
										<div class="row px-1">
											<div class="py-2 prev-image-container" id="containerPrevImage">
												<img width="550" height="550" style="" id="prevUploadImg"
													src="https://dummyimage.com/450x450/000/f59f00&text=Preview+Photo">
												<!-- <div class="progress display-none" id="progressBar">
												<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" >
													<span class="sr-only">70% Complete</span>
												</div>
											</div> -->
											</div>
											<table class="ml-5 mt-2">
												<tbody>
													<tr>
														<td style="width:9%;font-weight:bold; font-size:15px;">
															Location
														</td>
														<td>:</td>
														<td style="padding-left:10px; padding-right:25px;">
															<select class="form-control upload-select select2"
																id="myLocation">
																<?php foreach ($listLokasi as $listlok): ?>
																<option value="<?php echo $listlok->lokasi ?>">
																	<?php echo $listlok->lokasi ?></option>
																<?php endforeach; ?>
															</select>
														</td>

														<td style="font-weight:bold; font-size:15px;">
															Jenis
														</td>
														<td>:</td>
														<td>
															<select class="form-control upload-select" id="myJenis">
																<option value="PW">Plant Weight</option>
																<option value="PD">Plant Disease</option>
																<option value="PWS">Plant Water Supply</option>
															</select>
														</td>
													</tr>
													<tr class="mt-2 ml-2">
														<td colspan="6">
															<div class="row d-flex justify-content-center">
																<div class="col-lg-3 mt-2 ml-1">
																	<input type="file" name="newPostImage"
																		id="newPostImage" class="input-file-post"
																		accept="image/x-png,image/gif,image/jpeg" />
																	<label for="newPostImage">Upload</label>
																</div>
																<div class="col-lg-3 mt-2">
																	<input type="file" name="newPostPDF" id="newPostPDF"
																		class="input-file-post"
																		accept="application/pdf" />
																	<label for="newPostPDF">PDF</label>
																</div>
																<div class="col-lg-3 mt-2" id="buttomexcel">
																<form action="uploadExcel" method="post" enctype="multipart/form-data">
																<input type="hidden" name="id_photo" value="<?php echo $id_photo['photo_id']+1;?>"/>
																	<input type="file" name="newPostExcel"
																		id="newPostExcel" class="input-file-post"
																		accept="application/vnd.ms-excel" />
																	<label for="newPostExcel">EXCEL</label>	
																</from>
																</div>
															</div>

															<div
																style="border:2px  solid black; border-radius:3px; height:30px; margin-bottom:5px; display:flex; justify-content:center; align-items:center; ">
																<span style="font-size:13px; font-weight:500;"
																	id="newPostPDFNames">PDF Name</span>
															</div>
															<div id="formexcel">
															<div 
																style="border:2px  solid black; border-radius:3px; height:30px; margin-bottom:5px; display:flex; justify-content:center; align-items:center; ">
																<span style="font-size:13px; font-weight:500;"
																	id="newPostExcelName">Excel Name</span>
															</div>
															</div>
														</td>
													</tr>
													<tr>
														<td colspan="6">
															<div class=" display-none" id="containerWaterLoggingInput">
																<table
																	style=" width:100%;  border:3px solid black;height:140px; ">
																	<tbody style="">
																		<tr>
																			<td
																				style="width:20%; font-weight:500; padding-left:10px;">
																				Dry
																			</td>
																			<td style="width:75%;"><input type="number"
																					name="Dry" id="Dry"
																					class="input-water-logging"
																					value="0"
																					style="width:100px; float:right; margin-right:5px;"></input>
																			</td>
																			<td style="width:5%; font-weight:500;">Ha
																			</td>
																		</tr>
																		<tr>
																			<td
																				style="width:20%; font-weight:500;  padding-left:10px;">
																				Moist</td>
																			<td style="width:75%;"><input type="number"
																					name="Moist" id="Moist"
																					class="input-water-logging"
																					value="0"
																					style="width:100px; float:right; margin-right:5px;"></input>
																			</td>
																			<td style="width:5%; font-weight:500;">Ha
																			</td>
																		</tr>
																		<tr>
																			<td
																				style="width:20%; font-weight:500;  padding-left:10px;">
																				Wet
																			</td>
																			<td style="width:75%;"><input type="number"
																					name="Wet" id="Wet"
																					class="input-water-logging"
																					value="0"
																					style="width:100px; float:right; margin-right:5px;"></input>
																			</td>
																			<td style="width:5%; font-weight:500;">Ha
																			</td>
																		</tr>
																		<tr>
																			<td
																				style="width:20%; font-weight:500;  padding-left:10px;">
																				Very
																				Wet</td>
																			<td style="width:75%;"><input type="number"
																					name="VeryWet" id="VeryWet"
																					class="input-water-logging"
																					value="0"
																					style="width:100px; float:right; margin-right:5px;"></input>
																			</td>
																			<td style="width:5%; font-weight:500;">Ha
																			</td>
																		</tr>
																		<tr>
																			<td
																				style="width:20%; font-weight:500;  padding-left:10px;">
																				Flood</td>
																			<td style="width:75%;"><input type="number"
																					name="Flood" id="Flood"
																					class="input-water-logging"
																					value="0"
																					style="width:100px; float:right; margin-right:5px;"></input>
																			</td>
																			<td style="width:5%; font-weight:500;">Ha
																			</td>
																		</tr>
																	</tbody>
																</table>
															</div>
														</td>
													</tr>
													<tr>
														<td colspan="6"
															style="padding-left:10px; padding-right:25px; padding-top:10px; padding-bottom:10px;">
															<textarea type="text" name="description" id="description"
																class="form-control"
																placeholder="Picture Description"></textarea>
														</td>
													</tr>
													<tr>
														<td colspan="6"
															style="text-align:center; padding-top:5px; padding-bottom:18px;">
															<span id="ImageUploadButton">Save</span></td>
													</tr>
												</tbody>
											</table>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!--Main content End-->
		</div>
	</div>
	<!-- pop up  -->

	<div class="pop-alert-upload" id="unModal">
		<div class="modal-header">
			<div class="title">Alert</div>
			<button class="close-button" onclick="popClose('unModal')">&times;</button>
		</div>
		<div class="modal-body">
			<p id="alertModalText">Please insert both Image and Pdf file</p>
		</div>
	</div>
	<div class="pop-alert-upload" id="notifModal">
		<div class="modal-header">
			<div class="title">Notification</div>
			<button class="close-button" onclick="popClose('notifModal')">&times;</button>
		</div>
		<div class="modal-body">
			<p>File has been uploaded successfully</p>
		</div>
	</div>
	<!--overlay for pop-->
	<div class="" id="overlay"></div>
	<div class="display-none" id="overlay2"></div>
	<img class="display-none" id="loadingSpinner" src="<?php echo base_url()?>/assets/images/spinner.svg">
	<!--overlay for pop end-->
	<!-- pop up end -->
	<?php echo $modal; ?>
	<script>
		document.querySelector("#fullTitle").innerHTML = "WEB - Geographic Information System";
		document.querySelector("#otherTitle").innerHTML = "WEB - GIS";
		$("#uploadButton").addClass('active');
		$("#uploadButton").removeClass('inactive');
		$('#lokasiGis').select2();
		if (currLoc != "") {
			$("#lokasiGis").val(currLoc);
			$("#lokasiGis").select2().trigger("change");
		}
		$('>span>span>span', '.select2').css({
			"color": "white",
			"font-size": "18px",
			"font-weight": "500"
		})

		var myauth = authorization.split(".");
		auth1 = myauth.includes("NDVI");
		auth2 = myauth.includes("DSM");
		auth3 = myauth.includes("Sensor");
		auth4 = myauth.includes("Other");
		var newJenis = {};
		var comboJenis = $("#myJenis");
		if (auth1) {
			newJenis["NDVI"] = "NDVI-NDVI";
			newJenis["NDVI - Plant Weight"] = "NDVI-Plant Weight";
			newJenis["NDVI - Plant Disease"] = "NDVI-Plant Disease";
			newJenis["NDVI - Sufficiency Of Water"] = "NDVI-Sufficiency Of Water";
			newJenis["NDVI - Suggestion"] = "NDVI-Suggestion";
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
		// if (loc == "PG") {
		// 	if(auth1){
		// 		newJenis["NDVI"] = "NDVI-NDVI";
		// 		newJenis["NDVI - Plant Weight"] = "NDVI-Plant Weight";
		// 		newJenis["NDVI - Plant Disease"] = "NDVI-Plant Disease";
		// 		newJenis["NDVI - Sufficiency Of Water"] = "NDVI-Sufficiency Of Water";
		// 	}
		// 	if(auth2){
		// 		newJenis["DSM"] = "DSM-DSM";
		// 		newJenis["DSM - Water Flow"] = "DSM-Water Flow";
		// 		newJenis["DSM - Water Direction"] = "DSM-Water Direction"; 
		// 		newJenis["DSM - Water Logging"] = "DSM-Water Logging"; 
		// 		newJenis["DSM - RGB"] = "DSM-RGB" 
		// 	}
		// 	if(auth3){
		// 		newJenis["Sensor - Laggon Water Level"] = "Sensor-Laggon Water Level"; 
		// 		newJenis["Sensor - Rainfall"] = "Sensor-Rainfall"; 
		// 		newJenis["Sensor - Temperature"] = "Sensor-Temperature"; 
		// 		newJenis["Sensor - Humidity"] = "Sensor-Humidity"; 
		// 		newJenis["Sensor - Soil Moisture"] = "Sensor-Soil Moisture"; 
		// 	}
		// 	if(auth4){
		// 		newJenis["Other - Soil Texture"] = "Other-Soil Texture"; 
		// 		newJenis["Other - Road & Drainage"] = "Other-Road & Drainage"; 
		// 	}
		// } else if (loc == "Wilayah") {
		// 	if(auth1){
		// 		newJenis["NDVI"] = "NDVI-NDVI";
		// 		newJenis["NDVI - Plant Weight"] = "NDVI-Plant Weight";
		// 		newJenis["NDVI - Plant Disease"] = "NDVI-Plant Disease";
		// 		newJenis["NDVI - Sufficiency Of Water"] = "NDVI-Sufficiency Of Water";
		// 	}
		// 	if(auth2){
		// 		newJenis["DSM"] = "DSM-DSM";
		// 		newJenis["DSM - Water Flow"] = "DSM-Water Flow";
		// 		newJenis["DSM - Water Direction"] = "DSM-Water Direction"; 
		// 		newJenis["DSM - Water Logging"] = "DSM-Water Logging"; 
		// 		newJenis["DSM - RGB"] = "DSM-RGB" 
		// 	}
		// 	if(auth3){
		// 		newJenis["Sensor - Laggon Water Level"] = "Sensor-Laggon Water Level"; 
		// 		newJenis["Sensor - Rainfall"] = "Sensor-Rainfall"; 
		// 		newJenis["Sensor - Temperature"] = "Sensor-Temperature"; 
		// 		newJenis["Sensor - Humidity"] = "Sensor-Humidity"; 
		// 		newJenis["Sensor - Soil Moisture"] = "Sensor-Soil Moisture"; 
		// 	}
		// 	if(auth4){
		// 		newJenis["Other - Soil Texture"] = "Other-Soil Texture"; 
		// 		newJenis["Other - Road & Drainage"] = "Other-Road & Drainage"; 
		// 	}
		// } else if (loc == "Lokasi") {
		// 	if(auth1){
		// 		newJenis["NDVI"] = "NDVI-NDVI";
		// 		newJenis["NDVI - Plant Weight"] = "NDVI-Plant Weight";
		// 		newJenis["NDVI - Plant Disease"] = "NDVI-Plant Disease";
		// 		newJenis["NDVI - Sufficiency Of Water"] = "NDVI-Sufficiency Of Water";
		// 		newJenis["NDVI - Suggestion"] = "NDVI-Suggestion";
		// 	}
		// 	if(auth2){
		// 		newJenis["DSM"] = "DSM-DSM";
		// 		newJenis["DSM - Water Flow"] = "DSM-Water Flow";
		// 		newJenis["DSM - Water Direction"] = "DSM-Water Direction"; 
		// 		newJenis["DSM - Water Logging"] = "DSM-Water Logging"; 
		// 		newJenis["DSM - RGB"] = "DSM-RGB" 
		// 		newJenis["DSM - Design Location"] = "DSM-Design Location"; 
		// 	}
		// 	if(auth3){
		// 		newJenis["Sensor - Rainfall"] = "Sensor-Rainfall"; 
		// 		newJenis["Sensor - Temperature"] = "Sensor-Temperature"; 
		// 		newJenis["Sensor - Humidity"] = "Sensor-Humidity"; 
		// 		newJenis["Sensor - Soil Moisture"] = "Sensor-Soil Moisture"; 
		// 	}
		// 	if(auth4){
		// 		newJenis["Other - Soil Texture"] = "Other-Soil Texture"; 
		// 		newJenis["Other - Road & Drainage"] = "Other-Road & Drainage"; 
		// 	}
		// }
		comboJenis.empty();
		$.each(newJenis, function (key, value) {
			comboJenis.append($("<option></option>").attr("value", value).text(key));
		});
	</script>
	<script src="<?php echo base_url('/assets/js/templateUI_GIS.js');?>"></script>
	<script src="<?php echo base_url('/assets/js/uploadGis.js');?>"></script>
</body>

</html>