<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body onload="users()">
    <nav class="navbar navbar-expand navbar-light bg-light">
        <div class="nav navbar-nav">
            <a class="nav-item nav-link active" href="{{ route('/') }}">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="{{ url('image-form') }}">Photo</a>
            <a class="nav-item nav-link" href="{{ url('user/create') }}">Sign Up</a>
            @php( $user = Auth::user())
            @if (!$user)
            <a class="nav-item nav-link" href="{{ url('login') }}">Login</a>
            @endif
            @if ($user)
            <a class="nav-item nav-link" href="{{ url('logout') }}">Logout</a>
            <a class="nav-item nav-link" href="">{{ $user->name}}</a>
            @endif

        </div>
    </nav>

      @yield('content')
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
    </script>
    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> --}}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{ asset('/') }}js/laracrud.js"></script>
    

    <script>
      $('#submitform').on('click',function(event){
        event.preventDefault();

    var _token  = $('#csrftokenimg').val();
    var title  = $('#title').val();
    var image  = $('#image');

    var formData = new FormData();
    formData.append('_token', _token);
    formData.append('title', title);
    formData.append('image', image[0].files[0]);
    
        $.ajax({
          type:'POST',
          url:'image-upload',
          data:formData,
          success: function(data){
          console.log(data);
        },
        processData:false,
        contentType:false,
        
        });
    })
    </script>
  </body>
</html>