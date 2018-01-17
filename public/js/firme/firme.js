function goBack() {
   window.history.back();
}
/* global $ */
$(function() {
   $(".dp").datepicker({ dateFormat: 'yy-mm-dd' });
});
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});

$(window).resize(function() {
   
   if ($(window).width() < 700) {
       console.log('detected window smaller then 700');
      $('.only-sm').removeClass("d-none");
   }
   else {
        console.log('detected window bigger then 700');
      $('.only-sm').addClass("d-none");
   }
});
