<link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<style type="text/css">
.table-striped>tbody>tr:nth-of-type(even)
{
    background-color: #ececec;
}
.table-striped>tbody>tr:nth-of-type(odd) 
{
    background-color: #ececec;
}
.unseen 
{
    background-color: #fff!important;
}
tr:hover 
{
    background-color: #cee4f1!important;
    cursor: pointer;
}
</style>
    <section class="content-header">
      <h1>
        Notifications
        <small>
        <?php
        echo count($notifi);
        ?>
          Messages</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Inbox</h3>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive mailbox-messages">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sender</th>
                  <th>Subject</th>
                  <th>Time</th>
                </tr>
                </thead>
                  <tbody>
                <?php
                for ($i=0; $i <count($notifi) ; $i++)
                {
                ?>
                  <?php 
                  if ($notifi[$i]['notification_status']=='1')
                  {
                  ?>
                    <tr class="unseen" id="<?php echo $notifi[$i]['notification_id']; ?>">
                  <?php 
                  }
                  else
                  {
                  ?>
                    <tr id="<?php echo $notifi[$i]['notification_id']; ?>">
                  <?php
                  }
                  ?>
                    <td class="mailbox-name">
                      <?php
                        if ($notifi[$i]['sender_type'] == "seller")
                        {
                           echo $notifi[$i]['seller_username'];
                        }
                        else
                        {
                           echo $notifi[$i]['buyer_username'];
                        }
                      ?>
                      </td>
                    <td class="mailbox-subject"><b><?php echo $notifi[$i]['notification_subject']; ?></b> - <?php echo $notifi[$i]['notification_text']; ?></td>
                    <td class="mailbox-date"><?php echo $notifi[$i]['created_at']; ?></td>
                  </tr>
                <?php
                }
                ?>
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>

<script type="text/javascript">
  $(document).ready(function() {
    var table = $('#example1').DataTable();
 
    $('#example1 tbody').on( 'click', 'tr', function () {
      
      console.log($(this).attr('id'));
        window.location = "<?php echo  site_url('indexcontroller/read_notification').'/' ;?>"+$(this).attr('id');

    } );
} );
</script>