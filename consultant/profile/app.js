$(document).ready(function() {
    init();
})

function init() {    
    //WYSIWYG-Editor
    $('#profile-desc').trumbowyg({
        btns: [        
            ['formatting'],
            ['strong', 'em'],
            'btnGrp-justify',
            'btnGrp-lists',
            ['removeformat'],
            ['fullscreen'],
            ['viewHTML'],
        ],
    });
    
    load_profile();
}

/********  LOAD  ********/
function load_profile() {
     $.ajax({
        url: "functions.php",
        method: "POST",
        data: { 
            ACTION: 'LOAD_PROFILE',
        },
        success: function (response) {             
            //var data = JSON.parse(response)[0];
            
            /*$('#training-title').val(data.TITLE);
            $('.divider-subtitle').text(data.TITLE);
            $('#training-subtitle').val(data.SUBTITLE);
            $('#training-desc').trumbowyg('html', data.DESCRIPTION);
            $('#training-lang').val(data.LANGUAGE);
            
            if(data.COVER_PATH.length > 1) {
                var path = data.COVER_PATH;
                $('.training-cover').attr('src', path);
                $('#cover-filename').val(path.substr(path.lastIndexOf("/") + 1))
            }
            
            $('#kvd option[value='+data.ID_KEY_VALUE+']').prop('selected', true);
            $('#kvd').trigger('change');
            $('#category option[value='+data.ID_CATEGORY+']').prop('selected', true);*/
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}


/******** LOGIC *********/
function saveTraining() {
    if($('#training-title').val().length < 1) {
        $.notify({
            message: 'Bitte geben Sie einen Titel für Ihren Kurs ein.',
            icon: 'fa fa-exclamation-triangle',
        }, {type: 'danger'}); 
        return;
    } 
    else {
        update_training(true);
    }
}

/******** INPUT COUNTER *********/
$('input[type="text"]').on('input', function(){
    countChar(this, $(this).attr('maxlength'));    
});

function countChar(input, max) {
    if(input.value.length == 0) {
        $(input).parent().find('.form-control-feedback').text(max);
        return false;
    }
    else if(input.value.length > max){
        return false;
    }
    
    $(input).parent().find('.form-control-feedback').text(max - input.value.length);    
}