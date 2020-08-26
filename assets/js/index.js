function deleteCosmetic(id, site_root) {
    if (confirm('Вы действительно хотите удалить данную запись?')) {
        window.location.href = `${site_root}cosmetics/delete/${id}`;
    }
};

function addToCart(id) {
    let cart = (getCookie('cart') === "") ? {} : JSON.parse(getCookie('cart'));
    if (cart.hasOwnProperty(id)) {
        cart[id]++;
    } else {
        cart[id] = 1;
    }
    setCookie('cart', JSON.stringify(cart), {
        'expires': 2 * 24 * 60 * 60,
        'path': '/'
    });
};



function delFromCart(id, site_root) {

    let cart = (getCookie('cart') === "") ? {} : JSON.parse(getCookie('cart'));
    if (cart.hasOwnProperty(id)) {
        if (cart[id] > 0) {
            cart[id]--;
        }
    }
    setCookie('cart', JSON.stringify(cart), {
        'expires': 2 * 24 * 60 * 60,
        'path': '/'
    });
    window.location.href = `${site_root}cart`; //пока колхозный вариант обновления корзины


};
