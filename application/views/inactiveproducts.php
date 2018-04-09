<?php   
if(isset($notify))
{
echo $notify;
}
?>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  
    <section class="content-header">
      
            <h1>Inactive Product</h1>
      <hr>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              	<div class="col-md-10">
              		<h3 class="box-title">Product List</h3>
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
                  <th style="width: 75px;text-align: center;">Price</th>
                  <th style="width: 75px;text-align: center;">Status</th>
                  <th style="width: 114px;text-align: center;">Action</th>
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
                  <td align="center"><img src="<?php echo base_url()?>files/thumbnail/<?php echo $product[$i]['product_main_img']; ?>"></td>
                  <td align="center"><?php echo $product[$i]['product_name']; ?></td>
                  <td align="center"><?php echo $product[$i]['product_price']; ?></td>
                  <td align="center">
                   <button type="button" class="btn btn-danger"><?php echo "Inactive"; ?></button>
                  </td>
                  <td align="center">
                    <div class="btn-group">
                      <button type="button" data-id="<?php echo $product[$i]['product_id']; ?>" data-toggle="tooltip" data-placement="top" title="Approve?" data-index="2" class="btn btn-primary action">
                        <i class="fa fa-check-circle" style="font-size: 15px;"></i>
                      </button>
                      <button type="button" onclick="location.href='<?php echo site_url('productcontroller/productdetail');?>/<?php echo $product[$i]['product_id']; ?>'" data-toggle="tooltip" data-placement="top" title="View!" class="btn btn-primary">
                        <i class="fa fa-eye" style="font-size: 15px;"></i>
                      </button>
                      <button type="button" data-id="<?php echo $product[$i]['product_id']; ?>" data-toggle="tooltip" data-placement="top" title="Reject?" data-index="3" class="btn btn-primary action">
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

      $.ajax({
        url:"<?php echo site_url('productcontroller/changeproductstatus');?>",
        method:"POST",
        data:{id:id,status:status},
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