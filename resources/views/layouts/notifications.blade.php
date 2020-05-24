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
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </li>
        </ul>
    </div>
@endif
