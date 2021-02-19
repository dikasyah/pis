<!-- Sidebar -->
<aside class="main-sidebar sidebar-dark-primary elevation-4 " id="navbar">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="<?php echo base_url()?>/assets/images/gis_logo/logo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light" id="side_name">Digital Plantation</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- SidebarSearch Form -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item" id="soil">
          <a href="#" class="nav-link" id="sub_soil">
            <i class="nav-icon fas fa-mountain"></i>
            <p>
              Soil
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item" id="dsm">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon "></i>
                <p>
                  Digital Surface Model
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item" id="sub_dsm">
                  <a href="<?php echo site_url(isset($currLoc) ? 'GIS_Dashboard/DSM?page=DSM&loc=PG&currLoc='.$currLoc : 'GIS_Dashboard/DSM?page=DSM&loc=PG') ?>" class="nav-link" id="dsm_nav">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>DSM</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo site_url(isset($currLoc) ? 'GIS_Dashboard/DSM?page=RGB&loc=PG&currLoc='.$currLoc : 'GIS_Dashboard/DSM?page=RGB&loc=PG') ?>"
                    class="nav-link" id="RGB">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>RGB</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo site_url(isset($currLoc) ? 'GIS_Dashboard/DSM?page=WD&loc=PG&currLoc='.$currLoc : 'GIS_Dashboard/DSM?page=WD&loc=PG') ?>"
                    class="nav-link" id="wd">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Water Direction</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo site_url(isset($currLoc) ? 'GIS_Dashboard/DSM?page=WF&loc=PG&currLoc='.$currLoc : 'GIS_Dashboard/DSM?page=WF&loc=PG') ?>"
                    class="nav-link" id="wf">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Water Flow</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo site_url(isset($currLoc) ? 'GIS_Dashboard/DSM?page=WL&loc=PG&currLoc='.$currLoc : 'GIS_Dashboard/DSM?page=WL&loc=PG') ?>"
                    class="nav-link" id="wl">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Water Logging</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo site_url(isset($currLoc) ? 'GIS_Dashboard/DSM?page=DL&loc=PG&currLoc='.$currLoc : 'GIS_Dashboard/DSM?page=DL&loc=PG') ?>"
                    class="nav-link" id="dl">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Design Location </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?php echo site_url(isset($currLoc) ? 'GIS_Dashboard/DSM?page=DD&loc=PG&currLoc='.$currLoc : 'GIS_Dashboard/DSM?page=DD&loc=PG') ?>"
                    class="nav-link" id="DD">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Design Deal</p>
                  </a>
                </li>
              </ul>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon "></i>
                <p>
                  Soil Properties
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Soil Chemical</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Soil Physical</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </li>

        <li class="nav-item " id="sub-plant">
          <a href="#" class="nav-link " id="plant">
            <i class="nav-icon fas fa-seedling"></i>
            <p>
              Plant
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="<?php echo site_url(isset($currLoc) ? 'GIS_Dashboard/NDVI?page=NDVI&loc=PG&currLoc='.$currLoc : 'GIS_Dashboard/NDVI?page=NDVI&loc=PG') ?>"
                class="nav-link" id="ndvi">
                <i class="far fa-dot-circle nav-icon"></i>
                <p>NDVI</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo site_url(isset($currLoc) ? 'GIS_Dashboard/NDVI?page=LOG&loc=PG&currLoc='.$currLoc : 'GIS_Dashboard/NDVI?page=LOG&loc=PG') ?>"
                class="nav-link" id="log">
                <i class="far fa-dot-circle nav-icon"></i>
                <p>Level Of Greennes</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-dot-circle nav-icon"></i>
                <p>Sufficient Of Water</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-dot-circle nav-icon"></i>
                <p>Sugestion</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item ">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-apple-alt"></i>
            <p>
              Fruits
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-dot-circle nav-icon"></i>
                <p>Distribution</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-dot-circle nav-icon"></i>
                <p>Population</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item ">
          <a href="#" class="nav-link ">
            <i class="nav-icon fas fa-leaf"></i>
            <p>
              Environtment
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon "></i>
                <p>
                  Air Parameters
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Air Humadity</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Air Temperature</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Bud Leaf Time</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Rain Fall</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>UV Radiation</p>
                  </a>
                </li>

              </ul>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon "></i>
                <p>
                  Soil Parameters
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Battery Level</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Soil EC</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Soil Temperature</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Soil PH</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Lagoon Water Level</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="far fa-list-alt nav-icon"></i>
            <p>Resume</p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?php echo site_url(isset($currLoc) ? 'GIS_Dashboard/Upload?loc=PG&currLoc='.$currLoc : 'GIS_Dashboard/Upload?loc=PG') ?>"
            class="nav-link" id="upload">
            <i class="fas fa-upload nav-icon"></i>
            <p>Upload</p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
<script>
  var url = new URL(document.location);
  var params = url.searchParams;
  var page = params.get("page");
  var currLoc = params.get("currLoc");

  if (page != null) {
    if (currLoc == null) {
      document.getElementById("lokasiGis").value = "PG1";
    } else {
      document.getElementById("lokasiGis").value = currLoc;
    }
    var lokasi = document.getElementById("lokasiGis").value;
    document.getElementById("dsm_nav").href = site_url + "/GIS_Dashboard/DSM?page=DSM&loc=PG&currLoc=" + lokasi;
    document.getElementById("RGB").href = site_url + "/GIS_Dashboard/DSM?page=RGB&loc=PG&currLoc=" + lokasi;
    document.getElementById("wf").href = site_url + "/GIS_Dashboard/DSM?page=WF&loc=PG&currLoc=" + lokasi;
    document.getElementById("wd").href = site_url + "/GIS_Dashboard/DSM?page=WD&loc=PG&currLoc=" + lokasi;
    document.getElementById("wl").href = site_url + "/GIS_Dashboard/DSM?page=WL&loc=PG&currLoc=" + lokasi;
    document.getElementById("dl").href = site_url + "/GIS_Dashboard/DSM?page=DL&loc=PG&currLoc=" + lokasi;
    document.getElementById("DD").href = site_url + "/GIS_Dashboard/DSM?page=DD&loc=PG&currLoc=" + lokasi;
    document.getElementById("ndvi").href = site_url + "/GIS_Dashboard/NDVI?page=NDVI&loc=PG&currLoc=" + lokasi;
    document.getElementById("log").href = site_url + "/GIS_Dashboard/NDVI?page=LOG&loc=PG&currLoc=" + lokasi;

    document.getElementById("lokasiGis").onchange = function () {
    var lokasi = document.getElementById("lokasiGis").value;
    document.getElementById("dsm_nav").href = site_url + "/GIS_Dashboard/DSM?page=DSM&loc=PG&currLoc=" +
      lokasi;
    document.getElementById("RGB").href = site_url + "/GIS_Dashboard/DSM?page=RGB&loc=PG&currLoc=" + lokasi;
    document.getElementById("wf").href = site_url + "/GIS_Dashboard/DSM?page=WF&loc=PG&currLoc=" + lokasi;
    document.getElementById("wd").href = site_url + "/GIS_Dashboard/DSM?page=WD&loc=PG&currLoc=" + lokasi;
    document.getElementById("wl").href = site_url + "/GIS_Dashboard/DSM?page=WL&loc=PG&currLoc=" + lokasi;
    document.getElementById("dl").href = site_url + "/GIS_Dashboard/DSM?page=DL&loc=PG&currLoc=" + lokasi;
    document.getElementById("DD").href = site_url + "/GIS_Dashboard/DSM?page=DD&loc=PG&currLoc=" + lokasi;

    document.getElementById("ndvi").href = site_url + "/GIS_Dashboard/NDVI?page=NDVI&loc=PG&currLoc=" + lokasi;
    document.getElementById("log").href = site_url + "/GIS_Dashboard/NDVI?page=LOG&loc=PG&currLoc=" + lokasi;
  };
  }



  if (page == null) {
    $("#upload").addClass('active');
  } else if (page == "DSM") {
    $("#dsm_nav").addClass('active');
    $("#soil").addClass('menu-is-opening menu-open');
    $("#sub_soil").addClass('active');
    $("#sub_dsm").addClass('menu-is-opening menu-open');
    $("#dsm").addClass('menu-is-opening menu-open');

  } else if (page == "WF") {
    $("#wf").addClass('active');
    $("#soil").addClass('menu-is-opening menu-open');
    $("#sub_soil").addClass('active');
    $("#sub_dsm").addClass('menu-is-opening menu-open');
    $("#dsm").addClass('menu-is-opening menu-open');

  } else if (page == "DL") {
    $("#dl").addClass('active');
    $("#soil").addClass('menu-is-opening menu-open');
    $("#sub_soil").addClass('active');
    $("#sub_dsm").addClass('menu-is-opening menu-open');
    $("#dsm").addClass('menu-is-opening menu-open');

  } else if (page == "WD") {
    $("#wd").addClass('active');
    $("#soil").addClass('menu-is-opening menu-open');
    $("#sub_soil").addClass('active');
    $("#sub_dsm").addClass('menu-is-opening menu-open');
    $("#dsm").addClass('menu-is-opening menu-open');

  } else if (page == "WL") {
    $("#wl").addClass('active');
    $("#soil").addClass('menu-is-opening menu-open');
    $("#sub_soil").addClass('active');
    $("#sub_dsm").addClass('menu-is-opening menu-open');
    $("#dsm").addClass('menu-is-opening menu-open');
  } else if (page == "DD") {
    $("#DD").addClass('active');
    $("#soil").addClass('menu-is-opening menu-open');
    $("#sub_soil").addClass('active');
    $("#sub_dsm").addClass('menu-is-opening menu-open');
    $("#dsm").addClass('menu-is-opening menu-open');

  } else if (page == "RGB") {
    $("#RGB").addClass('active');
    $("#soil").addClass('menu-is-opening menu-open');
    $("#sub_soil").addClass('active');
    $("#sub_dsm").addClass('menu-is-opening menu-open');
    $("#dsm").addClass('menu-is-opening menu-open');


  } else if (page == "PW") {
    $("#pw").addClass('active_side');
    $("#plant").addClass('active_side');
    $("#sub-plant").addClass('show');

  } else if (page == "NDVI") {
    $("#ndvi").addClass('active');
    $("#plant").addClass('active');
    $("#sub-plant").addClass('menu-is-opening menu-open');

  } else if (page == "PD") {
    $("#pd").addClass('active_side');
    $("#plant").addClass('active_side');
    $("#sub-plant").addClass('show');

  } else if (page == "HU") {
    $("#hu").addClass('active_side');
    $("#param").addClass('active_side');
    $("#envi").addClass('active_side');

  } else if (page == "LWL") {
    $("#lwl").addClass('active_side');
    $("#envi").addClass('active_side');

  } else if (page == "SM") {
    $("#sm").addClass('active_side');
    $("#envi").addClass('active_side');

  } else if (page == "TM") {
    $("#tm").addClass('active_side');
    $("#envi").addClass('active_side');

  } else if (page == "SOW") {
    $("#sow").addClass('active_side');
    $("#plant").addClass('active_side');
    $("#sub-plant").addClass('show');

  } else if (page == "RF") {
    $("#rf").addClass('active_side');
    $("#envi").addClass('active_side');

  } else if (page == "SUG") {
    $("#sug").addClass('active_side');
    $("#plant").addClass('active_side');
    $("#sub-plant").addClass('show');

  } else if (page == "LOG") {
    $("#log").addClass('active');
    $("#plant").addClass('active');
    $("#sub-plant").addClass('menu-is-opening menu-open');

  }
</script>