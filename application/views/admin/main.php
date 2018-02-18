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
          <div class="col-sm-12">
            <div class="widget-box transparent">
              <div class="widget-header widget-header-flat">
                <h4 class="widget-title lighter">
                  <i class="ace-icon fa fa-star orange"></i>
                  Popular Domains
                </h4>

                <div class="widget-toolbar">
                  <a href="#" data-action="collapse">
                    <i class="ace-icon fa fa-chevron-up"></i>
                  </a>
                </div>
              </div>

              <div class="widget-body">
                <div class="widget-main no-padding">
                  <table class="table table-bordered table-striped">
                    <thead class="thin-border-bottom">
                      <tr>
                        <th>
                          <i class="ace-icon fa fa-caret-right blue"></i>name
                        </th>

                        <th>
                          <i class="ace-icon fa fa-caret-right blue"></i>price
                        </th>

                        <th class="hidden-480">
                          <i class="ace-icon fa fa-caret-right blue"></i>status
                        </th>
                      </tr>
                    </thead>

                    <tbody>
                      <tr>
                        <td>internet.com</td>

                        <td>
                          <small>
                            <s class="red">$29.99</s>
                          </small>
                          <b class="green">$19.99</b>
                        </td>

                        <td class="hidden-480">
                          <span class="label label-info arrowed-right arrowed-in">on sale</span>
                        </td>
                      </tr>

                      <tr>
                        <td>online.com</td>

                        <td>
                          <b class="blue">$16.45</b>
                        </td>

                        <td class="hidden-480">
                          <span class="label label-success arrowed-in arrowed-in-right">approved</span>
                        </td>
                      </tr>

                      <tr>
                        <td>newnet.com</td>

                        <td>
                          <b class="blue">$15.00</b>
                        </td>

                        <td class="hidden-480">
                          <span class="label label-danger arrowed">pending</span>
                        </td>
                      </tr>

                      <tr>
                        <td>web.com</td>

                        <td>
                          <small>
                            <s class="red">$24.99</s>
                          </small>
                          <b class="green">$19.95</b>
                        </td>

                        <td class="hidden-480">
                          <span class="label arrowed">
                            <s>out of stock</s>
                          </span>
                        </td>
                      </tr>

                      <tr>
                        <td>domain.com</td>

                        <td>
                          <b class="blue">$12.00</b>
                        </td>

                        <td class="hidden-480">
                          <span class="label label-warning arrowed arrowed-right">SOLD</span>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div><!-- /.widget-main -->
              </div><!-- /.widget-body -->
            </div><!-- /.widget-box -->
          </div><!-- /.col -->

        </div><!-- /.row -->

        <div class="hr hr32 hr-dotted"></div>



        <!-- PAGE CONTENT ENDS -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.page-content -->
