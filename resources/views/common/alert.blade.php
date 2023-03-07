{{-- Message --}}



@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            {{-- <i class="fa fa-times"></i> --}}
        </button>
        {{ session('success') }}
    </div>
@elseif (Session::has('fail'))
    <div class="alert alert-warning" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            {{-- <i class="fa fa-times"></i> --}}
        </button>
        <strong>UYARI: </strong> {{ session('fail') }}
    </div>
@endif
@if (Session::has('error'))
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            {{-- <i class="fa fa-times"></i> --}}
        </button>
        <strong>HATA ! </strong> {{ session('error') }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

