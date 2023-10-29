
@if ($errors->any() || session('success'))
    <div class="pt-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="text-gray-900">

                @if ($errors->any())
                    <div class="alert alert-danger" role="alert">
                        {{$errors->first()}}
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{session('success')}}
                    </div>
                @endif

            </div>
        </div>
    </div>
@endif
