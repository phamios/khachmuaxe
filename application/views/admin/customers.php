<div class="breadcrumbs ace-save-state" id="breadcrumbs">
  <ul class="breadcrumb">
    <li>
      <i class="ace-icon fa fa-home home-icon"></i>
      <a href="#">Home</a>
    </li>
    <li class="active">Dashboard</li>
  </ul><!-- /.breadcrumb -->

  <div class="nav-search" id="nav-search">
    <?php echo form_open_multipart('admincp/customers',array('role'=>"form",'class'=>'form-search')); ?>
      <span class="input-icon">
        <input type="text" placeholder="Search ..." name="txtSearch"  class="nav-search-input" id="nav-search-input" autocomplete="off" />
        <i class="ace-icon fa fa-search nav-search-icon"></i>
        <button type="submit" name="buttonSearch" >Tìm kiếm</button>
      </span>
    <?php echo form_close(); ?>
  </div><!-- /.nav-search -->
</div>


<div class="page-content">
  <div class="row">
  <div class="col-sm-12">
    <div class="widget-box transparent">
      <div class="widget-body">
        <div class="widget-main no-padding">

          <table class="table table-bordered table-striped">
            <thead class="thin-border-bottom">
              <tr>
                <th> <i class="ace-icon fa fa-caret-right blue"></i>Họ & Tên </th>
                <th> <i class="ace-icon fa fa-caret-right blue"></i>Điện thoại </th>
                <th> <i class="ace-icon fa fa-caret-right blue"></i>Vị Trí  </th>
                <th> <i class="ace-icon fa fa-caret-right blue"></i>Nhu cầu</th>
                <th> <i class="ace-icon fa fa-caret-right blue"></i>Màu </th>
                <th> <i class="ace-icon fa fa-caret-right blue"></i>Trả góp</th>
                <th> <i class="ace-icon fa fa-caret-right blue"></i>Trả trước</th>
                <th> <i class="ace-icon fa fa-caret-right blue"></i>Thời điểm mua </th>
                <th> <i class="ace-icon fa fa-caret-right blue"></i>Ngày cập nhật </th>
                  <th> <i class="ace-icon fa fa-caret-right blue"></i>của Thành Viên </th>
                <th> <i class="ace-icon fa fa-caret-right blue"></i></th>
              </tr>
            </thead>
            <tbody>
              <?php if($listcustomers <> null):?>
                <?php foreach($listcustomers as $customer):?>
              <tr>
                <td>
                  <?php if($this->session->userdata('admin_type') == 1):?>
                  <a href="<?php echo site_url('admincp/editcustomer/'.$customer->id);?>" >
                    <?php echo $customer->fullname; ?>
                  </a>
                <?php else:?>
                  <?php echo $customer->fullname; ?>
                <?php endif;?>
                </td>
                <td><?php echo $customer->phonenumber; ?></td>
                <td><?php echo $customer->location; ?></td>
                <td><?php echo $customer->demand; ?></td>
                <td><?php echo $customer->color; ?></td>
                <td><?php echo $customer->installment; ?></td>
                <td><?php echo $customer->amount; ?></td>
                <td><?php echo $customer->buytime; ?></td>
                <td> <?php echo $customer->uploadate; ?></td>
                <td>
                  <?php foreach($listusers as $user):?>
                      <?php if($user->userid == $customer->memberid):?>
                          <a href="<?php echo site_url('admincp/edituserinfo/'.$user->userid);?>"><?php echo $user->fullname;?></a>
                      <?php endif;?>
                  <?php endforeach;?>
                </td>
                <td class="hidden-480">
                    <?php if($this->session->userdata('admin_type') == 1 || $this->session->userdata('admin_type') == 1):?>
                  <a href="<?php echo site_url('admincp/editcustomer/'.$customer->id);?>"><span class="glyphicon glyphicon-edit">Sửa</span></a>
                  &nbsp;
                  <a href="<?php echo site_url('admincp/removeCustomer/'.$customer->id);?>"><span class="glyphicon glyphicon-remove">Xoá</span></a>
                <?php endif;?>
                </td>
              </tr>
            <?php endforeach;?>
            <?php endif;?>
            </tbody>
          </table>


        </div><!-- /.widget-main -->
      </div><!-- /.widget-body -->
    </div><!-- /.widget-box -->
  </div><!-- /.col -->

</div><!-- /.row -->
</div>
