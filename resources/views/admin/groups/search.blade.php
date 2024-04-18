<x-layout>
    <x-slot:title>
        Результаты поиска
    </x-slot>
    <h2>Найденные категории</h2>
    <form action="" method="GET">
        <input type="text" name="s" placeholder="Введите запрос..." value="{{ $s }}">
        <input type="submit" value="Поиск">
    </form>


    @if($groups->isEmpty())
        <h3>Ничего не найдено</h3>
    @else
        <ul>
            @foreach ($groups as $item)
                <li>
                    <div>
                        {{ $item->section }}
                    </div>
                    <div>
                        Сортировка: {{ $item->sort }} <br>
                        Активность: {{ $item->active ? 'Да' : 'Нет' }}
                    </div>
                    <form action="{{ route('admin.groups.delete', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Удалить">
                    </form>
                    <a href="{{ route('admin.groups.edit', $item->id) }}">Редактировать</a>
                </li>
            @endforeach
        </ul>
    @endif

</x-layout>