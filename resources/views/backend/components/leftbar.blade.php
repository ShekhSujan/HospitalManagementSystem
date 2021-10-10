<nav id="sidebar" class="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="{{route("dashboard")}}" class="logo">
      @foreach($allSetting as $value)
        <img src="{{asset("assets/images/logo/{$value->id}-logo.{$value->logo}")}}" alt="" />
      @endforeach
    </a>
  </div>
  <div class="sidebar-content">
    <div class="sidebar-menu">
      <ul>
        @if(Auth::guard('admin')->user()->role==3)
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="icon-devices_other"></i>
              <span class="menu-text">Users &  Admins</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li><a href="{{route('backend.admins.create')}}">Add New</a></li>
                <li><a href="{{route('backend.admins.index')}}">All users</a></li>
              </ul>
            </div>
          </li>
        @endif
        @if(Auth::guard('admin')->user()->role==3 || Auth::guard('admin')->user()->role==2)
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="icon-devices_other"></i>
              <span class="menu-text">Doctors</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li><a href="{{route('backend.doctor.create')}}">Add New</a></li>
                <li><a href="{{route('backend.doctor.index')}}">All Doctor</a></li>
                <li><a href="{{route('backend.speciality.create')}}">Doctor Speciality</a></li>
                <li><a href="{{route('backend.doctor_report')}}">Doctor Report</a></li>
              </ul>
            </div>
          </li>
        @endif
        <li class="sidebar-dropdown">
          <a href="#">
            <i class="icon-devices_other"></i>
            <span class="menu-text">Patients</span>
          </a>
          <div class="sidebar-submenu">
            <ul>
              <li><a href="{{route('backend.users.create')}}" >New Patient</a></li>
              <li><a href="{{route('backend.admitted_patient')}}" >Admitted Patients</a></li>
              <li><a href="{{route('backend.discharged_patient')}}" >Discharged Patients</a></li>
              <li><a href="{{route('backend.users.index')}}" >All Patients</a></li>
              <li><a href="{{route('backend.create_patient_report')}}" >Patients Report</a></li>
              <li><a href="{{route("backend.ward-bed.create")}}" >Bed Ward</a></li>
            </ul>
          </div>
        </li>
        <li class="sidebar-dropdown">
          <a href="#">
            <i class="icon-devices_other"></i>
            <span class="menu-text">Appointment</span>
          </a>
          <div class="sidebar-submenu">
            <ul>
              <li><a href="{{route('backend.appointment.create')}}" >New Appointment</a></li>
              <li><a href="{{route('backend.appointment.index')}}">All Appointment</a></li>
              <li><a href="{{route('backend.create_appointment_booking_report')}}">Booking Report</a></li>
              <li><a href="{{route('backend.create_appointment_checkup_report')}}">Checkup Report</a></li>

            </ul>
          </div>
        </li>
        <li class="sidebar-dropdown">
          <a href="#">
            <i class="icon-devices_other"></i>
            <span class="menu-text">Pharmacy Management</span>
          </a>
          <div class="sidebar-submenu">
            <ul>
              <li><a href="{{route('backend.pos.create')}}">Pos</a></li>
              <li><a href="{{route('backend.pos.index')}}">Invoice List</a></li>
              <li><a href="{{route('backend.customer.create')}}">Customer List</a></li>
              <li><a href="{{route('backend.medicine.index')}}" >Medicine</a></li>
              <li><a href="{{route('backend.stock.create')}}">Stock</a></li>
              <li><a href="{{route('backend.pos.report')}}">Report</a></li>
            </ul>
          </div>
        </li>
        @if(Auth::guard('admin')->user()->role==3 || Auth::guard('admin')->user()->role==1)
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="icon-devices_other"></i>
              <span class="menu-text">Employee</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li><a href="{{route("backend.employee.create")}}" >New Employee</a></li>
                <li><a href="{{route("backend.employee.index")}}" >All Employee</a></li>
                <li><a href="{{route("backend.education.create")}}" >Education</a></li>
                <li><a href="{{route("backend.department.create")}}" >Department</a></li>
                <li><a href="{{route("backend.designation.create")}}" >Designation</a></li>
                <li><a href="{{route("backend.employee.report")}}" >Report</a></li>
              </ul>
            </div>
          </li>
        @endif
        @if(Auth::guard('admin')->user()->role==3)
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="icon-devices_other"></i>
              <span class="menu-text">Payment Report</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li><a href="{{route('backend.create_patient_payment_report')}}">Patient Payment</a></li>
                <li><a href="{{route('backend.create_appointment_payment_report')}}">Appointment Payment</a></li>
              </ul>
            </div>
          </li>
        @endif
        <li class="sidebar-dropdown">
          <a href="#">
            <i class="icon-devices_other"></i>
            <span class="menu-text">Extra</span>
          </a>
          <div class="sidebar-submenu">
            <ul>
              @if(Auth::guard('admin')->user()->role==3)
                <li><a href="{{route('backend.setting.edit',1)}}">Settings</a></li>
              @endif
              <li><a href="{{route('backend.cache')}}">Cache Clear</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>
