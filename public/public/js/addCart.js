const counterCart = document.querySelector('.url-cart span');
const iconCart = document.querySelector('.url-cart'); // иконка корзины

let inCartItems = JSON.parse(localStorage.getItem('basket')) || [];

// если в корзине что-то есть, появляется иконка, иначе иконка отсутствует
inCartItems.length ? iconCart.style.display = 'flex' : iconCart.style.display = 'none';

// добавляем к иконке корзины количество товаров
counterCart.innerHTML = inCartItems.reduce((accum, item) => accum += Number(item.count), 0);


const popupTitle = document.querySelector('#popup .title');
const popupPrice = document.querySelector('#popup .price');
const popupImg = document.querySelector('#popup img');
const popupAmount = document.querySelector('#popup .amount');
const popupGrams = document.querySelector('#popup .grams');
const popupDesc = document.querySelector('#popup .desc');
let popup = document.querySelector('#popup');

const items = document.querySelectorAll('.content-section .element');

items.forEach( (item, index) => {
    item.addEventListener('click', () => {
        count.value = '1';

        // Получение данных выбранного элемента
        const itemTitle = item.querySelector('.title');
        const itemPrice = item.querySelector('.price');
        const itemImg = item.querySelector('img');
        const itemAmount = item.querySelector('.amount');
        const itemGrams = item.querySelector('.grams');
        const itemDesc = item.querySelector('.desc');

        let key = item.dataset.key;

        // запись данных в попап
        popup.dataset.id = key
        popupTitle.innerHTML = itemTitle ? itemTitle.innerHTML : '';
        popupPrice.innerHTML = itemPrice ? itemPrice.innerHTML : '';
        popupAmount.innerHTML = itemAmount ? itemAmount.innerHTML : '';
        popupGrams.innerHTML = itemGrams ? itemGrams.innerHTML : '';
        popupDesc.innerHTML = itemDesc ? itemDesc.innerHTML : '';
        popupImg.setAttribute('src', itemImg.getAttribute('src'));


        if(popupAmount.innerHTML == '') {
            document.querySelector('.popup-amount').style.display = 'none';
        } else {
            document.querySelector('.popup-amount').style.display = 'flex';
        }

        if(popupGrams.innerHTML == '') {
            document.querySelector('.popup-grams').style.display = 'none';
        } else {
            document.querySelector('.popup-grams').style.display = 'flex';
        }
    
        inCartItems = JSON.parse(localStorage.getItem('basket')) || [];

        // отображение кнопок в попапе
        if(inCartItems.find(el => el.id == key)) {
            addbtnCart.style.display = 'none';
            addedBasket.style.display = 'block';
            counter.style.display = 'none'
        } else {
            addbtnCart.style.display = 'block';
            addedBasket.style.display = 'none';
            counter.style.display = 'flex'
        }

        
    })
} )

const counter = document.querySelector('.counter') // wrap input number
const count = document.querySelector('.count'); // input number


const addedBasket = document.querySelector('.added-basket');
const addbtnCart = document.querySelector('.btn-cart');

addbtnCart.addEventListener('click', () => {
    const items = JSON.parse(localStorage.getItem('basket')) || [];

    const item = {
        id: String(popup.dataset.id),
        title: popupTitle.innerHTML.trim(),
        price: String(parseInt(popupPrice.textContent.trim().split(' ')[0])),
        img: popupImg.getAttribute('src'),
        count: count.value,
        amount: popupAmount.innerHTML.trim(),
        grams: popupGrams.innerHTML.trim(),
        desc: popupDesc.innerHTML.trim()
    }

    items.push(item)
    counterCart.innerHTML = Number(counterCart.innerHTML) + Number(item.count)
    localStorage.setItem('basket', JSON.stringify(items));
    addbtnCart.style.display = 'none';
    addedBasket.style.display = 'block';
    counter.style.display = 'none'
    count.value = '1';
    iconCart.style.display = 'flex';
})
