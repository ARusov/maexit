var ID = null;      //Training-ID
var TYPE = null;
/***************/
var lastZoneID = 0;
var currentZoneID = 0;
var lesson = {};
var lastLessonID = 0;

$(document).ready(function() {
    init();
})

function init() {
    ID = getParameterByName('id');
    TYPE = getParameterByName('type');
    
    get_key_value_driver();
    get_categories();
    get_industries();
    
    //WYSIWYG-Editor
    $('#training-desc').trumbowyg({
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
    
    $(".sections").sortable({ 
        handle: ".panel-heading",
        update: function(event, ui) { 
            $(".sections").children().each(function (index) {
                update_zone_order($(this).attr('zone-id'), index);
            });
        },
    });
    
    //TYPE = 1 (single Video)
    if(TYPE == 1) {
        $('.type-text').text('Video');
    }
}

function init_training() {
    load_training();
    load_zones();
    load_training_industries();
}

//Show Title in Divider
$('#training-title').on('input', function(){
    $('.divider-subtitle').html($('#training-title').val());
});

/********  LOAD  ********/
function load_training() {
     $.ajax({
        url: "functions.php",
        method: "POST",
        data: { 
            ACTION: 'LOAD_TRAINING',
            ID: ID
        },
        success: function (response) {             
            var data = JSON.parse(response)[0];
            
            $('#training-title').val(data.TITLE);
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
            $('#category option[value='+data.ID_CATEGORY+']').prop('selected', true);
            
            $('input[type="text"]').each(function() {
                countChar(this, $(this).attr('maxlength'));
            })
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}

function load_training_industries() {
     $.post('functions.php', { ACTION: "LOAD_TRAINING_INDUSTRIES", ID_TRAINING: ID } ).done(function(response) {
        var data = JSON.parse(response);
        for(var i = 0; i < data.length; i++) {
            $('[name=industries][value='+data[i].ID_INDUSTRIE+']').prop('checked', true)
        }
    });
}

function load_zones() {
    $.ajax({
        url: "functions.php",
        method: "POST",
        data: { 
            ACTION: 'LOAD_ZONES',
            ID_TRAINING: ID
        },
        success: function (response) {             
            var data = JSON.parse(response);
            
            for(var i = 0; i < data.length; i++) {
                lastZoneID = data[i].ID_ZONE;
                addZone(data[i].TITLE);  
                
            }
            
            if(data.length == 0) {
                insert_zone();  
            }
            
            //TYPE = 1 (single Video)
            if(TYPE == 1) {
                $('#btn-insertZone').hide();
                $('.btn-deleteZone').hide();
            }
            
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        },
    }).done(function() {
        load_lessons();            
    });
}

function load_lessons() {
    $.ajax({
        url: "functions.php",
        method: "POST",
        data: { 
            ACTION: 'LOAD_LESSONS',
            ID_TRAINING: ID
        },
        success: function (response) {             
            var data = JSON.parse(response);
            for(var i = 0; i < data.length; i++) {
                lastLessonID = data[i].ID_LESSON;
                addLesson(data[i].ID_ZONE, data[i].FORMAT, data[i].TITLE, data[i].FILE_NAME, data[i].FILE_TYPE);
                
                if(TYPE == 1 && data[i].FORMAT == 0) { //single Video
                    $('.btn-addVideo').hide();
                }
            }            
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}

/********  GET  ********/
function get_key_value_driver() {
    $.ajax({
        url: "functions.php",
        method: "POST",
        data: { 
            ACTION: 'GET_KEY_VALUE_DRIVER',
        },
        success: function (response) {             
            var data = JSON.parse(response);
            for(var i = 0; i < data.length; i++) {
                $('#kvd').append($('<option>', {
                    value: data[i].ID,
                    text: data[i].NAME
                }));
            }            
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}

function get_categories() {
    $.ajax({
        url: "functions.php",
        method: "POST",
        data: { 
            ACTION: 'GET_CATEGORIES',
        },
        success: function (response) {   
            var data = JSON.parse(response);
            for(var i = 0; i < data.length; i++) {
                $('#category').append($('<option>', {
                    value: data[i].ID,
                    name: data[i].ID_KEY_VALUE,
                    text: data[i].NAME,                    
                }));
            }            
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}

function get_industries() {
    $.ajax({
        url: "functions.php",
        method: "POST",
        data: { 
            ACTION: 'GET_INDUSTRIES',
        },
        success: function (response) {   
            var data = JSON.parse(response);
            for(var i = 0; i < data.length; i++) {
                $('.industries').append('<label class="checkbox-inline col-md-6"><input type="checkbox" name="industries" value="'+data[i].ID+'">'+data[i].NAME+'</label>')                
            }            
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    }).done(function() {
        init_training();
    });
}

/********  INSERT  ********/
function insert_zone() {
    var data = {
        ACTION: 'INSERT_ZONE',
        ID_TRAINING: ID,
        ID_ZONE: lastZoneID,
        TITLE: 'Neuer Abschnitt'
    }
    
    $.post('functions.php', data)
    .done(function(response) {
        addZone(data.TITLE);
    });
}

function insert_lesson(zoneID, format, title, fileName, fileType, fileSize, filePath) {
    var data = {
        ACTION: 'INSERT_LESSON',
        ID_TRAINING: ID,
        ID_ZONE: zoneID,
        ID_LESSON: lastLessonID,
        FORMAT: format,
        TITLE: title,
        FILE_NAME: fileName,
        FILE_TYPE: fileType,
        FILE_SIZE: fileSize,
        FILE_PATH: filePath
    }
    
    $.post('functions.php', data)
    .done(function() {
        addLesson(data.ID_ZONE, data.FORMAT, data.TITLE, data.FILE_NAME, data.FILE_TYPE);
    });
}

function insert_training_industries(industrie) {
    $.post('functions.php', { ACTION: "INSERT_TRAINING_INDUSTRIES", ID_TRAINING: ID, ID_INDUSTRIE: industrie } );
}

/********  UPDATE  ********/
function update_training(notify) {
    var data = {  
        ACTION: 'UPDATE_TRAINING',
        ID: ID,        
        TITLE: $('#training-title').val(),
        SUBTITLE: $('#training-subtitle').val(),
        DESCRIPTION: $('#training-desc').trumbowyg('html'),
        LANGUAGE: $('#training-lang').val(),
    }

    $.post('functions.php', data)
    .done(function(response) {
        if(notify) {
            $.notify({
                message: 'Speichern erfolgreich!',
                icon: 'fa fa-check',
            });
        }    
    });
}

function update_training_kvd(kvd, category) {
    $.post('functions.php', { ACTION: "UPDATE_TRAINING_KVD", ID: ID, ID_KEY_VALUE: kvd, ID_CATEGORY: category } )
        .done(function(response) {
            $.notify({
                message: 'Speichern erfolgreich!',
                icon: 'fa fa-check',
            });
    })
}

function update_cover(path) {
    $.post('functions.php', { ACTION: "UPDATE_COVER", ID: ID, PATH: path } );
}

function update_zone(zoneID, title) {
    $.post('functions.php', { ACTION: "UPDATE_ZONE", ID_TRAINING: ID, ID_ZONE: zoneID, TITLE: title } );
}

function update_zone_order(zoneID, index) {
    $.post('functions.php', { ACTION: "UPDATE_ZONE_ORDER", ID_TRAINING: ID, ID_ZONE: zoneID, SORT_INDEX: index } );
}

function update_lesson(zoneID, lessonID, title) {
    $.post('functions.php', { ACTION: "UPDATE_LESSON", ID_TRAINING: ID, ID_ZONE: zoneID, ID_LESSON: lessonID, TITLE: title } );
}

function update_lesson_order(zoneID, lessonID, index) {
    $.post('functions.php', { ACTION: "UPDATE_LESSON_ORDER", ID_TRAINING: ID, ID_ZONE: zoneID, ID_LESSON: lessonID, SORT_INDEX: index } );
}

/********  DELETE  ********/
function delete_zone(zoneID) {
    $.post('functions.php', { ACTION: "DELETE_ZONE", ID_TRAINING: ID, ID_ZONE: zoneID } );
}

function delete_lesson(zoneID, lessonID) {
    $.post('functions.php', { ACTION: "DELETE_LESSON", ID_TRAINING: ID, ID_ZONE: zoneID, ID_LESSON: lessonID } );
}

function delete_training_industries() {
    $.post('functions.php', { ACTION: "DELETE_TRAINING_INDUSTRIES", ID_TRAINING: ID } ).done(function() {
        $('[name=industries]').each(function(i) {
            if($(this).prop('checked'))
                insert_training_industries($(this).val());
        })
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

/********  COVER  *********/
function pickCover() {
    $('#cover-file').click();
}

$('#cover-file').change(function(){   
    var input = $("<input>").attr("type", "hidden").attr("name", "ID").val(ID);
    $('#uploadCover').append($(input));
    
    var form = $('#uploadCover')[0]; // You need to use standard javascript object here
    var formData = new FormData(form);
    
    $('#cover-filename').val($(this)[0].files[0].name);
    previewFile(this);
    
    $.ajax({
        url: 'upload_cover.php',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false, 
        success:function(response){    
            var data = JSON.parse(response);
            if(data.status === 'success') {
                update_cover(data.path);
            }                
        }
    });
});

function previewFile(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.training-cover').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

/********  ZONES  *********/
function addZone(title) {
    var template = 
        '<div class="panel-group zone" zone-id="'+lastZoneID+'">' +
            '<div class="panel panel-default">' +
                '<a data-toggle="collapse" href="#zone-'+lastZoneID+'">' +
                    '<div class="panel-heading">' +
                        '<h4 class="panel-title">' +
                            title +
                        '</h4>' +
                        '<i class="fa fa-bars pull-right" aria-hidden="true"></i>' +
                    '</div>' +
                '</a>' +
                '<div id="zone-'+lastZoneID+'" class="panel-collapse collapse">' +
                    '<div class="panel-body">' +
                        '<div class="videos"></div>' +                                                     
                        '<button class="btn btn-default btn-md btn-flat btn-maexit btn-addVideo" onclick="videoModal('+lastZoneID+')">' +
                            '<i class="fa fa-plus-circle" aria-hidden="true"></i> Video hinzufügen' + 
                        '</button> ' +
                        '<button class="btn btn-default btn-md btn-flat btn-maexit" onclick="fileModal('+lastZoneID+')">' +
                            '<i class="fa fa-plus-circle" aria-hidden="true"></i> Dokument hinzufügen' + 
                        '</button> ' +
                        '<button class="btn btn-default btn-md btn-flat btn-maexit" onclick="editZoneTitle('+lastZoneID+')">' +
                            '<i class="fa fa-pencil" aria-hidden="true"></i> Titel bearbeiten' + 
                        '</button> ' +
                        '<button class="btn btn-default btn-md btn-flat btn-maexit btn-deleteZone" onclick="deleteZone('+lastZoneID+')">' +
                            '<i class="fa fa-trash" aria-hidden="true"></i> Abschnitt entfernen' + 
                        '</button> ' +
                    '</div>'+
                '</div>' +
            '</div>' +
        '</div>';
    
    $(template).appendTo('.sections').hide().fadeIn('normal');   
    lastZoneID++;
}

function editZoneTitle(zoneID) {    
    var e = $('[zone-id='+zoneID+']').find('h4');
    var title = e.text();
    e.html('');
    e.width('70%');
    
    var template = 
        '<div class="form-group has-feedback" style="margin-bottom: 0;display:inline-block;width:80%">' +
            '<input type="text" class="form-control" maxlength="50" placeholder="Fügen Sie den Titel für den Abschitt ein.">' +
            '<span class="form-control-feedback">50</span>' +
        '</div>' + 
        '<button class="btn btn-success btn-md btn-flat" type="button" onclick="updateZoneTitle('+zoneID+')" style="margin-left: 15px">' +
            '<i class="fa fa-check" aria-hidden="true"></i>' + 
        '</button> ' + 
        '<button class="btn btn-danger btn-md btn-flat" onclick="abortZoneTitle('+zoneID+', \''+title+'\')" style="margin-left: 5px">' +
            '<i class="fa fa-times" aria-hidden="true"></i>' + 
        '</button> ';
    
    e.append(template);
    e.find('.form-control').val(title);
    e.find('.form-control').focus();
    
    $('#zone-'+zoneID).find('.btn').prop('disabled', true); //disable other functions    
    e.parent().parent().attr('href', 'javascript:void(0)'); //Dont collapse on click input    
    
    e.find('.form-control').on('input', function(){
        countChar(this, $(this).attr('maxlength'));    
    });
    
    e.find('.form-control').trigger('input');
    
    //On Enter -> Save
    e.find('.form-control').keypress(function (key) {
        if (key.which == 13) {
            updateZoneTitle(zoneID)
            return false;
        }
    });
}

function updateZoneTitle(zoneID) {
    var title = $('[zone-id='+zoneID+']').find('.form-control').val();
    
    if(title.length < 1)
        title = 'Neuer Abschnitt';
    
    var e = $('[zone-id='+zoneID+']').find('h4');    
    e.html('');
    e.width('auto');
    
    e.html(title);
    $('#zone-'+zoneID).find('.btn').prop('disabled', false); //enable other functions 
    e.parent().parent().attr('href', '#zone-'+zoneID); //collapse again
    
    update_zone(zoneID, title);
}

function abortZoneTitle(zoneID, title) {
    var e = $('[zone-id='+zoneID+']').find('h4');    
    e.html('');
    e.width('auto');
    
    e.html(title);
    $('#zone-'+zoneID).find('.btn').prop('disabled', false); //enable other functions 
    e.parent().parent().attr('href', '#zone-'+ID); //collapse again
}

function deleteZone(zoneID) {
    $('[zone-id='+zoneID+']').remove();
    delete_zone(zoneID);
}

/********  VIDEOUPLOAD  *********/
function videoModal(zoneID) {
    resetUpload();
    currentZoneID = zoneID;   
    $('#m-addVideo').modal('show');
}

function pickVideo() {
    $('#video-file').click();
}

$('#video-file').change(function(){
    lesson = {
        ID_ZONE: currentZoneID,
        NAME: $(this)[0].files[0].name,
        TYPE: $(this)[0].files[0].type,
        SIZE: $(this)[0].files[0].size
    }
    
    $('.filename').val(lesson.NAME);
});

function uploadVideo()
{
    var bar = $('.bar');    
    var percent = $('.percent'); 
    
    var valid = 0;

    if($('.video-title').val().length < 1) {
        $('.error-no-title').removeClass('hidden');
        valid--;
    } else { valid++; $('.error-no-title').addClass('hidden');} 
    
    if($('.filename').val().length < 1) {
        $('.error-no-file').removeClass('hidden');
        valid--;
    } else { valid++; $('.error-no-file').addClass('hidden');}    
    
    var input = $("<input>").attr("type", "hidden").attr("name", "ID").val(ID);
    $('#uploadFormVideo').append($(input));
    
    $('#uploadFormVideo').ajaxForm({    
        beforeSubmit: function() {
            if(valid < 2)
                return false;            
            $('.progress-row').removeClass('hidden');
            $('.btn-cancel-upload').removeClass('hidden');
            var percentVal = '0%';
            bar.width(percentVal)
            percent.html(percentVal);
            $('.btn-cancel').hide();
            $('.btn-upload').hide();      
        },

        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            if(Number(percentComplete) > 50)
                 $('.percent').css('color', '#fff');
            bar.width(percentVal)
            percent.html(percentVal);
        },

        success: function() {
            var percentVal = '100%';
            bar.width(percentVal)
            percent.html(percentVal);
        },

        complete: function(xhr) {
            if(xhr.responseText)
            {
                var data = JSON.parse(xhr.responseText);
                if(data.status === 'success') {
                    insert_lesson(lesson.ID_ZONE, 0, $('.video-title').val(), lesson.NAME, lesson.TYPE, lesson.SIZE, data.path)
                    $('#m-addVideo').modal('hide');
                }                
            }
        }
    }); 
    
    $('.btn-cancel-upload').on('click', function() {
        try {
            window.stop();
        } catch (exception) {
            document.execCommand('Stop');
        }
    })
}

/********  FILEUPLOAD  *********/
function fileModal(zoneID) {
    resetUpload();
    currentZoneID = zoneID;   
    $('#m-addFile').modal('show');
}

function pickFile() {
    $('#file').click();
}

$('#file').change(function(){
    lesson = {
        ID_ZONE: currentZoneID,
        NAME: $(this)[0].files[0].name,
        TYPE: $(this)[0].files[0].type,
        SIZE: $(this)[0].files[0].size
    }
    
    $('.filename').val(lesson.NAME);
});

function uploadFile()
{
    var bar = $('.bar');    
    var percent = $('.percent'); 
    
    var valid = 0;

    if($('.file-title').val().length < 1) {
        $('.error-no-title').removeClass('hidden');
        valid--;
    } else { valid++; $('.error-no-title').addClass('hidden');} 
    
    if($('.filename').val().length < 1) {
        $('.error-no-file').removeClass('hidden');
        valid--;
    } else { valid++; $('.error-no-file').addClass('hidden');}      
    
    var input = $("<input>").attr("type", "hidden").attr("name", "ID").val(ID);
    $('#uploadFormFile').append($(input));
    
    $('#uploadFormFile').ajaxForm({    
        beforeSubmit: function() {
            if(valid < 2)
                return false;            
            $('.progress-row').removeClass('hidden');
            $('.btn-cancel-upload').removeClass('hidden');
            var percentVal = '0%';
            bar.width(percentVal)
            percent.html(percentVal);
            $('.btn-cancel').hide();
            $('.btn-upload').hide();      
        },

        uploadProgress: function(event, position, total, percentComplete) {
            var percentVal = percentComplete + '%';
            if(Number(percentComplete) > 50)
                 $('.percent').css('color', '#fff');
            bar.width(percentVal)
            percent.html(percentVal);
        },

        success: function() {
            var percentVal = '100%';
            bar.width(percentVal)
            percent.html(percentVal);
        },

        complete: function(xhr) {
            if(xhr.responseText)
            {
                var data = JSON.parse(xhr.responseText);
                if(data.status === 'success') {
                    insert_lesson(lesson.ID_ZONE, 1, $('.file-title').val(), lesson.NAME, lesson.TYPE, lesson.SIZE, data.path)
                    $('#m-addFile').modal('hide');
                }                
            }
        }
    }); 
    
    $('.btn-cancel-upload').on('click', function() {
        try {
            window.stop();
        } catch (exception) {
            document.execCommand('Stop');
        }
    })
}

function resetUpload() {
    $('#m-addVideo').modal('hide');
    $('#video-file').val(''); 
    $('#file').val(''); 
    $('.filename').val('');
    $('.file-title').val('');
    $('.file-title').parent().find('.form-control-feedback').text(60);
    $('.file-title').parent().find('.form-control-feedback').text(60);
    $('.btn-cancel').show();
    $('.btn-upload').show();
    $('.btn-cancel-upload').addClass('hidden');    
    $('.progress-row').addClass('hidden');
    $('.percent').css('color', '#000');
    $('.bar').width(0);
    $('.error-no-title').addClass('hidden');
    $('.error-no-file').addClass('hidden'); 
}


/******** LESSONS *********/
function addLesson(zoneID, format, title, fileName, fileType) {    
    var icon;
    var preview;
    if(format == 0) {
        icon = '<i class="fa fa-video-camera" aria-hidden="true"></i>';
        preview = '<button type="button" class="btn btn-default btn-flat btn-lesson" onclick="playVideo(\''+fileName+'\', \''+fileType+'\')" title="Vorschau"><i class="fa fa-play" aria-hidden="true"></i></button> '
        
        if(TYPE == 1) { //single Video
            $('.btn-addVideo').hide();
        }
    }
        
    else if(format == 1) {
        icon = '<i class="fa fa-file-text" aria-hidden="true"></i>';
        preview = '<button type="button" class="btn btn-default btn-flat btn-lesson" onclick="downloadFile(\''+fileName+'\')" title="Vorschau"><i class="fa fa-download" aria-hidden="true"></i></button> '
    }        
    
    var template = 
        '<div class="lesson" lesson-id="'+ lastLessonID +'">' +
            icon + " " +
            '<div class="lesson-title">' + title + '</div>' +
            '<div class="pull-right">' +
                preview +
                '<button type="button" class="btn btn-default btn-flat btn-lesson" onclick="editLessonTitle('+zoneID+', '+lastLessonID+')" title="Titel bearbeiten"><i class="fa fa-pencil" aria-hidden="true"></i></button> ' +
                '<button type="button" class="btn btn-default btn-flat btn-lesson" onclick="deleteLesson('+zoneID+', '+lastLessonID+', '+format+')" title="Lektion löschen"><i class="fa fa-trash" aria-hidden="true"></i></button> ' +
                '<i class="fa fa-bars" aria-hidden="true"></i>' +
            '</div>' +
        '</div>';
        
    $('#zone-' + zoneID).find('.videos').append(template);
    $(".videos").sortable({
        update: function(event, ui) { 
            $('.videos').children().each(function (index) {
                update_lesson_order($(this).parents('.zone').attr('zone-id'), $(this).attr('lesson-id'), index);
            });
        },
    });
    
    lastLessonID++;
}

function playVideo(name, type) {
    var $video = $("#video-preview");
    var videoSrc = $('source', $video).attr('src', '../../uploads/'+ ID + '/' + name);
    $video[0].load();
    
    $('#m-playVideo').modal('show');
    
    $('#m-playVideo').on('hidden.bs.modal', function () {
        $('#video-preview').trigger('pause');
    })
}

function downloadFile(name) {
    window.open('../../uploads/'+ ID + '/' + name ,'_blank');
    
}

function editLessonTitle(zoneID, lessonID) {  
    var e = $('[lesson-id="'+lessonID+'"]').find('.lesson-title');
    var title = e.text();
    $(e).parent().find('.pull-right').hide();
    e.html('');  
    
    var template = 
        '<div class="form-group has-feedback" style="margin-bottom: 0;display:inline-block;width:80%">' +
            '<input type="text" class="form-control" maxlength="60" placeholder="Fügen Sie den Titel für die Lektion ein.">' +
            '<span class="form-control-feedback">60</span>' +
        '</div>' + 
        '<button class="btn btn-success btn-md btn-flat" type="button" onclick="updateLessonTitle('+zoneID+', '+lessonID+')" style="margin-left: 15px">' +
            '<i class="fa fa-check" aria-hidden="true"></i>' + 
        '</button> ' + 
        '<button class="btn btn-danger btn-md btn-flat" onclick="abortLessonTitle('+lessonID+', \''+title+'\')" style="margin-left: 5px">' +
            '<i class="fa fa-times" aria-hidden="true"></i>' + 
        '</button> ';
    
    e.append(template);
    e.find('.form-control').focus();
    e.find('.form-control').val(title);
    
    e.find('.form-control').on('input', function(){
        countChar(this, $(this).attr('maxlength'));    
    });
    
    e.find('.form-control').trigger('input');
    
    //On Enter -> Save
    e.find('.form-control').keypress(function (key) {
        if (key.which == 13) {
            updateLessonTitle(zoneID, lessonID)
            return false;
        }
    });
}

function updateLessonTitle(zoneID, lessonID) {
    var title = $('[lesson-id="'+lessonID+'"]').find('.form-control').val();
    
    if(title.length < 1)
        title = 'Lektion';
    
    var e = $('[lesson-id="'+lessonID+'"]').find('.lesson-title');    
    e.html('');
    e.width('auto');
    
    e.html(title);
    $(e).parent().find('.pull-right').show();
    
    update_lesson(zoneID, lessonID, title);
}

function abortLessonTitle(lessonID, title) {
    var e = $('[lesson-id="'+lessonID+'"]').find('.lesson-title'); 
    e.html('');
    e.width('auto');
    
    e.html(title);
    $(e).parent().find('.pull-right').show();
}

function deleteLesson(zoneID, lessonID, format) {
    $('[lesson-id="'+lessonID+'"]').remove();
    
    delete_lesson(zoneID, lessonID);
    
    if(TYPE == 1 && format == 0) {
        $('.btn-addVideo').show();
    }
}

/******** KVD / Branchen *********/
$("#kvd").change(function() {
    if($(this).val() != -1) {
        $('#category').prop('disabled', false);
        $('#category option[value=-1]').prop('selected', true);
        $('#category option').not('[value=-1]').hide();        
        $('#category option[name='+$(this).val()+']').show();        
    }
    else {
        $('#category').prop('disabled', true);
        $('#category option[value=-1]').prop('selected', true);
    }
});

function saveKvd() {
    update_training_kvd($('#kvd').val(), $('#category').val());
    
    delete_training_industries();
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