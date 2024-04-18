<x-layout>
    <x-slot:title>
        Категории
    </x-slot>

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card">

            <div class="card-header pb-0">
              <div class="d-lg-flex">
                <div>
                  <h5 class="mb-0">Категории блюд</h5>
                </div>

                <div class="ms-auto my-auto mt-lg-0 mt-4">
                  <div class="ms-auto my-auto">
                    <a href="{{ route('admin.groups.create') }}" class="btn bg-gradient-warning btn-sm mb-0">
                      +&nbsp; Добавить категорию
                    </a>

                  </div>
                </div>
              </div>
            </div>

            <div class="card-body px-0 pb-0">
              <div class="table-responsive">
                <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                  <div class="dataTable-top">
                    

                    <div class="dataTable-search">
                      <input class="dataTable-input" placeholder="Search..." type="text">
                    </div>

                  </div>

                  <div class="dataTable-container">
                    <table class="table table-flush dataTable-table" id="products-list">
                      <thead class="thead-light">
                        <tr>
                          <th style="" >Название</th>
                          <th style="" >Количество блюд</th>
                          <th style="">Сортировка</th>
                          <th style="" >Активность</th>
                          <th style="">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($groups as $item)
                          <tr>
                            <td>
                              <div class="d-flex">
                                <h6 class="ms-3 my-auto">{{$item->section}}</h6>
                              </div>
                            </td>
                            <td class="text-sm">?</td>
                            <td class="text-sm">{{$item->sort}}</td>
                            <td class="text-sm">
                              @if ($item->active)
                                <span class="badge badge-sm bg-gradient-success">Активен</span>
                              @else 
                                <span class="badge badge-sm bg-gradient-secondary">Не активен</span>
                              @endif 
                            </td>
                            <td class="text-sm">
                              <a href="javascript:;" data-bs-toggle="tooltip" data-bs-original-title="Посмотреть">
                                <i class="material-icons text-secondary position-relative text-lg">visibility</i>
                              </a>
                              <a href="{{ route('admin.groups.edit', $item->id) }}" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Редактировать">
                                <i class="material-icons text-secondary position-relative text-lg">drive_file_rename_outline</i>
                              </a>
                              <a href="{{ route('admin.groups.delete', $item->id) }}" data-bs-original-title="Удалить" class="delete-link" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="material-icons text-secondary position-relative text-lg">delete</i>
                              </a>
                            </td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>

              </div>
            </div>
    </div>
  </div>
</div>  

</x-layout>