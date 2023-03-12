<x-base-layout :scrollspy="false">

    <x-slot:pageTitle>
        {{$title}} 
    </x-slot>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <x-slot:headerFiles>
        <!--  BEGIN CUSTOM STYLE FILE  -->
        <link rel="stylesheet" href="{{asset('plugins/filepond/filepond.min.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/filepond/FilePondPluginImagePreview.min.css')}}">
        <link rel="stylesheet" href="{{asset('plugins/tagify/tagify.css')}}">

        @vite(['resources/scss/light/assets/forms/switches.scss'])
        @vite(['resources/scss/light/plugins/editors/quill/quill.snow.scss'])
        @vite(['resources/scss/light/plugins/editors/quill/quill.snow.scss'])
        @vite(['resources/scss/light/plugins/tagify/custom-tagify.scss'])
        @vite(['resources/scss/light/assets/apps/blog-create.scss'])

        @vite(['resources/scss/dark/assets/forms/switches.scss'])
        @vite(['resources/scss/dark/plugins/editors/quill/quill.snow.scss'])
        @vite(['resources/scss/dark/plugins/editors/quill/quill.snow.scss'])
        @vite(['resources/scss/dark/plugins/tagify/custom-tagify.scss'])
        @vite(['resources/scss/dark/assets/apps/blog-create.scss'])
        <!--  END CUSTOM STYLE FILE  -->
    </x-slot>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BREADCRUMB -->
    <div class="page-meta">
        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">App</a></li>
                <li class="breadcrumb-item"><a href="#">portifolio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Novo</li>
            </ol>
        </nav>
    </div>
    <!-- /BREADCRUMB -->

    <div class="row mb-4 layout-spacing layout-top-spacing">

        <div class="col-xxl-10 col-xl-12 col-lg-12 col-md-12 col-sm-12">

            
                <form action="{{ getRouterValue(); }}/app/portifolio/create"  method="post" enctype="multipart/form-data" name="form1" class="was-validated">
                    @csrf
                            <div class="widget-content widget-content-area blog-create-section mb-4">
                                    <div class="row mb-4">
                                        <div class="col-sm-12">
                                            <input type="text" class="form-control" id="album" name="album" onblur="submeter()" placeholder="Nome do Album">
                                        </div>
                                    </div>

                                    <div class="row mb-4">
                                        <div class="col-sm-12">
                                            <label>Descrição</label>
                                            <div id="quillEditor"></div>
                                            <input id="description" name="description" hidden>
                                        </div>
                                    </div>
                            </div>
                            
                            <div class="widget-content widget-content-area blog-create-section mb-4">
                                <div class="row">
                                    <div class="col-xxl-12 mb-4">
                                        <div class="switch form-switch-custom switch-inline form-switch-primary">
                                            <input class="switch-input" type="checkbox" role="switch" id="showPublicly" checked>
                                            <label class="switch-label" for="showPublicly">Público</label>
                                        </div>
                                    </div>
                                    <div class="col-xxl-12 mb-4">
                                        <div class="switch form-switch-custom switch-inline form-switch-primary">
                                            <input class="switch-input" type="checkbox" role="switch" id="enableComment" checked>
                                            <label class="switch-label" for="enableComment">Comentários</label>
                                        </div>
                                    </div>
                                    <div class="col-xxl-12 col-md-12 mb-4">
                                        <label for="tags">Tags</label>
                                        <input id="tags" name="tags" class="blog-tags" value="">
                                    </div>

                                    {{--<div class="col-xxl-12 col-md-12 mb-4">
                                        <label for="category">Categoria</label>
                                        <input id="category" name="category" placeholder="Choose...">
                                    </div>

                                    <div class="col-xxl-12 col-md-12 mb-4">

                                        <label for="product-images">Fotos</label>
                                        <div class="multiple-file-upload">
                                
                                            <input type="" 
                                                class="filepond"
                                                name="photos" 
                                                id="photos"
                                                
                                              
                                                data-allow-reorder="true"
                                                data-max-file-size="10MB"
                                                data-max-files="20"
                                                hidden>
                                                
                                        </div>

                                    </div>--}}
                                </div>
                            </div>

                    <div class="col-xxl-12 col-sm-4 col-12 mx-auto">
                        <button class="btn btn-success w-100">Criar Album</button>
                    </div>
                </form>
                </div>
            
        </div>

    </div>
    
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <x-slot:footerFiles>
        <script src="{{asset('plugins/editors/quill/quill.js')}}"></script>
        <script src="{{asset('plugins/filepond/filepond.min.js')}}"></script>
        <script src="{{asset('plugins/filepond/FilePondPluginFileValidateType.min.js')}}"></script>
        <script src="{{asset('plugins/filepond/FilePondPluginImageExifOrientation.min.js')}}"></script>
        <script src="{{asset('plugins/filepond/FilePondPluginImagePreview.min.js')}}"></script>
        <script src="{{asset('plugins/filepond/FilePondPluginImageCrop.min.js')}}"></script>
        <script src="{{asset('plugins/filepond/FilePondPluginImageResize.min.js')}}"></script>
        <script src="{{asset('plugins/filepond/FilePondPluginImageTransform.min.js')}}"></script>
        <script src="{{asset('plugins/filepond/filepondPluginFileValidateSize.min.js')}}"></script>
        <script src="{{asset('plugins/tagify/tagify.min.js')}}"></script>

        @vite(['resources/assets/js/apps/blog-create.js'])

        <script>
            function submeter()
            {
                var inpname = document.getElementById('album').value;
                document.cookie = "photos=" + inpname + ";" + "path=/";
            


            const inputElement = document.getElementById('photos');
            const pond = FilePond.create(inputElement);

            FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginImageExifOrientation,
            FilePondPluginFileValidateSize,
            //FilePondPluginImageEdit
        );

        // Select the file input and use 
        // create() to turn it into a pond
        window.multifiles = FilePond.create(
            document.getElementById('photos')
        );
            
        FilePond.setOptions({
        server: {
        process: '{{ getRouterValue(); }}/app/portifolio/bg-upload',
        revert: '{{ getRouterValue(); }}/app/portifolio/bg-delete',
                
        headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }

        }

        });

    }
        </script>

        <script>
            var options = {
                placeholder: 'Coloque uma descrição do trabalho',
                theme: 'snow'
                };

                var editor = new Quill('#quillEditor', options);
                var justHtmlContent = document.getElementById('description');

                editor.on('text-change', function() {
                var delta = editor.getContents();
                var text = editor.getText();
                var justHtml = editor.root.innerHTML;
                justHtmlContent.value = justHtml;
                });

                
        </script>

    </x-slot>
    <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>