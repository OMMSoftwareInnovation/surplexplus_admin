<style type="text/css">
  .error
  {
     color: red;
  }
.chkemail:focus
{
    border-color: #FF5722;
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102,175,233,.6);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102,175,233,.6);
}
.validemail:focus{
    border-color: #66afe9;
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102,175,233,.6);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102,175,233,.6);
}
.alert-box 
{   color:#555; 
    box-shadow: 0 0px 2px rgba(0,0,0,.5); 
    font-family:Tahoma,Geneva,Arial,sans-serif;
    font-size:12px; 
    padding:10px 10px 10px 36px; 
    margin:10px; 
} 
.alert-box span 
{   
    font-weight:bold; 
    text-transform:uppercase; 
} 
.error1 
{ 
    background:#ffecec; 
    border:1px solid #f5aca6; 
} 
.success 
{ 
    background:#e9ffd9; 
    border:1px solid #a6ca8a; 
}
#msgbx_err,#msgbx_err1,#msgbx_err2
{ 
    display: none; 
}
#msgbx_success
{ 
    display: none;
}
#chk_avail
{
    margin-left: 5px;
}
</style>
<section class="content-header">
  <h1>Add Seller</h1>
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
              <h3 class="box-title">Seller Details</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="<?php echo site_url('sellercontroller/seller_registraion'); ?>">
              <div class="box-body">
                <div class="form-group">
                  <label>Title</label>
                  <select class="form-control" name="name1" id="name1">
                    <option>Mr.</option>
                    <option>Ms.</option>
                    <option>Mrs.</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="name2">Seller Name <span style="color:red">*</span></label>
                  <?php echo form_error('name2'); ?>
                  <input type="text" class="form-control" name="name2" id="name2" placeholder="Enter Name">
                </div>
                <div class="form-group">
                  <label for="name2">GSTIN Number <span style="color:red">*</span></label>
                  <input type="text" class="form-control gstinnumber" name="gstin" id="gstin" placeholder="Enter GSTIN Number">
                </div>
                <div class="form-group">
                    <label for="email">Username <span style="color:red">*</span></label>
                    <?php echo form_error('username'); ?>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" />
                    <a href="javascript:void(0);" id="chk_avail"><span>Check Availability</span></a>
                    <div id="msgbx_err" class="alert-box error1"><span>error: </span>User already exist with same name.</div>
                    <div id="msgbx_err2" class="alert-box error1"><span>error: </span>Type atleast 3 alphabets.</div>
                    <div id="msgbx_success" class="alert-box success"><span>success: </span>Username available.</div>
                </div>
                <div class="form-group">
                    <label for="email">Email <span style="color:red">*</span></label>
                    <?php echo form_error('email'); ?>
                    <input type="email" class=" chkemail form-control " id="email" name="email" placeholder="Email" />
                    <div id="msgbx_err1" class="alert-box error1"><span>error: </span>This Email Already Exits.</div>
                </div>
                <div class="form-group">
                  <label for="mobile">Mobile <span style="color:red">*</span></label>
                  <?php echo form_error('mobile'); ?>
                  <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter Mobile">
                </div>
                <div class="form-group">
                  <label for="company_name">Company Name <span style="color:red">*</span></label>
                  <?php echo form_error('company_name'); ?>
                  <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Enter Company Name">
                </div>
                <div class="form-group">
                  <label for="comapany_address">Company Address <span style="color:red">*</span></label>
                  <?php echo form_error('company_address'); ?>
                  <input type="text" class="form-control" name="company_address" id="company_address" placeholder="Enter Company Address">
                </div>
                <div class="form-group">
                  <label for="password">Password <span style="color:red">*</span></label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password">
                </div>
                <div class="form-group">
                  <label for="password">Confirm Password <span style="color:red">*</span></label>
                      <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Password" required>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" id="submit" class="btn btn-primary" disabled>Submit</button>
                <span style="color:red;margin-left: 9.9216%;font-style: italic;letter-spacing: 1px;font-weight: bold;">(The fields marked with an asterisk (*) are mandatory.)</span>
              </div>
            </form>
          </div>
          <!-- /.box -->
      </div>
    </div>
  </div>
</section>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>
    $(function() {

        var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

            function validatePassword(){
              if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("Passwords Don't Match");
              } else {
                confirm_password.setCustomValidity('');
              }
            }

            password.onchange = validatePassword;
            confirm_password.onkeyup = validatePassword;


    var  cnt=0;

    $(document).on('change',".gstinnumber", function()
    {
      var inputvalues = $(this).val();
      var gstinformat = new RegExp('^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}$');
      
      if(gstinformat.test(inputvalues))
      {
        if(cnt==2)
        {
          $("#submit").removeAttr("disabled");
        }
        else
        {
          cnt++;
        }
        return true;
      }
      else
      {
        alertify.notify('Please Enter Valid GSTIN Number!', 'error', 5, function(){  console.log('dismissed'); });
        $(".gstinnumber").val('');
        $(".gstinnumber").focus();
      }    
    });
    
    $('#chk_avail').click(function() 
    {
        var name =$('#username').val();
        if (name.length >= 3) 
        {
            $.post('<?php echo site_url('sellercontroller/chk_seller_usr'); ?>', {seller_username: name}, function(d) {
                if (d == 1)
                {
                    $('#msgbx_success').css('display', 'none');
                    $('#msgbx_err').css('display', 'block') ;
                    $('#msgbx_err2').css('display', 'none');
                }
                else
                {
                  if(cnt==2){
                    $("#submit").removeAttr("disabled");
                     }else{
                        cnt++;
                     }
                    $('#msgbx_err').css('display', 'none');
                    $('#msgbx_success').css('display', 'block');
                    $('#msgbx_err2').css('display', 'none');
                }
            });
        }
        else
        {
            $('#msgbx_err').css('display', 'none');
            $('#msgbx_success').css('display', 'none');
            $('#msgbx_err2').css('display', 'block');             
        }
    });

    function ValidateEmail(mail)   
    {
        if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))  
        {  
            return (true)
        }
        return (false)
    } 

    $( "#email" ).keyup(function() 
    {
        var aa=ValidateEmail($("#email").val());
        if(aa==true)
        {
            var name = $('#email').val();
            $.post('<?php echo site_url('sellercontroller/chk_seller_email'); ?>', {seller_email: name}, function(d) 
            {
                if (d == 1)
                {
                    $('#msgbx_err1').css('display', 'block');
                }
                else
                {

                      if(cnt==2){
                    $("#submit").removeAttr("disabled");
                     }else{
                        cnt++;
                     }
                    $('#msgbx_err1').css('display', 'none');
                }
            });
            $( "#email" ).removeClass( "chkemail" ).addClass( "validemail" );
        }
        else
        {
            $( "#email" ).removeClass( "validemail" ).addClass( "chkemail" );         
        }
    });
});
</script>