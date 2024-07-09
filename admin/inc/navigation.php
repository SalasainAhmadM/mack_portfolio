<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Evogria">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
<style>

</style>
<!-- Main Sidebar Container -->
<aside style="background-color: white;" class="main-sidebar sidebar-primary elevation-4">
  <!-- Brand Logo -->
  <!-- Sidebar -->
  <div
    class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden">
    <div class="os-resize-observer-host observed">
      <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
    </div>
    <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
      <div class="os-resize-observer"></div>
    </div>
    <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 646px;"></div>
    <div class="os-padding">
      <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
        <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
          <!-- Sidebar user panel-->
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu"
              data-accordion="false">
              <li class="nav-item dropdown" style="font-size: 20px; color: black;">
                <a style="color: #0E2431;" href="./" class="nav-link nav-home">
                  <i class="nav-icon fas fa-home"></i>
                  <p style="font-family: Verdana, sans-serif;" style="font-size: 20px">
                    Home
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown" style="font-size: 20px; color: black;">
                <a style="color: #0E2431;" href="<?php echo base_url ?>admin/?page=user " class="nav-link nav-user">
                  <i class="nav-icon fas fa-user-edit"></i>
                  <p style="font-family: Verdana, sans-serif;">
                    Edit Profile
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown" style="font-size: 20px; color: black;">
                <a style="color: #0E2431;" href="<?php echo base_url ?>admin/?page=system_info "
                  class="nav-link nav-system_info">
                  <i class="nav-icon fas fa-cog"></i>
                  <p style="font-family: Verdana, sans-serif;">
                    Others
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown" style="font-size: 20px; color: black;">
                <a style="color: #0E2431;" href="<?php echo base_url ?>admin/?page=about" class="nav-link nav-about">
                  <i class="nav-icon fas fa-user"></i>
                  <p style="font-family:Verdana, sans-serif;">
                    About Myself
                  </p>
                </a>
              </li>

              <!--   <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=work" class="nav-link nav-work">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p style="font-family: Verdana, sans-serif;">
                          On Job Training
                        </p>
                      </a>
                    </li> -->
              <!--     <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=education" class="nav-link nav-education">
                        <i class="nav-icon fas fa-graduation-cap"></i>
                        <p style="font-family: Verdana, sans-serif;">
                          Educational Attainment
                        </p>
                      </a>
                    </li> -->
              <!--   <li class="nav-item dropdown">
                      <a href="<?php echo base_url ?>admin/?page=project" class="nav-link nav-project">
                       <i class="nav-icon fas fa-images"></i>
                        <p style="font-family: Verdana, sans-serif;">
                          Pictures
                        </p>
                      </a>
                    </li> -->
              <li class="nav-item dropdown" style="font-size: 20px; ">
                <a style="color: #0E2431;" href="<?php echo base_url ?>admin/?page=contact"
                  class="nav-link nav-contact">
                  <i class="nav-icon fas fa-phone"></i>
                  <p style="font-family: Verdana, sans-serif;">
                    Contact
                  </p>
                </a>
              </li>
            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        </div>
      </div>
    </div>
    <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
      <div class="os-scrollbar-track">
        <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
      </div>
    </div>
    <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
      <div class="os-scrollbar-track">
        <div class="os-scrollbar-handle" style="height: 55.017%; transform: translate(0px, 0px);"></div>
      </div>
    </div>
    <div class="os-scrollbar-corner"></div>
  </div>
  <!-- /.sidebar -->
</aside>
<script>
  $(document).ready(function () {
    var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
    var s = '<?php echo isset($_GET['s']) ? $_GET['s'] : '' ?>';
    page = page.split('/');
    page = page[0];
    if (s != '')
      page = page + '_' + s;

    if ($('.nav-link.nav-' + page).length > 0) {
      $('.nav-link.nav-' + page).addClass('active')
      if ($('.nav-link.nav-' + page).hasClass('tree-item') == true) {
        $('.nav-link.nav-' + page).closest('.nav-treeview').siblings('a').addClass('active')
        $('.nav-link.nav-' + page).closest('.nav-treeview').parent().addClass('menu-open')
      }
      if ($('.nav-link.nav-' + page).hasClass('nav-is-tree') == true) {
        $('.nav-link.nav-' + page).parent().addClass('menu-open')
      }

    }

  })
</script>