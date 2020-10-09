function deleteCosmetic(id, site_root) {
    if (confirm('Вы действительно хотите удалить данную запись?')) {
        window.location.href = `${site_root}cosmetics/delete/${id}`;
    }
};

function addToCart(id, site_root) {
    let cart = (getCookie('cart') === "") ? {} : JSON.parse(getCookie('cart'));
    if (cart.hasOwnProperty(id)) {
        cart[id]++;

//                console.log(getCookie('cart'));//отладка
    } else {
        cart[id] = 1;
//                console.log(getCookie('cart'));//отладка
    }
    CartItems(cart);

    setCookie('cart', JSON.stringify(cart), {
        'expires': 2 * 24 * 60 * 60,
        'path': '/'
    });
    let xhr = new XMLHttpRequest();
    xhr.open('GET', `${site_root}cart`);
    xhr.responseType = 'document';
    xhr.send();
    // тело ответа
    xhr.onload = function () {
        let responseObj = xhr.response;
        if (responseObj.getElementById("cartCont")){
            document.getElementById("cartCont").innerHTML = responseObj.getElementById("cartCont").innerHTML;
        }
//        if (responseObj.getElementById("cartItems")){
//            document.getElementById("cartItems").innerHTML = responseObj.getElementById("cartItems").innerHTML;
//        }

    };
};



function delFromCart(id, site_root) {

    let cart = (getCookie('cart') === "") ? {} : JSON.parse(getCookie('cart'));
    if (cart.hasOwnProperty(id)) {
        if (cart[id] > 1) {
            cart[id]--;


        } else {
            delete(cart[id]);
        }
        setCookie('cart', JSON.stringify(cart), {
            'expires': 2 * 24 * 60 * 60,
            'path': '/'
        });
    } else {
        deleteCookie('cart');
    }
    CartItems(cart);


    let xhr = new XMLHttpRequest();
    xhr.open('GET', `${site_root}cart`);
    xhr.responseType = 'document';
    xhr.send();
    // тело ответа
    xhr.onload = function () {
        let responseObj = xhr.response;
        if (responseObj.getElementById("cartCont")){
            document.getElementById("cartCont").innerHTML = responseObj.getElementById("cartCont").innerHTML;
        }else {
            window.location.href = `${site_root}cart`; //пока колхозный вариант обновления корзины
        }


    };
}

function CartItems(cart) {

    let CartItems = 0;
    if (!cart){
        cart = (getCookie('cart') === "") ? {} : JSON.parse(getCookie('cart'));
    }
    Object.values(cart).forEach(function(e){
        CartItems += e;
        document.getElementById("cartItems").innerHTML = CartItems;
    });
        console.log("cart items = " + CartItems);
}; CartItems();

function sendAjax(event, categoryName) {
    event.preventDefault();
    let formData = new FormData();
    //let elements = document.querySelector('.form-control');
    let elements = $('.modal-form .form-control');
    let dataForSend = {};
    elements.each((index, element) => {
        //console.log(element.getAttribute('name'));
        let formDataKey = element.getAttribute('name');
        let formDataValue = element.value;
        console.log(formDataValue);
        //formData.append(formDataKey, formDataValue);
        dataForSend[formDataKey] = formDataValue;
    });

    $.ajax({
        method: 'POST',
        data: dataForSend,
        url: 'http://localhost/enso_cosmetics/admin/users/',
        success: function(res) {
            // console.log(res);
            // TODO: close window and show alert;
        }
    })
    console.log(formData);
    url = 'http:?//brands/add',
        data = {}
}

function mainCosmeticGet(event, page) {
    event.preventDefault();
    let url = 'http://localhost/enso_cosmetics/home';
    $.ajax({
        url: url,
        type: 'post',
        data: {page: page},
        success: function(response){
         if($(response).find('#Pag')){
             $('#Pag').replaceWith($(response).find('#Pag'));
         };
        }
    });
}
