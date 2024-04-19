<x-layout>
    <x-slot:title>
        Изменить категорию
    </x-slot>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-4">
                <form method="POST" action="{{ route('admin.groups.update', $group->id) }}">
                    @csrf
                    @method('PUT')
                    <h2>Изменить категорию</h2>
                    <div class="input-group input-group-outline my-3 is-filled">
                        <label class="form-label">Название</label>
                        <input type="text" class="form-control" name="section" value="{{ $group->section }}" required>
                    </div>
                    <div class="input-group input-group-outline my-3 is-filled">
                        <label class="form-label">Сортировка</label>
                        <input type="number" class="form-control" name="sort" value="{{ $group->sort }}" required >
                    </div>
                    <div class="form-check px-0">
                        <input class="form-check-input" type="checkbox" id="fcustomCheck1" name="active" {{ $group->active ? 'checked' : '' }} >
                        <label class="custom-control-label" for="customCheck1">Активность</label>
                    </div>
                
                    <input type="submit" class="btn btn-info" value="Изменить категорию">
                </form>
            </div>
        </div>
    </div>

</x-layout>
