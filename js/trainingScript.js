<!-- Display the countdown timer in an element -->
// Set the date we're counting down to
// var trainingTime = 1;
// var trainingTimeIncreased = trainingTime + 3;
// var level = 1;
// var timerId;
// function startTraining()
// {
//     var countdown = trainingTime * 60 * 1000;
//     timerId = setInterval(function()
//     {
//         countdown -= 1000;
//         var min = Math.floor(countdown / (60 * 1000));
//         //var sec = Math.floor(countdown - (min * 60 * 1000));  // wrong
//         var sec = Math.floor((countdown - (min * 60 * 1000)) / 1000);  //correct
//
//         // If the count down is finished, write some text
//         if (countdown <= 0) {
//             document.getElementById("span2").innerHTML = "Done";
//             clearInterval(timerId);
//         }
//         else {
//             // Display the result in the element with id="demo"
//             document.getElementById("span2").innerHTML = /* days + "d " + hours + "h "
//             + */ min + "m " + sec + "s ";
//         }
//
//     }, 1000); //1000ms. = 1sec.
// }

// function stopTraining()
// {
//     var countdown = trainingTime * 60 * 1000;
//     var timerId = setInterval(function(){
//         countdown -= 1000;
//         var min = Math.floor(countdown / (60 * 1000));
//         //var sec = Math.floor(countdown - (min * 60 * 1000));  // wrong
//         var sec = Math.floor((countdown - (min * 60 * 1000)) / 1000);  //correct
//         clearInterval(timerId);
//     }, 1000); //1000ms. = 1sec.
// }

var myTimerObj = (function(document){
    var trainingTime = 30;
    var trainingTimeIncreased = trainingTime + 3;
    var myTimer;
    var countdown = trainingTime * 60 * 1000;


    function start() {
        myTimer = setInterval(function()
        {
            countdown -= 1000;
            var min = Math.floor(countdown / (60 * 1000));
            var sec = Math.floor((countdown - (min * 60 * 1000)) / 1000);  //correct
            // Display the result in the element with id="demo"
            document.getElementById("span2").innerHTML = /* days + "d " + hours + "h "
            + */ min + "m " + sec + "s ";
            if (countdown == 0)
            {
                clearInterval(myTimer);
                document.getElementById("span2").innerHTML = "Done";
                alert("Training Finished");
            }
        }, 1000); //1000ms. = 1sec.

        function myClock() {
            document.getElementById("demo").innerHTML = --countdown;
        }
    }

    function end() {
        clearInterval(myTimer)
    }

    return {start:start, end:end};
})(document);


// var myTimerObj = (function(document){
//     var trainingTime = 0.1;
//     var trainingTimeIncreased = trainingTime + 3;
//     var myTimer;
//     var countdown = trainingTime * 60 * 1000;
//
//     function start() {
//         myTimer = setInterval(function()
//         {
//             countdown -= 1000;
//             var min = Math.floor(countdown / (60 * 1000));
//             var sec = Math.floor((countdown - (min * 60 * 1000)) / 1000);  //correct
//             // Display the result in the element with id="demo"
//             document.getElementById("span2").innerHTML = /* days + "d " + hours + "h "
//             + */ min + "m " + sec + "s ";
//
//             if (countdown == 0)
//             {
//                 clearInterval(myTimer);
//                 // document.getElementById("span2").innerHTML = "Done";
//                 // alert("Training Finished");
//             }
//         }, 1000); //1000ms. = 1sec.
//
//     }
//
//     function end() {
//         clearInterval(myTimer)
//     }
//
//     return {start:start, end:end};
// })(document);