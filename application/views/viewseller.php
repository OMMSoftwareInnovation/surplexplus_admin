<?php   
if(isset($notify))
{
echo $notify;
}
?>
<style type="text/css">
.table>tbody>tr>td
{
    padding: 6px;
}
</style>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  
    <section class="content-header">
      
            <h1>Sellers</h1>
      <hr>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              	<div class="col-md-10">
              		<h3 class="box-title">Seller Details</h3>
              	</div>
              	<div class="col-md-2">
                  <a href="<?php echo site_url('sellercontroller/addseller'); ?>">
                    <button type="button" class="btn btn-block btn-primary btn-flat"><i class="fa fa-plus"></i>&nbsp;&nbsp;&nbsp;Add New Seller
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
                  <th>Seller Name</th>
                  <th>Username</th>
                  <th>GSTIN</th>
                  <th>Commission Rate (%)</th>
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
                for ($i=0; $i <count($sellerdata) ; $i++) 
                {
              ?>
                <tr>
                  <td><?php echo $cnt; ?></td>
                  <td><?php $id=$sellerdata[$i]['seller_id']; echo $sellerdata[$i]['seller_name']; ?></td>
                  <td><?php echo $sellerdata[$i]['seller_username']; ?></td>
                  <td><?php echo $sellerdata[$i]['gstin_number']; ?></td>
                  <td>
                    <div class="form-group">
                      <input type="text" max="100" data-toggle="tooltip" data-placement="left" title="" data-original-title="Rate In %" value="<?php echo $sellerdata[$i]['commission_amount']; ?>"
                       style="width: 100px;" name="number" class="form-control text-center" id="sid<?php echo $sellerdata[$i]['seller_id']; ?>" placeholder="Enter ...">
                    <button type="submit" class="btn btn-primary btn-flat addprice" data-toggle="" data-sid="<?php echo $sellerdata[$i]['seller_id']; ?>" data-pid="">Save</button>
                    </div>
                  </td>
                  <td><?php echo $sellerdata[$i]['seller_email']; ?></td>
                  <td><?php echo $sellerdata[$i]['seller_mobile']; ?></td>
                  <td><?php echo $sellerdata[$i]['seller_company_name']; ?></td>
                  <td><?php echo $sellerdata[$i]['seller_company_address']; ?></td>
                  <td>
                    <a href="<?php echo site_url('sellercontroller/editseller');?>/<?php echo $id ?>">
                      <button type="button" class="btn btn-info">Edit
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

<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
    $('input[name="number"]').keyup(function(e)
{
  if (/\D/g.test(this.value))
  {
    // Filter non-digits from input value.
    this.value = this.value.replace(/\D/g, '');
  }
});
    $('.addprice').click( function()
    {
      var sid = $(this).attr("data-sid");
      var crate = $("#sid"+$(this).attr("data-sid")).val();
      //alert(sid+'--'+crate);
      if (parseInt(crate) == '' && crate!=0)
      {
        alertify.notify('Please enter Commission Rate!', 'error', 5 );
        // alert('ify');
      }
      else if ( parseInt(crate) > '100' )
      {
        alertify.notify('Commission Rate must be 0 TO 100 % !', 'error', 5 );
      }
      else
      {
        $.ajax({
        url:"<?php echo site_url('sellercontroller/seller_rateupdate'); ?>",
        method:"POST",
        data:{sid:sid,crate:crate},
        dataType:"json",
        success:function(data)
        {
            if(data) 
            {
                // alertify.notify('Seller'+"'s Commission is Updated !" , 'success', 5 );
                location.reload();
            }
            else
            {
                alertify.notify('Something Went Wrong!!', 'error', 5 );
            }
        }

       });
      }
    });
</script>