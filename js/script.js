$(document).ready(function(){
    $('.button').click(function(){
        var clickBtnValue = $(this).val();
        var ajaxurl = '../ajax.php',
        data =  {'action': clickBtnValue};
        $.post(ajaxurl, data, function (response) {
            // Response div goes here.
            alert("action performed successfully");
        });
    });
});

var isClicked = false;
var count = 0;
var isClicked2 = false;
var count2 = 0;
function b() {
    swal({   
    title: "Login Successful!",   
    text: "<small>Please validate your account</small>",
    type: "success",
    html: true 
    });
    
    // Set our login count to 1 and isClicked to true
    count += 1;
    isClicked = true;
    
   // Set our logout count2 to 0 and isClicked2 to false
    count2 = 0;
    isClicked2 = false;
    
    // This will detect if we have pressed/clicked the login button twice and will give an error message to the user if we clicked the button twice 
    if(count >= 2) {
       swal({
           title: "Login Error",
           text: "<small>You are already logged in!</small>",
           type: "error",
           html: true
       });
    }
}

function a() {
    swal({
        title: "Logout Successful ",
        text: "<small>You are not logged in!</small>",
        type: "success",
        html: true
    });
    
    // Set our logout isClicked2 to true and count2 to 1 
    isClicked2 = true;
    count2 += 1;
    
    // Set our login isClicked to false and count to 0 
    isClicked = false;
    count = 0;
    
    
    if(count2 >= 2) {
       swal({
           title:"Logout Error",
           text:"You are already logged out!",
           type:"error",
           html: true
           // This will detect if the user has clicked the button twice, and if the user clicked the button twice, an error message will be seen on his screen 
       });
    }
}
  