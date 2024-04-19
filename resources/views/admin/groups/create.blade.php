<x-layout>
    <x-slot:title>
        Создать категорию
    </x-slot>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-lg-4">
                <form method="POST" action="{{ route('admin.groups.store') }}">
                @csrf 
                    <h2>Добавить категорию</h2>
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Название</label>
                        <input type="text" class="form-control" name="section" value="" required>
                    </div>
                    <div class="input-group input-group-outline my-3">
                        <label class="form-label">Сортировка</label>
                        <input type="number" class="form-control" name="sort" value="" required>
                    </div>
                    <div class="form-check px-0">
                        <input class="form-check-input" type="checkbox" id="fcustomCheck1" name="active" checked >
                        <label class="custom-control-label" for="customCheck1">Активность</label>
                    </div>          
                    <input type="submit" class="btn btn-info" value="Добавить категорию">
                </form>
            </div>
        </div>
    </div>
</x-layout>