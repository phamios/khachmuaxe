  <div class="page-content">
    <?php //$this->load->view("widget/setting");?>

  <?php //$this->load->view("widget/pageheader");?>

    <div class="row">
      <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <?php //$this->load->view("widget/alert");?>

        <!-- Displaty Static -->
        <?php $this->load->view('widget/static');?>

        <div class="hr hr32 hr-dotted"></div>

        <div class="row">
                     <div class="col-xs-4 center">
                       <div class="infobox-chart">
                         <span class="sparkline" data-values="3,4,2,3,4,4,2,2"></span>
                            Tổng số lượng Member khách hàng (được tạo) : <b><?php echo $totalresource?></b>
                       </div>

                       <hr />
                       <div class="infobox-chart">
                         <span class="sparkline" data-values="3,4,2,3,4,4,2,2"></span>
                            Số lượng Member khách hàng đã nạp tiền (mua gói) <b><?php echo $totalDeposit?></b>
                       </div>

                       <hr />
                       <div class="infobox-chart">
                         <span class="sparkline" data-values="3,4,2,3,4,4,2,2"></span>
                          Tổng số tiền mua <b><?php echo number_format($totalMoneyDeposit);?></b>
                       </div>
                       <hr />
                       <div class="infobox-chart">
                         <span class="sparkline" data-values="3,4,2,3,4,4,2,2"></span>
                            Tổng số Lead <b><?php echo number_format($totalLead);?></b>
                       </div>
                       <hr />
                       <div class="infobox-chart">
                         <span class="sparkline" data-values="3,4,2,3,4,4,2,2"></span>
                            Tổng số Lead còn lại <b><?php echo $totalLeadRemand?></b>
                       </div>
                     </div><!-- /.col -->
                   </div>

        <div class="hr hr32 hr-dotted"></div>



        <!-- PAGE CONTENT ENDS -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.page-content -->
