<x-base-layout :scrollspy="false" :avatar="$avatar">

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

        @vite(['resources/scss/dark/assets/components/modal.scss'])

        @vite(['resources/scss/light/assets/elements/alert.scss'])
        @vite(['resources/scss/dark/assets/elements/alert.scss'])

        @vite(['resources/scss/light/assets/authentication/auth-boxed.scss'])
        @vite(['resources/scss/dark/assets/authentication/auth-boxed.scss'])
        

        @vite(['resources/scss/light/assets/elements/infobox.scss', 'resources/scss/dark/assets/elements/infobox.scss'])

        
        <!--  END CUSTOM STYLE FILE  -->
    </x-slot>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- Analytics -->

{{--}}
    
    <div class="row ms-1 mt-4">
        @isset($groups[0])
            @foreach ($groups as $group)
            <a href="{{ $group->group_link }}" target="_blank" class="alert alert-light-warning alert-dismissible fade show border-0 mb-4" role="alert"> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-bs-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <img src="{{Vite::asset('resources/images/whatsapp.svg')}}" alt="avatar" width="30" class="me-2"> Entre no grupo <b>{{ $group->group_name }}</b> para não perder as notificações. </a>    
            @endforeach
        @endisset
        

        <div class="row">
            @if (\Session::has('error'))
                <div class="alert alert-light-danger alert-dismissible fade show border-0 mb-4" role="alert"> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-bs-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong>Atenção:</strong> {!! \Session::get('error') !!} </div>
    
            @endif
            @if (\Session::has('success'))
                <div class="alert alert-light-sucess alert-dismissible fade show border-0 mb-4" role="alert"> <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x close" data-bs-dismiss="alert"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button> <strong>Atenção:</strong> {!! \Session::get('success') !!} </div>
    
            @endif
            
        </div>

        @if(Auth::user()->active == 2)

        <div id="CodeModal" class="modal animated fadeInDown" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="container mx-auto align-self-center">
                        <form action="{{ getRouterValue(); }}/form/code/send"  method="post" enctype="multipart/form-data" name="form1" class="section general-info">
                            @csrf
                                <div class="card mt-3 mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12 mb-3">
                                                <h2>Código de Verificação</h2>
                                                <p>Insira o código recebido para ativar o seu curso.</p>
                                            </div>
                                            <div class="col-sm-2 col-3 ms-auto">
                                                <div class="mb-3">
                                                    <input type="text" id="1" name="1" class="form-control opt-input">
                                                </div>
                                            </div>
                                            <div class="col-sm-2 col-3">
                                                <div class="mb-3">
                                                    <input type="email" id="2" name="2" class="form-control opt-input">
                                                </div>
                                            </div>
                                            <div class="col-sm-2 col-3">
                                                <div class="mb-3">
                                                    <input type="text" id="3" name="3" class="form-control opt-input">
                                                </div>
                                            </div>
                                            <div class="col-sm-2 col-3 me-auto">
                                                <div class="mb-3">
                                                    <input type="text" id="4" name="4" class="form-control opt-input">
                                                </div>
                                            </div>
                                            
                                            <div class="col-12 mt-4">
                                                <div class="mb-4">
                                                    <button type="send" class="btn btn-secondary w-100">ENVIAR</button>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

      
            <div class="row">
                
                <div class="info-box-3">
                   
                        <div class="info-box-3-icon">
                        <x-widgets._w-svg svg="qrcode-off"/>    
                        </div>
                        
                        <div class="info-box-3-content-wrapper">
                        <div class="mb-3"><h3>Código de Liberação Pendente</h4></div>
                        <div class="info-box-3-content">O Código de liberação será fornecido pessoalmente por um consultor credenciado do Projeto. Você receberá uma mensagem informando o endereço, dia e horário para comparecer.<br><br>
                            O prazo médio é de 5 dias úteis.<br><br>
                        
                        <a data-bs-toggle="modal" data-bs-target="#CodeModal"  class="btn btn-primary w-100" data-toggle="tooltip" data-placement="top" title="Bloquear"> Inserir Código </a>
                        </div>
                        </div>
                    
                </div>
            </div>
     
        @endif

        
        
        <div class="row">
            <div class="mb-3"><h3>Olá {{Auth::user()->name}}</h4></div>
            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                <x-widgets._w-card-cademi title="Acesse seu curso" card={{$card}}/>
            </div>
        </div>
    </div>
        
    
    @if(Auth::user()->active == 1)
    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
        <x-widgets._w-support title="Suporte"/>
    </div>
    @endif --}}
    
    <!--  BEGIN CUSTOM SCRIPTS FILE  -->
    <x-slot:footerFiles>
        @vite(['resources/assets/js/authentication/2-Step-Verification.js'])
        {{-- <script src="{{asset('plugins/apex/custom-apexcharts.js')}}"></script> --}}
        @vite(['resources/assets/js/widgets/modules-widgets.js'])
    </x-slot>
    <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>