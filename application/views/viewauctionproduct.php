  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  
    <section class="content-header">
      
            <h1>Auction Products</h1>
      <hr>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              	<div class="col-md-9">
              		<h3 class="box-title">Auction Products Details</h3>
              	</div>
              	<div class="col-md-3">
                  <a href="<?php echo site_url('productcontroller/addnewauctionproduct'); ?>">
                    <button type="button" class="btn btn-block btn-primary btn-flat"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;Add New Auction Product
                    </button>
                  </a>
              	</div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Seller Name</th>
                  <th>Username</th>
                  <th>Emails</th>
                  <th>Mobile</th>
                  <th>Company Name</th>
                  <th>Company Address</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Trident</td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td>Win 95+</td>
                  <td> 4</td>
                  <td>X</td>
                  <td> 4</td>
                  <td>
                    <a href="<?php echo site_url('productcontroller/auctionproductdetail'); ?>">
                      <button type="button" class="btn btn-info">Edit
                      </button>
                    </a>
                  </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Seller Name</th>
                  <th>Username</th>
                  <th>Emails</th>
                  <th>Mobile</th>
                  <th>Company Name</th>
                  <th>Company Address</th>
                  <th>Action</th>
                </tr>
                </tfoot>
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