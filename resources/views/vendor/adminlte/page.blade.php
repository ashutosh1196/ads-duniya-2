@extends('adminlte::master')

@inject('layoutHelper', \JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper)

@if($layoutHelper->isLayoutTopnavEnabled())
    @php( $def_container_class = 'container' )
@else
    @php( $def_container_class = 'container-fluid' )
@endif

@section('adminlte_css')
    @stack('css')
    @yield('css')
    <style>
        li.has-treeview li.nav-item {
            margin-left: 15px;
        }
        li.has-treeview li.nav-item p {
            font-weight: 400 !important;
            font-size: 12px !important;
        }
        a.back-button {
            position: relative;
            top: 5px;
            align-self: flex-end;
            float: right;
            width: 100px;
        }
        .error {
            color: #ff0000 !important;
            font-weight: 300 !important;
            font-size: 12px !important;
        }
        .form-control.error {
            color: #000000 !important;
        }
    </style>
@stop

@section('classes_body', $layoutHelper->makeBodyClasses())

@section('body_data', $layoutHelper->makeBodyData())

@section('body')
    <div class="wrapper">

        {{-- Top Navbar --}}
        @if($layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.navbar.navbar-layout-topnav')
        @else
            @include('adminlte::partials.navbar.navbar')
        @endif

        {{-- Left Main Sidebar --}}
        @if(!$layoutHelper->isLayoutTopnavEnabled())
            @include('adminlte::partials.sidebar.left-sidebar')
        @endif

        {{-- Content Wrapper --}}
        <div class="content-wrapper {{ config('adminlte.classes_content_wrapper') ?? '' }}">

            {{-- Content Header --}}
            <div class="content-header">
                <div class="{{ config('adminlte.classes_content_header') ?: $def_container_class }}">
                    @yield('content_header')
                </div>
            </div>

            {{-- Main Content --}}
            <div class="content">
                <div class="{{ config('adminlte.classes_content') ?: $def_container_class }}">
                    @if(session()->has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session()->get('success') }}
                            <a href="javascript:void(0)" id="close_button" class="float-right text-white close_button">X</a>
                        </div>
                    @endif
                    @if(session()->has('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session()->get('error') }}
                            <a href="javascript:void(0)" id="close_button" class="float-right text-white close_button">X</a>
                        </div>
                    @endif
                    @if(session()->has('warning'))
                        <div class="alert alert-warning" role="alert">
                            {{ session()->get('warning') }}
                            <a href="javascript:void(0)" id="close_button" class="float-right text-white close_button">X</a>
                        </div>
                    @endif
                    @yield('content')
                </div>
            </div>

        </div>

        {{-- Footer --}}
        @hasSection('footer')
            @include('adminlte::partials.footer.footer')
        @endif

        {{-- Right Control Sidebar --}}
        @if(config('adminlte.right_sidebar'))
            @include('adminlte::partials.sidebar.right-sidebar')
        @endif

    </div>
@stop

@section('adminlte_js')
    @stack('js')
    @yield('js')
    <script>
        $(document).ready(function() {
            /* $.validator.messages.required = function (param, input) {
                var title = $(input).attr('fieldTitle');
                return 'The ' + title + ' field is required.';
            } */
            $("#close_button").click(function() {
                $(".alert").hide();
            });
            setTimeout(() => {
                $(".alert").hide();
            }, 3000);
        });
    </script>
@stop
