<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register Form</title>
  @includeIf('includes.bootstrap.bootstrap-styles')
</head>
<body>
  <div class="container">
    <div class="row justify-content-center"> 
      <div class="col-md-8">
        <x-register-component />
      </div>
    </div>
  </div>
  
  @includeIf('includes.bootstrap.bootstrap-scripts')
</body>
</html>