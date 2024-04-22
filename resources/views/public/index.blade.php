<x-public.layout>

    <nav>
        <div class="menu-wrap">
            <ul class="menu">
                @foreach ($groups as $group)
                    <li>
                        <a href="#section{{ $group->id }}" class="link">
                            {{ $group->section }}
                        </a>
                    </li>
                @endforeach    
            </ul>
        </div>
    </nav>

    @foreach ($groups as $group)
        <section id="section{{ $group->id }}" class="content-section main">
            <h2>{{ $group->section }}</h2>
            <div class="items">
                @foreach ($group->dishes as $dish)
                    <a href="#popup" data-fancybox class="element main-items" data-key="{{ $dish->id }}">
                        <div class="element-img">
                            <img src="{{ asset($dish->img) }}" alt="">
                        </div>
                        <div class="element-info">
                            <div class="element-head">
                                <div class="title">
                                    {{ $dish->name }}
                                </div>    
                                <div class="price">
                                    {{ $dish->price }} ₽
                                </div>
                            </div>
                            <div class="element-body">
                                <p class="desc">
                                    {{ $dish->description }}
                                </p>
                                <div class="element-icons">
                                    
                                    <div class="element-icons-item">
                                        <div>
                                            <img src="/assets/weight-23ea15a7.svg" alt="">
                                        </div>
                                        <span class="amount">{{ $dish->amount }} {{ $dish->amountUnit->unit }}</span>
                                    </div>
                                    
                                    <div class="element-icons-item">
                                        <div>
                                            <img src="/assets/weight-23ea15a7.svg" alt="">
                                        </div>
                                        <span class="grams">{{ $dish->weight }} {{ $dish->weightUnit->unit }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </section>    
    @endforeach


    <div id="popup">
        <div class="element popup-element" data-id="">
            <div class="popup-element-img">
                <img src="" alt="">
                <div class="price">
                    
                </div>
            </div>
    
            <div class="popup-element-body">
                <div class="left">
                    <div class="title">
                        
                    </div>
                    <div class="element-icons">
                        <div class="element-icons-item popup-amount">
                            <div>
                                <img width="20" src="/assets/weight-23ea15a7.svg" alt="">
                            </div>
                            <div class="amount">
                                
                            </div>
                        </div>
                        <div class="element-icons-item popup-grams">
                            <div>
                                <img width="20" src="/assets/weight-23ea15a7.svg" alt="">
                            </div>
                            <div class="grams">
        
                            </div>
                        </div>
                    </div>    
                    <div>
                        <p class="desc"></p>
                    </div>
                </div>
                <div class="right">
                    <div class="counter">
                        <span>Количество</span>
                        <input  
                            class="number-field count"
                            type="number" 
                            name="count" 
                            min="1"
                            max="10" 
                            value="1" 
                            class="count"
                            
                        />
                    </div>
                    <button class="btn-cart button-orange">
                        Заказать
                    </button>
                    <a href="/basket.html" class="added-basket button-orange">
                        К заказу
                    </a>
                    <button data-fancybox-close class="btn_back">
                        Закрыть
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <a href="#" class="url-cart">
        <div class="url-cart-wrp">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="90" height="90" viewBox="0 0 400 400" xml:space="preserve">
            <desc></desc>
            <defs>
            </defs>
            <g transform="matrix(0.78 0 0 0.78 200 200)"  >
            <rect style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-dashoffset: 0; stroke-linejoin: miter; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;"  x="-128" y="-128" rx="0" ry="0" width="256" height="256" />
            </g>
            <g transform="matrix(0.78 0 0 0.78 178.13 181.25)"  >
            <path style="stroke: rgb(255, 255, 255); stroke-width: 16; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;"  transform=" translate(-100, -104)" d="M 184 184 H 69.8 L 41.9 30.6 A 8 8 0 0 0 34.1 24 H 16" stroke-linecap="round" />
            </g>
            <g transform="matrix(0.78 0 0 0.78 162.5 259.38)"  >
            <circle style="stroke: rgb(255, 255, 255); stroke-width: 16; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;"  cx="0" cy="0" r="20" />
            </g>
            <g transform="matrix(0.78 0 0 0.78 243.75 259.38)"  >
            <circle style="stroke: rgb(255, 255, 255); stroke-width: 16; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;"  cx="0" cy="0" r="20" />
            </g>
            <g transform="matrix(0.78 0 0 0.78 203.13 181.25)"  >
            <path style="stroke: rgb(255, 255, 255); stroke-width: 16; stroke-dasharray: none; stroke-linecap: round; stroke-dashoffset: 0; stroke-linejoin: round; stroke-miterlimit: 4; fill: none; fill-rule: nonzero; opacity: 1;"  transform=" translate(-132, -104)" d="M 62.5 144 H 188.1 a 15.9 15.9 0 0 0 15.7 -13.1 L 216 64 H 48" stroke-linecap="round" />
            </g>
            </svg>
            <span>0</span>
        </div>
    </a>

</x-public.layout>