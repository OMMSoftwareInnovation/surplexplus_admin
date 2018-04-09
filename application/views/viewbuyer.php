<?php   
if(isset($notify))
{
echo $notify;
}
?>
  <!-- DataTables -->
 <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <section class="content-header">
      
            <h1>Buyers</h1>
      <hr>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              	<div class="col-md-10">
              		<h3 class="box-title">Buyer Details</h3>
              	</div>
              	<div class="col-md-2">
              		<a href="<?php echo site_url('buyercontroller/addbuyer'); ?>">
                    <button type="button" class="btn btn-block btn-primary btn-flat"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;Add New Buyer
                		</button>
                  </a>
              	</div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial No.</th>
                  <th>Buyer Name</th>
                  <th>Username</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Company Name</th>
                  <th>Company Address</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
              <?php 
                $cnt=1;
                for ($i=0; $i <count($buyerdata) ; $i++) 
                { 
              ?>
                <tr>
                  <td><?php echo $cnt; ?></td>
                  <td><?php $id=$buyerdata[$i]['buyer_id']; echo $buyerdata[$i]['buyer_name']; ?></td>
                  <td><?php echo $buyerdata[$i]['buyer_username']; ?></td>
                  <td><?php echo $buyerdata[$i]['buyer_email']; ?></td>
                  <td><?php echo $buyerdata[$i]['buyer_mobile']; ?></td>
                  <td><?php echo $buyerdata[$i]['buyer_company_name']; ?></td>
                  <td><?php echo $buyerdata[$i]['buyer_company_address']; ?></td>
                  <td align="center">
                    <a href="<?php echo site_url('buyercontroller/editbuyer');?>/<?php echo $id ?>">
                      <button type="button" class="btn btn-info btn-flat">Edit
                      </button>
                    </a>
                    <a href="<?php echo site_url('buyercontroller/buyer_fulldata');?>/<?php echo $id ?>">
                      <button type="button" class="btn btn-success btn-flat">View
                      </button>
                    </a>
                  </td>
                </tr>
              <?php
                $cnt++;
                }
              ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>

    </section>
    <!-- /.content -->