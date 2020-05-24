@if (\Session::has('success'))
    <div class="alert alert-success">
        <ul>
            <li>{!! \Session::get('success') !!}</li>
        </ul>
    </div>
@endif

@if(\Session::has('errors'))
    <div class="alert alert-danger">
        <ul>
            <li>
                @if(is_array($errors))
                    @foreach ($errors as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                @else
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                @endif
            </li>
        </ul>
    </div>
@endif
