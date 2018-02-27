
<div class="page-content">
  <div class="row">
  <div class="col-sm-12">
    <div class="widget-box transparent">
      <?php $this->load->view("widget/alert");?>
      <div class="widget-body">
        <div class="widget-main no-padding">
          <?php foreach($userinfo as $user):?>
            <?php echo form_open_multipart('admincp/edituserinfo/'.$user->userid,array('role'=>"form",'class'=>'form-horizontal')); ?>
            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên đăng nhập </label>

              <div class="col-sm-9">
                <input type="text" readonly="" id="form-input-readonly" id="form-field-1" placeholder="username" name="username" value="<?php echo $user->username;?>" class="col-xs-10 col-sm-5" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Mật khẩu</label>

              <div class="col-sm-9">
                  <input type="text" readonly="" id="form-input-readonly" id="form-field-1-1" placeholder="userpass"name="userpass"value="<?php echo $user->userpass;?>"  class="col-xs-10 col-sm-5" />
              </div>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right" for="form-field-2">Loại thành viên</label>

              <div class="col-sm-9">
                  <?php if($user->usertype == 3):?>
                      Khách hàng
                  <?php else:?>
                      Quản trị hệ thống
                  <?php endif;?>
              </div>
            </div>

            <div class="space-4"></div>
            <div class="row" id="row_dim">
                    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Tên đầy đủ</label>

                      <div class="col-sm-9">
                          <input type="text" id="form-field-1-2" placeholder="fullname" name="fullname" value="<?php echo $user->fullname;?>" class="col-xs-10 col-sm-5" />
                      </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Điện thoại</label></label>

                      <div class="col-sm-9">
                          <input type="text" id="form-field-1-3" placeholder="memberphone" name="memberphone" value="<?php echo $user->memberphone;?>"  class="col-xs-10 col-sm-5" />
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Email</label></label>

                      <div class="col-sm-9">
                          <input type="text" readonly="" id="form-input-readonly" id="form-field-1-4" placeholder="memberemail" name="memberemail" value="<?php echo $user->memberemail;?>" class="col-xs-10 col-sm-5" />
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">showroom</label></label>

                      <div class="col-sm-9">
                          <input type="text" id="form-field-1-4" placeholder="showroom" name="showroom" value="<?php echo $user->showroom;?>" class="col-xs-10 col-sm-5" />
                      </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Địa chỉ</label></label>

                      <div class="col-sm-9">
                          <input type="text" id="form-field-1-4" placeholder="memberaddress" name="memberaddress" value="<?php echo $user->memberaddress;?>" class="col-xs-10 col-sm-5" />
                      </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Số tiền còn lại</label></label>
                      <div class="col-sm-9">
                          <input type="text" readonly="" id="form-input-readonly" id="form-field-1-5" placeholder="balance" name="balance"  value="<?php echo $user->balance;?>" class="col-xs-10 col-sm-5" />
                      </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Số LEAD còn lại</label></label>
                      <div class="col-sm-9">
                          <input type="text" readonly="" id="form-input-readonly" id="form-field-1-5" placeholder="balance" name="balance"  value="<?php echo $user->lead;?>" class="col-xs-10 col-sm-5" />
                      </div>
                    </div>
             </div>

            <div class="clearfix form-actions">
              <div class="col-md-offset-3 col-md-9">
                <button class="btn btn-info" type="submit" name="bttSubmit">
                  <i class="ace-icon fa fa-check bigger-110"></i>
                  Cập nhật
                </button>

                &nbsp; &nbsp; &nbsp;
                <button class="btn" type="reset">
                  <i class="ace-icon fa fa-undo bigger-110"></i>
                  Reset
                </button>
              </div>
            </div>

            <div class="hr hr-24"></div>


           <?php echo form_close(); ?>
         <?php endforeach;?>


        </div><!-- /.widget-main -->
      </div><!-- /.widget-body -->
    </div><!-- /.widget-box -->
  </div><!-- /.col -->

</div><!-- /.row -->
</div>
