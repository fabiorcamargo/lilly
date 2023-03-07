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
    
    <div class="row layout-top-spacing">
    
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-4">


            <div class="single-post-content">

                <div class="featured-image" style='background-image: url("{{Vite::asset('resources/images/lightbox-2.jpeg')}}");'>

                    <div class="featured-image-overlay"></div>

                    <div class="post-header">
                        
                        <div class="post-title">
                            <h1 class="mb-0">List of Best Restaurant WordPress Themes</h1>
                        </div>
                        
                        <div class="post-meta-info d-flex justify-content-between">

                            <div class="media">
                                <img src="{{Vite::asset('resources/images/profile-12.jpeg')}}" alt="profile">
                                <div class="media-body">
                                    <h5>Lilly Almeida</h5>
                                    <p>15 May 2022</p>
                                </div>
                            </div>

                            <div class="align-self-center">
                                <button class="btn btn-success btn-icon btn-share btn-rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-share-2"><circle cx="18" cy="5" r="3"></circle><circle cx="6" cy="12" r="3"></circle><circle cx="18" cy="19" r="3"></circle><line x1="8.59" y1="13.51" x2="15.42" y2="17.49"></line><line x1="15.41" y1="6.51" x2="8.59" y2="10.49"></line></svg>
                                </button>
                            </div>
                            
                        </div>

                    </div>
                    
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
    
    
    <div class="row">
        @foreach ($portifolios as $portifolio)
        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
            <a href="{{ getRouterValue(); }}/app/portifolio/show/{{$portifolio->id}}" class="card style-2 mb-md-0 mb-4">
                <img src="{{asset("$portifolio->bg")}}" class="card-img-top" alt="...">
                <div class="card-body px-0 pb-0">
                    <h5 class="card-title mb-3">{{ $portifolio->name }}</h5>
                    <div class="media mt-4 mb-0 pt-1">
                        <img src="{{Vite::asset('resources/images/profile-5.jpeg')}}" class="card-media-image me-3" alt="">
                        <div class="media-body">
                            <h4 class="media-heading mb-1">Lilly Almeida</h4>
                            <p class="media-text">{{ $portifolio->updated_at }}</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
            <a href="./app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                <img src="{{Vite::asset('resources/images/grid-blog-style-2.jpeg')}}" class="card-img-top" alt="...">
                <div class="card-body px-0 pb-0">
                    <h5 class="card-title mb-3">14 Tips to improve your photography</h5>
                    <div class="media mt-4 mb-0 pt-1">
                        <img src="{{Vite::asset('resources/images/profile-5.jpeg')}}" class="card-media-image me-3" alt="">
                        <div class="media-body">
                            <h4 class="media-heading mb-1">Shaun Park</h4>
                            <p class="media-text">01 May</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
            <a href="./app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                <img src="{{Vite::asset('resources/images/grid-blog-style-1.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body px-0 pb-0">
                    <h5 class="card-title mb-3">The ideal work from home office setup</h5>
                    <div class="media mt-4 mb-0 pt-1">
                        <img src="{{Vite::asset('resources/images/profile-2.jpeg')}}" class="card-media-image me-3" alt="">
                        <div class="media-body">
                            <h4 class="media-heading mb-1">Vanessa Kirby</h4>
                            <p class="media-text">02 May</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
            <a href="./app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                <img src="{{Vite::asset('resources/images/grid-blog-style-3.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body px-0 pb-0">
                    <h5 class="card-title mb-3">Top haunted houses in Great Britain</h5>
                    <div class="media mt-4 mb-0 pt-1">
                        <img src="{{Vite::asset('resources/images/profile-16.jpeg')}}" class="card-media-image me-3" alt="">
                        <div class="media-body">
                            <h4 class="media-heading mb-1">Kelly Young</h4>
                            <p class="media-text">10 May</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
            <a href="./app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                <img src="{{Vite::asset('resources/images/list-blog-style-3.jpeg')}}" class="card-img-top" alt="...">
                <div class="card-body px-0 pb-0">
                    <h5 class="card-title mb-3">29 Most Beautiful Places in the World</h5>
                    <div class="media mt-4 mb-0 pt-1">
                        <img src="{{Vite::asset('resources/images/profile-32.jpeg')}}" class="card-media-image me-3" alt="">
                        <div class="media-body">
                            <h4 class="media-heading mb-1">Xavier</h4>
                            <p class="media-text">14 May</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
            <a href="./app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                <img src="{{Vite::asset('resources/images/grid-blog-style-5.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body px-0 pb-0">
                    <h5 class="card-title mb-3">21 Habits of highly productive people</h5>
                    <div class="media mt-4 mb-0 pt-1">
                        <img src="{{Vite::asset('resources/images/profile-2.jpeg')}}" class="card-media-image me-3" alt="">
                        <div class="media-body">
                            <h4 class="media-heading mb-1">Vanessa Kirby</h4>
                            <p class="media-text">19 May</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
            <a href="./app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                <img src="{{Vite::asset('resources/images/masonry-blog-style-3.jpeg')}}" class="card-img-top" alt="...">
                <div class="card-body px-0 pb-0">
                    <h5 class="card-title mb-3">9 Reasons why sugar is bad for your health</h5>
                    <div class="media mt-4 mb-0 pt-1">
                        <img src="{{Vite::asset('resources/images/profile-19.jpeg')}}" class="card-media-image me-3" alt="">
                        <div class="media-body">
                            <h4 class="media-heading mb-1">Oscar Garner</h4>
                            <p class="media-text">25 May</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
            <a href="./app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                <img src="{{Vite::asset('resources/images/grid-blog-style-4.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body px-0 pb-0">
                    <h5 class="card-title mb-3">7 Effective ways to instantly look more faishonable</h5>
                    <div class="media mt-4 mb-0 pt-1">
                        <img src="{{Vite::asset('resources/images/profile-32.jpeg')}}" class="card-media-image me-3" alt="">
                        <div class="media-body">
                            <h4 class="media-heading mb-1">Xavier</h4>
                            <p class="media-text">27 May</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-4 col-sm-6 mb-4">
            <a href="./app-blog-post.html" class="card style-2 mb-md-0 mb-4">
                <img src="{{Vite::asset('resources/images/masonry-blog-style-4.jpeg')}}" class="card-img-top" alt="...">
                <div class="card-body px-0 pb-0">
                    <h5 class="card-title mb-3">How to plan a trip in 7 easy steps</h5>
                    <div class="media mt-4 mb-0 pt-1">
                        <img src="{{Vite::asset('resources/images/profile-9.jpeg')}}" class="card-media-image me-3" alt="">
                        <div class="media-body">
                            <h4 class="media-heading mb-1">Daisy Anderson</h4>
                            <p class="media-text">31 May</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>

    </div>
    
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <x-slot:footerFiles>

    </x-slot>
    <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>