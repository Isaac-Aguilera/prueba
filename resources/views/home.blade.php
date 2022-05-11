<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>{{ config('app.name', 'Laravel') }}</title>
        <!-- Scripts -->
        <script type="text/javacsript" src="{{ asset('js/app.js') }}" defer></script>
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <header>
        <nav class="navbar navbar-light" style="background-color: #e3f2fd;">
            <div class="container-fluid">
              <a class="navbar-brand border border-secondary p-2 rounded-pill" href="#">
                EFA
              </a>
            </div>
          </nav>
    </header>
    <body class="antialiased">
        <div class="position-absolute top-50 start-50 translate-middle d-flex justify-content-center">
            <form method="POST" action="{{route('upload')}}" accept-charset="UTF-8" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label class="row justify-content-center form-label fs-1" for="file">Upload file</label>
                    <input type="file" name="file"class="form-control form-control-lg custom-file @error('file') is-invalid @enderror" accept=".csv, .json" required>
                </div>
                <div class="row justify-content-center">
                    <input class="w-50 btn btn-success" type="submit" value="Submit" >
                </div>
                @error('file')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </form>
        </div>
    </body>
    <footer class="position-fixed bottom-0 start-50 translate-middle text-nowrap">
        <p class="row justify-content-center text-nowrap">Website provided by Isaac Aguilera Cano for VOLTDYNAMICS Inc || Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }}) </p>
    </footer>
</html>