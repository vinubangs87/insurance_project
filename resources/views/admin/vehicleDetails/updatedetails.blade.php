@extends('layouts.adminapp')
@section('content')

<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Vehicle update detail form</h3>
			</div>
		</div>
		<div class="clearfix"></div>
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
									<h2>Please update the details <small style="color:red;">(* Means mandatory field)</small></h2>									
									<div class="clearfix"></div>
								</div>
									<form class="form-label-left" action="{{ route('vehicledetails.update', $vehicledetail->id) }}" method="post">
										@csrf
										{{ method_field('PUT') }}
										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<label for="inputSuccess2">Insurance company <span class="required">*</span></label>
											<select id="insuranceCompany_id" class="form-control" name="insuranceCompany_id">
												<option value="">Choose..</option>
												@foreach($insurancecompany as $insurancecompany)
												<option value="{{ $insurancecompany->id }}" {{ $vehicledetail->insuranceCompany_id == $insurancecompany->id ? 'selected' : '' }}>{{ $insurancecompany->title }}</option>
												@endforeach
											</select>
											<small class="text-danger">
		                    {{ $errors->first('insuranceCompany_id',':message') }}
		                  </small>
										</div>

										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<label for="inputSuccess2">Product type <span class="required">*</span></label>
											<select id="producttype_id" class="form-control" name="producttype_id">
												<option value="">Choose..</option>
												@foreach($producttype as $producttype)
												<option value="{{ $producttype->id }}" {{ $vehicledetail->producttype_id == $producttype->id ? 'selected' : '' }}>{{ $producttype->title }}</option>
												@endforeach
											</select>
											<small class="text-danger">
		                    {{ $errors->first('producttype_id',':message') }}
		                  </small>
										</div>

										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<label for="inputSuccess2">Product name <span class="required">*</span></label>
											<select id="procuctname_id" class="form-control" name="procuctname_id">
												<option value="">Choose..</option>
												@foreach($procuctname as $procuctname)
												<option value="{{ $procuctname->id }}" {{ $vehicledetail->procuctname_id == $procuctname->id ? 'selected' : '' }}>{{ $procuctname->title }}</option>
												@endforeach
											</select>
											<small class="text-danger">
		                    {{ $errors->first('procuctname_id',':message') }}
		                  </small>
										</div>

										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<label for="inputSuccess2">Engine type <span class="required">*</span></label>
											<select id="enginetype_id" class="form-control" name="enginetype_id">
												<option value="">Choose..</option>
												@foreach($enginetype as $enginetype)
												<option value="{{ $enginetype->id }}" {{ $vehicledetail->enginetype_id == $enginetype->id ? 'selected' : '' }}>{{ $enginetype->title }}</option>
												@endforeach
											</select>
											<small class="text-danger">
		                    {{ $errors->first('enginetype_id',':message') }}
		                  </small>
										</div>

										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<label for="inputSuccess2">Permit type <span class="required">*</span></label>
											<select id="permittype_id" class="form-control" name="permittype_id">
												<option value="">Choose..</option>
												@foreach($permittype as $permittype)
												<option value="{{ $permittype->id }}" {{ $vehicledetail->permittype_id == $permittype->id ? 'selected' : '' }}>{{ $permittype->title }}</option>
												@endforeach
											</select>
											<small class="text-danger">
		                    {{ $errors->first('permittype_id',':message') }}
		                  </small>
										</div>

										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<label for="inputSuccess2">Customer name <span class="required">*</span></label>
											<input type="text" class="form-control" id="customer_name" name="customer_name" value="{{ $vehicledetail->customer_name }}" />
											<small class="text-danger">
		                    {{ $errors->first('customer_name',':message') }}
		                  </small>
										</div>

										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<label for="inputSuccess2">Customer mobile <span class="required">*</span></label>
											<input type="text" class="form-control" id="customer_mobile" name="customer_mobile" value="{{ $vehicledetail->customer_mobile }}" />
											<small class="text-danger">
		                    {{ $errors->first('customer_mobile',':message') }}
		                  </small>
										</div>

										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<label for="inputSuccess2">Customer email</label>
											<input type="text" class="form-control" id="customer_email" name="customer_email" value="{{ $vehicledetail->customer_email }}" />
											<small class="text-danger">
		                    {{ $errors->first('customer_email',':message') }}
		                  </small>
										</div>

										<div class="col-md-12 col-sm-12  form-group has-feedback">
											<label for="inputSuccess2">Customer address <span class="required">*</span></label>
											<textarea class="form-control" id="customer_address" name="customer_address">{{ $vehicledetail->customer_address }}</textarea>
											<small class="text-danger">
		                    {{ $errors->first('customer_address',':message') }}
		                  </small>
										</div>

										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<label for="inputSuccess2">Vehicle number <span class="required">*</span></label>
											<input type="text" class="form-control" id="vehicle_number" name="vehicle_number" value="{{ $vehicledetail->vehicle_number }}" />
											<small class="text-danger">
		                    {{ $errors->first('vehicle_number',':message') }}
		                  </small>
										</div>

										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<label for="inputSuccess2">Registration number <span class="required">*</span></label>
											<input type="text" class="form-control" id="registration_number" name="registration_number" value="{{ $vehicledetail->registration_number }}" />
											<small class="text-danger">
		                    {{ $errors->first('registration_number',':message') }}
		                  </small>
										</div>

										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<label for="inputSuccess2">Registration date <span class="required">*</span></label>
											<input type="date" class="form-control" id="registration_date" name="registration_date" value="{{ $vehicledetail->registration_date }}" />
											<small class="text-danger">
		                    {{ $errors->first('registration_date',':message') }}
		                  </small>
										</div>

										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<label for="inputSuccess2">Registration Expiry date <span class="required">*</span></label>
											<input type="date" class="form-control" id="expiry_date" name="expiry_date" value="{{ $vehicledetail->expiry_date }}" />
											<small class="text-danger">
		                    {{ $errors->first('expiry_date',':message') }}
		                  </small>
										</div>

										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<label for="inputSuccess2">Insurance expiry date <span class="required">*</span></label>
											<input type="date" class="form-control" id="insurance_expiry_date" name="insurance_expiry_date" value="{{ $vehicledetail->insurance_expiry_date }}" />
											<small class="text-danger">
		                    {{ $errors->first('insurance_expiry_date',':message') }}
		                  </small>
										</div>

										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<label for="inputSuccess2">Fitness expiry date <span class="required">*</span></label>
											<input type="date" class="form-control" id="fitness_expiry_date" name="fitness_expiry_date" value="{{ $vehicledetail->fitness_expiry_date }}" />
											<small class="text-danger">
		                    {{ $errors->first('fitness_expiry_date',':message') }}
		                  </small>
										</div>

										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<label for="inputSuccess2">MV tax expiry date <span class="required">*</span></label>
											<input type="date" class="form-control" id="mv_tax_expiry_date" name="mv_tax_expiry_date" value="{{ $vehicledetail->mv_tax_expiry_date }}" />
											<small class="text-danger">
		                    {{ $errors->first('mv_tax_expiry_date',':message') }}
		                  </small>
										</div>

										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<label for="inputSuccess2">PUCC expiry date <span class="required">*</span></label>
											<input type="date" class="form-control" id="pucc_expiry_date" name="pucc_expiry_date" value="{{ $vehicledetail->pucc_expiry_date }}" />
											<small class="text-danger">
		                    {{ $errors->first('pucc_expiry_date',':message') }}
		                  </small>
										</div>

										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<label for="inputSuccess2">Finance <span class="required">*</span></label>
											<select id="finance_type" class="form-control" name="finance_type">
												<option value="">Choose..</option>
												<option value="1" {{ $vehicledetail->finance_type == 1 ? 'selected' : '' }}>Yes</option>
												<option value="0" {{ $vehicledetail->finance_type == 0 ? 'selected' : '' }}>no</option>
											</select>
											<small class="text-danger">
		                    {{ $errors->first('finance_type',':message') }}
		                  </small>
										</div>

										<div class="col-md-6 col-sm-6  form-group has-feedback" id="financecompany_div" style="display: none;">
											<label for="inputSuccess2">Finance company <span class="required">*</span></label>
		                  <select id="financecompany_id" class="form-control" name="financecompany_id">
												<option value="">Choose..</option>
												@foreach($financecompany as $financecompany)
												<option value="{{ $financecompany->id }}" {{ $vehicledetail->financecompany_id == $financecompany->id ? 'selected' : '' }}>{{ $financecompany->title }}</option>
												@endforeach
											</select>
											<small class="text-danger">
		                    {{ $errors->first('financecompany_id',':message') }}
		                  </small>

										</div>

										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<label for="inputSuccess2">Permit number <span class="required">*</span></label>
											<input type="text" class="form-control" id="permit_number" name="permit_number" value="{{ $vehicledetail->permit_number }}" />
											<small class="text-danger">
		                    {{ $errors->first('permit_number',':message') }}
		                  </small>
										</div>

										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<label for="inputSuccess2">Permit valid upto <span class="required">*</span></label>
											<input type="date" class="form-control" id="permit_valid_upto_date" name="permit_valid_upto_date" value="{{ $vehicledetail->permit_valid_upto_date }}" />
											<small class="text-danger">
		                    {{ $errors->first('permit_valid_upto_date',':message') }}
		                  </small>
										</div>

										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<label for="inputSuccess2">Policy number <span class="required">*</span></label>
											<input type="text" class="form-control" id="policy_number" name="policy_number" value="{{ $vehicledetail->policy_number }}" />
											<small class="text-danger">
		                    {{ $errors->first('policy_number',':message') }}
		                  </small>
										</div>

										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<label for="inputSuccess2">Renewal premium</label>
											<input type="text" class="form-control" id="renewal_premium" name="renewal_premium" value="{{ $vehicledetail->renewal_premium }}" />
											<small class="text-danger">
		                    {{ $errors->first('renewal_premium',':message') }}
		                  </small>
										</div>

										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<label for="inputSuccess2">Engine number</label>
											<input type="text" class="form-control" id="engine_number" name="engine_number" value="{{ $vehicledetail->engine_number }}" />
											<small class="text-danger">
		                    {{ $errors->first('engine_number',':message') }}
		                  </small>
										</div>

										<div class="col-md-6 col-sm-6  form-group has-feedback">
											<label for="inputSuccess2">Chasis number</label>
											<input type="text" class="form-control" id="chasis_number" name="chasis_number" value="{{ $vehicledetail->chasis_number }}" />
											<small class="text-danger">
		                    {{ $errors->first('chasis_number',':message') }}
		                  </small>
										</div>

										<div class="ln_solid"></div>
											<div class="col-md-12 col-sm-12  offset-md-3">
												<button type="submit" class="btn btn-success">Update</button>
											</div>

									</form>
							</div>

						</div>

					</div>
	</div>
</div>        
@endsection

@push('pagespecificjs')
<script>
$(document).ready(function(){
    $('#finance_type').on('change', function(){
		var finance_type = $(this).val(); 
		if(finance_type== 1)
		{
        $("#financecompany_div").show();
      	}
      	else
      	{
        $("#financecompany_div").hide();
      	}
    });

    var f_val = $( "#finance_type option:selected" ).val();
		if(f_val== 1)
		{
        $("#financecompany_div").show();
      	}
      	else
      	{
        $("#financecompany_div").hide();
      	}
});
</script>
@endpush