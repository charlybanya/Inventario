$(document).ready(function() { 
    $('#Form').ajaxForm({ 
        dataType:  'json', 
        success:   processJson 
    }); 
});

$(window).load(function(){
$('p select[name=type]').change(function(e){
  if ($('p select[name=type]').val() == 'newType'){
    $('#addType').show();
  }else{
    $('#addType').hide();
  }
});

$('p select[name=subtype]').change(function(){
  if ($('p select[name=subtype]').val() == 'newSubtype'){
    $('#addSubtype').show();
  }else{
    $('#addSubtype').hide();
  }
});

$('p select[name=model]').change(function(){
  if ($('p select[name=model]').val() == 'newModel'){
    $('#addModel').show();
  }else{
    $('#addModel').hide();
  }
});

$('p select[name=brand]').change(function(){
  if ($('p select[name=brand]').val() == 'newBrand'){
    $('#addBrand').show();
  }else{
    $('#addBrand').hide();
  }
});

});

// once page is loaded
$(document).ready(function() {

    // adding an event when the user clicks on <td>
    $('td').click(function() {

        // create input for editing
        var editarea = document.createElement('input');
        editarea.setAttribute('type', 'text');

        // put current value in it
        editarea.setAttribute('value', $(this).html());

        // rewrite current value with edit area
        $(this).html(editarea);

        // set focus to newly created input
        $(editarea).focus();

    });

});

function processJson(data) { 
    alert(data.message);
    if (typeof data.nextStep != 'undefined') {
        window.location.href= data.nextStep;
    }  
}