@if (session()->has('breadcrumbs') && is_array(session('breadcrumbs')))
    <ol class="breadcrumb p-0 bg-transparent float-sm-right mb-0">
        @foreach (session('breadcrumbs') as $item)
            @if ($loop->last)
                <li class="breadcrumb-item active" aria-current="page">{{ $item['name'] }}</li>
            @else
                <li class="breadcrumb-item"><a href="{{ $item['route'] }}">{{ $item['name'] }}</a></li>
            @endif
        @endforeach
    </ol>
@endif
