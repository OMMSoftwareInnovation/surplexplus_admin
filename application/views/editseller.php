<style type="text/css">
  .error
  {
     color: red;
  }
</style>
  <section class="content-header">
      <h1>Edit Seller</h1>
      <hr>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
         <!--  <div class="col-md-3"></div> -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Seller Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form"  method="post" action="<?php echo site_url('sellercontroller/seller_profileupdate'); ?>/<?php echo $data[0]['seller_id']; ?>">
              <div class="box-body">
                <div class="form-group col-md-6">
                  <label for="name2">Seller Name</label>
                  <?php echo form_error('name2'); ?>
                  <input type="text" class="form-control" name="name2" id="name2" placeholder="Enter Name" value="<?php echo $data[0]['seller_name']; ?>">
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username"  value="<?php echo $data[0]['seller_username']; ?>" disabled>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">GSTIN Number</label>
                    <input type="text" class="form-control" id="gstin" name="gstin" placeholder="GSTIN"  value="<?php echo $data[0]['gstin_number']; ?>" disabled>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class=" chkemail form-control " id="email" name="email" placeholder="Email" value="<?php echo $data[0]['seller_email']; ?>" disabled>
                </div>
                <div class="form-group col-md-6">
                  <label for="mobile">Commission Rate</label>
                  <?php echo form_error('crate'); ?>
                  <input type="text" class="form-control" name="crate" id="crate" placeholder="Enter Rate" value="<?php echo $data[0]['commission_amount']; ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="mobile">Mobile</label>
                  <?php echo form_error('mobile'); ?>
                  <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile" value="<?php echo $data[0]['seller_mobile']; ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="company_name">Company Name</label>
                  <?php echo form_error('company_name'); ?>
                  <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Enter Company Name" value="<?php echo $data[0]['seller_company_name']; ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="comapany_address">Company Address</label>
                  <?php echo form_error('company_address'); ?>
                  <input type="text" class="form-control" name="company_address" id="company_address" placeholder="Enter Company Address" value="<?php echo $data[0]['seller_company_address']; ?>">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer text-center">
                <div class="col-md-5"></div>
                <button type="submit" class="btn btn-primary btn-flat col-md-2">Edit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
      </div>
    </div>
  </div>
</section>
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
   $('input[name=crate]').keyup(function(e)
{
  if (/\D/g.test(this.value))
  {
    this.value = this.value.replace(/\D/g, '');
  }
}); 
</script>