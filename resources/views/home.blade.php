<x-layout>
    <x-slot:title>
        Главная
    </x-slot>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
 
</x-layout>