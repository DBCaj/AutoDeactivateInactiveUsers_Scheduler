<div>
  @if(Auth::user()->role !== 'user')
  
  <div class="card">
    <div class="card-header">
      <b>Switch Account</b>
    </div>
    <div class="card-body">
      <form action="{{ url('/switch') }}" method="GET">
        <div class="form-group">
          <select class="form-control" name="userId">
            @foreach($users as $user)
              <!--Don't render the record of currently logged-in account-->
              @if($user->id !== Auth::id())
                <option value="{{ $user->id }}">
                  {{ $user->name }}
                </option>
              @endif
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <button onclick="return confirm('Are you sure you want to proceed?')" class="btn btn-primary" type="submit">Switch</button>
        </div>
      </form>
    </div>
  </div>
  
  @else
  
  <div class="card">
    <div class="card-header">
      <b>Switch Account</b>
    </div>
    <div class="card-body">
      <span style="color:red">Switching account is not available for role user.</span>
    </div>
  </div>
  
  @endif
</div>