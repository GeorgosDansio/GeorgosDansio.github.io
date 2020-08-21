var exit = document.querySelector('#exit');
var siteURL = 'http://multiprogrammer.local/';
// var buttonA = document.querySelector('#A');

// function otvet(btn){
// 	n = btn.dataset.id;	
// 	if (btn.id == n) {
// 		console.log("Pobeda");
// 	} else {console.log('Proigral')}
// 	console.dir(btn.dataset.id);		
// 	console.log(btn.id);
// }


// функция для проверки соответсвия правильного ответа и нажатой кнопки
function otvet(btn){
	n = btn.dataset.id;
	console.dir(n);
	// var smena02 = btn.classList.remove.add('smena2'); // удаляет красный цвет
	if (btn.id == n) {
		// добавляем при нажатии свой класс
		btn.classList.add('smena1');
		var otvet = 1;	
		console.dir(btn.style);
	} else {console.log('Proigral'); btn.classList.add('smena2'); var otvet = 0;}

	console.dir(btn.dataset.id);		
	console.log(btn.id);

	var ajax = new XMLHttpRequest();
	    ajax.open('POST', siteURL + 'modules/page.php', false);
	    ajax.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );	   	   
	    ajax.send("otvet=" + otvet);
	    document.location.reload();
	console.dir(ajax);
}

if (exit) {
	exit.onclick = function(){
	console.log('exit');	
	var ajax = new XMLHttpRequest();
	    ajax.open('POST', siteURL + 'exit.php', false);
	    ajax.setRequestHeader( "Content-type", "application/x-www-form-urlencoded" );	   	   
	    ajax.send();
	var user_name = document.querySelector('#user_name');
		user_name.text='User'
	    
	}
}