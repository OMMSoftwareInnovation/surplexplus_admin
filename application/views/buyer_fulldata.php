<?php   
if(isset($notify))
{
echo $notify;
}
?>
  <!-- DataTables -->
 <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <section class="content-header">
      <h1>Buyer's Profile</h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-12">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
          <div class="col-md-3"></div>
          <div class="col-md-6" style="box-shadow: 0px 0px 2px 0 rgba(0,0,0,0.16), 0px 0px 2px 0 rgba(0,0,0,0.12);border: 1px solid #d2d6de;">

              <h3 class="profile-username text-center" style="font-size: 30px;"><?php echo $data[0]['buyer_name']; ?></h3>

              <p class="text-muted text-blue text-center" style="font-size: 20px;"><?php echo $data[0]['buyer_email']; ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Username</b> <a class="pull-right"><?php echo $data[0]['buyer_username']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Mobile</b> <a class="pull-right"><?php echo $data[0]['buyer_mobile']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Company Name</b> <a class="pull-right"><?php echo $data[0]['buyer_company_name']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Company Address</b> <a class="pull-right"><?php echo $data[0]['buyer_company_address']; ?></a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <!-- <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
              <li><a href="#timeline" data-toggle="tab">Timeline</a></li> -->
              <li><a href="#history" data-toggle="tab">Order History</a></li>
            </ul>
            <div class="tab-content">
              
              <!-- /.tab-pane -->
              
              <!-- /.tab-pane -->

              <div class="active tab-pane" id="history">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial No.</th>
                  <th>Product Name</th>
                  <th>Seller Name</th>
                  <th>Amount (Rs)</th>
                  <th>Status</th>
                  <th>Due Date</th>
                </tr>
                </thead>
                <tbody>
              <?php 
                $cnt=1;
                for ($i=0; $i <count($buyer_fulldata) ; $i++) 
                { 
              ?>
                <tr>
                  <td><?php echo $cnt; ?></td>
                  <td><?php echo $buyer_fulldata[$i]['product_name']; ?></td>
                  <td><?php echo $buyer_fulldata[$i]['seller_id']; ?></td>
                  <td><?php echo "Rs.".$buyer_fulldata[$i]['order_amount']; ?></td>
                  <td>
                    <?php
                    if ($buyer_fulldata[$i]['order_status']==1)
                    {
                        echo "<span class='label label-warning'><b>Pending</b></span>";
                    }
                    elseif ($buyer_fulldata[$i]['order_status']==2)
                    {
                        echo "<span class='label label-success'><b>Approved</b></span>";
                    }
                    else
                    {
                        echo "<span class='label label-danger'><b>Rejected</b></span>";
                    }
                    ?>
                  </td>
                  <td><?php echo $buyer_fulldata[$i]['created_at']; ?></td>
                </tr>
              <?php
                $cnt++;
                }
              ?>
                </tbody>
              </table>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->