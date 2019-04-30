<script>
(function () {
    $("#BankAddForm").validate();
   
})();

(function () {
    $("#CashInHandAddForm").validate();
   
})();
/************ State Add Form  **********/

  $("#StateAddForm").validate();
  $('#state').on('change',function(){
   var state =  $( "#state option:selected" ).text();
   $('#state_name').val(state);
  }); 


</script>
