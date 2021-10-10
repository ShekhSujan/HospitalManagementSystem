<div class="card h-100">
  <div class="card-body">
    <div class="account-settings">
      <div class="user-profile">
        <div class="user-avatar">
          @if($selected->image=="")
            <img src="{{ asset("assets/default-image/users.png ") }}" alt="" />
          @else
            <img src="{{ asset("assets/images/users/{$selected->id}.{$selected->image}") }}" alt="Patient's Image" />
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
              <td class="font-weight-bold">Email</td>
              <td>{{$selected->email}}</td>
            </tr>
            <tr>
              <td class="font-weight-bold">Phone</td>
              <td>{{$selected->phone}}</td>
            </tr>
            <tr>
              <td class="font-weight-bold">Gender</td>
              <td>
                @if ($selected->gender_id == 1) Male @elseif ($selected->gender_id == 2) Female @else Others @endif
                </td>
              </tr>
              <tr>
                <td class="font-weight-bold">Age</td>
                <td>{{$selected->age}}</td>
              </tr>
              <tr>
                <td class="font-weight-bold">Religion</td>
                <td>
                  @if ($selected->religion == 1)
                    Islam
                  @elseif ($selected->religion == 2)
                    Christianity
                  @elseif ($selected->religion == 3)
                    Hinduism
                  @else
                    Others
                  @endif
                </td>
              </tr>
              <tr>
                <td class="font-weight-bold">Maritial Status</td>
                <td>
                  @if ($selected->maritial_status == 1)
                    Single
                  @else
                    Married
                  @endif
                </td>
              </tr>
              <tr>
                <td class="font-weight-bold">NID</td>
                <td>
            {{$selected->nid}}
                </td>
              </tr>
              <tr>
                <td class="font-weight-bold">Medical History</td>
                <td>
            {{$selected->medical_history}}
                </td>
              </tr>
              <tr>
                <td class="font-weight-bold">Emmergency Contact Name</td>
                <td>
            {{$selected->emergency_name}}
                </td>
              </tr>
              <tr>
                <td class="font-weight-bold">Emmergency Contact Phone</td>
                <td>
            {{$selected->emergency_phone}}
                </td>
              </tr>
              <tr>
                <td class="font-weight-bold">Emmergency Contact Address</td>
                <td>
            {{$selected->emergency_address}}
                </td>
              </tr>
                @if(Auth::guard('admin')->user()->p_approve==1)
              <tr>
                <td colspan="2" class="text-center">
                  <button type="button" class="btn btn-danger btn-sm delete-id" id="{{$selected->id}}"  data-toggle="modal" data-target=".bd-example-modal-sm" onclick="discharge(this.id)" title="Discharge Row">Discharge Patient</button>
                </td>
              </tr>
            @endif
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
