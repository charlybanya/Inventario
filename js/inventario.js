$(document).ready(function() { 
    $('#Form').ajaxForm({ 
        dataType:  'json', 
        success:   processJson 
    }); 
});

function processJson(data) { 
    alert(data.message);
    window.location.href= data.nextStep;
}