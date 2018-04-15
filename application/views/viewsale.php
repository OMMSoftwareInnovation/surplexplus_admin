  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">


    <section class="content-header">
      
            <h1>Orders</h1>
      <hr>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
                <div class="col-md-10">
                  <h3 class="box-title">All Orders</h3>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Order No.</th>
                  <th>Image</th>
                  <th>Product Name</th>
                  <th>Buyer</th>
                  <th>Seller</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
            <?php
                for ($i=0; $i <count($sale) ; $i++)
                {
            ?>
                <tr>
                  <td><?php echo $sale[$i]['order_id']; ?></td>
                  <td><img src="http://localhost/surplex1/files/thumbnail/<?php echo $sale[$i]['product_main_img']?>" style="width: 150px;height: 100px;"></td>
                  <td><?php echo $sale[$i]['product_name']; ?></td>
                  <td><?php echo $sale[$i]['buyer_name']; ?></td>
                  <td><?php echo $sale[$i]['seller_name']; ?></td>
                  <td>
                    <?php
                    if ($sale[$i]['order_status']==1)
                    {
                        echo "<span class='label label-warning'><b>Pending</b></span>";
                    }
                    elseif ($sale[$i]['order_status']==2)
                    {
                        echo "<span class='label label-success'><b>Approved</b></span>";
                    }
                    else
                    {
                        echo "<span class='label label-danger'><b>Rejected</b></span>";
                    }
                    ?></td>
                  <td>
                    <a href="#">
                      <button type="button" class="btn btn-info">View
                      </button>
                    </a>
                  </td>
                </tr>
            <?php
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