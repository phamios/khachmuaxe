<div class="breadcrumbs ace-save-state" id="breadcrumbs">
  <ul class="breadcrumb">
    <li>
      <i class="ace-icon fa fa-home home-icon"></i>
      <a href="#">Home</a>
    </li>
    <li class="active">Dashboard</li>
  </ul><!-- /.breadcrumb -->

  <div class="nav-search" id="nav-search">
    <?php echo form_open_multipart('admincp/listuser',array('role'=>"form",'class'=>'form-search')); ?>
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
          <br/>
          <table class="table table-bordered table-striped">
            <thead class="thin-border-bottom">
              <tr>
                <th> Tên</th>
                <th>  Phone </th>
                <th>  Email</th>
                <th>  showroom</th>
                <th>  Khu Vực</th>
                <th> Tổng Nạp</th>
                <th> Tổng Lead</th>
                <!-- <th> Nạp còn lại</th>-->
                <th>Lead còn lại</th>
                <th>Tên đăng nhập </th>
                <th>Mật khẩu</th>
                <th> </th>
              </tr>
            </thead>

            <tbody>

              <?php if($listusers <> null ):?>
                <?php foreach($listusers as $user):?>
              <tr>
                <td>
                  <?php echo form_open_multipart('admincp/addnote',array('role'=>"form")); ?>
                  <a href="<?php echo site_url('admincp/edituserinfo/'.$user->userid);?>" id="myBtn<?php echo $user->id?>"><?php echo $user->fullname; ?></a><br/><br/>
                  <a href="<?php echo site_url('admincp/listnote/'.$user->id);?>"><i class="ace-icon glyphicon glyphicon-list-alt"> </i></a> &nbsp;
                  <a href="#" class="showModal<?php echo $user->id?>"><i class="ace-icon glyphicon glyphicon-pencil"></i></a>

                  <div id="modalContents<?php echo $user->id?>" style="display:none;">
                    <input type="hidden" value="<?php echo $user->id?>" name="userid"/>
                    <textarea name="contentnote" placeholder="Nhập note với khách hàng này"></textarea>
                    <br/>
                    <button type="submit" name="submitNote" class="width-15 pull-right btn btn-sm btn-primary">
                      <i class="ace-icon glyphicon glyphicon-pencil"></i>
                    </button>
                  </div>

                  <script type="text/javascript">
                  $(".showModal<?php echo $user->id?>").click(function(e){
                    e.preventDefault();
                    $("#modalContents<?php echo $user->id?>").show();
                    $("#modalContents<?php echo $user->id?>").dialog({bgiframe: true, height: 140, modal: true});
                  });
                  </script>
                  <?php echo form_close(); ?>
                </td>
                <td><?php echo $user->memberphone; ?></td>
                <td><?php echo $user->memberemail; ?></td>
                <td><?php echo $user->showroom; ?></td>
                <td><?php echo $user->memberaddress; ?></td>
                <td><?php echo number_format($user->balancesummary); ?>
                  <?php if($this->session->userdata('admin_type') == 1):?>
                <br/>
              <?php echo form_open_multipart('admincp/updatebalance',array('role'=>"form")); ?>
                <a href="#" class="showDeposit<?php echo $user->userid?>">Nạp <i class="glyphicon glyphicon-usd"></i></a><br/>
                <div id="modalContentsDeposit<?php echo $user->userid?>" style="display:none;">
                  <input type="hidden" value="<?php echo $user->userid?>" name="userid"/>
                  <input type="text"  placeholder="1000000" name="depositamount" />
                    <input type="text"  placeholder="10" name="leadcount" />
                  <br/>
                  <button type="submit" name="submitDeposit" class="width-15 pull-right btn btn-sm btn-primary">
                    <i class="	glyphicon glyphicon-ok"> OK </i>
                  </button>
                <a href="#" class="closeDeposit<?php echo $user->userid?>">Huỷ</a>
                </div>

                <script type="text/javascript">
                $(".showDeposit<?php echo $user->userid?>").click(function(e){
                  e.preventDefault();
                  $("#modalContentsDeposit<?php echo $user->userid?>").show();
                  $("#modalContentsDeposit<?php echo $user->userid?>").dialog({bgiframe: true, height: 140, modal: true});
                });
                $(".closeDeposit<?php echo $user->userid?>").click(function(e){
                  e.preventDefault();
                  $("#modalContentsDeposit<?php echo $user->userid?>").hide();
                });
                </script>
                <?php echo form_close(); ?>
              <?php endif;?>
                </td>
                <td><?php echo number_format($user->leadsummary); ?>

                </td>
                <!-- <td><?php echo number_format($user->balance); ?></td>-->
                  <td><?php echo number_format($user->lead); ?></td>
                <td><?php echo $user->username; ?></td>
                <td><?php echo $user->userpass; ?></td>
                <td class="hidden-480">
                  <a href="<?php echo site_url('admincp/edituserinfo/'.$user->userid);?>"><span class="glyphicon glyphicon-edit">Sửa</span></a>
                  &nbsp;
                   <?php if($this->session->userdata('admin_type') == 1):?>
                  <a href="<?php echo site_url('admincp/removeuser/'.$user->userid);?>"><span class="glyphicon glyphicon-remove">Xoá</span></a>
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
