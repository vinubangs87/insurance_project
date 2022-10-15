@extends('layouts.adminapp')
@section('content')

@include('admin.commonForm.routenames')

<!-- This is a common form used for all Master menu  -->
<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>{{ $title }}</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 ">

				@if(session()->has('message'))            
            <div class='alert alert-success'>
                 <button class='close' data-dismiss='alert'>×</button>
                 <strong>{{session()->get('message')}} </strong>
            </div>
        @endif
        @if(session()->has('warning'))            
            <div class='alert alert-danger'>
                 <button class='close' data-dismiss='alert'>×</button>
                 <strong>{{session()->get('warning')}} </strong>
            </div>
        @endif

				@if(isset($dataforshow))
				<!-- Start form fill -->
				<div class="x_panel">
					<div class="x_title">
						<h2>{{ $formtype }} <small style="color:red;">(* Means mandatory field)</small></h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<br />						
						<form  action="{{ route(routeName) }}" method="post" data-parsley-validate class="form-horizontal form-label-left">
							@csrf

							@if(isset($producttype)) {{-- Comming from ProductNameController --}}
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Product type <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<select id="producttypes_id" class="form-control" name="producttypes_id">
										<option value="">Choose..</option>
										@foreach($producttype as $producttype)
											<option value="{{ $producttype->id }}">{{ $producttype->title }}</option>
										@endforeach
									</select>
									<small class="text-danger">
                    {{ $errors->first('producttypes_id',':message') }}
                  </small>
								</div>
							</div>
							@endif

							{{-- @if(isset($insuranceCompany))
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Insurance company<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<select id="insurance_companies_id" class="form-control" name="insurance_companies_id">
										<option value="">Choose..</option>
										@foreach($insuranceCompany as $insuranceCompany)
											<option value="{{ $insuranceCompany->id }}">{{ $insuranceCompany->title }}</option>
										@endforeach
									</select>
									<small class="text-danger">
                    {{ $errors->first('insurance_companies_id',':message') }}
                  </small>
								</div>
							</div>
							@endif --}}

							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="title">{{ $inputName }} <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" id="title" class="form-control" name="title" value="{{ old('title') }}">
									<small class="text-danger">
		                              {{ $errors->first('title',':message') }}
		                            </small>
								</div>
							</div>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Status <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<select id="heard" class="form-control" name="status">
										<option value="">Choose..</option>
										<option value="1">Active</option>
										<option value="0">Inactive</option>
									</select>
									<small class="text-danger">
		                              {{ $errors->first('status',':message') }}
		                            </small>
								</div>
							</div>
							<div class="ln_solid"></div>
							<div class="item form-group">
								<div class="col-md-6 col-sm-6 offset-md-3">
									<button type="submit" class="btn btn-success">Submit</button>
								</div>
							</div>

						</form>
					</div>
				</div>
				<!-- End form fill -->
				@endif


				@if(isset($dataforedit))
				<!-- Start form fill -->
				<div class="x_panel">
					<div class="x_title">
						<h2>{{ $formtype }} <small style="color:red;">(* Means mandatory field)</small></h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<br />						
						<form  action="{{ route(routeName, $dataforedit->id) }}" method="post" data-parsley-validate class="form-horizontal form-label-left">
							@csrf
							{{ method_field('PUT') }}

							@if(isset($producttype)) {{-- Comming from ProductNameController --}}
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Product type <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<select id="producttypes_id" class="form-control" name="producttypes_id">
										<option value="">Choose..</option>
										@foreach($producttype as $producttype)
											<option value="{{ $producttype->id }}" {{ $producttype->id == $dataforedit->producttypes_id ? 'selected' : '' }}>{{ $producttype->title }}</option>
										@endforeach
									</select>
									<small class="text-danger">
                    {{ $errors->first('producttypes_id',':message') }}
                  </small>
								</div>
							</div>
							@endif

							{{-- @if(isset($insuranceCompany))
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Product type <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<select id="insurance_companies_id" class="form-control" name="insurance_companies_id">
										<option value="">Choose..</option>
										@foreach($insuranceCompany as $insuranceCompany)
											<option value="{{ $insuranceCompany->id }}" {{ $insuranceCompany->id == $dataforedit->insurance_companies_id ? 'selected' : '' }}>{{ $insuranceCompany->title }}</option>
										@endforeach
									</select>
									<small class="text-danger">
                    {{ $errors->first('insurance_companies_id',':message') }}
                  </small>
								</div>
							</div>
							@endif --}}

							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="title">{{ $inputName }} <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" id="title" class="form-control" name="title" value="{{ $dataforedit->title }}">
									<small class="text-danger">
		                              {{ $errors->first('title',':message') }}
		                            </small>
								</div>
							</div>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">Status <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<select id="heard" class="form-control" name="status">
										<option value="">Choose..</option>
										<option value="1" {{ $dataforedit->status == 1 ? 'selected' : '' }}>Active</option>
										<option value="0" {{ $dataforedit->status == 0 ? 'selected' : '' }}>Inactive</option>
									</select>
									<small class="text-danger">
		                              {{ $errors->first('status',':message') }}
		                            </small>
								</div>
							</div>
							<div class="ln_solid"></div>
							<div class="item form-group">
								<div class="col-md-6 col-sm-6 offset-md-3">
									<button type="submit" class="btn btn-success">Update</button>
									<a href="{{ route(routeCancel) }}" class="btn btn-success">Cancel</a>
								</div>
							</div>

						</form>
					</div>
				</div>
				<!-- End form fill -->
				@endif


			</div>

			@if(isset($dataforshow))
		<div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>View records</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>{{ $inputName }}</th>
  @if(isset($producttype))<th>Product type</th>@endif {{-- Comming from ProductNameController --}}
   {{--  @if(isset($insuranceCompany))<th>Insurance company</th>@endif --}} {{-- Comming from brokerTypeController --}}
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                      	@foreach($dataforshow as $dataforshow)
                        <tr>
                          <td>{{ $dataforshow->title }}</td>
  @if(isset($producttype))<td>{{ $dataforshow->prducttype_name }}</td>@endif {{-- Comming from ProductNameController --}}
  {{-- @if(isset($insuranceCompany))<td>{{ $dataforshow->insuranceCompany_name }}</td>@endif --}} {{-- Comming from brokerTypeController --}}
                          <td>{{ ($dataforshow->status == 1) ? 'Active' : 'Inactive' }}</td>
                          <td>{{-- <a href="{{ route(routeDelete, $dataforshow->id) }}" onclick="return confirm('Want to sure delete?')">Delete</a> ||  --}}<a href="{{ route(routeNameEdit, $dataforshow->id) }}">Edit</a></td>
                        </tr>
                      	@endforeach
                      </tbody>
                    </table>
                  </div>
                  </div>
              </div>
            </div>
                </div>
              </div>
         @endif

		</div>
	</div>
</div>        
@endsection

@push('pagespecificjs')
<script type="text/javascript">
	$(document).ready(function () {
  $('#datatable').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
</script>
@endpush
