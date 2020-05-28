jQuery(function updateStr(){
    jQuery("#strengthButtonPlus").on('click',function(){
        console.log('click');
        jQuery.ajax({
            type: 'POST',
            url: '../include/ajax.php',
            data: {
                action: 'updateStrength'
            },
            dataType:'json',
            success : function(response) {
                console.log('profilescript consolelog')
                jQuery("#strengthPointSpan").html(response.strength)
                jQuery("#unused_statspoint").html(response.unused_statspoint)

            }
        });
    });
});
// jQuery(function updateInt(){
//     jQuery("#intelligenceButtonPlus").on('click',function(){
//         jQuery.ajax({
//             type: 'POST',
//             url: '../include/ajax.php',
//             data: {
//                 action: 'updateIntelligence'
//             },
//             dataType:'json',
//             success : function(response) {
//                 jQuery("#intelligencePointSpan").html(response.intelligence)
//                 jQuery("#unused_statspoint").html(response.unused_statspoint)
//
//             }
//         });
//     });
// });
// jQuery(function updateAgi(){
//     jQuery("#agilityButtonPlus").on('click',function(){
//         jQuery.ajax({
//             type: 'POST',
//             url: '../include/ajax.php',
//             data: {
//                 action: 'updateAgility'
//             },
//             dataType:'json',
//             success : function(response) {
//                 jQuery("#agilityPointSpan").html(response.agility)
//                 jQuery("#unused_statspoint").html(response.unused_statspoint)
//
//             }
//         });
//     });
// });
// jQuery(function updateLuck(){
//     jQuery("#luckButtonPlus").on('click',function(){
//         jQuery.ajax({
//             type: 'POST',
//             url: '../include/ajax.php',
//             data: {
//                 action: 'updateLuck'
//             },
//             dataType:'json',
//             success : function(response) {
//                 jQuery("#luckPointSpan").html(response.luck)
//                 jQuery("#unused_statspoint").html(response.unused_statspoint)
//
//             }
//         });
//     });
// });


