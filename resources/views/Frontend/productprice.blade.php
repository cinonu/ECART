<script>
    $(document).ready(function(){
    	// alert("hello");
      $("#selsize").change(function(){
         var idsize = $(this).val();
         $.ajax({
         type:'get',
         dataType:'html',
         url:'{{url('productprice')}}',
         data:{idsize:idsize},
         success:function(response){
          
         	console.log(response);
         	$("#productprice").html("INR" + response);
         }

		});
      });
    });
</script>
