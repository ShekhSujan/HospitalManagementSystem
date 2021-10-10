<script type="text/javascript">
$(document).on('click', '.st-id', function () {
    var id = $(this).val();
     var status = $(this).prop('checked') === true ? 0 : 1;
     // alert(status);
    if (id) {
        $.ajax({
            url: '{{ route("backend.users_status") }}',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: 'post',
            data: {id: id,status:status},
            success: function (data) {
                  alert('Are You Sure You Want To Update');
                  var notes = $('#notes').notify({
                      removeIcon: '<i class="icon-close"></i>'
                  });
                  notes.show(data.message, {
                      type: 'success',
                      title: 'Success',
                      icon: '<i class="icon-sentiment_satisfied"></i>'
                  });
                  setTimeout(function () {
                      $(".remove-notify").click();
                  }, 3000);
            }
        });
    }
});
</script>
