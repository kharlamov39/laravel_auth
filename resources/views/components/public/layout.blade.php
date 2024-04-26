
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
    <title>QR-Menu</title>
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


</div>

<script src="{{ asset('public/js/addCart.js') }}"></script>
<script src="{{ asset('public/js/fixedHeader.js') }}"></script>
<script src="{{ asset('public/js/cart.js') }}"></script>

<script>

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