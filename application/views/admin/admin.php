<div class="col-md-8" style="padding-top:10px;">
  <div class="panel panel-default">
    <div class="panel-heading" style="background-color: #0000FF;">
      <h3 class="panel-title" style="color:white;"><b>Update Wilayah</b></h3>
    </div>
    <div class="panel-body">
      <div class="col-md-4">
        <div class="list-group border-bottom">
<?php
  foreach ($wilayah as $w) {
?>
        <a href="/PIS/admin/update_wilayah?wilayah=<?php echo $w->code; ?>" class="list-group-item"><b><?php echo $w->code; ?> - Summary <?php echo $w->nama; ?></b></a>
<?php
  }
?>
        </div>
      </div>
<!--
      <div class="col-md-2">
        <div class="list-group border-bottom">
<?php
  foreach ($wilayah as $w) {
?>
        <a href="/PIS/admin/update_wilayah_real_raport?wilayah=<?php echo $w->code; ?>" class="list-group-item"><b>Raport Real</b></a>
<?php
  }
?>
        </div>
      </div>
      <div class="col-md-2">
        <div class="list-group border-bottom">
<?php
  foreach ($wilayah as $w) {
?>
        <a href="/PIS/admin/update_wilayah_forecast_raport?wilayah=<?php echo $w->code; ?>" class="list-group-item"><b>Raport Forecast T0</b></a>
<?php
  }
?>
        </div>
      </div>
      <div class="col-md-2">
        <div class="list-group border-bottom">
<?php
  foreach ($wilayah as $w) {
?>
        <a href="/PIS/admin/update_wilayah_forecast_t1_ZN_raport?wilayah=<?php echo $w->code; ?>" class="list-group-item"><b>ZN01 - ZN15 T1</b></a>
<?php
  }
?>
        </div>
      </div>
      <div class="col-md-2">
        <div class="list-group border-bottom">
<?php
  foreach ($wilayah as $w) {
?>
        <a href="/PIS/admin/update_wilayah_forecast_t1_ZN08_ZN10_raport?wilayah=<?php echo $w->code; ?>" class="list-group-item"><b>ZN08 & ZN10 T1</b></a>
<?php
  }
?>
        </div>
      </div>
-->
      <div class="col-md-4">
        <div class="list-group border-bottom">
<?php
  foreach ($wilayah as $w) {
?>
        <a href="/PIS/admin/update_wilayah_performance?wilayah=<?php echo $w->code; ?>" class="list-group-item"><b><?php echo $w->code; ?> - Performance dan Raport</b></a>
<?php
  }
?>
        </div>
      </div>
      <div class="col-md-4">
        <div class="list-group border-bottom">
<?php
  foreach ($wilayah as $w) {
?>
        <a href="/PIS/admin/update_hpp?wilayah=<?php echo $w->code; ?>" class="list-group-item"><b><?php echo $w->code; ?> - HPP Raport</b></a>
<?php
  }
?>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-md-4" style="padding-top:10px;">
  <div class="panel panel-default">
    <div class="panel-heading" style="background-color: #0000FF;">
      <h3 class="panel-title" style="color:white;"><b>Update Plantation Group</b></h3>
    </div>
    <div class="panel-body">
    <div class="panel-body">
      <div class="col-md-12">
        <div class="list-group border-bottom">
<?php
  foreach ($plantation_groupg as $pg) {
?>
        <a href="/PIS/admin/update_pg?pg=<?php echo $pg->code; ?>" class="list-group-item"><b><?php echo $pg->code; ?> - <?php echo $pg->code; ?></b></a>
<?php
  }
?>
        </div>
      </div>
    </div>
  </div>
</div>
