$(document).ready(function() { 
    $('#Form').ajaxForm({ 
        dataType:  'json', 
        success:   processJson 
    }); 
});


$('select[name=Browser]').change(function(e){
  if ($('select[name=Browser]').val() == '5'){
    $('#browserother').show();
  }else{
    $('#browserother').hide();
  }
});

$('select[name=OS]').change(function(){
  if ($('select[name=OS]').val() == 'otheros'){
    $('#osother').show();
  }else{
    $('#osother').hide();
  }
});

function processJson(data) { 
    alert(data.message);
    window.location.href= data.nextStep;
}