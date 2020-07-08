
<script>
$(document).ready(function(){
	@foreach(App\category::all() as $cat)
     $("#cat{{$cat->id}}").click(function(){
	   var cat = $("#cat{{$cat->id}}").val();
		$.ajax({
         type:'get',
         dataType:'html',
         url:'{{url('productCat')}}',
         data:'category_id='+ cat,
         success:function(response){
         	console.log(response);
         	$("#productData").html(response);
         }

		});
	});
     @endforeach
});
</script>
{{-- <div id="div1"><h2>Let jQuery AJAX Change This Text</h2></div> --}}