<div class="table-responsive">
  <table class="table table-hover table-bordered">
    <tbody>
      <tr>
        <td>Joining Date</td>
        <td>{{$selected->joining_date}}</td>
      </tr>
      <tr>
        <td>department</td>
        <td>
          @foreach ($allDepartment as $value)
            @if ($selected->department == $value->id)
              {{ $value->title }}
            @endif
          @endforeach
        </td>
      </tr>
      <tr>
        <td>designation</td>
        <td>
          @foreach ($allDesignation as $value)
            @if ($selected->designation == $value->id)
              {{ $value->title }}
            @endif
          @endforeach
        </td>
      </tr>
      <tr>
        <td>salary</td>
        <td> {{$selected->salary}}</td>
      </tr>
      <tr>
        <td>increment_details</td>
        <td> {{$selected->increment_details}}</td>
      </tr>
      <tr>
        <td>emergency_name</td>
        <td> {{$selected->emergency_name}}</td>
      </tr>
      <tr>
        <td>emergency_phone</td>
        <td> {{$selected->emergency_phone}}</td>
      </tr>
      <tr>
        <td>emergency_address</td>
        <td> {{$selected->emergency_address}}</td>
      </tr>
      <tr>
        <td>bank_name</td>
        <td> {{$selected->bank_name}}</td>
      </tr>
      <tr>
        <td>bank_number</td>
        <td> {{$selected->bank_number}}</td>
      </tr>
      <tr>
        <td>bank_branch</td>
        <td> {{$selected->bank_branch}}</td>
      </tr>
    </tbody>
  </table>
</div>
