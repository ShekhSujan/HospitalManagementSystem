<header class="header">
  <div class="toggle-btns">
    <a id="toggle-sidebar" href="#">
      <i class="icon-list"></i>
    </a>
    <a id="pin-sidebar" href="#">
      <i class="icon-list"></i>
    </a>
  </div>
  <div class="header-items">
    <!-- Header actions start -->
    <ul class="header-actions">
      <li class="dropdown">
        <a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
          <span class="avatar">
            <img src="{{asset("assets/images/default/user.png")}}" alt="avatar">
            <span class="status busy"></span>
          </span>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
          <div class="header-profile-actions">
            <div class="header-user-profile">
              <div class="header-user">
                <img src="{{asset("assets/images/default/user.png")}}" alt="Admin Template">
              </div>
              <h5>{{Auth::guard('admin')->user()->name}}</h5>
              <p>
                @if(Auth::guard('admin')->user()->role==1)
                  <span class="badge badge-primary">Operator</span>
                @elseif (Auth::guard('admin')->user()->role==2)
                  <span class="badge badge-primary">Doctor</span>
                @else
                  <span class="badge badge-primary">Admin</span>
                @endif
              </p>
            </div>

            @if (Auth::guard('admin')->user()->role==2)
              @foreach(App\Models\Doctor::all() as $value)
                @if (Auth::guard('admin')->user()->id==$value->user_id)
                  <a href="{{ route("backend.doctor.edit", $value->id) }}"><i class="icon-user1"></i> My Profile</a>
                @endif
              @endforeach
            @else
              <a href="{{ route("backend.admins.view", Auth::guard('admin')->user()->id) }}"><i class="icon-user1"></i> My Profile</a>
            @endif

            <a  href="" onclick="event.preventDefault();
            document.getElementById('logout').submit();"><i class="icon-log-out1"></i> Logout</a>
            <form id="logout" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </div>
      </li>
    </ul>
    <!-- Header actions end -->
  </div>
</header>
