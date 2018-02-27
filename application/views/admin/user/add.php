
<div class="page-content">
  <div class="row">
  <div class="col-sm-12">
    <div class="widget-box transparent">
      <?php $this->load->view("widget/alert");?>
      <div class="widget-body">
        <div class="widget-main no-padding">

            <?php echo form_open_multipart('admincp/addUser',array('role'=>"form",'class'=>'form-horizontal')); ?>
            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên đăng nhập </label>

              <div class="col-sm-9">
                <input type="text" id="form-field-1" placeholder="username" name="username" class="col-xs-10 col-sm-5" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Mật khẩu</label>

              <div class="col-sm-9">
                  <input type="text" id="form-field-1-1" placeholder="userpass"name="userpass"  class="col-xs-10 col-sm-5" />
              </div>
            </div>

            <div class="space-4"></div>

            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right" for="form-field-2">Loại thành viên</label>

              <div class="col-sm-9">
                <select name="usertype" id="usertype">
                    <option name="0" value="0">----Lựa chọn loại user----</option>
                    <option value="3">Khách hàng</option>
                    <?php if($this->session->userdata('admin_type') == 1):?>
                      <option value="2">Quản lý</option>
                      <option value="1">Admin </option>
                    <?php endif; ?>
                </select>
              </div>
            </div>
            <script type="text/javascript">
            $(function() {
                $('#row_dim').hide();
                $('#usertype').change(function(){
                    if($('#usertype').val() == '3') {
                        $('#row_dim').show();
                    } else {
                        $('#row_dim').hide();
                    }
                });
            });
            </script>
            <div class="space-4"></div>
            <div class="row" id="row_dim">
                    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Tên đầy đủ</label>

                      <div class="col-sm-9">
                          <input type="text" id="form-field-1-2" placeholder="fullname" name="fullname" class="col-xs-10 col-sm-5" />
                      </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Điện thoại</label></label>

                      <div class="col-sm-9">
                          <input type="text" id="form-field-1-3" placeholder="memberphone" name="memberphone" class="col-xs-10 col-sm-5" />
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Email</label></label>

                      <div class="col-sm-9">
                          <input type="text" id="form-field-1-4" placeholder="memberemail" name="memberemail" class="col-xs-10 col-sm-5" />
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">showroom</label></label>

                      <div class="col-sm-9">
                          <input type="text" id="form-field-1-4" placeholder="showroom" name="showroom" class="col-xs-10 col-sm-5" />
                      </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Địa chỉ</label></label>

                      <div class="col-sm-9">
                          <input type="text" id="form-field-1-4" placeholder="memberaddress" name="memberaddress" class="col-xs-10 col-sm-5" />
                      </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Số tiền nạp</label></label>

                      <div class="col-sm-9">
                          <input type="text" id="form-field-1-5" placeholder="balance" name="balance"  class="col-xs-10 col-sm-5" />
                      </div>
                    </div>
             </div>

            <div class="clearfix form-actions">
              <div class="col-md-offset-3 col-md-9">
                <button class="btn btn-info" type="submit" name="bttSubmit">
                  <i class="ace-icon fa fa-check bigger-110"></i>
                  Tạo mới
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


        </div><!-- /.widget-main -->
      </div><!-- /.widget-body -->
    </div><!-- /.widget-box -->
  </div><!-- /.col -->

</div><!-- /.row -->
</div>
