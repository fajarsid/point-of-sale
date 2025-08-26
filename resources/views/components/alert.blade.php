@if ($errors->any())
    <div class="alert alert-danger {{ $type }}">
        @foreach ($errors->all() as $error)
            <small class="text-white">{{ $error }}</small>
        @endforeach
    </div>
@endif
