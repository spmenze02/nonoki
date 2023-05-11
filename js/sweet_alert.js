var isClicked = false;
var count = 0;
var isClicked2 = false;
var count2 = 0;
function logout() {
    swal({
        title: "Logout Successful ", 
        text: "<small>Please wait, you will be redirected to Home Page!</small>",
        type: "success",
        html: true
    });
    
    // Set our logout isClicked2 to true and count2 to 1 
    isClicked2 = true;
    count2 += 1;
    
    // Set our login isClicked to false and count to 0 
    isClicked = false;
    count = 0;
    
    window.setTimeout(function(){

        // Move to a new location or you can do something else
        window.location.href = "scripts/logout.php";

    }, 5000);
    
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

function UserNotFound() {
    swal({
        title: "Invalid Username or password", 
        text: "<small>Please wait, you will be redirected to Home Page!</small>",
        type: "success",
        html: true
    });
    
    // Set our logout isClicked2 to true and count2 to 1 
    isClicked2 = true;
    count2 += 1;
    
    // Set our login isClicked to false and count to 0 
    isClicked = false;
    count = 0;
    
    window.setTimeout(function(){

        // Move to a new location or you can do something else
        window.location.href = "index.php";

    }, 5000);
    
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