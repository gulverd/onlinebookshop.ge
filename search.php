
<script type="text/javascript">
	
	$(document).ready(function(){
		$('#search_input').keyup(function(){
			
			var key = $('#search_input').val();

			$('.search_tool_wrapper').show();

			$.ajax({
				type: "POST",
	            url: "ajax.php",
	            data: "key="+key,
	            success: function (response) {
	                $(".search_tool_wrapper").html(response);
	            }
	        });

			if(key == ''){
				$('.search_tool_wrapper').hide();
			}
		});
	});
</script>