<div class="page-content">
  <div class="row">
  <div class="col-sm-12">
    <div class="widget-box transparent">
      <div class="widget-body">
        <div class="widget-main no-padding">

          <table class="table table-bordered table-striped">
            <thead class="thin-border-bottom">
              <tr>
                <th> <i class="ace-icon fa fa-caret-right blue"></i>memberid </th>
                <th> <i class="ace-icon fa fa-caret-right blue"></i>Điện thoại </th>
                <th> <i class="ace-icon fa fa-caret-right blue"></i>Họ & Tên </th>
                <th> <i class="ace-icon fa fa-caret-right blue"></i>Vị Trí  </th>
                <th> <i class="ace-icon fa fa-caret-right blue"></i>Nhu cầu</th>
                <th> <i class="ace-icon fa fa-caret-right blue"></i>Màu </th>
                <th> <i class="ace-icon fa fa-caret-right blue"></i>Trả góp</th>
                <th> <i class="ace-icon fa fa-caret-right blue"></i>Thời điểm mua </th>
                <th> <i class="ace-icon fa fa-caret-right blue"></i>Ngày cập nhật </th>
                <th> <i class="ace-icon fa fa-caret-right blue"></i></th>
              </tr>
            </thead>
            <tbody>
              <?php if($listcustomers <> null):?>
                <?php foreach($listcustomers as $customer):?>
              <tr>
                <td>
                  <?php foreach($listusers as $user):?>
                      <?php if($user->id == $customer->memberid):?>
                          <?php echo $user->username;?>
                      <?php endif;?>
                  <?php endforeach;?>
                </td>
                <td><?php echo $customer->phonenumber; ?></td>
                <td><?php echo $customer->fullname; ?></td>
                <td><?php echo $customer->location; ?></td>
                <td><?php echo $customer->demand; ?></td>
                <td><?php echo $customer->color; ?></td>
                <td><?php echo $customer->installment; ?></td>
                <td><?php echo $customer->buytime; ?></td>
                <td> <?php echo $customer->uploadate; ?></td>
                <td class="hidden-480">
                  <a href="#"><span class="label label-warning arrowed-right">Sửa</span></a>
                  &nbsp;
                  <a href="#"><span class="label label-warning arrowed arrowed-left">Xoá</span></a>
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
