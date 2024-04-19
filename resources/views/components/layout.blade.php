<!DOCTYPE html> 
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
		<link id="pagestyle" href="{{ asset('css/material-dashboard.css?v=3.1.0') }}" rel="stylesheet" />

		<!-- Icons -->
		<link href="{{ asset('admin/css/nucleo-icons.css') }}" rel="stylesheet" />
		<link href="{{ asset('admin/css/nucleo-svg.css') }}" rel="stylesheet" />

		<!-- Font Awesome Icons -->
		<script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

		<!-- CSS Files -->
		<link id="pagestyle" href="{{ asset('admin/css/material-dashboard.css') }}" rel="stylesheet" />
		<link id="pagestyle" href="{{ asset('admin/css/style.css') }}" rel="stylesheet" />


        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
        @vite(['resourses/css/app.css'])
    </head>
    
<body class="g-sidenav-show  bg-gray-200">

    <x-header />
        {{ $slot }}
    <x-footer />


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="{{ asset('admin/js/core/popper.min.js') }}"></script>
<script src="{{ asset('admin/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('admin/js/plugins/chartjs.min.js') }}"></script>
<script src="{{ asset('admin/js/plugins/datatables.js') }}"></script>
<script src="{{ asset('admin/js/plugins/countup.min.js') }}"></script>
<script src="{{ asset('admin/js/plugins/Chart.extension.js') }}"></script>
<script src="{{ asset('admin/js/plugins/bootstrap-notify.js') }}"></script>
<script src="{{ asset('admin/js/plugins/quill.min.js') }}"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="{{ asset('admin/js/material-dashboard.js') }}"></script>
<script src="{{ asset('admin/js/material-dashboard.min.js?v=3.1.0') }}"></script>
<script src="{{ asset('admin/js/plugins/photoswipe.min.js') }}"></script>
<script src="{{ asset('admin/js/plugins/photoswipe-ui-default.min.js') }}"></script>
<script src="{{ asset('admin/js/multipleFiles.js') }}"></script>
<script src="{{ asset('admin/js/modalDelete.js') }}"></script>
<script src="{{ asset('admin/js/files.js') }}"></script>
<script src="{{ asset('admin/js/plugins/dragula/dragula.min.js') }}"></script>
<script src="{{ asset('admin/js/plugins/jkanban/jkanban.js') }}"></script>
<script src="{{ asset('admin/js/chart.js') }}"></script>
<script src="{{ asset('admin/js/photoswipe.js') }}"></script>
<script src="{{ asset('admin/js/choice.js') }}"></script>

<script>
var win = navigator.platform.indexOf('Win') > -1;
if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = {
    damping: '0.5'
    }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
}
</script>


<!-- Активные ссылки -->
<script>
const links = document.querySelectorAll('#sidenav-collapse-main li a');
links.forEach((item, index) => {
if(item.getAttribute('href') == "<?=$_SERVER['REQUEST_URI']?>") {
    item.classList.add('active');
    item.classList.add('bg-gradient-warning');
} else {
    item.classList.remove('active');
    item.classList.remove('bg-gradient-warning');
}
})
</script>
<!--  -->

<!-- Поиск -->
<script>
const searchField = document.querySelector('.dataTable-input');
const searchButton = document.getElementById('searchButton');   

searchField.addEventListener('keypress', function (e) {
var key = e.which || e.keyCode;
if (key === 13) { // код клавиши Enter
    searchButton.click();
}
});

</script>
</body>
</html>

