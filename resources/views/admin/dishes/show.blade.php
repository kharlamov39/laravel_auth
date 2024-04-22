<x-layout>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="mb-4">Детальная страница блюда</h5>
                        <div class="row">
                            <div class="col-xl-5 col-lg-6 text-center" style="width: 33%;">
                                <img class="w-100 border-radius-lg shadow-lg mx-auto" src="{{ asset($dish->img) }}" alt="chair">
                                <div class="my-gallery d-flex mt-4 pt-2" itemscope itemtype="http://schema.org/ImageGallery">
                                    @if (is_array(unserialize($dish->files)))
                                        @foreach(unserialize($dish->files) as $img)
                                        <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
                                            <a href="{{ asset($img) }}" itemprop="contentUrl" data-size="700x600">
                                                <img class="w-100 min-height-100 max-height-100 border-radius-lg shadow" src="{{ asset($img) }}" alt="Image description" />
                                            </a>
                                        </figure>
                                        @endforeach
                                    @endif
                                </div>
                                <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="pswp__bg"></div>
                                        <div class="pswp__scroll-wrap">
                                            <div class="pswp__container">
                                                <div class="pswp__item"></div>
                                                <div class="pswp__item"></div>
                                                <div class="pswp__item"></div>
                                            </div>
    
                                            <div class="pswp__ui pswp__ui--hidden">
                                                <div class="pswp__top-bar">
                                                    <div class="pswp__counter"></div>
                                                        <button class="btn btn-white btn-sm pswp__button pswp__button--close">Close (Esc)</button>
                                                        <button class="btn btn-white btn-sm pswp__button pswp__button--fs">Fullscreen</button>
                                                        <button class="btn btn-white btn-sm pswp__button pswp__button--arrow--left">Prev</button>
                                                        <button class="btn btn-white btn-sm pswp__button pswp__button--arrow--right">Next
                                                        </button>
                                                        <div class="pswp__preloader">
                                                            <div class="pswp__preloader__icn">
                                                                <div class="pswp__preloader__cut">
                                                                    <div class="pswp__preloader__donut"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                                                    <div class="pswp__share-tooltip"></div>
                                                </div>
                                                <div class="pswp__caption">
                                                    <div class="pswp__caption__center"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="col-lg-5 mx-auto">
                                    <h3 class="mt-lg-0 mt-4">
                                        {{ $dish->name }}
                                        ( {{ $dish->group->section }})
                                    </h3>
                                    <h6 class="mb-0 mt-3">Стоимость</h6>
                                    <h5>
                                        {{ $dish->price }} ₽
                                    </h5>
                                    <span class="badge badge-success">In Stock</span>
                                    <br>
                                    <label class="mt-4">Описание</label>
                                    <div>
                                        {{ $dish->description }}
                                    </div>
                                    
                                    <div class="row mt-4">
                                        <div class="col-lg-5" style="width: 50%">
                                            <a href="{{ route('admin.dishes.edit', $dish->id) }}" class="btn bg-gradient-warning mb-0 mt-lg-auto w-100" type="button" name="button">
                                                Редактировать
                                            </a>
                                        </div>
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
