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
									<form class="form-label-left" action="" method="post">
										@csrf
										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<label for="inputSuccess2">Total Insurance amount</label>
											<input type="text" class="form-control" id="renewal_premium" value="{{ $vehicledetail->insurance_amount }}" readonly />	
											<input type="hidden" class="form-control" id="vehicledetail_id" value="{{ $vehicledetail->id }}" readonly />											
										</div>
										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<label for="inputSuccess2">Payment type</label><br>
											@if($paymentsettlementsDetails->is_payment_settled == 1 && $paymentsettlementsDetails->payment_type == 1 )
											<div class="col-md-6 col-sm-6  form-group has-feedback">
												<label for="f-option" class="l-radio">
												   <strong>Payment type: </strong>Full payment<br/>
												   <strong>Payment date: </strong>{{ \Carbon\Carbon::parse($paymentsettlementsDetails->payment_settled_date)->format('d/m/Y') }}<br/>
												   <a href="{{ route('resetRecords.reset',['id' => $paymentsettlementsDetails->id]) }}" class="btn btn-danger btn-sm" style="color:white;" onclick="return confirm('Are you sure want to delete?')">Delete this payment type?</a>
												 </label>
											</div>
											@elseif($paymentsettlementsDetails->is_payment_settled == 1 && $paymentsettlementsDetails->payment_type == 0)
											<div class="col-md-3 col-sm-3  form-group has-feedback">
												 <label for="s-option" class="l-radio">
												     <input type="radio" id="full_payment" name="payment_type" value="0" tabindex="2">
												     <span>Partial payment1</span>
												  </label>	
											</div>
											@else
											<div class="col-md-3 col-sm-3  form-group has-feedback">
												<label for="f-option" class="l-radio">
												   <input type="radio" id="full_payment" name="payment_type" value="1" tabindex="1">
												   <span>Full payment3</span>
												 </label>
											</div>
											<div class="col-md-3 col-sm-3  form-group has-feedback">
												 <label for="s-option" class="l-radio">
												     <input type="radio" id="full_payment" name="payment_type" value="0" tabindex="2">
												     <span>Partial payment3</span>
												  </label>	
											</div>	
											@endif		
										</div>

										<div class="ln_solid"></div>
											<div class="col-md-12 col-sm-12  offset-md-3">
												<button type="submit" class="btn btn-success">Submit</button>
											</div>

									</form>
							</div>

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
      $('input[type="radio"]').click(function(){  
 	if (confirm('Are you sure you want to full payment?')) {
           var payment_type = $(this).val();  
           var vehicledetail_id = $('#vehicledetail_id').val();  
           var insurance_amount = "{{ $vehicledetail->insurance_amount }}";
           var paymentsettlementsDetails_id = "{{ $paymentsettlementsDetails->id }}";
           if(payment_type == 1){
           $.ajax({
           	url: "{{ route('add.fullPaymentType')}}",
           	type: "POST",
           	data: {
           	    payment_type: payment_type,
           	    vehicledetail_id: vehicledetail_id,
           	    insurance_amount: insurance_amount,
           	    paymentsettlementsDetails_id: paymentsettlementsDetails_id,
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
 });  
</script>
@endpush