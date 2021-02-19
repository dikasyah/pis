  <!-- START PRELOADS -->
  <audio id="audio-alert" src="/PIS/assets/audio/alert.mp3" preload="auto"></audio>
  <audio id="audio-fail" src="/PIS/assets/audio/fail.mp3" preload="auto"></audio>
  <!-- END PRELOADS -->

  <!-- START SCRIPTS -->
<script>
  var countDownDate = new Date("<?php echo date("M j, Y H:i:s", strtotime(date("M j, Y H:i:s")) + 30600); ?>").getTime();
  var x = setInterval(function(){
    var now = new Date().getTime();
    var distance = countDownDate - now;

    // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    console.log(hours + "H " + minutes + "M " + seconds + "S");

    if (distance < 0) {
      clearInterval(x);
      window.location.href="/PIS/dashboard/logout";
    }
  }, 1000);
</script>

    <!-- START THIS PAGE PLUGINS-->

    <script type='text/javascript' src='/PIS/assets/js/plugins/icheck/icheck.min.js'></script>
    <script type="text/javascript" src="/PIS/assets/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
    <script type="text/javascript" src="/PIS/assets/js/plugins/scrolltotop/scrolltopcontrol.js"></script>

    <script type="text/javascript" src="/PIS/assets/js/plugins/morris/raphael-min.js"></script>
    <script type="text/javascript" src="/PIS/assets/js/plugins/morris/morris.min.js"></script>
    <script type="text/javascript" src="/PIS/assets/js/plugins/rickshaw/d3.v3.js"></script>
    <script type="text/javascript" src="/PIS/assets/js/plugins/rickshaw/rickshaw.min.js"></script>
    <script type='text/javascript' src='/PIS/assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'></script>
    <script type='text/javascript' src='/PIS/assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'></script>
    <script type='text/javascript' src='/PIS/assets/js/plugins/bootstrap/bootstrap-datepicker.js'></script>
    <script type="text/javascript" src="/PIS/assets/js/plugins/owl/owl.carousel.min.js"></script>

    <script type="text/javascript" src="/PIS/assets/js/plugins/moment.min.js"></script>
    <script type="text/javascript" src="/PIS/assets/js/plugins/daterangepicker/daterangepicker.js"></script>
    <script type="text/javascript" src="/PIS/assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/PIS/assets/js/plugins/bootstrap/bootstrap-select.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?callback=initMap"></script>
    <!--<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyB0peWJOo90GuTdDatQUxPf0TNTLG8WaWQ&callback=initMap" async defer></script>-->
    <!-- END THIS PAGE PLUGINS-->

    <!-- START TEMPLATE -->
    <!--<script type="text/javascript" src="/PIS/assets/js/settings.js"></script>-->

    <script type="text/javascript" src="/PIS/assets/js/plugins.js"></script>
    <script type="text/javascript" src="/PIS/assets/js/actions.js"></script>

    <!--<script type="text/javascript" src="/PIS/assets/js/demo_dashboard.js"></script>-->
    <!-- END TEMPLATE -->
  <!-- END SCRIPTS -->
  </body>
</html>
