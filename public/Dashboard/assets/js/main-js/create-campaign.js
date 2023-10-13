
$('.datepicker').datepicker();

$('select#listSelect').on('change', function() {
    if(this.value == 0){
        $('#listModal').modal('show');
    }
  });

$('.close-modal').on('click', function(){
    $('#listModal').modal('hide');
});

$('#selectAll').click(function() {
    $('#customers option').prop('selected', true);
});
  
$('#unselectAll').click(function() {
    $('#customers option').prop('selected', false);
});

$("#clockpicker").prop('disabled', true);
$("#datepicker").prop('disabled', true);

$('#chk-ani').on('change', function(){
    let value = $(this).is(':checked');
    if(value == true){
        $("#clockpicker").prop('disabled', false);
        $("#datepicker").prop('disabled', false);
    }else{
        $("#clockpicker").prop('disabled', true);
        $("#datepicker").prop('disabled', true);
    }
});