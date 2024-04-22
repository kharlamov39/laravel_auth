<x-layout>

    <div class="container-fluid py-4">
        <div class="row">
          <div class="col-12">
            <div class="card">
  
              <div class="card-header pb-0">
                <div class="d-lg-flex">
                  <div>
                    <h5 class="mb-0">Список блюд</h5>
                  </div>
  
                  <div class="ms-auto my-auto mt-lg-0 mt-4">
                    <div class="ms-auto my-auto">
                      <a href="{{ route('admin.dishes.create') }}" class="btn bg-gradient-warning btn-sm mb-0">
                        +&nbsp; Добавить блюдо
                      </a>
  
                    </div>
                  </div>
                </div>
              </div>
  
              <div class="card-body px-0 pb-0">
                <div class="table-responsive">
                  <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                    <div class="dataTable-top">
                      <div class="dataTable-dropdown d-flex gap-2">
                       
                        <span>Выводить на странице элементов: </span>
                        <form action="{{ route('admin.dishes.index') }}" method="get">
                          <select name="perPage" onchange="this.form.submit()" style="width: 70px;">
                              <option value="5" {{ $perPage == 5 ? 'selected' : '' }}>5</option>
                              <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10</option>
                              <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20</option>
                              <option value="30" {{ $perPage == 30 ? 'selected' : '' }}>30</option>
                              <!-- Другие варианты -->
                          </select>
                        </form>
                        
                      </div>
                      
                      
                      <div class="dataTable-search d-flex gap-2 align-items-center">
                        @if(!empty($s))
                            <a href="{{ route('admin.dishes.index') }}">Очистить поиск</a>
                        @endif 
                        <form action="" method="get">
                          <input class="dataTable-input" placeholder="Поиск..." name="s" type="text" value="{{ $s }}">
                          <input type="submit" id="searchButton" value="Поиск" />
                        </form>
                      </div>
  
                    </div>
  
                    <div class="dataTable-container">
                      <table class="table table-flush dataTable-table" id="products-list">
                        <thead class="thead-light">
                          <tr>
                            <th style="width: 20%;" class="">Название</th>
                            <th style="" >Описание</th>
                            <th style="">Стоимость</th>
                            <th style="" >Категория</th>
                            <th style="">Вес</th>
                            <th style="">Количество</th>
                            <th style="">Острое</th>
                            <th style="">Сортировка</th>
                            <th style="">Активность</th>
                            <th style="">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($dishes as $dish)
                                <tr>
                                    <td>
                                        <a href="{{ route('admin.dishes.show', $dish->id) }}" class="d-flex">
                                        <img class="w-10 ms-3" src="{{ asset($dish->img) }}" alt="yohji">
                                        <h6 class="ms-3 my-auto">{{ $dish->name }}</h6>
                                        </a>
                                    </td>
                                    <td class="text-sm">{{ $dish->description }}</td>
                                    <td class="text-sm">{{ $dish->price }} ₽</td>
                                    <td class="text-sm">
                                        {{ $dish->group->section }}
                                    </td>
                                    <td class="text-sm">
                                        {{ $dish->weight ? $dish->weight .' '. $dish->weightUnit->unit : '' }}
                                    </td>
                                    <td class="text-sm">
                                        {{ $dish->amount ? $dish->amount .' '. $dish->amountUnit->unit : '' }}
                                    </td>
                                    <td class="text-sm">
                                        {!! $dish->spicy ? '<span class="badge badge-sm bg-gradient-success">Да</span>' : '<span class="badge badge-sm bg-gradient-secondary">Нет</span>' !!}
                                    </td>
                                    <td class="text-sm">
                                        {{ $dish->sort }}
                                    </td>
                                    <td class="text-sm">
                                        {!! $dish->active ? '<span class="badge badge-sm bg-gradient-success">Активен</span>' : '<span class="badge badge-sm bg-gradient-secondary">Не активен</span>' !!}
                                    </td>
                                    <td class="text-sm">
                                        <a href="{{ route('admin.dishes.show', $dish->id) }}" data-bs-toggle="tooltip" data-bs-original-title="Посмотреть">
                                        <i class="material-icons text-secondary position-relative text-lg">visibility</i>
                                        </a>
                                        <a href="{{ route('admin.dishes.edit', $dish->id) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Редактировать">
                                        <i class="material-icons text-secondary position-relative text-lg">drive_file_rename_outline</i>
                                        </a>
                                        <a href="" data-bs-original-title="Удалить" class="delete-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="material-icons text-secondary position-relative text-lg">delete</i>
                                        <form style="display: none;" action="{{ route('admin.dishes.delete', $dish->id) }}" method="POST">
                                          @csrf
                                          @method('DELETE')
                                          <input type="submit">
                                        </form>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                      </table>

                      <div class="dataTable-wrapper mt-4">
                        <div class="dataTable-bottom">
                          {{ $dishes->links('vendor.pagination.default') }}
                        </div>
                      </div>
    
  
                    </div>
                  </div>
  
                </div>
              </div>
      </div>
    </div>
  </div>  

</x-layout>