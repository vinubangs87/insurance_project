<script type="text/javascript">
	
// Show broker name dependent field based on insurance company
$('#insuranceCompany_id').on('change', function() {
	var insuranceCompany_id = $(this).val();
	$.ajax({
	url: "{{ route('dependent.brokerName')}}",
	type: "POST",
	data: {
	    insuranceCompany_id: insuranceCompany_id,
	    _token: '{{csrf_token()}}'
	},
	dataType: "json",
	success:function(data) {
		$('#broker_id').empty();
			$('#broker_id').append('<option value="">Select any one</option>');
		if(data.status == 'success'){
	    $.each(data.data, function(key, value) {
	        $('#broker_id').append('<option value="'+key+'">'+value+'</option>');
	    });
		}
	}
	});
});
</script>