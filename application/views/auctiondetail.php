<style type="text/css">
  .form-inline
  {
      padding: 15px;
  }
  #example1
  {
      background: white;
  }
  .table.dataTable tfoot th
  {
    border-top: 0;
  }
  .table.dataTable thead th
  {
    border-bottom: 0;
  }
</style>
<link rel="stylesheet" href="<?php echo base_url() ?>assets/report/jquery.dataTables.min.css">
  <section class="content-header">
      <div class="text-center">

          <button type="button" class="btn btn-warning btn-flat pull-right" onclick="window.history.back()">Back</button>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <!-- /.col -->
        <div class="col-md-12">
            <!-- About Me Box -->
            <div class="box box-primary text-center">
            <div class="box-header with-border">
              <h3 class="box-title" style="font-size: 21px;">Auction Detail</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <div class="col-md-3"></div>

              <div class="col-md-6">
              <i class="fa fa-info-circle margin-r-5"></i> Auction Name
              <p class="text-muted btn-default"><a style="font-size: 26px;"><?php echo $auction[0]['auction_title']; ?></a></p>
              </div>
              
              <div class="col-md-3"></div>
              
              <div class="col-md-12">
              <i class="fa fa-picture-o margin-r-5"></i> Auction Image
              <br>
              <img src="http://localhost/surplex1/<?php echo $auction[0]['auction_image']; ?>" style="width: 200px;height: 150px;border: 3px solid #3c8dbc;padding: 2px;border-radius: 2px;">
              </div>

              <div class="col-md-6">
              <i class="fa fa-clock-o margin-r-5"></i> Starting Date And time
              <p class="text-muted btn-default"><a style="font-size: 23px;"><?php echo $auction[0]['auction_st_time']; ?></a></p>
              </div>

              <div class="col-md-6">
              <i class="fa fa-clock-o margin-r-5"></i> Ending Date And time
              <p class="text-muted btn-default"><a style="font-size: 23px;"><?php echo $auction[0]['auction_ed_time']; ?></a></p>
              </div>

            </div>

            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Serial No.</th>
                <th>Image</th>
                <th>Name</th>
                <th>Starting Bid (Rs)</th>
                <th>Increment (Rs)</th>
                <th>Reserve Price (Rs)</th>
                  <?php
                  if ($auction[0]['auction_status'] == "3") {
                    ?>
                <th>Num Of Bids</th>
                <th>Current Hieshest Bid</th>
                    <?php
                  }
                  ?>
              </tr>
              </thead>
              <tbody>
                <?php
                  $cnt=1;
                  for ($i=0; $i <count($products) ; $i++)
                  {
                ?>
                <tr>
                  <td><?php echo $cnt; ?></td>
                  <td>
                    <img src="http://localhost/surplex1/files/thumbnail/<?php echo $products[$i]['product_main_img']; ?>" alt="..." style="width: 125px;height: 80px;">
                  </td>
                  <td><?php echo $products[$i]['product_name']; ?></td>
                  <td>Rs.<?php echo $products[$i]['strating_bid_price']; ?></td>
                  <td>Rs.<?php echo $products[$i]['bid_increment']; ?></td>
                  <td>Rs.<?php echo $products[$i]['reserved_price']; ?></td>
                  <?php
                  if ($auction[0]['auction_status'] == "3") {
                    ?>
                  <td><?php echo $products[$i]['bidcount']; ?></td>
                  <td>Rs.
                    <?php
                    if (isset($products[$i]['maxbid']))
                    {
                      echo $products[$i]['maxbid'];
                    }
                    else
                    {
                      echo "0";
                    }
                     ?>
                  </td>

                    <?php
                  }
                  ?>
                </tr>
                <?php
                  $cnt++;
                  }
                ?>
              </tbody>
            </table>

            </div>
        </div>

      </div>
      <!-- /.col -->

    </section>
    <!-- /.content