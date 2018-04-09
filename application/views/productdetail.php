<style type="text/css">
img {
    cursor: zoom-in;
}
.close
{
  opacity: 1;
}
</style>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="text-center">
          <span style="font-size: 26px;"><?php echo $product[0]['product_name']; ?></span>

          <?php
          if ($product[0]['product_status']==1)
          {
              echo "<span class='text-yellow'><b>(Pending)</b></span>";
          }
          elseif ($product[0]['product_status']==2)
          {
              echo "<span class='text-green'><b>(Active)</b></span>";
          }
          elseif ($product[0]['product_status']==3)
          {
              echo "<span class='text-red'><b>(Inactive)</b></span>";
          }
          else
          {
              echo "<span class='text-danger'><b>(Rejected)</b></span>";}
          ?>

          <button type="button" class="btn btn-warning btn-flat pull-right" onclick="window.history.back()">Back</button>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- About Me Box -->
          <div class="box box-primary text-center">
            <div class="box-header with-border">
              <h3 class="box-title" style="font-size: 21px;">Product</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <!-- <i class="fa fa-rupee margin-r-5"></i> Highest Price

              <p class="text-muted"><a style="font-size: 23px;">Rs.<?php echo $product[0]['product_price']; ?></a></p>

              <hr> -->

              <i class="fa fa-th-list margin-r-5"></i> Category

              <p class="text-muted"><a style="font-size: 23px;"><?php echo $category[0]['name']; ?></a></p>

              <hr>

              <i class="fa fa-tags margin-r-5"></i> Sub Category

              <p class="text-muted"><a style="font-size: 23px;">
                <?php
                if (isset($subcategory[0]['name']))
                {
                    if ($subcategory[0]['name'] == "other")
                    {
                        echo "<span class='text-red'>OTHER</span></a>";
                        echo "<hr><i class='fa fa-tags margin-r-5'></i> InFormation";
                        echo "<p class='text-muted'>";
                        if ($product[0]['product_subcat_info'] = null)
                        {
                            echo "<a style='font-size: 20px;'>".$product[0]['product_subcat_info']."</a></p>";
                        }
                        else
                        {
                            echo "<i><a class='text-red'>(No InFormation!!)</a></i>";
                        }
                    }
                    else
                    {
                        echo $subcategory[0]['name']."</a>";                      
                    }
                }
                else
                {
                    echo "<span class='text-yellow'>No Subcategory</span></a>";
                    echo "<hr><i class='fa fa-tags margin-r-5'></i> InFormation";
                    echo "<p class='text-muted'>";
                    echo "<a style='font-size: 20px;'>".$product[0]['product_cat_info']."</a></p>";
                }
                ?>
              </p>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-header with-border text-center">
              <h3 class="box-title" style="font-size: 21px;">Seller Info.</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="http://www.surplexplus.com/surplexplus/surplexplus/assets/sellerpanel/dist/img/user8-128x128.jpg" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $seller[0]['seller_name']; ?></h3>

              <p class="text-muted text-center"><?php echo $seller[0]['seller_email']; ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Username</b> <a class="pull-right"><?php echo $seller[0]['seller_username']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Mobile</b> <a class="pull-right"><?php echo $seller[0]['seller_mobile']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Company</b> <a class="pull-right"><?php echo $seller[0]['seller_company_name']; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Address</b> <a class="pull-right"><?php echo $seller[0]['seller_company_address']; ?></a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#mdetails" data-toggle="tab">Item Details</a></li>
              <li><a href="#description" data-toggle="tab">Description</a></li>
              <li><a href="#summary" data-toggle="tab">Summary</a></li>
            </ul>
            <div class="tab-content">
              <div class=" tab-pane" id="summary">
                <!-- Post -->
                <div class="post">
                  <p><?php echo $product[0]['product_summary']; ?></p>
                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="description">
                <!-- Post -->
                <div class="post">
                  <p><?php echo $product[0]['product_description']; ?></p>
                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->

              <div class="active tab-pane" id="mdetails">
                <!-- Post -->
                <div class="post">
                  <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                      <table class="table table-striped">
                        <tr>
                          <th style="width: 40px">#</th>
                          <th>Titles</th>
                          <th>Information</th>
                        </tr>
                        <tr>
                          <td>1.</td>
                          <td>Item Name</td>
                          <td><?php echo $product[0]['p_name']; ?></td>
                        </tr>
                        <tr>
                          <td>2.</td>
                          <td>Manufacturer</td>
                          <td><?php echo $product[0]['p_manufacturer']; ?></td>
                        </tr>
                        <tr>
                          <td>3.</td>
                          <td>Model/Type</td>
                          <td><?php echo $product[0]['p_model_type']; ?></td>
                        </tr>
                        <tr>
                          <td>4.</td>
                          <td>Year of Manufacture</td>
                          <td><?php echo $product[0]['p_year_of_manufacture']; ?></td>
                        </tr>
                        <tr>
                          <td>5.</td>
                          <td>Item Condition</td>
                          <td><?php echo $product[0]['p_machine_condition']; ?></td>
                        </tr>
                        <tr>
                          <td>6.</td>
                          <td>Item Location</td>
                          <td><?php echo $product[0]['p_machine_location']; ?></td>
                        </tr>
                        <tr>
                          <td>7.</td>
                          <td>Weight</td>
                          <td><?php echo $product[0]['p_weight_approx']; ?></td>
                        </tr>
                        <tr>
                          <td>8.</td>
                          <td>Size/Dimensions</td>
                          <td><?php echo $product[0]['p_size_dimensions_approx']; ?></td>
                        </tr>
                      </table>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>

        <!-- /.col -->
        <div class="col-md-9">
            <!-- About Me Box -->
            <div class="box box-primary text-center">
                <div class="box-header with-border">
                  <h3 class="box-title" style="font-size: 21px;">Product Images</h3>
                </div>
                <div class="box-body">
                    <div class="row margin-bottom">
                        <?php
                          $str = $product[0]['product_imgs'];
                          $img = explode(",",$str);
                          for ($i=1; $i <count($img) ; $i++)
                          {
                        ?>
                          <div class="col-sm-3" style="margin-top: 10px;">
                            <img class="img-responsive" src="http://www.surplexplus.com/surplexplus/surplexplus/files/<?php echo $img[$i] ?>"
                             style="width: 100%;max-height: 117px;"
                              alt="Photo">
                          </div>
                        <?php
                          }
                        ?>
                        <br>
                    </div>
                </div>
            </div>
        </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    <!-- /.tab-content -->
  </div>

 <div class="modal fade" id="enlargeImageModal" tabindex="-1" role="dialog" aria-labelledby="enlargeImageModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="text-danger" aria-hidden="true">x</span></button>
        </div>
        <div class="modal-body">
          <img src="" style="width: 100%;height: 500px;" class="enlargeImageModalSource" style="width: 100%;">
        </div>
      </div>
    </div>
</div>
    </section>
    <!-- /.content -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">
  $(function() {
      $('img').on('click', function() {
      $('.enlargeImageModalSource').attr('src', $(this).attr('src'));
      $('#enlargeImageModal').modal('show');
    });
});
</script>