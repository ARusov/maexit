$(document).ready(function() {
    init();
})

function init() {
    $('#partner-link').val('dev.maexit.net/public/report.php?ref=1000'); 
    load_companies();
}



function load_companies() {
    $.ajax({
        url: "functions.php",
        method: "POST",
        data: { 
            ACTION: 'LOAD_COMPANIES',
        },
        success: function (response) {
            console.log(response)
            var data = JSON.parse(response);
            
            for(var i = 0; i < data.length; i++) {
                var template = '<tr>';
                template    +=      '<td>'+(i+1)+'</td>';
                template    +=      '<td>'+data[i].EMAIL+'</td>';
                template    +=      '<td>'+data[i].INDUSTRY+'</td>';
                template    +=      '<td>'+data[i].DATE_INSERT+'</td>';
                template    +=      '<td>';
                template    +=          '<div class="row">';
                template    +=              '<div class="col-md-6">Structures and Processes: '+data[i].STRUCTURES_AND_PROCESSES+'</div>';
                template    +=              '<div class="col-md-6">Cashflow Efficiency: '+data[i].CASHFLOW_EFFICIENCY+'</div>';
                template    +=          '</div>';
                template    +=          '<div class="row">';
                template    +=              '<div class="col-md-6">Revenue Reliability: '+data[i].REVENUE_RELIABILITY+'</div>';
                template    +=              '<div class="col-md-6">Independency: '+data[i].INDEPENDENCY+'</div>';
                template    +=          '</div>';
                template    +=          '<div class="row">';
                template    +=              '<div class="col-md-6">Potential for Growth: '+data[i].POTENTIAL_FOR_GROWTH+'</div>';
                template    +=              '<div class="col-md-6">Tech-Innovation: '+data[i].TECH_INNOVATION+'</div>';
                template    +=          '</div>';
                template    +=          '<div class="row">';
                template    +=              '<div class="col-md-6">Exchangeability: '+data[i].EXCHANGEABILITY+'</div>';
                template    +=              '<div class="col-md-6">Desirability: '+data[i].DESIRABILITY+'</div>';
                template    +=          '</div>';
                template    +=      '</td>';
                template    +=  '<tr>';
                
                $('.companies').append(template);
            }           
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}

function copyLink() {
    var aux = document.createElement("input");
    aux.setAttribute("value", $('#partner-link').val());
    document.body.appendChild(aux);
    aux.select();
    document.execCommand("copy");

    document.body.removeChild(aux);
    
    $.notify({
        message: 'Link in die Zwischenablage kopiert!',
        icon: 'fa fa-check',
    }); 
}