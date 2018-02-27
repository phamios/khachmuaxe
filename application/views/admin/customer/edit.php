
<div class="page-content">
  <div class="row">
  <div class="col-sm-12">
    <div class="widget-box transparent">
      <div class="widget-body">
        <div class="widget-main no-padding">
          <?php foreach($detailCustomers as $customer):?>
            <?php echo form_open_multipart('admincp/editcustomer/'.$customer->id,array('role'=>"form",'class'=>'form-horizontal')); ?>
            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Họ tên </label>

              <div class="col-sm-9">
                <input type="text" id="form-field-1" placeholder="fullname" name="fullname" value="<?php echo $customer->fullname;?>" class="col-xs-10 col-sm-5" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1"> Phone number</label>

              <div class="col-sm-9">
                  <input type="text" id="form-field-1-1" placeholder="phonenumber"name="phonenumber"value="<?php echo $customer->phonenumber;?>"  class="col-xs-10 col-sm-5" />
              </div>
            </div>

            <div class="space-4"></div>
            <div class="row" id="row_dim">
                    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Địa chỉ</label>

                      <div class="col-sm-9">
                          <input type="text" id="form-field-1-2" placeholder="location" name="location" value="<?php echo $customer->location;?>" class="col-xs-10 col-sm-5" />
                      </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Nhu cầu</label></label>

                      <div class="col-sm-9">
                          <input type="text" id="form-field-1-3" placeholder="demand" name="demand" value="<?php echo $customer->demand;?>"  class="col-xs-10 col-sm-5" />
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Màu</label></label>

                      <div class="col-sm-9">
                          <input type="text" id="form-field-1-4" placeholder="color" name="color" value="<?php echo $customer->color;?>" class="col-xs-10 col-sm-5" />
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Trả góp</label></label>

                      <div class="col-sm-9">
                          <input type="text" id="form-field-1-4" placeholder="installment" name="installment" value="<?php echo $customer->installment;?>" class="col-xs-10 col-sm-5" />
                      </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Số tiền</label></label>

                      <div class="col-sm-9">
                          <input type="text" id="form-field-1-4" placeholder="amount" name="amount" value="<?php echo $customer->amount;?>" class="col-xs-10 col-sm-5" />
                      </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="form-field-1-1">Thời điểm mua</label></label>

                      <div class="col-sm-9">
                          <input type="text" id="form-field-1-4" placeholder="buytime" name="buytime" value="<?php echo $customer->buytime;?>" class="col-xs-10 col-sm-5" />
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
                <button class="btn" type="submit" name="bttReset">
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
