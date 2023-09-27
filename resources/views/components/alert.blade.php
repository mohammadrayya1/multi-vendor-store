{{--@if(session($type))--}}
{{--    <div class="alert alert-success">--}}
{{--        <ul>--}}
{{--            {{ Session::get($type) }}--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--@endif--}}

@if(session()->has($type))
<div class="alert alert-success">
    <ul>
        {{ session($type) }}
    </ul>
</div>

    @endif
