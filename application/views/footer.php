
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url() ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url() ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url() ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url() ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
<!-- Alertify JS -->
<!-- Alertify JS -->
<script src="<?php echo base_url() ?>assets/report/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url() ?>assets/report/jszip.min.js"></script>
<script src="<?php echo base_url() ?>assets/report/pdfmake.min.js"></script>
<script src="<?php echo base_url() ?>assets/report/vfs_fonts.js"></script>
<script src="<?php echo base_url() ?>assets/report/buttons.html5.min.js"></script>
<script src="<?php echo base_url() ?>assets/report/buttons.print.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>

<script>

$(document).ready(function(){

// updating the view with notifications using ajax

function load_unseen_notification(view = '')

{

 $.ajax({

  url:"<?php echo site_url('indexcontroller/fetch_notification');?>",
  method:"POST",
  data:{view:view},
  dataType:"json",
  success:function(data)

  {
   $('.menu').html(data.notification);

   if(data.unseen_notification > 0)
   {
    $('#ntf').html(data.unseen_notification);
   }

  }

 });

}

load_unseen_notification();

// submit form and get new records


// load new notifications

 $("#ntff").click(function (event) {
        //Do stuff when clicked
    
   // alert("Fsf");
  $('#ntf').html('');

 load_unseen_notification('yes');

});

setInterval(function(){

 load_unseen_notification();;

}, 5000);

});

</script>

<script>
  $(function () {
    $('#example1').DataTable()
  })
</script>
</body>
</html>
