$( function() {
    $( "#datepicker1" ).datepicker({
        dateFormat: 'yy-mm-dd',
        minDate: +1 ,
        maxDate: +90
    });
} );
$( function() {
    $( "#datepicker2" ).datepicker({
        dateFormat: 'yy-mm-dd',
        minDate: + 1,
        maxDate: + 0
    });
//        $('#datepicker1').change(function () {
//            var myDate = $("#datepicker1").val();
//            var dateObj = new Date();
//            var month = ('0' + (dateObj.getMonth() + 1)).slice(-2);
//            var day = ('0' + dateObj.getDay() + 1).slice(-2);
//            var year = dateObj.getFullYear();
//            // var shortDate = year + '/' + month + '/' + date;
//            $( "#datepicker2").datepicker{
//                minDate:day+1;
//                maxDate:day+99
//            }
//        //   $("#myform").attr('action', 'hotels.php?city=' + selected + 'dat=' + newdate;

    //    });
} );



function myfunction() {
    // document.getElementById("myform").style.display = "block";
    document.getElementById("mylink").style.display = "block";
    var x = document.getElementById('numform').style.display = "block";
    var y = document.getElementById('mylink');

    if (x.style.display === "none"){
        x.style.display="block";

    }
    else{
        x.style.display="none";
    }
}
function incrementValue()
{
    var value = parseInt(document.getElementById('numb').value, 1);
    value = isNaN(value) ? 0 : value;
    if( value < 14) {
        value++;
        document.getElementById('numb').value = value;
    }
}

function decrementValue()
{
    var value = parseInt(document.getElementById('numb').value, 1);
    value = isNaN(value) ? 0 : value;
    if( value > 1) {
        value --;
        document.getElementById('numb').value = value;
    }
}
function incrementValue1()
{
    var value = parseInt(document.getElementById('numbs').value, 10);
    value = isNaN(value) ? 0 : value;
    if( value < 6) {
        value++;
        document.getElementById('numbs').value = value;
    }
}

function decrementValue1()
{
    var value = parseInt(document.getElementById('numbs').value, 10);
    value = isNaN(value) ? 0 : value;
    if( value > 0) {
        value --;
        document.getElementById('numbs').value = value;
    }
}


// function incrementValue_room()
// {
//     var value = parseInt(document.getElementById('numb').value, 10);
//     value = isNaN(value) ? 0 : value;
//     if( value < 4 ) {
//         value++;
//         document.getElementById('numb').value = value;
//     }
// }