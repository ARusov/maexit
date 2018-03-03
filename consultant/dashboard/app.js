$(document).ready(function() {
    init();
})

function init() {
    load_trainings(1);
}

$('.order').change(function() {
    orderTrainings($(this).val())
})

$('.search').keypress(function(e) {
    if(e.which == 13 && $('.search').val().length > 0) {
        search();
    }
})

$('.search').change(function() {
    var text = $('.search').val();
    if(text.length < 1) {
        load_trainings(1);
    } 
})

function insertTraining(type) {
    $.ajax({
        url: "functions.php",
        method: "POST",
        data: { ACTION: 'INSERT_TRAINING', TYPE: type },
        success: function (response) {                         
            window.location.href = "../manager/index.php?id=" + response + "&type=" + type;
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}

function load_trainings(index, text) {
    if(!text)
        text = '';
    
    $('.trainings').html('');
    
    $.ajax({
        url: "functions.php",
        method: "POST",
        data: { 
            ACTION: 'LOAD_TRAININGS',
            INDEX: index,
            TEXT: text
        },
        success: function (response) {
            var data = JSON.parse(response);
            for(var i = 0; i < data.length; i++) {
                printTraining(data[i]);
            }           
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}

function printTraining(data) {
    var src = data.COVER_PATH;
    if(!src)
        src = '../core/img/default-cover.png';
    
    var title = data.TITLE;
    if(!title)
        title = 'KEIN TITEL'
    
    var template = 
        '<div class="card card-training" onclick="editTraining('+data.ID+', '+data.TYPE+')"> '+ 
            '<img src="'+src+'" class="training-cover"> '+                           
            '<div class="col-md-5 card-inner"> '+
                '<h1 class="training-titel">'+title+'</h1> <br/> '+
                '<h3 class="training-subtitel">'+data.SUBTITLE+'</h3> '+
                '<div class="card-bottom"> '+
                    '<span>Status: </span><label class="training-state">'+getStateText(data.STATE)+'</label> '+
                '</div> '+                               
            '</div> '+ 
        '</div>';
    
    $('.trainings').append(template);
}

function search() {
    var text = $('.search').val();
    load_trainings(0, text);
}

function orderTrainings(val) {
    $('.trainings').html('');
    load_trainings(val);
}

function editTraining(trainingID, trainingType) {
    window.location.href = "../manager/index.php?id=" + trainingID + "&type=" + trainingType;
}

function getStateText(state) {
    var text;
    
    switch(Number(state)) {
        case 0: text = 'Entwurf'; break;       
    }
    
    return text;
}