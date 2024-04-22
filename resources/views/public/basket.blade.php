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
    
</x-public.layout>

