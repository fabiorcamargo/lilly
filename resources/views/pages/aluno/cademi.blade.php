

    <x-slot:pageTitle>
        {{$title}} 
    </x-slot>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <x-slot:headerFiles>
        <!--  BEGIN CUSTOM STYLE FILE  -->
        <link rel="stylesheet" href="{{asset('plugins/apex/apexcharts.css')}}">
        <script src="https://core.cademi.com.br/assets/js/remote.js"></script>

        @vite(['resources/scss/light/assets/components/list-group.scss'])
        @vite(['resources/scss/light/assets/widgets/modules-widgets.scss'])

        @vite(['resources/scss/dark/assets/components/list-group.scss'])
        @vite(['resources/scss/dark/assets/widgets/modules-widgets.scss'])
        <!--  END CUSTOM STYLE FILE  -->
    </x-slot>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- Analytics -->

    <div class="row layout-top-spacing">
        <h2>Olá {nome}</h2>
        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
            
        </div>

    </div>
    
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <x-slot:footerFiles>
        
        {{-- <script src="{{asset('plugins/apex/custom-apexcharts.js')}}"></script> --}}
        @vite(['resources/assets/js/widgets/modules-widgets.js'])
    </x-slot>
    <!--  END CUSTOM SCRIPTS FILE  -->
