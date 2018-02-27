<div class="page-content">
  <div class="row">
  <div class="col-sm-12">
    <div class="widget-box transparent">


      <div class="widget-body">
        <div class="widget-main no-padding">
          <table class="table table-bordered table-striped">
            <thead class="thin-border-bottom">
              <tr>
                <th>  ID </th>
                <th> Tên</th>
                <th>  Phone </th>
                <th>  Email</th>
                <th>  showroom</th>
                <th>  Khu Vực</th>
                <th> Đã nạp </th>
                <th>Tên đăng nhập </th>
                <th>Mật khẩu</th>
                <th>Số LEAD</th>
                <th> </th>
              </tr>
            </thead>

            <tbody>

              <?php if($listusers <> null ):?>
                <?php foreach($listusers as $user):?>
              <tr>
                <td><?php echo $user->id; ?></td>
                <td><?php echo $user->fullname; ?></td>
                <td><?php echo $user->memberphone; ?></td>
                <td><?php echo $user->memberemail; ?></td>
                <td><?php echo $user->showroom; ?></td>
                <td><?php echo $user->memberaddress; ?></td>
                <td><?php echo number_format($user->balance); ?></td>
                <td><?php echo $user->username; ?></td>
                <td><?php echo $user->userpass; ?></td>
                <td><?php echo number_format($user->lead); ?></td>
                <td class="hidden-480">
                  <a href="<?php echo site_url('admincp/edituserinfo/'.$user->userid);?>"><span class="glyphicon glyphicon-edit">Sửa</span></a>
                  &nbsp;
                  <a href="<?php echo site_url('admincp/removeuser/'.$user->userid);?>"><span class="glyphicon glyphicon-remove">Xoá</span></a>
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
