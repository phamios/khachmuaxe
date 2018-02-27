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
                <th> Ngày nạp</th>
                <th>  Số lượng </th>
                <th>  Lead được nhận </th> 
              </tr>
            </thead>
            <tbody>
              <?php if($listpayments <> null):?>
                <?php foreach($listpayments as $payment):?>
              <tr>
                  <td width="200px"><?php echo $payment->createdate?></td>
                  <td><?php echo number_format($payment->amount)?></td>
                  <td width="150px">
                      <?php echo number_format($payment->addLead)?>
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
