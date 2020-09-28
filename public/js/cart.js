function addToCart(id, name, price) {
    $.ajax({
        url: '/itemincart/' + id,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        data: {
            'name': name,
            'price': price
        },
        success: function (response) {
            console.log(response);
            alert("Produkt dodany");
        }
    });
};

function cartPlus(id) {
    $.ajax({
        url: '/itemincart/' + id + '/plus',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        success: function (response) {
            console.log(response);
            location.reload();
        }
    });
};

function cartMinus(id) {
    $.ajax({
        url: '/itemincart/' + id + '/minus',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        success: function (response) {
            console.log(response);
            location.reload();
        }
    });
};

function cartRemove(id) {
    $.ajax({
        url: '/itemincart/' + id + '/remove',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'POST',
        success: function (response) {
            console.log(response);
            location.reload();
        }
    });
};

function deleteProduct(id) {
    $.ajax({
        url: '/product/' + id,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'DELETE',
        success: function (response) {
            console.log('Product' + id + ' removed')
            location.reload();
        }
    });
};

function deleteCategory(id) {
    $.ajax({
        url: '/category/' + id,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: 'DELETE',
        success: function (response) {
            console.log('Category' + id + ' removed')
            location.reload();
        }
    });
};


