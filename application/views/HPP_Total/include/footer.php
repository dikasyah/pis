      <!-- Footer -->
      <footer class="sticky-footer p-3" style="background-color:#778899;">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span style="color:white;"><b>Copyright &copy; <span class='NSystem'>PIS</span> <?php echo date("Y"); ?></b></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
      <!-- START SCRIPTS -->
<script>
function detail_lokasi(lokasi, page){
  window.location.href="/PIS/WIP_PM_Lokasi/lokasi?page="+page+"lokasi="+lokasi;
}
var countDownDate = new Date("<?php echo date("M j, Y H:i:s", strtotime(date("M j, Y H:i:s")) + 18300); ?>").getTime();
var x = setInterval(function(){
  var now = new Date().getTime();
  var distance = countDownDate - now;

  // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  //console.log(hours + "H " + minutes + "M " + seconds + "S");

  if (distance < 0) {
    clearInterval(x);
    // window.location.href="/PIS/dashboard/logout";
  }
}, 1000);
</script>
    <!-- Bootstrap core JavaScript-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCmTxq1txhhqLXqA8G-boYCEk0vFvWIlME&callback=initMap" async defer></script>

    <!-- Core plugin JavaScript-->
    <script src="/PIS/assets/SB_Admin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script type='text/javascript' src="/PIS/assets/js/chart/Chart.min.js"></script>
    <script type='text/javascript' src="/PIS/assets/js/chart/utils.js"></script>

    <script type='text/javascript' src="/PIS/assets/DataTables/datatables.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/PIS/assets/SB_Admin/js/sb-admin-2.min.js"></script>

  </body>
</html>
