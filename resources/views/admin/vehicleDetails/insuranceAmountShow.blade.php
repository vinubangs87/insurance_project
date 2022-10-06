	@extends('layouts.adminapp')
	@section('content')

	<!-- page content -->
	<div class="right_col" role="main">
		<div class="">
			<div class="page-title">
				<div class="title_left">
					<h3>Insurance amount history</h3>
				</div>
			</div>
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12">
					<div class="x_panel">
						<div class="x_title">
							<h2>Vehicle detail </h2> <span>&nbsp;</span><a href="{{ route('vehicledetails.show', $vehicledetail->id) }}" class="btn btn-primary" target="_BLANK">View this customer</a>

							<div class="clearfix"></div>
						</div>
						<div class="x_content">

							<section class="content invoice">
								<!-- info row -->
								<div class="row invoice-info">
									<div class="col-sm-4 invoice-col">
										<address>
											<strong>Owner Name: </strong>{{ $vehicledetail->customer_name }}
											<br/>
											<strong>Mobile: </strong>{{ $vehicledetail->customer_mobile }}
											<br/>
											<strong>Email: </strong>{{ $vehicledetail->customer_email }}
										</address>
									</div>
									<!-- /.col -->
									<div class="col-sm-4 invoice-col">
										<address>
											<strong>Vehicle/Registration number: </strong>{{ $vehicledetail->vehicle_number }}
											<br/>
											<strong>Address: </strong>
											{{ $vehicledetail->customer_address }}
										</address>
									</div>
									<!-- /.col -->

									<!-- /.col -->
								</div>
								<hr/>
								<!-- /.row -->
								<div class="row">
									<div class="col-md-12 ">
										@if(session()->has('message'))            
										<div class='alert alert-success'>
											<button class='close' data-dismiss='alert'>×</button>
											<strong>{{session()->get('message')}} </strong>
										</div>
										@endif
										<div class="x_panel">
											<div class="x_title">
												<h2>Please fill insurance details <small style="color:red;">(* Means mandatory field)</small></h2>									
												<div class="clearfix"></div>
											</div>
											<div class="col-md-3 col-sm-3  form-group has-feedback">
												<label for="inputSuccess2">Total Insurance amount</label>
												<input type="text" class="form-control" id="vehicle_insurance_amount" name="vehicle_insurance_amount" value="{{ $vehicledetail->insurance_amount }}" />	
												<input type="hidden" class="form-control" id="vehicledetail_id" value="{{ $vehicledetail->id }}" readonly />											
												<input type="hidden" class="form-control" id="payment_type_update" value="{{ $paymentsettlementsDetails->payment_type }}" readonly />											
											</div>
											<div class="col-md-3 col-sm-3  form-group has-feedback">
												<label for="inputSuccess2" style="visibility:hidden">Total Insurance amount</label>
												
												<button type="button" class="btn btn-success form-control" id="insurance_amount_update">Update</button>						
											</div>
											<div class="col-md-6 col-sm-6  form-group has-feedback">
												<label for="inputSuccess2">Payment type: </label><br>
												@if($paymentsettlementsDetails->is_payment_settled == '1' && $paymentsettlementsDetails->payment_type == '1' )
												<div class="col-md-6 col-sm-6  form-group has-feedback">
													<label for="f-option" class="l-radio">
														<strong>Payment type: </strong>Full payment<br/>
														<strong>Payment date: </strong>{{ \Carbon\Carbon::parse($paymentsettlementsDetails->payment_settled_date)->format('d/m/Y') }}<br/>
														<a href="{{ route('resetRecords.reset',['id' => $paymentsettlementsDetails->id]) }}" class="btn btn-danger btn-sm" style="color:white;" onclick="return confirm('Are you sure want to delete?')">Delete this payment type?</a>
													</label>
												</div>
												@elseif($paymentsettlementsDetails->payment_type == '0')
												<div class="col-md-6 col-sm-6  form-group has-feedback">
													<label for="s-option" class="l-radio">
														<span class="red"><h4>Partial payment</h4></span>
													</label><br/>	

													<a href="{{ route('settlementPartialType.settle',['id' => $paymentsettlementsDetails->id]) }}" id="settle_payme_id" class="btn btn-primary btn-sm" style="color:white;" onclick="return confirm('Are you sure want to settle this payment?')">Settle/complete this payment.</a>

														<a href="{{ route('settlementPartialType.reset',['paymentsettlementsDetails_id' => $paymentsettlementsDetails->id,'vehicledetail_id' => $vehicledetail->id,'insurance_amount' => $vehicledetail->insurance_amount]) }}" class="btn btn-danger btn-sm" style="color:white;" onclick="return confirm('Are you sure want to delete?')">Delete this payment type?</a>
												</div>
												@else
												<div class="col-md-3 col-sm-3  form-group has-feedback">
													<label for="f-option" class="l-radio">
														<input type="radio" id="full_payment" name="payment_type" value="1" tabindex="1">
														<span>Full payment</span>
													</label>
												</div>
												<div class="col-md-3 col-sm-3  form-group has-feedback">
													<label for="s-option" class="l-radio">
														<input type="radio" id="partial_payment" name="payment_type" value="0" tabindex="2">
														<span>Partial payment</span>
													</label>	
												</div>	
												@endif		
											</div>
										</div>



										<form class="form-label-left" id="fullPaymentType" style="display:none;">	
											<div class="col-md-3 col-sm-3  form-group has-feedback">
												<label for="inputSuccess2">Full amount date <span class="required">*</span></label>
												<input type="text" class="form-control datetype" id="full_amount_date" name="full_amount_date" value="{{ old('full_amount_date') }}" required />
												<small class="text-danger">
													{{ $errors->first('full_amount_date',':message') }}
												</small>											
											</div>
											<div class="col-md-3 col-sm-3  form-group has-feedback">
												<label for="inputSuccess2" style="visibility:hidden">Full amount date</label>
												<button type="button" class="btn btn-success form-control" id="fullPaymentType_submit">Submit</button>
											</div>	

										</form>

										<div class="row" id="partial_paymet_details" style="display:none;">
											<div class="col-sm-12">
												<h4 class="red">Details of partial payment: </h4>
												<div class="card-box table-responsive">
													<table class="table table-striped table-bordered" style="width:100%">
														<thead>
															<tr>
																<th>Advance amount</th>
																<th>Intrest rate</th>
																<th>Intrest amount</th>
																<th>Remaining amount without intrest</th>
																<th>Remaining amount with intrest</th>
																<th>Advance amount date</th>
															</tr>
														</thead>

														<tbody>
															@foreach($insuranceAmountHisstoryDetails as $insuranceAmountHisstoryDetails)
                        <tr>
                          <td>{{ $insuranceAmountHisstoryDetails->advance_amount }}</td>
                          <td>{{ $insuranceAmountHisstoryDetails->intrest_rate }}</td>
                          <td>{{ $insuranceAmountHisstoryDetails->intrest_amount }}</td>
                          <td>{{ $insuranceAmountHisstoryDetails->remaining_amount_without_intrest }}</td>
                          <td>{{ $insuranceAmountHisstoryDetails->remaining_amount_with_intrest }}</td>
                          <td>{{ \Carbon\Carbon::parse($insuranceAmountHisstoryDetails->advance_amount_date)->format('d/m/Y') }}</td>
                        </tr>
                      	@endforeach
														</tbody>
													</table>
												</div>
											</div>
										</div>

										<form class="form-label-left" action="{{ route('add.partialPaymentType') }}" method="post"  id="partialPaymentType" style="display:none;">

											<h4 class="red">Fill partial payment: </h4>
											@csrf	
											<input type="hidden" class="form-control" id="vehicledetail_id" name="vehicledetail_id" value="{{ $vehicledetail->id }}" readonly />
											<input type="hidden" class="form-control" id="paymentsettlementsDetails_id" name="paymentsettlementsDetails_id" value="{{ $paymentsettlementsDetails->id }}" readonly />
											<input type="hidden" class="form-control" id="total_amount_with_intrest" name="total_amount_with_intrest" value="{{ $paymentsettlementsDetails->total_amount_with_intrest }}" readonly />

											<div class="col-md-3 col-sm-3  form-group has-feedback">
												<label for="inputSuccess2">Total payable amount with intrest</label>
												<input type="text" class="form-control"  value="{{ $paymentsettlementsDetails->total_amount_with_intrest }}" readonly disabled />									
											</div>

											<div class="col-md-3 col-sm-3  form-group has-feedback">
												<label for="inputSuccess2">Advance amount <span class="required">*</span></label>
												<input type="text" class="form-control" id="advance_amount" name="advance_amount" value="{{ old('advance_amount') }}" required />
												<small class="text-danger">
													{{ $errors->first('advance_amount',':message') }}
												</small>											
											</div>								
											<div class="col-md-3 col-sm-3  form-group has-feedback">
												<label for="inputSuccess2">Intrest rate <span class="required">*</span></label>
												<input type="text" class="form-control" id="intrest_rate" name="intrest_rate" value="{{ old('intrest_rate') }}" required />
												<small class="text-danger">
													{{ $errors->first('intrest_rate',':message') }}
												</small>											
											</div>							
											<div class="col-md-3 col-sm-3  form-group has-feedback">
												<label for="inputSuccess2" style="visibility: hidden;">Check amount</label>
												<button type="button" id="check_amount" class="btn btn-danger form-control">Check amount</button>									
											</div>

											<div class="col-md-3 col-sm-3  form-group has-feedback">
												<label for="inputSuccess2">Intrest amount</label>
												<input type="text" class="form-control" id="intrest_amount" name="intrest_amount" value="{{ old('intrest_amount') }}" readonly required />	
												<small class="text-danger">
													{{ $errors->first('intrest_amount',':message') }}
												</small>								
											</div>									
											<div class="col-md-3 col-sm-3  form-group has-feedback">
												<label for="inputSuccess2">Remaining amount without intrest</label>
												<input type="text" class="form-control" id="remaining_amount_without_intrest" name="remaining_amount_without_intrest" value="{{ old('remaining_amount_without_intrest') }}" readonly required  />
												<small class="text-danger">
													{{ $errors->first('remaining_amount_without_intrest',':message') }}
												</small>											
											</div>							
											<div class="col-md-3 col-sm-3  form-group has-feedback">
												<label for="inputSuccess2">Remaining amount with intrest</label>
												<input type="text" class="form-control" id="remaining_amount_with_intrest" name="remaining_amount_with_intrest" value="{{ old('remaining_amount_with_intrest') }}" name="remaining_amount_with_intrest" readonly required />
												<small class="text-danger">
													{{ $errors->first('remaining_amount_with_intrest',':message') }}
												</small>											
											</div>							
											<div class="col-md-3 col-sm-3  form-group has-feedback">
												<label for="inputSuccess2">Advance amount date <span class="required">*</span></label>
												<input type="text" class="form-control datetype" id="advance_amount_date" name="advance_amount_date" value="{{ old('advance_amount_date') }}" required />
												<small class="text-danger">
													{{ $errors->first('advance_amount_date',':message') }}
												</small>											
											</div>

											<div class="ln_solid"></div>
											<div class="col-md-12 col-sm-12  offset-md-3">
												<button type="submit" class="btn btn-success">Submit</button>
											</div>

										</form>

									</div>

								</div>


								<!-- /.col -->
							</div>
							<hr/>
							<!-- /.row -->

						</section>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>        
@endsection
@push('pagespecificjs')
<script>
	$(document).ready(function(){  

		var payment_type_for_show_hide = "{{ $paymentsettlementsDetails->payment_type }}";  
		var is_payment_settled_show_hide = "{{ $paymentsettlementsDetails->is_payment_settled }}";  
		console.log('rr==> '+payment_type_for_show_hide);
		if(is_payment_settled_show_hide == '1' && payment_type_for_show_hide == '1'){
			$('#fullPaymentType').hide();
			$('#partialPaymentType').hide(); 
			$('#partial_paymet_details').hide();  
			$('#settle_payme_id').hide();  
		}
		if(is_payment_settled_show_hide == '1' && payment_type_for_show_hide == '0'){
			$('#fullPaymentType').hide();
			$('#partialPaymentType').hide(); 
			$('#settle_payme_id').hide(); 
			$('#partial_paymet_details').show();  
		}
		if(payment_type_for_show_hide == '0' && (is_payment_settled_show_hide == '0' || is_payment_settled_show_hide == 0)){
			$('#fullPaymentType').hide();
			$('#partialPaymentType').show();
			$('#partial_paymet_details').show();
		}

		$('#full_payment').click(function(){ 
			$('#partialPaymentType').hide(); 
			$('#partial_paymet_details').hide();     	
			$('#fullPaymentType').show();
		}); 

		$('#fullPaymentType_submit').on("click",function() {  
			let full_amount_date = $('#full_amount_date').val();
			if(full_amount_date == ''){
				alert('Full amount date field is required');
				return false;
			}
			if (confirm('Are you sure you want to full payment?')) {
				var payment_type = '1';  
				var vehicledetail_id = $('#vehicledetail_id').val();  
				var insurance_amount = "{{ $vehicledetail->insurance_amount }}";
				var paymentsettlementsDetails_id = "{{ $paymentsettlementsDetails->id }}";
				if(payment_type == '1'){
					$.ajax({
						url: "{{ route('add.fullPaymentType')}}",
						type: "POST",
						data: {
							payment_type: payment_type,
							vehicledetail_id: vehicledetail_id,
							insurance_amount: insurance_amount,
							paymentsettlementsDetails_id: paymentsettlementsDetails_id,
							full_amount_date: full_amount_date,
							_token: '{{csrf_token()}}'
						},
						dataType: "json",
						success:function(data) {
							if(data.status == 'success'){
								alert('Updated successfully.');
								window.location = "{{ route('insurance.amount.show', $vehicledetail->id) }}";
							}
						}
					});
				}
				else{

				} 
			}
		});  

	      // for partial payment

	      $('#partial_payment').click(function(){ 
	      	$('#fullPaymentType').hide();
	      	$('#partialPaymentType').show();
			$('#partial_paymet_details').hide();

	      });

	      $('#check_amount').click(function(){ 
	      	var total_amount_with_intrest = "{{ $paymentsettlementsDetails->total_amount_with_intrest }}";  
	      	var advance_amount = $('#advance_amount').val();   
	      	var intrest_rate = $('#intrest_rate').val(); 

	      	if(advance_amount == ''){
	      		alert('Advance amount cannot blank.');
	      		return false;
	      	}
	      	else if(intrest_rate == ''){
	      		alert('Intrest rate cannot blank.');
	      		return false;
	      	}
	      	let remaining_amount_without_intrest = total_amount_with_intrest - advance_amount;
	      	$('#remaining_amount_without_intrest').val(remaining_amount_without_intrest);

	      	let intrest_amount = remaining_amount_without_intrest*(intrest_rate/100);
	      	$('#intrest_amount').val(intrest_amount);
	      	let remaining_amount_with_intrest = remaining_amount_without_intrest + intrest_amount;
	      	$('#remaining_amount_with_intrest').val(remaining_amount_with_intrest);

	      }); 

	      // update insurance amount
	      $('#insurance_amount_update').on("click",function() {  
			let vehicle_insurance_amount = $('#vehicle_insurance_amount').val();
			let vehicledetail_id_update = "{{ $vehicledetail->id }}";
			let payment_type_update = "{{ $paymentsettlementsDetails->payment_type }}";

			if(vehicle_insurance_amount == ''){
				alert('Insurance amount field is required');
				return false;
			}
			if(payment_type_update == '1' || payment_type_update == '0'){
				alert('Please delete existing payment type.');
				return false;
			}

			if (confirm('Are you sure you want to update insurance amount?')) {
					$.ajax({
						url: "{{ route('update.insuranceAmount')}}",
						type: "POST",
						data: {
							vehicle_insurance_amount: vehicle_insurance_amount,
							vehicledetail_id_update: vehicledetail_id_update,
							_token: '{{csrf_token()}}'
						},
						dataType: "json",
						success:function(data) {
							console.log(data);
							if(data.status == 'success'){
								alert('Updated successfully.');
								window.location = "{{ route('insurance.amount.show', $vehicledetail->id) }}";
							}
							if(data.status == 'failed'){
								alert(data.message);
							}
						}
					});
			}
		});  


	  });  
	</script>
	@endpush