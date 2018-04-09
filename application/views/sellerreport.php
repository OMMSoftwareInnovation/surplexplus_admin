<link rel="stylesheet" href="<?php echo base_url() ?>assets/report/jquery.dataTables.min.css">
<link rel="stylesheet" href="<?php echo base_url() ?>assets/report/buttons.dataTables.min.css">
<style type="text/css">
    .dt-buttons,.dataTables_filter,.nowrap,.dataTables_info
    {
        padding: 1%;
    }
    .paging_simple_numbers
    {
        margin-top: -2%;
    }
    table.dataTable.nowrap th, table.dataTable.nowrap td 
    {
        white-space: normal !important;
    }
    td
    {
        border-right: 1px solid #ddd;
        border-left: 1px solid #ddd;
        border-bottom: 1px solid #ddd;
    }
    table.dataTable thead th, table.dataTable thead td,
    table.dataTable tfoot th, table.dataTable tfoot td
    {
        border: 1px solid #ddd !important;
    }
    .content-wrapper
    {
      overflow: scroll;
    }
    .dataTables_wrapper .dataTables_paginate .paginate_button
    {
      padding: 0px;
    }
</style>
<section class="content-header">
      <h1>Orders reports</h1>
      <hr>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
    <table id="example" class="display nowrap" cellspacing="0" width="100%" style="text-align: center;">
        <thead>
            <tr>
                <th>Serial No.</th>
                <th>Seller Name</th>
                <th>Username</th>
                <th>GSTIN</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Company</th>
                <th>Address</th>
                <th>Commission Amount (%)</th>
                <th>Products</th>
                <th>Paid Commission (Rs.)</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $cnt=1;
                for ($i=0; $i <count($seller) ; $i++) 
                {
              ?>
                <tr>
                  <td style="border-left: 1px solid #ddd;"><?php echo $cnt; ?></td>
                  <td><?php echo $seller[$i]['seller_name']; ?></td>
                  <td><?php echo $seller[$i]['seller_username']; ?></td>
                  <td><?php echo $seller[$i]['gstin_number']; ?></td>
                  <td><?php echo $seller[$i]['seller_email']; ?></td>
                  <td><?php echo $seller[$i]['seller_mobile']; ?></td>
                  <td><?php echo $seller[$i]['seller_company_name']; ?></td>
                  <td><?php echo $seller[$i]['seller_company_address']; ?></td>
                  <td><?php echo $seller[$i]['commission_amount']; ?> %</td>
                  <td>
                  <?php
                  if (isset($seller[$i]['products'][0]['productcount']))
                  {
                   echo $seller[$i]['products'][0]['productcount'];
                  }
                  else
                  {
                    echo "0";
                  }
                  ?></td>
                  <td>
                  <?php
                  if (isset($seller[$i]['commission'][0]['max']))
                  {
                   echo "Rs.".$seller[$i]['commission'][0]['max'];
                  }
                  else
                  {
                    echo "Rs.0";
                  }
                  ?></td>
                </tr>
              <?php
                $cnt++;
                }
              ?>
        </tbody>
    </table>

      </div>

    </section>
    <!-- /.content -->