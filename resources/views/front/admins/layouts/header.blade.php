<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
          <a href="" class="app-brand-link">
              <img src="" class="img-fluid">
          </a>

          <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">

            <!-- Dashboard -->
            <li class="menu-item">
                <a href="" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Trang Chủ</div>
                </a>
            </li>

          <!-- Layouts -->
          <!-- Forms & Tables -->
          <li class="menu-header small text-uppercase"><span class="menu-header-text">Forms &amp; Tables</span></li>
          <!-- Forms -->
          <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
              <i class="menu-icon tf-icons bx bx-detail"></i>
              <div data-i18n="Form Layouts">Danh Mục</div>
            </a>
            <ul class="menu-sub">
              <li class="menu-item">
                <a href="{{route("brand_product")}}" " class="menu-link">
                  <div data-i18n="Vertical Form">Hãng</div>
                </a>
              </li>
              <li class="menu-item">
                <a href="{{route("ram_product")}}" class="menu-link">
                  <div data-i18n="Horizontal Form">Ram</div>
                </a>
              </li>
                <li class="menu-item">
                    <a href="{{route("rom_product")}}" class="menu-link">
                        <div data-i18n="Horizontal Form">bộ nhớ trong</div>
                    </a>
                </li>
            </ul>
          </li>
          <!-- Tables -->
          <li class="menu-item">
            <a href="{{route("admin_product")}}" class="menu-link">
              <i class="menu-icon tf-icons bx bx-table"></i>
              <div data-i18n="Tables">Sản Phẩm</div>
            </a>
          </li>          
        </ul>
      </aside>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->


