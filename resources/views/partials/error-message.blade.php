@if ($errors->has($fieldTitle))
    <div class="alert alert-danger">
        @foreach ($errors->get($fieldTitle) as $error)
            <span>{{ $error }}</span>
        @endforeach
    </div>
@endif
