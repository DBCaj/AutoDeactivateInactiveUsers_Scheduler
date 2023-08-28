<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  @include('includes.bootstrap.bootstrap-styles')
</head>
<body>
  @production
  <div class="container">
    @include('includes.loginForm') 
  </div>
  @endproduction

  <div class="container">
    <div class="row justify-content-center"> 
      <div class="col-md-8">
        @include('includes.loginForm') 
      </div>
    </div>
  </div>
  
  @include('includes.bootstrap.bootstrap-scripts')
</body>
</html>