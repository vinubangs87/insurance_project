@extends('layouts.adminapp')
@section('content')

<!-- This is a common form used for all Master menu  -->
<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Vehicle list</h3>
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
                          <th>Customer name</th>
                          <th>Customer mobile</th>
                          <th>Vehicle number</th>
                          <th>Registration number</th>
                          <th>Policy number</th>
                          <th>Action</th>
                        </tr>
                      </thead>


                      <tbody>
                      	@foreach($vehiclelist as $vehiclelist)
                        <tr>
                          <td>{{ $vehiclelist->customer_name }}</td>
                          <td>{{ $vehiclelist->customer_mobile }}</td>
                          <td>{{ $vehiclelist->vehicle_number }}</td>
                          <td>{{ $vehiclelist->registration_number }}</td>
                          <td>{{ $vehiclelist->policy_number }}</td>
                          <td><form method="POST" action="{{ route('vehicledetails.destroy', $vehiclelist->id) }}">
                              @csrf
                              <input name="_method" type="hidden" value="DELETE">
                              <button type="submit" class="btn btn-danger btn-sm delete" title='Delete'>Delete</button>
                          </form>

                          <a href="{{ route('vehicledetails.edit', $vehiclelist->id) }}" class="btn btn-primary btn-sm">Edit</a> <a href="{{ route('vehicledetails.show', $vehiclelist->id) }}"  class="btn btn-primary btn-sm">View</a></td>
                        </tr>
                      </tbody>
                      	@endforeach
                    </table>
                  </div>
                  </div>
              </div>
            </div>
                </div>
              </div>

		</div>
	</div>
</div>        
@endsection

@push('pagespecificCss')
<link href="{{ asset('admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
@endpush

@push('pagespecificjs')
<script src="{{ asset('admin/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('.delete').click(function(e) {
            if(!confirm('Are you sure you want to delete this record?')) {
                e.preventDefault();
            }
        });
    });
</script>
@endpush
