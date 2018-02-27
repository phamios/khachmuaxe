<div id="sidebar" class="sidebar responsive ace-save-state">
  <ul class="nav nav-list">
    <li class="active">
      <a href="<?php echo site_url("admincp/index");?>">
        <i class="menu-icon fa fa-tachometer"></i>
        <span class="menu-text"> Màn hình chính </span>
      </a>

      <b class="arrow"></b>
    </li>

     


    <li class="">
      <a href="#" class="dropdown-toggle">
        <i class="menu-icon fa fa-list"></i>
        <span class="menu-text"> Users </span>
        <b class="arrow fa fa-angle-down"></b>
      </a>
      <b class="arrow"></b>
      <ul class="submenu">
        <li class="">
          <a href="<?php echo site_url('admincp/listuser');?>">
            <i class="menu-icon fa fa-caret-right"></i>
            Danh sách Member
          </a>

          <b class="arrow"></b>
        </li>


        <li class="">
          <a href="<?php echo site_url('admincp/addUser');?>">
            <i class="menu-icon fa fa-caret-right"></i>
            Thêm mới
          </a>

          <b class="arrow"></b>
        </li>

      </ul>
    </li>




    <li class="">
      <a href="<?php echo site_url('admincp/logout');?>">
        <i class="menu-icon fa fa-exit"></i>
        <span class="menu-text"> Thoát </span>
      </a>

      <b class="arrow"></b>
    </li>

  </ul><!-- /.nav-list -->

  <div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
    <i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
  </div>
</div>
