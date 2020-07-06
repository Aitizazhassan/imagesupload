<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    </head>
    <body>
        <div class="flex-center position-ref full-height" id="app">
           <example-component></example-component>
            <div class="container">
                <div class="row">
                    @foreach($images as $image):
                    <div class="col-2 mb-3 px-3 py-3 rounded" >
                           <a href="{{ $image->original }}">
                               <img src="{{ $image->thumbnail }}" class="w-100">
                           </a>

                        <form action="{{ route('image.destroy',$image->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="small btn btn-outline-danger mt-3">Delete</button>
                        </form>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
