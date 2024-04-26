var basket = localStorage.getItem('basket');
var list = JSON.parse(basket);

const cartEmpty = document.querySelector('.cart-empty');
const cartBody = document.querySelector('.cart-body');

if(list == null || !list.length) {
    cartBody.style.display = 'none';
    cartEmpty.style.display = 'block';
} else {
    var sum = 0;
const ul = document.querySelector("#result");

list.forEach((x) => {
    var li = document.createElement("li");
    var price = x.count*parseInt(x.price.split(' ')[0]);
    sum += price;


    li.innerHTML = `
    <div class="title">${x.title}</div>
    <div data-key="${x.id}" class="counter-item-cart"> 
        
        <input min="0" type="number" class="count number-field" name="count" value="${x.count}"/>
    </div>
    <div class="price-item-cart"><span>${price}</span> ₽</div>
    `;
    ul.append(li); 
});


let totalSum = document.querySelector('#sum');
var inputSale = document.querySelector('#sale');

let observer = new MutationObserver(mutationRecords => {
    let sum = mutationRecords[0].target.innerHTML;
    document.querySelector('#totalsum').value = sum;
});
// наблюдать за всем, кроме атрибутов
observer.observe(totalSum, {
    characterData: true,
    childList: true, // наблюдать за непосредственными детьми
});
totalSum.innerHTML = sum;
inputSale.value = basket;


const clearAllBtn = document.querySelector('.clear-cart');

clearAllBtn.addEventListener('click', () => {
    localStorage.removeItem('basket');
    ul.innerHTML = '';
    totalSum.innerHTML = '';
    inputSale.setAttribute('value', '');
    cartBody.style.display = 'none';
    cartEmpty.style.display = 'block';
})

// Находим счетчики
const counters = ul.querySelectorAll('.counter-item-cart');

counters.forEach((el, index) => {
    let count =  el.querySelector('.count');

    let price = ul.querySelectorAll('li')[index].querySelector('.price-item-cart span')

    let item = list.find(li => li.id == el.dataset.key) // объект из локалсторадж

    count.addEventListener('change', (e) => {
        if(count.value == '0') {
            const updateList = list.filter(el => el.id != item.id)
            list = updateList
            localStorage.setItem('basket', JSON.stringify(updateList))
            inputSale.setAttribute("value", JSON.stringify(updateList)); // Обновляем данные для отправки
            el.parentElement.remove()
            if(!updateList.length) {
                localStorage.removeItem('basket');
                cartBody.style.display = 'none';
                cartEmpty.style.display = 'block';
                return;
            }
        } else {
            item.count = String(count.value) // меняем свойство в объекте
            localStorage.setItem('basket', JSON.stringify(list)) // обновляем данные в локалсторадж
            inputSale.setAttribute("value", JSON.stringify(list)); // Обновляем данные для отправки
            price.innerHTML = Number(item.count) * Number(item.price); // обновляем стоимость товара в html
        }
        let summa = list.reduce( (accum, item) => accum += Number(item.count*item.price), 0);
        totalSum.innerHTML = String(summa)
        
    })
})
    // Данные Telegram подставляем в форму
    let tg = window.Telegram;

    if(tg != undefined){
        if (tg.WebApp != undefined && tg.WebApp.initData != false){
        
            let data = tg.WebApp;
            let user = data.initDataUnsafe.user;

            $('[name="name"]').val(user.last_name +' '+ user.first_name);
            $('#chatId').val(user.id)
            $('#auth_date').val(data.initDataUnsafe.auth_date)
            $('#username').val(user.username)
        }
    }
}