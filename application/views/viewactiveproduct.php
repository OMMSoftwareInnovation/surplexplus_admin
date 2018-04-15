  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  
    <section class="content-header">
      
            <h1>Approved Products</h1>
      <hr>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              	<div class="col-md-9">
              		<h3 class="box-title">Active Product Details</h3>
              	</div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="width: 62px;text-align: center;">Serial No.</th>
                  <th style="width: 75px;text-align: center;">Image</th>
                  <th style="text-align: center;">Name</th>
                  <th style="width: 75px;text-align: center;">Seller</th>
                  <th style="width: 75px;text-align: center;">Company</th>
                </tr>
                </thead>
                <tbody>
              <?php
                $cnt=1;
                for ($i=0; $i <count($product) ; $i++) 
                {
              ?>
                <tr>
                  <td align="center"><?php echo $cnt; ?></td>
                  <td align="center"><img src="http://localhost/surplex1/files/thumbnail/<?php echo $product[$i]['product_main_img']; ?>" style=" width: 150px;height: 100px;"></td>
                  <td align="center"><a href="<?php echo site_url('productcontroller/productdetail');?>/<?php echo $product[$i]['product_id']; ?>"><?php echo $product[$i]['product_name']; ?></a></td>
                  <td align="center"><?php echo $product[$i]['seller_name']; ?></td>
                  <td align="center"><?php echo $product[$i]['seller_company_name']; ?></td>
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