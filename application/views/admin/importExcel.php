

<div class="page-content">
  <div class="row">
  <div class="col-sm-12">
    <div class="widget-box transparent">
      <div class="widget-body">
        <div class="widget-main no-padding">

            <?php echo form_open_multipart('admincp/importExcel',array('role'=>"form",'class'=>'form-horizontal')); ?>

            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Chọn file </label>
              <div class="col-sm-9">
                <input type="file" id="form-field-1" placeholder="Chọn file excel" name="fileupload" class="col-xs-10 col-sm-5" />
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label no-padding-right" for="form-field-1">  </label>
              <div class="col-sm-9">
                <select name="userid" class="chosen" style="width:500px;">
                  <option value="0" selected="selected">---Chọn tên khách hàng ---</option>
                   <?php if($listusers <> null):?>
                      <?php foreach($listusers as $user):?>
                          <option value="<?php echo $user->userid?>"><?php echo $user->fullname."|".$user->memberphone?></option>
                      <?php endforeach;?>
                   <?php endif;?>
                </select>
                <script type="text/javascript">
                      $(".chosen").chosen();
                </script>
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

           <?php echo form_close(); ?>


        </div><!-- /.widget-main -->
      </div><!-- /.widget-body -->
    </div><!-- /.widget-box -->
  </div><!-- /.col -->

</div><!-- /.row -->
</div>
