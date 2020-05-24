@if (\Session::has('success'))
    <div class="alert alert-success alerts_block">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif

@if(\Session::has('errors'))
    <div class="alert alert-danger">
        <ul>
            @if(is_array($errors))
                @foreach ($errors as $error)
                    <li>
                        <div>{{ $error }}</div>
                    </li>
                @endforeach
            @else
                @foreach ($errors->all() as $error)
                    <li>
                        <div>{{ $error }}</div>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
@endif
