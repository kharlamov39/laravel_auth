<x-layout>
    <x-slot:title>
        Админка
    </x-slot>

    <h2>Админка</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
 
</x-layout>