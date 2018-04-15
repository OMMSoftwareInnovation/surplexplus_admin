  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  
    <section class="content-header">
      
            <h1>Pending Auctions</h1>
      <hr>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              	<div class="col-md-10">
              		<h3 class="box-title">Pending Auction Details</h3>
              	</div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Serial No.</th>
                  <th>Image</th>
                  <th>Title</th>
                  <th>Seller</th>
                  <th>Company</th>
                  <th>Starting Time</th>
                  <th>Ending Time</th>
                  <th>Total Items</th>
                  <th style="width: 101px;">Actions</th>
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
                    <img src="http://localhost/surplex1/<?php echo $auctions[$i]['auction_image']; ?>" style="width: 150px;height: 100px;">
                  </td>
                  <td><?php echo $auctions[$i]['auction_title']; ?></td>
                  <td><?php echo $auctions[$i]['seller_name']; ?></td>
                  <td><?php echo $auctions[$i]['seller_company_name']; ?></td>
                  <td><?php echo $auctions[$i]['auction_st_time']; ?></td>
                  <td><?php echo $auctions[$i]['auction_ed_time']; ?></td>
                  <td><?php echo $auctions[$i]['total']; ?></td>
                  <td align="center">
                    <div class="btn-group">
                      <button type="button" data-id="<?php echo $auctions[$i]['auction_id']; ?>" data-toggle="tooltip" data-placement="top" title="Approve?" data-index="2" d-sid="<?php echo $auctions[$i]['auction_by']; ?>" class="btn btn-success action">
                        <i class="fa fa-check-circle" style="font-size: 15px;"></i>
                      </button>
                      <button type="button" onclick="location.href='<?php echo site_url('auctioncontroller/auctiondetail');?>/<?php echo $auctions[$i]['auction_id']; ?>'" data-toggle="tooltip" data-placement="top" title="View!" class="btn btn-primary">
                        <i class="fa fa-eye" style="font-size: 15px;"></i>
                      </button>
                      <button type="button" data-id="<?php echo $auctions[$i]['auction_id']; ?>" data-toggle="tooltip" data-placement="top" title="Reject?" data-index="3" d-sid="<?php echo $auctions[$i]['auction_by']; ?>" class="btn btn-danger action">
                        <i class="fa fa-ban" style="font-size: 15px;"></i>
                      </button>
                    </div>
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

<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
  $( ".action" ).click(function() 
  {
      id=$(this).attr('data-id');
      status=$(this).attr('data-index');
      sid=$(this).attr('d-sid');
      //alert(id);

      $.ajax({
        url:"<?php echo site_url('auctioncontroller/changeauctionstatus');?>",
        method:"POST",
        data:{id:id,status:status,sid:sid},
        dataType:"json",
        success:function(data)
        {
            if(data) 
            {
                location.reload();
            }
            else
            {
                alert("Something Went Wrong!!");
            }
        }

       });
  });
</script>