<x-public.layout>

    <div class="wrap">
        <h1>Оформление заказа</h1>
    </div>
    
    <div class="cart-body">
        <section class="content-section cart-full">
            <div class="cart-content">
                <ul class="result-head">
                    <li>
                        <p>Название</p>
                        <p>Кол-во</p>
                        <p>Цена</p>
                    </li>
                </ul>
                
                <ul id="result">
                </ul>
        
                <div class="result-sum">
                    <div>
                        <button class="clear-cart">Очистить корзину</button>
                    </div>
                    <div class="total">
                        <span>Сумма:</span>
                        <span id="sum"></span>
                        <span> ₽</span>
                    </div>
                </div>
            </div>
        </section>
    
        <form action="test.php" class="form" method="POST">   
            <section class="content-section cart-full">
                <div class="cart-content">
                    <div class="cart-fields">
                        <div class="select-table">
                            <h3>
                                Ваш столик:
                            </h3>
                            <div class="table-items">
                                <div class="form_radio_btn">
                                    <input id="radio-1" type="radio" name="radio" value="1" checked>
                                    <label for="radio-1">1</label>
                                </div>
                                
                                <div class="form_radio_btn">
                                    <input id="radio-2" type="radio" name="radio" value="2">
                                    <label for="radio-2">2</label>
                                </div>
                                
                                <div class="form_radio_btn">
                                    <input id="radio-3" type="radio" name="radio" value="3">
                                    <label for="radio-3">3</label>
                                </div>
                                
                                <div class="form_radio_btn">
                                    <input id="radio-4" type="radio" name="radio" value="4">
                                    <label for="radio-4">4</label>
                                </div>
                        
                                <div class="form_radio_btn">
                                    <input id="radio-5" type="radio" name="radio" value="5">
                                    <label for="radio-5">5</label>
                                </div>
                        
                                <div class="form_radio_btn">
                                    <input id="radio-6" type="radio" name="radio" value="6">
                                    <label for="radio-6">6</label>
                                </div>
                            </div>
                        </div>
    
                    </div>
                    <input type="hidden">
                </div>
            </section>
    
            <section class="content-section cart-full">
                <div class="cart-content">
                    <div class="cart-fields">
                        <div class="text-field">
                            <input type="text" name="name" placeholder="Имя">
                        </div> 
                        <div class="text-field">
                            <input type="text" name="phone" placeholder="Телефон">
                        </div>   
                    </div>
                </div>
            </section>
    
            <section class="wrap">
                <div class="form-wrap">
                    <input class="button-orange" type="submit" value="Заказать и оплатить">
                    <input class="button-orange" type="submit" value="Заказать без оплаты">
                    <a class="btn_back" href="{{ route('public.index') }}">Вернуться в меню</a>
                </div>
            </section>
            
            <input type="hidden" name="chat_id" id="chatId" value="">
            <input type="hidden" name="auth_date" id="auth_date" value="">
            <input type="hidden" name="username" id="username" value="">
            <input type="hidden" name="sale" id="sale" value="">
            <input type="hidden" name="sum" id="totalsum" value="">
        </form>
    </div>
    
    <section class="content-section cart-empty">
        <div class="cart-content">
            <h2 style="margin-bottom: 50px;">Ваша корзина пуста</h2>
            <a class="btn_back" href="{{ route('public.index') }}">Вернуться в меню</a>
        </div>
    </section>
    
    
    <script>
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
    
    </script>
</x-public.layout>

