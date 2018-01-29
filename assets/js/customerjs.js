// navigation
$(function(){
  $("#dashboard a:contains('Dashboard')").parent().addClass('active');
  $("#pet a:contains('Pets')").parent().addClass('active');
 
 //for product
  $("#medicine  a:contains('Products')").parent().addClass('active');
  $("#item  a:contains('Products')").parent().addClass('active');

  



  $("#medicine ul li a:contains('Medicines')").parent().addClass('active');
  $("#item ul li a:contains('Items')").parent().addClass('active');

  $("#customer a:contains('Customers')").parent().addClass('active');
  $("#pet a:contains('Pets')").parent().addClass('active');
  $("#administrator a:contains('Admins')").parent().addClass('active');

  $("#appointment a:contains('Appointments')").parent().addClass('active');
 
})


  $(function () {
   $('.data-table').DataTable( {
      "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],
      'paging'      : true,
      //'lengthChange': false,
      //'searching'   : false,
      'ordering'    : false,
      'info'        : true,
      //'autoWidth'   : false,


    });
  });



  /*$(function () {  
   $('#example1').DataTable( {
        "lengthMenu": [[5,10, 25, 50, -1], [5,10, 25, 50, "All"]],

         "paging":   true,
        "ordering": false,
        "info":     true
    } );
  });*/




$('[data-tooltip="tooltip"]').tooltip();

 $(document).ready(function(){
    $('#successmodal').modal('show');
    $('#dangermodal').modal('show');

	
        /*var ckbox = $('#check_active');
        $('input#check_active').on('click',function () {
            if (ckbox.is(':checked')) {
            	location.reload();
                $('#import_csv').modal('show');
                
            } else {
            	location.reload();
                 $('#import_csv').modal('show');
                 
            }
        });*/

  
  });




