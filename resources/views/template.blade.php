<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('partials.head_links')
    @stack('page_css')
</head>
<body>
    @include('partials.header')
    @yield('content')
    @include('components.modal')
    @include('partials.bottom_scripts')
    @stack('page_js')
    <script>
        $('.NumericOnly').bind('keypress',function(e){
            if (e.which < 48 || e.which > 57)
                return false;
            return true;
        });

        {{-- $(document).ready(function(){
            funtion load_unseen_notification(view = "")
            {
                $.ajax({
                    url: "{{ route('table-jabatan') }}",
                    method : "POST",
                    data: {view:view},
                    dataType: "json",
                    success: function(data){
                        
                    }
                });
            }
        }) --}}
    </script>
</body>
</html>