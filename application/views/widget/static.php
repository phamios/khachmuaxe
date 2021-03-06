<div class="row">
  <div class="col-sm-12 infobox-container">
    <div class="space-6"></div>

    <div class="infobox infobox-green infobox-small infobox-dark">
      <div class="infobox-progress">
        <div class="easy-pie-chart percentage" data-percent="61" data-size="39">
          <span class="percent">61</span>%
        </div>
      </div>

      <div class="infobox-data">
        <div class="infobox-content">Task</div>
        <div class="infobox-content">Completion</div>
      </div>
    </div>

    <div class="infobox infobox-blue infobox-small infobox-dark">
      <div class="infobox-chart">
        <span class="sparkline" data-values="3,4,2,3,4,4,2,2"></span>
      </div>

      <div class="infobox-data">
        <div class="infobox-content">Thành viên</div>
        <div class="infobox-content">
          <?php echo number_format($TotalMember);?>
        </div>
      </div>
    </div>
    <div class="infobox infobox-blue infobox-small infobox-dark">
      <div class="infobox-chart">
        <span class="sparkline" data-values="3,4,2,3,4,4,2,2"></span>
      </div>

      <div class="infobox-data">
        <div class="infobox-content">User</div>
        <div class="infobox-content">
          <?php echo number_format($TotalMember);?>
        </div>
      </div>
    </div>

    <div class="infobox infobox-blue infobox-small infobox-dark">
      <div class="infobox-chart">
        <span class="sparkline" data-values="1,2,3,3,4,4,6,5"></span>
      </div>

      <div class="infobox-data">
        <div class="infobox-content">Deposit</div>
        <div class="infobox-content">
          <?php echo number_format($totalMoneyDeposit);?>
        </div>
      </div>
    </div>



    <div class="infobox infobox-grey infobox-small infobox-dark">
      <div class="infobox-icon">
        <i class="ace-icon fa fa-download"></i>
      </div>

      <div class="infobox-data">
        <div class="infobox-content">KH</div>
        <div class="infobox-content"><?php echo $totalresource?></div>
      </div>
    </div>
  </div>

  <div class="vspace-12-sm"></div>

</div>
