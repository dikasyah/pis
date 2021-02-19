<?php echo $header; ?>
<?php echo $navbar; ?>
<script>
	var site_url = '<?=site_url()?>';
	var base_url = '<?=base_url()?>';
	var page = '<?=$page?>';
	var loc = '<?=$loc?>';
	var subpage = '<?=$subpage?>';
	var currLoc = '<?=$currLoc?>';
</script>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
			<div class="row px-4 pt-2">
				<div class="card full-wdith" >
					<div class="card-header  center-text">
						<span id="Title" class="submenu-main-title-gis">Design Deal</span>
					</div>
					<div class="card-body " >
						<div class="table-responsive" >
							<table class="table table-striped mb-0 DSM-table" id="myTableGIS" style="height:40%!important;" >
								<thead>
									<tr class="center-text">
										<td style="width:2%">PG</td>
										<td style="width:7%">Wilayah</td>
										<td style="width:7%">Lokasi</td>
										<td style="width:7%">Kebun</td>
										<td style="width:15%">Jenis</td>
										<td style="width:6%">Umur</td>
										<td style="width:9%">Kawil</td>
										<td style="width:9%">Kasbun</td>
										<td style="width:10%">Foto</td>
										<td style="width:10%">PDF</td>
										<td style="width:11%">Last Update</td>
									</tr>
								</thead>
								<tbody id="tableOutput">
								</tbody>
							</table>
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

<div class="modal fade" id="pictModal">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<div class="title-pop" id="pictPopLocation">Lokasi</div>
				<div class="title-pop" id="pictPopJenis">Kategori - Jenis</div>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<img id="popPict"
					src="<?php echo base_url()?>/assets/upload/gis_pict/<?php echo isset($picts[0]->image) ? $picts[0]->image : 'x3789default.jpg'; ?>"
					style="height:100%; width:100%">
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
</div>
<script src="<?php echo base_url('/assets/js/templateUI_GIS.js');?>"></script>
<script>
	//table script
	var locationTable = '<?=$locationTable?>';
	locationTable = JSON.parse(locationTable.replace(/(\r\n|\n|\r)/gm, " "));
	var idx = 0;
	let pages = "";
	let output = "";
	for (let i = 0; i < locationTable.length; i++) {
		console.log(locationTable[i].jenis);
		pages = getPageFromJenis(locationTable[i].jenis);
		output += `<tr class="center-text" style=" font-size:12px; font-weight:bold;">
			<td style="width:2%; padding-left:4px; padding-right:4px;">${locationTable[i].plantation_group}</td>
			<td>${locationTable[i].code}</td>
			<td><a href="${site_url}/GIS_Dashboard/${locationTable[i].kategori}?page=${pages}&loc=Lokasi&currLoc=${locationTable[i].lokasi}&date=${locationTable[i].date.replace(" ", "_")}">${locationTable[i].lokasi}</a></td>	
			<td>${locationTable[i].kebun}</td>	
			<td>${locationTable[i].kategori} - ${locationTable[i].jenis}</td>	
			<td>${locationTable[i].umur_hari} Hari</td>
			<td>${locationTable[i].kepala_wilayah}</td>
			<td>${locationTable[i].kasbun}</td>
			<td style="padding:0px !important">
				<div class="pict-overlay-type6 table-image-overlay" id="tiOverlay_${i}">
													
				</div>
				<img id="tblImg_${i}" style="height:100px; width:100%">
			</td>
			<td><a href="${base_url}/assets/upload/gis_pdf/${locationTable[i].pdf}"  download class="full-width" >${locationTable[i].pdf.substring(0, 16)}...</a></td>
			<td>${locationTable[i].date}</td>
		</tr>`;
		const toDataURL = url => fetch(url)
			.then(response => response.blob())
			.then(blob => new Promise((resolve, reject) => {
				const reader = new FileReader()
				reader.onloadend = () => resolve(reader.result)
				reader.onerror = reject
				reader.readAsDataURL(blob)
			}))
		toDataURL(base_url + 'assets/upload/gis_pict/' + locationTable[i].image)
			.then(dataUrl => {
				var file = dataURLtoFile(dataUrl, locationTable[i].image);
				//console.log('original file size : '+file.size)
				new Compressor(file, {
					quality: 0.1,
					success(result) {
						//console.log('compressed file size : '+result.size)
						var reader = new FileReader()
						reader.readAsDataURL(result);
						reader.onloadend = function () {
							var base64data = reader.result;
							document.getElementById("tblImg_" + i).src = base64data;
						}
					}
				})
			})
	}
	document.querySelector("#tableOutput").innerHTML = output;
	$("#myTableGIS thead > tr")
		.clone()
		.appendTo("#myTableGIS tbody")
		.addClass("hidden-to-set-col-widths");

	$(".table-image-overlay").on("click", function () {
		let overlayID = this.id.split("_");
		let overlayIDX = parseInt(overlayID[1]);
		document.querySelector("#pictPopLocation").innerHTML = locationTable[overlayIDX].lokasi;
		document.querySelector("#pictPopJenis").innerHTML = " "+locationTable[overlayIDX].kategori + " - " +
			locationTable[overlayIDX].jenis;
		$("#popPict").attr("src", base_url + "/assets/upload/gis_pict/" + locationTable[overlayIDX].image);
		$("#pictModal").modal();
	});
	//table script end
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
<script src="<?php echo base_url('/assets/dist/js/adminlte.js');?>"></script>
<script src="<?php echo base_url('/assets/js/plugins/compressor.min.js');?>"></script>
<script src="<?php echo base_url('/assets/plugins/select2/js/select2.full.min.js');?>"></script>
</body>

</html>