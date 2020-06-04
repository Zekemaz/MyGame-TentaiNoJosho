jQuery(function training(){
    jQuery("#btnTrain").on('click',function(){
        jQuery.ajax({
            type: 'POST',
            url: '../include/ajax.php',
            data: {
                action: 'training'
            },
            dataType:'json',
            success : function(response) {
                console.log('test');
                console.log(response);
                jQuery("#trainingTimeSpan").html(response.timeLeft)
            }
        });
    });
});

jQuery(function updateAgi(){
    jQuery("#agilityButtonPlus").on('click',function(){
        jQuery.ajax({
            type: 'POST',
            url: '../include/ajax.php',
            data: {
                action: 'updateAgility'
            },
            dataType:'json',
            success : function(response) {
                jQuery("#agilityPointSpan").html(response.agility)
                jQuery("#unused_statspoint").html(response.unused_statspoint)

            }
        });
    });
});
