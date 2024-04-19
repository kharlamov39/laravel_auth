<x-layout>
    <div class="container-fluid py-4">
        <div class="row min-vh-80">
            <div class="col-lg-8 col-md-10 col-12 m-auto">
                <h3 class="mt-3 mb-0 text-center">
                    Добавить блюдо
                </h3>
    
                <div class="card">
    
                    <div class="card-header p-0 position-relative mt-n5 mx-3 z-index-2">
                        <div class="bg-gradient-warning shadow-warning border-radius-lg pt-4 pb-3">
                            <div class="multisteps-form__progress">
                                <button class="multisteps-form__progress-btn js-active" type="button" title="Product Info">
                                <span>Информация о блюде</span>
                                </button>
                                <button class="multisteps-form__progress-btn" type="button" title="Media">Фотографии</button>
                                <button class="multisteps-form__progress-btn" type="button" title="Socials">Характеристики</button>
                                <button class="multisteps-form__progress-btn" type="button" title="Pricing">Настройки вывода</button>
                            </div>
                        </div>
                    </div>
    
                    <div class="card-body">
                        <form class="multisteps-form__form dropzone" style="height: 391px;"  method="POST" action="{{ route('admin.dishes.store') }}" >
                        @csrf
                        <!-- hidden -->
    
                            <div class="multisteps-form__panel pt-3 border-radius-xl bg-white js-active" data-animation="FadeIn">
                                <h5 class="font-weight-bolder">Информация о блюде</h5>
                                <div class="multisteps-form__content">
    
                                    <div class="input-group  input-group-static my-3 ">
                                        <label class="form-label">Название</label>
                                        <input type="text" class="form-control" name="name" value="">
                                    </div>
                                    <div class="input-group  input-group-static my-3">
                                        <textarea name="description" class="form-control" placeholder="Описание"></textarea>
                                    </div>
                                    <div class="input-group my-3 input-group-static"  >
                                        <label for="exampleFormControlSelect1" class="ms-0">Категория</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="group_id">
                                            @foreach ($groups as $group)
                                                <option value="{{ $group->id }}"> {{ $group->section }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="button-row d-flex mt-0 mt-md-4">
                                        <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Вперед</button>
                                    </div>
                                </div>
                            </div>
    
                            <div class="multisteps-form__panel pt-3 border-radius-xl bg-white" data-animation="FadeIn">
                                <h5 class="font-weight-bolder">Фотографии</h5>
                                <div class="multisteps-form__content">
                                    
                                    
                                    
    
                                    <div class="button-row d-flex mt-0 mt-md-4">
                                        <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Назад</button>
                                        <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Вперед</button>
                                    </div>
                                </div>
                                
                            </div>
    
                            <div class="multisteps-form__panel pt-3 border-radius-xl bg-white" data-animation="FadeIn">
                                <h5 class="font-weight-bolder">Характеристики</h5>
                                <div class="multisteps-form__content">
                                    <div class="input-group input-group-static my-3 ">
                                        <label class="form-label">Стоимость</label>
                                        <input type="number" class="form-control" name="price" value="">
                                    </div>
                                    <div style="display: flex; align-items: center;">
                                        <div class="input-group input-group-static my-3 ">
                                            <label class="form-label">Вес</label>
                                            <input type="number" class="form-control" name="weight" value="">
                                        </div>
                                        <div class="input-group my-3 input-group-static" >
                                            <select class="form-control" id="exampleFormControlSelect1" name="weight_unit_id">
                                                @foreach ($units as $item)
                                                    <option value="{{ $item->id }}"> {{ $item->unit }} </option>
                                                @endforeach
                                            </select>
                                        </div>       
                                    </div>
    
                                    <div style="display: flex; align-items: center;">
                                        <div class="input-group input-group-static my-3 ">
                                            <label class="form-label">Количество</label>
                                            <input type="number" class="form-control" name="amount" value="">
                                        </div>
                                        <div class="input-group my-3 input-group-static " >
                                            <select class="form-control" id="exampleFormControlSelect1" name="amount_unit_id">
                                                @foreach ($units as $item)
                                                    <option value="{{ $item->id }}"> {{ $item->unit }} </option>
                                                @endforeach
                                            </select>
                                        </div> 
                                    </div>
                        
                                    <div class="form-check px-0">
                                        <input class="form-check-input" type="checkbox" id="fcustomCheck1" name="spicy"  >
                                        <label class="custom-control-label" for="customCheck1">Острое</label>
                                    </div>
    
                                    <div class="button-row d-flex mt-0 mt-md-4">
                                        <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Назад</button>
                                        <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Вперед</button>
                                    </div>
                                </div>
                            </div>
    
                            <div class="multisteps-form__panel pt-3 border-radius-xl bg-white h-100" data-animation="FadeIn">
                                <h5 class="font-weight-bolder">Настройки вывода</h5>
                                <div class="multisteps-form__content">
                                    <div class="input-group input-group-static my-3 ">
                                        <label class="form-label">Сортировка</label>
                                        <input type="number" class="form-control" name="sort" value="" >
                                    </div>
                                    <div class="form-check px-0">
                                        <input class="form-check-input" type="checkbox" id="fcustomCheck1" name="active" checked>            
                                        <label class="custom-control-label" for="customCheck1">Активность</label>
                                    </div>                
                                </div>        
                                
                                
    
                                <div class="button-row d-flex mt-0 mt-md-4">
                                    <button class="btn bg-gradient-light mb-0 js-btn-prev" type="button" title="Prev">Назад</button>
                                    <button class="btn bg-gradient-success ms-auto mb-0" type="submit" title="Send">Добавить блюдо</button>
                                </div>
                            </div>
                        </form>
    
                    </div>
    
                </div>
            </div>
        </div>
    </div>

</x-layout>