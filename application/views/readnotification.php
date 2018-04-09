<section class="content-header">
      <h1>
        Read Notification
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- /.col -->
        <div class="col-md-2"></div>
        <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h5 class="box-title">From: <?php echo $notifi[0]['sender_id']; ?></h5>

              <div class="box-tools pull-right">
                <a href="<?php echo site_url('indexcontroller/notification_view'); ?>" class="btn btn-box-tool" data-toggle="tooltip" title="Back"><i class="fa fa-chevron-left"></i></a>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-read-info">
                <h3><?php echo $notifi[0]['notification_subject']; ?></h3>
                <h5><span class="mailbox-read-time pull-right" style="margin-top: -20px;"><?php echo $notifi[0]['created_at']; ?></span></h5>
              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <!-- <p>Hello John,</p> -->

                <p><?php echo $notifi[0]['notification_text']; ?></p>

                <!-- <p>Thanks,<br>Jane</p> -->
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.box-footer -->
            <div class="box-footer">
              <button type="button" onclick="myFunction()" class="btn btn-default"><i class="fa fa-print"></i> Print</button>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

    <script>
function myFunction() {
    window.print();
}
</script>