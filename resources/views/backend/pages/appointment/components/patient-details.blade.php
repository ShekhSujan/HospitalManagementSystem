<div class="card h-100">
  <div class="card-body">
    <div class="account-settings">
      @foreach($allAppointment as $value)
        <div class="user-profile">
          <div class="user-avatar">
            @if($value->image=="")
              <img src="{{ asset("assets/images/default/user.png") }}" alt="" />
            @else
              <img src="{{ asset("assets/images/users/{$value->user_id}.{$value->user_image}") }}" alt="Le Rouge Admin" />
            @endif
          </div>
          <h5 class="user-name">{{ $value->user_name }}</h5>
          <h6 class="user-email">{{ $value->user_email }}</h6>
        </div>
        <div class="table-responsive">
          <table class="table table-hover table-bordered">
            <tbody>
              <tr>
                <td class="font-weight-bold">Phone</td>
                <td>{{$value->user_phone}}</td>
              </tr>
              <tr>
                <td class="font-weight-bold">Gender</td>
                <td>
                  @if ($value->gender_id == 1)
                    Male
                  @elseif ($value->gender_id == 2)
                    Female
                  @else
                    Others
                  @endif
                </td>
              </tr>
              <tr>
                <td class="font-weight-bold">Age</td>
                <td>{{$value->user_age}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      @endforeach
    </div>
  </div>
</div>
