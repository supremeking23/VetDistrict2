// navigation
$(function(){
  $("#dashboard a:contains('Dashboard')").parent().addClass('active');
  $("#employee a:contains('Employees')").parent().addClass('active');
  $("#product a:contains('Products')").parent().addClass('active');
  $("#customer a:contains('Customers')").parent().addClass('active');
  $("#pet a:contains('Pets')").parent().addClass('active');
  $("#administrator a:contains('Admins')").parent().addClass('active');

 
})


 $(document).ready(function(){
    $('#successmodal').modal('show');
  });