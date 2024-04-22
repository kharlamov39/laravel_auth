
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <script src="https://telegram.org/js/telegram-web-app.js"></script>
    
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"
    />   
    <title>Document</title>
  <script type="module" crossorigin src="{{ asset('public/js/script.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
</head>
<style>
    .menu-wrap {
        position: relative; 
        margin: 0 auto; 
        width: 80%; 
        max-width: 844px;
    }

    @media (max-width: 900px) {
        nav li:first-child {
            padding-left: 0px;
        }
    }

    @media (max-width: 670px) {
        .menu-wrap {
            width: 90%;
        }
    }
</style>

<body>
    <div class="wrp">
        <div class="wrap">
            <img style="width: 100%;" src="/assets/logo-e1ca1681.jpg" alt="">
        </div>
        


<x-public.header/>
    {{ $slot }}
<x-public.footer/>

</div>     
</body>
</html>
<script>
    Fancybox.bind("[data-fancybox]", {
        touch: false,
        autoFocus: false
    });
</script>

<script>
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
    
</script>

</div>



<script>
let fixedHeader = document.querySelector("nav")
let lastScrollY = 0;
window.addEventListener('scroll', () => {
    if (window.scrollY >= 110 && window.scrollY < lastScrollY)
    {
        fixedHeader.style.top = '0px';
    }
    else
    {
        fixedHeader.style.top = '0px';
    }

    lastScrollY = window.scrollY;
})

 // Данные Telegram подставляем в форму
 let tg = window.Telegram;
    
    if(tg != undefined){
        if (tg.WebApp != undefined && tg.WebApp.initData != false){
        
            let data = tg.WebApp;
            let user = data.initDataUnsafe.user;

            tg.WebApp.requestContact();
        }
    }
</script>