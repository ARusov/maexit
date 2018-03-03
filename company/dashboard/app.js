$(document).ready(function() {
    init();
})

function init() {
    //load KVD
    $.post('functions.php', { 
        ACTION: "LOAD_KVD_RESULTS" 
    }).done(function(response) {
        var data = JSON.parse(response)[0];
        
        var maexit_score = (data.STRUCTURES_AND_PROCESSES + data.CASHFLOW_EFFICIENCY + data.REVENUE_RELIABILITY + data.INDEPENDENCY + data.POTENTIAL_FOR_GROWTH + data.TECH_INNOVATION + data.EXCHANGEABILITY + data.DESIRABILITY) / 8;
        
        $('.maexit-score').addClass('p' + parseInt(maexit_score));
        $('.maexit-score').find('span').text(maexit_score);
        
        $('.kvd-0').addClass('p' + data.STRUCTURES_AND_PROCESSES);
        $('.kvd-0').find('span').text(data.STRUCTURES_AND_PROCESSES);

        $('.kvd-1').addClass('p' + data.CASHFLOW_EFFICIENCY);
        $('.kvd-1').find('span').text(data.CASHFLOW_EFFICIENCY);

        $('.kvd-2').addClass('p' + data.REVENUE_RELIABILITY);
        $('.kvd-2').find('span').text(data.REVENUE_RELIABILITY);

        $('.kvd-3').addClass('p' + data.INDEPENDENCY);
        $('.kvd-3').find('span').text(data.INDEPENDENCY);

        $('.kvd-4').addClass('p' + data.POTENTIAL_FOR_GROWTH);
        $('.kvd-4').find('span').text(data.POTENTIAL_FOR_GROWTH);

        $('.kvd-5').addClass('p' + data.TECH_INNOVATION);
        $('.kvd-5').find('span').text(data.TECH_INNOVATION);

        $('.kvd-6').addClass('p' + data.EXCHANGEABILITY);
        $('.kvd-6').find('span').text(data.EXCHANGEABILITY);

        $('.kvd-7').addClass('p' + data.DESIRABILITY);
        $('.kvd-7').find('span').text(data.DESIRABILITY);
    });
    
    $('.kvd .circle-wrapper').click(function() {    
        var kvd = Number($(this).attr('id'));
        
        showinfluencer(kvd);  
    })
}

function showinfluencer(kvd) {
    $('.influencer-left').html('');
    $('.influencer-right').html('');
    $('#m-influencer').modal('show');
    
    var color = '';
    
    switch(kvd) {
        case 0: $('.influencer-name').text("Structures and Processes");
                color = 'green1';                
                break;
        case 1: $('.influencer-name').text("Cashflow Efficiency");
                color = 'blue1';                
                break;
        case 2: $('.influencer-name').text("Revenue Reliability");
                color = 'blue2';                
                break;
    }
    
    $.post('functions.php', { 
        ACTION: "LOAD_INFLUENCER",
        ID_KVD: kvd + 1
    }).done(function(response) {        
        var data = JSON.parse(response);
        var left = true;
        
        for(var i = 0; i < data.length; i++) {                      
            var template = '<div class="circle-wrapper">' +
                                '<div class="c100 small '+ color +'">' +
                                    '<span>0</span>' +
                                    '<div class="slice">' +
                                        '<div class="bar"></div>' +
                                        '<div class="fill"></div>' +
                                    '</div>' +
                                '</div>' +
                                '<div class="circle-box small">' +
                                    '<div class="circle-box-title">' +
                                        data[i].NAME +
                                    '</div>' +
                                    '<div class="circle-box-text">' +
                                        'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At' +
                                    '</div> ' +
                                '</div> ' + 
                            '</div> ';
            
            if(left) {
                $('.influencer-left').append(template); 
                left = false;
            } 
            else {
               $('.influencer-right').append(template); 
                left = true; 
            }
        }
    });
}