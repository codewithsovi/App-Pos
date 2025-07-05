<div>
    <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
    @if ($errors->any())
        <div class="alert alert-danger d-flex flex-column">
            @foreach ($errors->all() as $error)
                <small class="text-white my-2">{{ $error }}</small>
            @endforeach
        </div>
    @endif
</div>
