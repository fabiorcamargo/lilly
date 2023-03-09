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
                <li class="breadcrumb-item"><a href="#">Blog</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </nav>
    </div>
    <!-- /BREADCRUMB -->


    <div class="row mb-4 layout-spacing layout-top-spacing">
        <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">

            
                <form action="{{ getRouterValue(); }}/app/portifolio/bg/"  method="post" enctype="multipart/form-data" name="form1" class="was-validated">
                    @csrf
                    <div class="widget-content widget-content-area blog-create-section mb-4">
                                <div class="row mb-4">
                                    <div class="col-sm-12">
                                        <h4>Alterar imagem de fundo</h4>
                                    </div>
                                </div>

                                <div class="col-xxl-12 col-sm-4 col-12 mx-auto">
                                    <a href="{{ getRouterValue(); }}/app/portifolio/grid/" class="btn btn-success w-100">Voltar</a>
                                </div>

                                    <div class="col-xxl-12 col-md-12 mb-4">

                                        <label for="product-images">Fotos</label>
                                        <div class="multiple-file-upload">
                                
                                            <input type="file" 
                                                class="filepond file-upload-multiple"
                                                name="filepond" 
                                                multiple 
                                              
                                                data-allow-reorder="true"
                                                data-max-file-size="10MB"
                                                data-max-files="20">
                                        </div>
                                        <input name="filepond" hidden>
                                    </div>
                                </div>
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
                var inpname = document.getElementById('photo').value;
                document.cookie = "photo=" + inpname + ";" + "path=/";
            }
        </script>

        <script>
            const inputElement = document.getElementById('photos-upload');
            const pond = FilePond.create(inputElement);

            FilePond.registerPlugin(
                FilePondPluginImageExifOrientation,
                FilePondPluginImageCrop,
                FilePondPluginImageResize
   

            //FilePondPluginImageEdit
        );

        // Select the file input and use 
        // create() to turn it into a pond
        window.multifiles = FilePond.create(
            document.getElementById('photos-upload')
        );
            
        FilePond.setOptions({
        server: {
        process: '{{ getRouterValue(); }}/app/portifolio/up_bg',
        
                
        headers: {
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
            onload: (response) => response.key,
            onerror: (response) => response.data,
            ondata: (formData) => {
                formData.append('Hello', 'World');
                return formData;
            },

        }

        });
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