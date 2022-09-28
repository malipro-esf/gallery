    @if($errors->any())
        <div class="alert alert-danger alert-slide-up" role="alert">
            <p class="text-center" style="font-weight: bold;">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

