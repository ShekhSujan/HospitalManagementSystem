
<script type="text/javascript">
$(document).ready(function(){
  $('.addcart').on('click',function(){
    var id=$(this).data('id');
    var ids=$(this).val();
    // alert(id)
    // alert(ids)
    var qty
    $(".quantity").each(function(){
      if(ids==id){
        qty=$(this).val()
      }
    });
  //  alert(qty)
    if(id){
      $.ajax({
        url:"{{url('/dashboard/cart/add/')}}/"+id,
        data: {"qty": qty},
        type:"GET",
        dataType:"json",
        success:function(data){
          $('#item').load(location.href + ' #item')
        },
      });
    }else{
      alert('Some Error Occurs')
    }
  });
});
</script>

{{-- //##############################DeleteCart############################## --}}
<script type="text/javascript">
$(document).ready(function(){
  $(document).on('click','.removecart', function(){
    // var id=$('#remove').val();
    var id=$(this).data('id');
    //alert(id)
    if(id){
      $.ajax({
        url:"{{url('/dashboard/cart/remove/')}}/"+id,
        type:"GET",
        dataType:"json",
        success:function(data){
          // console.log(data);
          $('#item').load(location.href + ' #item');
        },
      });
    }else{
      alert('Some Error Occurs')
    }
  });
});
</script>
{{-- //###############################UpdateCart############################## --}}
<script type="text/javascript">
$(document).ready(function(){
  $(document).on('click','.updatecart', function(e){
    var id=$(this).data('id');
    var qty
    $(".quantity").each(function(){
      if($(this).attr("data-id")==id){
        qty=$(this).val()
      }
    });
    if(id){
      $.ajax({
        url:"{{url('/dashboard/cart/update/')}}/"+id,
        data: {"qty": qty},
        type:"GET",
        dataType:"json",
        success:function(data){
          $('#item').load(location.href + ' #item');
        },
      });
    }else{
      alert('Some Error Occurs')
    }
  });
});

</script>
