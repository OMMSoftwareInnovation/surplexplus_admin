<style type="text/css">
  .error
  {
     color: red;
  }
</style>
  <section class="content-header">
      <h1>Edit Buyer</h1>
      <hr>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <div class="col-md-3"></div>
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Buyer Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form"  method="post" action="<?php echo site_url('buyercontroller/buyer_profileupdate'); ?>/<?php echo $data[0]['buyer_id']; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="name2">Buyer Name</label>
                  <?php echo form_error('name2'); ?>
                  <input type="text" class="form-control" name="name2" id="name2" placeholder="Enter Name" value="<?php echo $data[0]['buyer_name']; ?>">
                </div>
                <div class="form-group">
                    <label for="email">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username"  value="<?php echo $data[0]['buyer_username']; ?>" disabled>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class=" chkemail form-control " id="email" name="email" placeholder="Email" value="<?php echo $data[0]['buyer_email']; ?>" disabled>
                </div>
                <div class="form-group">
                  <label for="mobile">Mobile</label>
                  <?php echo form_error('mobile'); ?>
                  <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile" value="<?php echo $data[0]['buyer_mobile']; ?>">
                </div>
                <div class="form-group">
                  <label for="company_name">Company Name</label>
                  <?php echo form_error('company_name'); ?>
                  <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Enter Company Name" value="<?php echo $data[0]['buyer_company_name']; ?>">
                </div>
                <div class="form-group">
                  <label for="comapany_address">Company Address</label>
                  <?php echo form_error('company_address'); ?>
                  <input type="text" class="form-control" name="company_address" id="company_address" placeholder="Enter Company Address" value="<?php echo $data[0]['buyer_company_address']; ?>">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary btn-flat">Edit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
      </div>
    </div>
  </div>
</section>