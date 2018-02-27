<div class="page-content">
  <div class="row">
  <div class="col-sm-12">
    <div class="widget-box transparent">
      <div class="widget-body">
        <div class="widget-main no-padding">
          <?php foreach($loadconfig as $config):?>
            <?php echo form_open_multipart('admincp/leadconfig',array('role'=>"form",'class'=>'form-horizontal')); ?>
            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tên trang </label>

              <div class="col-sm-9">
                <input type="text" id="form-field-1" placeholder="homename" value="<?php echo $config->homename;?>" class="col-xs-10 col-sm-5" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Giá 1 Lead</label>

              <div class="col-sm-9">
                <input type="text" id="form-field-1" placeholder="leadprice" value="<?php echo $config->leadprice?>" class="col-xs-10 col-sm-5" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Code Google Analytic</label>

              <div class="col-sm-9">
                <textarea id="form-field-1" placeholder="googleanalytic" class="col-xs-10 col-sm-5"><?php echo $config->googleanalytic;?></textarea>

              </div>
            </div>

            <div class="space-4"></div>
 
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
          <?php endforeach;?>
           <?php echo form_close(); ?>


        </div><!-- /.widget-main -->
      </div><!-- /.widget-body -->
    </div><!-- /.widget-box -->
  </div><!-- /.col -->

</div><!-- /.row -->
</div>
