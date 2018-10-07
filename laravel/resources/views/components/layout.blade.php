<!DOCTYPE html>
<html>
    <head>
        <title>@yield('title')</title>
    	<meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- CSS ASSETS -->
        @foreach($data['css_assets'] as $key => $asset)
            {!! Html::style($asset) !!}
        @endforeach
        @if(!empty($data['js_assets_head']))
            @foreach($data['js_assets_head'] as $key => $asset)
                {!! Html::script($asset) !!}
            @endforeach
        @endif
    </head>
    <body>
        <div class="overlay_loading"></div>
        <!-- JS ASSETS -->
        @foreach($data['js_assets'] as $key => $asset)
            {!! Html::script($asset) !!}
        @endforeach
        @yield('content')
        @include('components/app_js')
        @yield('script')
    </body>
</html>