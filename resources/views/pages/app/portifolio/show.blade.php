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

        <link rel="stylesheet" href="{{asset('plugins/glightbox/glightbox.min.css')}}">
        <!--  END CUSTOM STYLE FILE  -->

        
    </x-slot>
    <!-- END GLOBAL MANDATORY STYLES -->
    
    <!-- BREADCRUMB -->
    <div class="page-meta">
        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Início</a></li>
                <li class="breadcrumb-item active" aria-current="page">Post</li>
            </ol>
        </nav>
    </div>
    <!-- /BREADCRUMB -->

    <div class="row layout-top-spacing">
    
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">

                <div class="featured-image" style='background-image: url("{{asset("$portifolio->bg")}}"); background-position: top;'>

                    <div class="featured-image-overlay"></div>

                    <div class="post-header">
                        
                        <div class="post-title">
                            @if(Auth::check())
                                @if(Auth::user()->role == 7)
                                    <a href="{{ getRouterValue(); }}/app/portifolio/edit/{{$portifolio->id}}" class="btn btn-secondary btn-icon mb-2 me-4 btn-rounded" data-toggle="tooltip" data-placement="top" title="Mudar imagem de fundo">
                                        <x-widgets._w-svg svg="photo-edit"/>
                                    </a>
                                @endif
                            @endif
                            <h1 class="mb-0">{{ $portifolio->title }}</h1>
                        </div>
                        
                        <div class="post-meta-info d-flex justify-content-between">

                            <div class="media">
                                
                                <div class="media-body">
                                    <div class="media">
                                        <span class="avatar-chip bg-danger mb-2 me-4">
                                            <img src="{{asset(env('IMG_PORTIFOLIO'))}}" alt="Person" width="96" height="96">
                                            <span class="text">{{env('NAME_PORTIFOLIO')}}</span>
                                        </span>
                                    </div>
                                    <div class="widget-header">
                                        <div class="row">
                                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                                <h4 style="color: white">{{$portifolio->name}}</h4>
                                            </div>
                                        </div>
                                    </div>
                                    {{--<p>{{ $portifolio->updated_at->format('d/m/y') }}</p>--}}
                                        
                                </div>
                            </div>

                            <div class="align-self-center">
                                <button class="btn btn-success btn-icon btn-share btn-rounded">
                                    <a target="_blank" href="https://api.whatsapp.com/send?phone={{env('PHONE')}}&text=%F0%9F%93%B8Lilly%20Almeida%20Fotografia.%0AEstou%20entrando%20em%20contato%20via%20o%20site%20e%20gostaria%20de%20....."><x-widgets._w-svg class="text-white" svg="brand-whatsapp"/></a>
                                </button>
                            </div>
                            
                        </div>

                    </div>
                    
                </div>

                <div class="col-lg-12 layout-spacing layout-top-spacing">
                    <div class="statbox widget box box-shadow">                        
                        <div class="widget-content widget-content-area">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    {!! $portifolio->description !!}
                                </div>
                            </div>                                
                        </div>
                    </div>
                </div>

                <div class="col-lg-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                    {{--<h4>{{$portifolio->name}}</h4>--}}
                                </div>
                            </div>
                        </div>

                        
                        <div class="widget-content widget-content-area">
                            
                            
                            <div class="row">
                                @foreach ($portifolio->photos as $photo)
                                
                                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 mb-4">
                                    @if(file_exists(get_thumb($photo->file)))
                                    <a href="{{asset("$photo->file")}}" class="withDescriptionGlightbox glightbox-content" data-glightbox="title: {{ $photo->name }}; description: {{ $photo->description }};">
                                        <img class="img-fluid" src="{{asset(get_thumb($photo->file))}}" alt="image"/>
                                    </a>
                                    <div itemscope itemtype="https://schema.org/ImageObject" hidden>
                                        <img alt="{{$photo->name}} | {{env('NAME_PORTIFOLIO')}}" itemprop="contentUrl" content="{{asset(($photo->file))}}" />
                                        <span itemprop="license"> https://lillyalmeida.com.br/ </span><br />
                                        <span itemprop="acquireLicensePage">https://lillyalmeida.com.br/ </span>
                                        <span itemprop="creator" itemtype="https://schema.org/Person" itemscope>
                                          <meta itemprop="name" content="{{env('NAME_PORTIFOLIO')}}" />
                                        </span>
                                        <span itemprop="copyrightNotice">"{{env('NAME_PORTIFOLIO')}}"</span>
                                        <span itemprop="creditText">"{{env('NAME_PORTIFOLIO')}} | {{env('PROFISSAO')}}"</span>
                                    </div>
                                    @else
                                    <div itemscope itemtype="https://schema.org/ImageObject" hidden>
                                        <img alt="{{$photo->name}} | {{env('NAME_PORTIFOLIO')}}" itemprop="contentUrl" content="{{asset(($photo->file))}}" />
                                        <span itemprop="license"> https://lillyalmeida.com.br/ </span><br />
                                        <span itemprop="acquireLicensePage">https://lillyalmeida.com.br/ </span>
                                        <span itemprop="creator" itemtype="https://schema.org/Person" itemscope>
                                          <meta itemprop="name" content="{{env('NAME_PORTIFOLIO')}}" />
                                        </span>
                                        <span itemprop="copyrightNotice">"{{env('NAME_PORTIFOLIO')}}"</span>
                                        <span itemprop="creditText">"{{env('NAME_PORTIFOLIO')}} | {{env('PROFISSAO')}}"</span>
                                    </div>
                                    <a href="{{asset("$photo->file")}}" class="withDescriptionGlightbox glightbox-content" data-glightbox="title: {{ $photo->name }}; description: {{ $photo->description }};">
                                        <img class="img-fluid" src="{{asset("$photo->file")}}" alt="image" class="img-fluid" />
                                    </a>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                            
                                                            
                        </div>
                    </div>
                </div>

                
                
                
                <div class="post-info">
                    
                    <hr>

                    <div class="post-tags mt-5">
                        @foreach (json_decode($portifolio->tags) as $tag)
                        <span class="badge badge-primary mb-2">{{$tag->value}}</span>
                        @endforeach
                    </div>

                    <div class="post-dynamic-meta mt-5 mb-5">

                        <button class="btn btn-secondary me-4 mb-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                            <span class="btn-text-inner">1.1k</span>
                        </button>
                        
                        <div class="avatar--group mb-2">
                            <div class="avatar avatar-sm m-0">
                                <img alt="avatar" src="{{Vite::asset('resources/images/profile-16.jpeg')}}" class="rounded-circle">
                            </div>
                            <div class="avatar avatar-sm">
                                <img alt="avatar" src="{{Vite::asset('resources/images/delete-user-4.jpeg')}}" class="rounded-circle">
                            </div>
                            <div class="avatar avatar-sm">
                                <img alt="avatar" src="{{Vite::asset('resources/images/profile-5.jpeg')}}" class="rounded-circle">
                            </div>
                            <div class="avatar avatar-sm">
                                <span class="avatar-title rounded-circle">AG</span>
                            </div>
                        </div>
                    </div>
                    
                    <hr>

                    {{--<h2 class="mb-5">Comments <span class="comment-count">(4)</span></h2>--}}
{{--
                    <div class="post-comments">

                        <div class="media mb-5 pb-5 primary-comment">
                            <div class="avatar me-4">
                                <img alt="avatar" src="{{Vite::asset('resources/images/profile-2.jpeg')}}" class="rounded-circle" />
                            </div>
                            <div class="media-body">
                                <h5 class="media-heading mb-1">Daisy Andrason</h5>
                                <div class="meta-info mb-0">14 April</div>
                                <p class="media-text mt-2 mb-0">Fusce condimentum cursus mauris et ornare. Mauris fermentum mi id sollicitudin viverra. Aenean dignissim sed ante eget dapibus. Sed dapibus nulla elementum, rutrum neque eu, gravida neque.</p>

                                <button class="btn btn-success btn-icon btn-reply btn-rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                </button>
                                
                                <div class="media mb-4 mt-4">
                                    <div class="avatar me-4">
                                        <img alt="avatar" src="{{Vite::asset('resources/images/profile-3.jpeg')}}" class="rounded-circle" />
                                    </div>
                                    <div class="media-body">
                                        <h5 class="media-heading mb-1">Xavier</h5>
                                        <div class="meta-info mb-0">15 April</div>
                                        <p class="media-text mt-2 mb-0">Fusce condimentum cursus mauris et ornare. Mauris fermentum mi id sollicitudin viverra. Aenean dignissim sed ante eget dapibus. Sed dapibus nulla elementum, rutrum neque eu, gravida neque.</p>
                                    </div>
                                </div>

                                <div class="media mt-4">
                                    <div class="avatar me-4">
                                        <img alt="avatar" src="{{Vite::asset('resources/images/profile-25.jpeg')}}" class="rounded-circle" />
                                    </div>
                                    <div class="media-body">
                                        <h5 class="media-heading mb-1">Mary McDonald</h5>
                                        <div class="meta-info mb-0">15 April</div>
                                        <p class="media-text mt-2 mb-0">Fusce condimentum cursus mauris et ornare. Mauris fermentum mi id sollicitudin viverra. Aenean dignissim sed ante eget dapibus. Sed dapibus nulla elementum, rutrum neque eu, gravida neque.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="media mb-5 pb-5 primary-comment">
                            <div class="avatar me-4">
                                <img alt="avatar" src="{{Vite::asset('resources/images/profile-12.jpeg')}}" class="rounded-circle" />
                            </div>
                            <div class="media-body">
                                <h5 class="media-heading mb-1">Kelly Young</h5>
                                <div class="meta-info mb-0">12 April</div>
                                <p class="media-text mt-2 mb-0">Fusce condimentum cursus mauris et ornare. Mauris fermentum mi id sollicitudin viverra. Aenean dignissim sed ante eget dapibus. Sed dapibus nulla elementum, rutrum neque eu, gravida neque.</p>

                                <button class="btn btn-success btn-icon btn-reply btn-rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                </button>

                                <div class="media mt-4">
                                    <div class="avatar me-4">
                                        <img alt="avatar" src="{{Vite::asset('resources/images/profile-21.jpeg')}}" class="rounded-circle" />
                                    </div>
                                    <div class="media-body">
                                        <h5 class="media-heading mb-1">Andy King</h5>
                                        <div class="meta-info mb-0">13 April</div>
                                        <p class="media-text mt-2 mb-0">Fusce condimentum cursus mauris et ornare. Mauris fermentum mi id sollicitudin viverra. Aenean dignissim sed ante eget dapibus. Sed dapibus nulla elementum, rutrum neque eu, gravida neque.</p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="media mb-5 pb-5 primary-comment">
                            <div class="avatar me-4">
                                <img alt="avatar" src="{{Vite::asset('resources/images/profile-9.jpeg')}}" class="rounded-circle" />
                            </div>
                            <div class="media-body">
                                <h5 class="media-heading mb-1">Alma Clarke</h5>
                                <div class="meta-info mb-0">10 April</div>
                                <p class="media-text mt-2 mb-0">Fusce condimentum cursus mauris et ornare. Mauris fermentum mi id sollicitudin viverra. Aenean dignissim sed ante eget dapibus. Sed dapibus nulla elementum, rutrum neque eu, gravida neque.</p>

                                <button class="btn btn-success btn-icon btn-reply btn-rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>
                                </button>
                                
                            </div>
                        </div>

                        <div class="post-pagination">

                            <div class="pagination-no_spacing">

                                <ul class="pagination">
                                    <li><a href="javascript:void(0);" class="prev"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg></a></li>
                                    <li><a href="javascript:void(0);">1</a></li>
                                    <li><a href="javascript:void(0);" class="active">2</a></li>
                                    <li><a href="javascript:void(0);">3</a></li>
                                    <li><a href="javascript:void(0);" class="next"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg></a></li>
                                </ul>

                            </div>
                            
                        </div>
                        

                    </div>
                    --}}
                    {{--}}
                    <div class="post-form mt-5">

                        <div class="section add-comment">
                            <div class="info">
                                <h6 class="">Add Comment</h6>
                                <p>Add your <span class="text-success">comment</span> to this post.</p>

                                <div class="row mt-4">

                                        <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Write Comment</label>
                                            <textarea class="form-control" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Name</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Email</label>
                                            <input type="email" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="text-end mt-4">
                                    <button class="btn btn-primary me-3">Clear</button>
                                    <button class="btn btn-success">Add Comment</button>
                                </div>
                            </div>
                        </div>

                        
                    </div>
                    --}}
                    
                </div>
                
            </div>
        
    </div>
    
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <x-slot:footerFiles>
        <script src="{{asset('plugins/glightbox/glightbox.min.js')}}"></script>
        <script src="{{asset('plugins/glightbox/custom-glightbox.min.js')}}"></script>

        {{--<script>
 
            function preload_image(img) {
            img.src = img.dataset.src;
            console.log(`Loading ${img.src}`);
            }
            const config_opts = {
            rootMargin: '200px 200px 200px 200px'
            };
            let observer = new IntersectionObserver(function(entries, self) {
            for(entry of entries) { 
                if(entry.isIntersecting) {
                let elem = entry.target;
                preload_image(elem);   
                self.unobserve(elem);
                }
            }
            }, config_opts);

            let images = document.querySelectorAll('img.lazy-load');
            for(image of images) {
            observer.observe(image);
            }

    </script>--}}

    </x-slot>
    <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>