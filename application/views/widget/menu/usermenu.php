<div id="sidebar" class="sidebar responsive ace-save-state">
  <ul class="nav nav-list">
    <li >
      <a href="<?php echo site_url("admincp/customers");?>">
        <i class="menu-icon fa fa-tachometer"></i>
        <span class="menu-text"> Màn hình chính </span>
      </a>

      <b class="arrow"></b>
    </li>

    <li class="active">
      <a href="#" class="dropdown-toggle active">
        <i class="menu-icon fa fa-list"></i>
        <span class="menu-text"> Thông tin </span>
        <b class="arrow fa fa-angle-down"></b>
      </a>

      <b class="arrow"></b>
      <ul class="submenu">
        <li class="">
          <a href="<?php echo site_url('admincp/info');?>">
            <i class="menu-icon fa fa-caret-right"></i>
              Thông tin tài khoản
          </a>

          <b class="arrow"></b>
        </li>

        <li class="">
          <a href="<?php echo site_url('admincp/customers');?>">
            <i class="menu-icon fa fa-caret-right"></i>
            Danh sách khách hàng
          </a>

          <b class="arrow"></b>
        </li>

        <li class="">
          <a href="<?php echo site_url('admincp/paymenthistory');?>">
            <i class="menu-icon fa fa-caret-right"></i>
            Lịch sử giao dịch
          </a>

          <b class="arrow"></b>
        </li>
      </ul>
    </li>
    <li >
      <a href="<?php echo site_url("admincp/logout");?>">
        <span class="menu-text"> Thoát </span>
      </a>

      <b class="arrow"></b>
    </li>
  </ul><!-- /.nav-list -->

  <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
  </div>
</div>
