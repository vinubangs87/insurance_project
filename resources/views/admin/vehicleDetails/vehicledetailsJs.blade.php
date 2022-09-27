<script type="text/javascript">
	
// Show product name dependent field based on product type
$('#producttype_id').on('change', function() {
	var product_type_id = $(this).val();
	$.ajax({
	url: "{{ route('dependent.projectName')}}",
	type: "POST",
	data: {
	    product_type_id: product_type_id,
	    _token: '{{csrf_token()}}'
	},
	dataType: "json",
	success:function(data) {
		$('#procuctname_id').empty();
			$('#procuctname_id').append('<option value="">Select any one</option>');
		if(data.status == 'success'){
	    $.each(data.data, function(key, value) {
	        $('#procuctname_id').append('<option value="'+key+'">'+value+'</option>');
	    });
		}
	}
	});
});
</script>