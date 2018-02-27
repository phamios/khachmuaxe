<div class="breadcrumbs ace-save-state" id="breadcrumbs">
  <ul class="breadcrumb">
    <li>
      <i class="ace-icon fa fa-home home-icon"></i>
      <a href="#">Home</a>
    </li>
    <li class="active">Dashboard</li>
  </ul><!-- /.breadcrumb -->

  <div class="nav-search" id="nav-search">
    <?php echo form_open_multipart('admincp/search',array('role'=>"form",'class'=>'form-search')); ?>
    <?php if ($this->router->fetch_method() == "listusermoderator"): ?>
        <input type="hidden" name="searchtype" value="listusermoderator"/>
    <?php endif;?>
    <?php if ($this->router->fetch_method() == "listuser"): ?>
        <input type="hidden" name="searchtype" value="listuser"/>
    <?php endif;?>
    <?php if ($this->router->fetch_method() == "customers"): ?>
        <input type="hidden" name="searchtype" value="customers"/>
    <?php endif;?>
      <span class="input-icon">
        <input type="text" placeholder="Search ..." name="txtSearch"  class="nav-search-input" id="nav-search-input" autocomplete="off" />
        <i class="ace-icon fa fa-search nav-search-icon"></i>
        <button type="submit" name="buttonSearch" >Tìm kiếm</button>
      </span>
    <?php echo form_close(); ?>
  </div><!-- /.nav-search -->
</div>
