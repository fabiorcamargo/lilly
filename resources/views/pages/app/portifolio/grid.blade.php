<x-base-layout :scrollspy="false">

    <x-slot:pageTitle>
        {{$title}} 
    </x-slot>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <x-slot:headerFiles>
        <!--  BEGIN CUSTOM STYLE FILE  -->
        @vite(['resources/scss/light/assets/elements/custom-pagination.scss'])
        @vite(['resources/scss/light/assets/apps/blog-post.scss'])
        @vite(['resources/scss/dark/assets/elements/custom-pagination.scss'])
        @vite(['resources/scss/dark/assets/apps/blog-post.scss'])
        <!--  END CUSTOM STYLE FILE  -->
    </x-slot>
    <!-- END GLOBAL MANDATORY STYLES -->
   
    
    
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4 mt-4">
                <a href="{{ getRouterValue(); }}/app/portifolio/list" class="btn btn-secondary btn-icon mb-2 me-4 btn-rounded" data-toggle="tooltip" data-placement="top" title="Menu">
                        <x-widgets._w-svg svg="adjustments-horizontal"/>
                        </a>
                        @if(Auth::check())
                            @if(Auth::user()->role == 7)
                            <a href="{{ getRouterValue(); }}/app/portifolio/edit_bg" class="btn btn-secondary btn-icon mb-2 me-4 btn-rounded" data-toggle="tooltip" data-placement="top" title="Mudar imagem de fundo">
                            <x-widgets._w-svg svg="photo-edit"/>
                            </a>
                            @endif
                        @endif
                <div class="featured-image" style='background-image: url("{{asset(env('BG_PORTIFOLIO'))}}");'>
                    
                    <div class="featured-image-overlay"></div>
                    <div class="post-header">
                        <div class="post-title">
                            
                            <h1 class="mb-0">{{env('TITULO_PORTIFOLIO')}}</h1>
                        </div>
                        <div class="post-meta-info d-flex justify-content-between">
                            <div class="media">
                                <span class="avatar-chip bg-danger mb-2 me-4">
                                    <img src="{{asset(env('IMG_PORTIFOLIO'))}}" alt="Person" width="96" height="96">
                                    <span class="text">{{env('NAME_PORTIFOLIO')}}</span>
                                </span>
                            </div>
                            
                            <div class="align-self-center">
                                <button class="btn btn-success btn-icon btn-share btn-rounded">
                                    {{--<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>--}}
                                    <a target="_blank" href="https://api.whatsapp.com/send?phone={{env('PHONE')}}&text=%F0%9F%93%B8Lilly%20Almeida%20Fotografia.%0AEstou%20entrando%20em%20contato%20via%20o%20site%20e%20gostaria%20de%20....."><x-widgets._w-svg class="text-white" svg="brand-whatsapp"/></a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            
   
    {{--
    <div class="row layout-top-spacing">
        <div class="col-lg-3 col-md-3 col-sm-3 mb-4">
            <input id="t-text" type="text" name="txt" placeholder="Search" class="form-control" required="">
        </div>
        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 mb-4 ms-auto">
            <select class="form-select form-select" aria-label="Default select example">
                <option selected="">All Category</option>
                <option value="3">Wordpress</option>
                <option value="1">Admin</option>
                <option value="2">Themeforest</option>
                <option value="3">Travel</option>
            </select>
        </div>

        <div class="col-xl-2 col-lg-3 col-md-3 col-sm-3 mb-4">
            <select class="form-select form-select" aria-label="Default select example">
                <option selected="">Sort By</option>
                <option value="1">Recent</option>
                <option value="2">Most Upvoted</option>
                <option value="3">Popular</option>
            </select>
        </div>
    </div>
--}}
{{--
        <div class="mt-4 mb-4">
            <br>
            
                <div class="media mt-4 mb-0 pt-1">
                    <div class="media-body">
                        <h2 class="text-center">Bem vindo ao meu portifólio</h5>
                        <p class="media-heading mb-1 text-center">Todo conteúdo é feito com muito carinho</p>
                    </div>
            </div>
            <br>
        </div>
 --}}          
    
    
    <div class="row">
        @foreach ($portifolios as $portifolio)
        
        
            <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4 mt-4">
                <a class="card style-7"  href="{{ getRouterValue(); }}/app/portifolio/show/{{$portifolio->id}}">
                    @if(file_exists(get_thumb($portifolio->bg)))
                    <img src="{{asset(get_thumb($portifolio->bg))}}" class="card-img-top" alt="{{env('NAME_PORTIFOLIO')}} | {{$portifolio->name}}">
                    @else
                    <img src="{{asset("$portifolio->bg")}}" class="card-img-top" alt="{{env('NAME_PORTIFOLIO')}} | {{$portifolio->name}}">
                    @endif
                    <div class="card-footer">
                        <div class="media mt-2">
                        <img src="{{asset(env('IMG_POST'))}}" class="card-media-image me-3" alt="{{env('NAME_PORTIFOLIO')}} | {{$portifolio->name}}">
                        <h5 class="card-title">{{ $portifolio->name }}</h5>
                        </div>
                        <p class="card-text pt-4">Ver mais</p>
                    </div>
                </a>
            </div>
    
        @endforeach
    </div>
    
    
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <x-slot:footerFiles>

    </x-slot>
    <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>