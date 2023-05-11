var isbn_list = [];
var tempText = '';
var cookies;

function priceText(isbn)
{
    isbn_list.forEach(element => {
        
    });
    isbn_list.push(isbn);
    
    for (let index = 0; index < isbn_list.length; index++) {
        if (index != 0) {
            tempText = tempText +'-' + isbn_list[index];
            
        }else{
            tempText = isbn_list[index];
        }
    }    

    markAsAddedToCart(isbn);
}

document.addEventListener('DOMContentLoaded', function() {
    isbn_list = readCookie('cookie1');
    for (let index = 0; index < isbn_list.length; index++) {
        
               
        markAsAddedToCart(isbn_list[index]);
    }
 }, false);
 
 function readCookie(name,c,C,i){
    if(cookies){ return cookies[name]; }

    c = document.cookie.split('; ');
    cookies = {};

    for(i=c.length-1; i>=0; i--){
       C = c[i].split('=');
       cookies[C[0]] = C[1];
    }

    cartItems = cookies[name].split('-');
    saveToDB("spmenze@gmail.com", cookies[name]);
    return cartItems;
}


function saveCart() {
    document.cookie = 'cookie1=' + tempText + '; expires=Sun, 1 Jan 2024 00:00:00 UTC; path=/';
    window.location.href = 'view_cart.php';
}

function markAsAddedToCart(isbn) {
    var cardButton = document.getElementById(isbn);
    var cartCount = document.getElementById('cartNumber');
    
    cartCount.innerHTML = isbn_list.length;
    cardButton.innerHTML = '<i class="bi bi-bag-check"></i><i class="bi bi-dot"></i>Added to cart';
    cardButton.disabled = true;
    cardButton.className = 'btn  btn-danger btn-lg';
}

function saveToDB(username, ids)
{
    var position = JSON.stringify(allMousePos);
    

    $.ajax({
        type: 'post',
        url: 'http://localhost/nonoki/DBConn.php', //<--Note http
        data: {username: username, ids: ids},
        success: function( data ) {
        console.log( data );
        }
    });
}