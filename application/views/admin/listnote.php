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
                <th>Người ghi Note</th>
                <th>  Ngày ghi Note  </th>
                <th>  Nội dung </th>
                <th> Member</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php if($listnote <> null):?>
                <?php foreach($listnote as $note):?>
              <tr>
                <td>
                  <?php foreach($listusersMod as $mod):?>
                    <?php if($mod->userid ==$note->useridpost):?>
                        <?php echo $mod->username;?>
                    <?php endif;?>
                  <?php endforeach;?>
                </td>
                  <td width="100px"><?php echo $note->createdate?></td>
                  <td><?php echo $note->content?></td>
                  <td width="150px">
                    <?php foreach($listusers as $user):?>
                      <?php if($user->id == $note->userid):?>
                          <?php echo $user->fullname;?>
                      <?php endif;?>
                    <?php endforeach;?>
                  </td>
                  <td><a href="<?php echo site_url('admincp/delnote/'.$note->id.'/'.$note->userid);?>"> Xoá </a></td>

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
