<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dashboard</title>
  
  @include('includes.bootstrap.bootstrap-styles')
</head>
<body>
  @include('includes.nav')
  
  <div class="container">
    <div class="row">
      <div class="col-6">
        @include('includes.switchAccount')
      </div>
      <div class="col-6">
        @include('includes.accountDetails')
      </div>
    </div>
  </div>
  
  @include('includes.bootstrap.bootstrap-scripts')
</body>
</html>