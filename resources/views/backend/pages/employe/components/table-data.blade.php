<div class="card h-100">
  <div class="card-body">
    <div class="account-settings">
      <div class="user-profile">
        <div class="user-avatar">
          @if($selected->image=="")
          <img src="{{ asset("assets/default-image/users.png ") }}" alt="" />
          @else
          <img src="{{ asset("assets/images/employee/{$selected->id}-{$selected->slug}.{$selected->image}") }}" alt="Patient's Image" />
          @endif
        </div>
        <h5 class="user-name">{{ $selected->name }}</h5>
        <h6 class="user-email">{{ $selected->email }}</h6>
      </div>
      <div class="table-responsive">
        <table class="table table-hover table-bordered">
          <tbody>
            <tr>
              <td class="font-weight-bold">Name</td>
              <td>{{$selected->name}}</td>
            </tr>
            <tr>
              <td class="font-weight-bold">Phone</td>
              <td>{{$selected->phone}}</td>
            </tr>
            <tr>

              <td class="font-weight-bold">Gender</td>
              <td>
                @if ($selected->gender == 1) Male @elseif ($selected->gender == 2) Female @else Others @endif
              </td>
            </tr>
            <tr>
              <td class="font-weight-bold">DOB</td>
              <td>{{$selected->dob}}</td>
            </tr>
            <tr>
              <td class="font-weight-bold">NID</td>
              <td>{{$selected->nid}}</td>
            </tr>
            <tr>
              <td class="font-weight-bold">Religion</td>
              <td>
                @if($selected->religion==1)
                Islam
                @elseif($selected->religion==2)
                Christianity
                @elseif($selected->religion==3)
                Hinduism
                @else
                Others
                @endif
              </td>
            </tr>
            <tr>
              <td class="font-weight-bold">address</td>
              <td>{{$selected->address}}</td>
            </tr>
            <tr>
              <td class="font-weight-bold">last_education</td>
              <td>
                @foreach ($allEducation as $value)
                  @if ($selected->last_education == $value->id)
                  {{ $value->title }}
                  @endif
                @endforeach
              </td>
            </tr>
            <tr>
              <td class="font-weight-bold">result</td>
              <td>{{$selected->result}}</td>
            </tr>
            <tr>
              <td class="font-weight-bold">maritial_status</td>
              <td>
                @if($selected->maritial_status==1)
                Married
                @else
                Single
                @endif
              </td>
            </tr>
            <tr>
              <td class="font-weight-bold">Status</td>
              <td>
                @if($selected->status==1)
                <span class="badge badge-success">Updated</span>
                @else
                <span class="badge badge-danger">Pending</span>
                @endif
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
