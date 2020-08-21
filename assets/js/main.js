var buttonShowMore = document.querySelector('#show_more');
var buttonCart = document.querySelector('#cart');
var colProductInCart = document.querySelector('#colProductInCart');
var siteURL = 'http://shop_jvt.local/';
var exit = document.querySelector('#exit');



if (buttonShowMore) {
	buttonShowMore.onclick = function(){

		var currentPageInput = document.querySelector('#current-page');
		var categoryId = document.querySelector('#category-id');
		//создание ajax запроса	
		var ajax = new XMLHttpRequest();	
		    ajax.open('GET', siteURL + 'modules/products/show_more.php?page=' + currentPageInput.value + '&ctId=' + categoryId.value, false);
			ajax.send();	

		currentPageInput.value = +currentPageInput.value + 1;
		
		console.dir(categoryId.value);
		console.dir(siteURL + 'modules/products/show_more.php?page=' + currentPageInput.value + '&ctId=' + categoryId.value)

		if (ajax.response.trim() == '') {
			buttonShowMore.style.display = 'none';
		}

		var moreProducts = document.querySelector('#moreProduct');		
		moreProducts.innerHTML = document.querySelector('#moreProduct').innerHTML + ajax.response;
		
	}
}


// функция для добавления товара в список любимых
function addFavorite(btn) {
	console.dir(btn.dataset.id_favorite);	
	var ajax = new XMLHttpRequest();
	    ajax.open('GET', siteURL + 'modules/favorite/add_favorite.php?id=' + btn.dataset.id_favorite, false);
	    ajax.send('id=' + btn.dataset.id_favorite);
	console.dir(ajax);

}

// функция для добавления товара в корзину
function addCart(btn) {
	alert('Товар с ID=' + btn.dataset.id);
	//создание ajax запроса	
	var postAjax = new XMLHttpRequest();
		postAjax.open("POST", siteURL + "modules/cart/add_cart.php", false);
		postAjax.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );
		postAjax.send("id=" + btn.dataset.id);
    // преобразование данных JSON в обьект JS
		var response = JSON.parse(postAjax.response);

	var colProductInCart = document.querySelector('#colProductInCart');
	// количество товаров в корзине = кол. элементов массива в куках
	colProductInCart.innerText = response.count;	
  }

// при нажатии на корзину в меню, переходим на страницу "корзина" 	
if (buttonCart) {
	buttonCart.onclick = function() {
		location.href = siteURL + "cart.php";
	}
}

// меняет значение поля Input на +1, товара на странице оформления заказа
function countPlus(btn2) {	
	var ajax = new XMLHttpRequest();
	    ajax.open('POST', siteURL + 'modules/cart/count_product.php', false);
	    ajax.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );	   	   
	    ajax.send("idPlus=" + btn2.dataset.id);
	    document.location.reload();
	console.dir(ajax);

}
// меняет значение поля Input на -1, товара на странице оформления заказа
function countMinus(btn3) {	
	var ajax = new XMLHttpRequest();
	    ajax.open('POST', siteURL + 'modules/cart/count_product.php', false);
	    ajax.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );	   	   
	    ajax.send("idMinus=" + btn3.dataset.id);
	    document.location.reload();
	console.dir(ajax);

}
// функция удаления продукта из корзины
function deleteProduct(btn4) {
	
	var ajax = new XMLHttpRequest();
	    ajax.open('POST', siteURL + 'modules/cart/deleteProduct.php', false);
	    ajax.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );	   	   
	    ajax.send("deleteProductId=" + btn4.dataset.id);
	    alert ("Товар будет удален из корзины");
	    var mediaId = document.querySelector('#mediaId'+btn4.dataset.id);
	    mediaId.remove();
	    // btn4.parentNode.parentNode.remove();
	    document.location.reload();
	// console.dir(ajax);

}
// функция меняющая значение (кол. продукта ID) при вводе на странице оформления заказа
function changeValue(sel) {
    console.dir(sel.dataset.id);
    var id = sel.dataset.id;  
    var value = sel.value;
    
    // var span = document.querySelector('#span'+ sel.dataset.id);    
    // span.innerText = "("+ value + " грн)";

    var ajax = new XMLHttpRequest();
	    ajax.open('POST', siteURL + 'modules/cart/count_product.php', false);
	    ajax.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );	   	   
	    
	    var countProduct = [id, value];
	    
	    jsonStr = JSON.stringify(countProduct);
	   
	    ajax.send('countProduct='+ jsonStr);
	    document.location.reload();
	 
}

if (exit) {
	exit.onclick = function(){	
	var ajax = new XMLHttpRequest();
	    ajax.open('POST', siteURL + 'exit.php', false);
	    ajax.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );	   	   
	    ajax.send();
	var user_name = document.querySelector('#user_name');
		user_name.text='User'
	    
	}
}
