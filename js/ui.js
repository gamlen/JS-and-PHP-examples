$(function() {
    $('.content').hide();
    $('#selectid').change(function() {
       $('').hide();
       $('#' + $(this).val()).show();
    });
 });









//function func2(){
        //if(document.getElementById('selectid').value=="Size"){
           // document.getElementByName('size').style.display = "block"; // hide body div tag
        //}
    //}
    //document.getElementByName('body').style.display = "hidden"; // hide body div tag
    //document.getElementById('body1').style.display = "block"; // show body1 div tag
    //document.getElementById('body1').innerHTML = "If you can see this, JavaScript function worked"; // display text if JavaScript worked