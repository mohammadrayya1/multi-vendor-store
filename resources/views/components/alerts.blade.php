

@if(session()->has($type))
<div class="alert alert-success">
    <ul>
        {{ session($type) }}
    </ul>
</div>

@endif
