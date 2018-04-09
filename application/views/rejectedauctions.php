  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  
    <section class="content-header">
      
            <h1>Active Auctions</h1>
      <hr>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              	<div class="col-md-10">
              		<h3 class="box-title">Active Auction Details</h3>
              	</div>
              	<div class="col-md-2">
                  <a href="<?php echo site_url('auctioncontroller/addnewauction'); ?>">
                    <button type="button" class="btn btn-block btn-primary btn-flat"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;Add New Auction
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
                  <th>Image</th>
                  <th>Total Items</th>
                  <th>Title</th>
                  <th>Seller</th>
                  <th>Company</th>
                  <th>Starting Time</th>
                  <th>Ending Time</th>
                </tr>
                </thead>
                <tbody>
              <?php
                $cnt=1;
                for ($i=0; $i <count($auctions) ; $i++) 
                {
              ?>
                <tr>
                  <td><?php echo $cnt; ?></td>
                  <td>
                    <img src="http://www.surplexplus.com/surplexplus/surplexplus/<?php echo $auctions[$i]['auction_image']; ?>" style="width: 150px;height: 100px;">
                  </td>
                  <td class="text-center"><?php echo $auctions[$i]['total']; ?></td>
                  <td>
                    <a href="<?php echo site_url('auctioncontroller/auctiondetail'); ?>/<?php echo $auctions[$i]['auction_id']; ?>">
                      <?php echo $auctions[$i]['auction_title']; ?>
                    </a>
                  </td>
                  <td><?php echo $auctions[$i]['auction_title']; ?></td>
                  <td><?php echo $auctions[$i]['seller_name']; ?></td>
                  <td><?php echo $auctions[$i]['seller_company_name']; ?></td>
                  <td><?php echo $auctions[$i]['auction_st_time']; ?></td>
                  <td><?php echo $auctions[$i]['auction_ed_time']; ?></td>
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