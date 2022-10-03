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
                    <h2>View records: </h2>
                    <div class="clearfix"></div>
                  {{--  <form class="form-label-left" action="" method="post">
                   	<div class="col-md-3 col-sm-3  form-group">
                    <select id="insuranceCompany_id" class="form-control" name="insuranceCompany_id">
												<option value="">Choose..</option>
												<option value="1">Active</option>
												<option value="0">Inactive</option>
										</select>
                  	</div>
                   	<div class="col-md-3 col-sm-3  form-group">
                    <input type="text" name="daterange" class="form-control" value="01/01/2018 - 01/15/2018" />
                  	</div>
                  	<div class="col-md-3 col-sm-3  form-group">
												<button type="submit" class="btn btn-success">Search</button>
											</div>
                  </form> --}}
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                          	<select id="search2" name="expense_category" class="form-control form-control-sm m-2">
                  	          <option value="none">Select a Status</option>
                  	          <option value="active">Active</option>
                  	          <option value="inactive">Inactive</option>
                  	        </select>
                            <div class="card-box table-responsive">
                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                      <thead>
                        <tr>
                          <th>Customer name</th>
                          <th>Customer mobile</th>
                          <th>Vehicle number</th>
                          <th>Registration number</th>
                          <th>Policy number</th>
                          <th>Status</th>
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
                          
                          	@if((\Carbon\Carbon::now()->format('Y-m-d') > $vehiclelist->expiry_date) || (\Carbon\Carbon::now()->format('Y-m-d') > $vehiclelist->insurance_expiry_date) || (\Carbon\Carbon::now()->format('Y-m-d') > $vehiclelist->fitness_expiry_date) || (\Carbon\Carbon::now()->format('Y-m-d') > $vehiclelist->mv_tax_expiry_date) || (\Carbon\Carbon::now()->format('Y-m-d') > $vehiclelist->pucc_expiry_date) || (\Carbon\Carbon::now()->format('Y-m-d') > $vehiclelist->permit_valid_upto_date) || (\Carbon\Carbon::now()->format('Y-m-d') > $vehiclelist->policy_end_date))
                          	<td class="red inactive-class"><div class="status-inactive"><b>INACTIVE</b></div></td>
                          	@else
	                          <td class="green"><div class="status-active" title="Active">Active</div></td>
	                          @endif
                          
                          <td><form method="POST" action="{{ route('vehicledetails.destroy', $vehiclelist->id) }}">
                              @csrf
                              <input name="_method" type="hidden" value="DELETE">
                              <button type="submit" class="btn btn-danger btn-sm delete" title='Delete'>Delete</button>
                          </form>

                          <a href="{{ route('vehicledetails.edit', $vehiclelist->id) }}" class="btn btn-primary btn-sm">Edit</a> <a href="{{ route('vehicledetails.show', $vehiclelist->id) }}"  class="btn btn-primary btn-sm">View</a> <a href="{{ route('insurance.amount.show', $vehiclelist->id) }}"  class="btn btn-primary btn-sm">Update insurance amount</a></td>
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

		</div>
	</div>
</div>        
@endsection

@push('pagespecificjs')

<script type="text/javascript">
    $(document).ready(function() {
        $('.delete').click(function(e) {
            if(!confirm('Are you sure you want to delete this record?')) {
                e.preventDefault();
            }
        });
    });
</script>

<script>
$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });
});
</script>

<script type="text/javascript">
$(document).ready(function() {
  var DT1 = $('#datatable').DataTable({
  	"bDestroy": true,
    retrieve: true,
    columnDefs: [{
      orderable: true,
      className: 'select-checkbox',
      targets: 0,
    }],
    select: {
      style: 'os',
      selector: 'td:first-child'
    },
    order: [
      [1, 'asc']
    ],
    dom: 'lrt'
  });
  $(".selectAll").on("click", function(e) {
    if ($(this).is(":checked")) {
      DT1.rows().select();
    } else {
      DT1.rows().deselect();
    }
  });

  $('#search').on('input', () => {
    DT1.search($('#search').val()).draw();
  });
  $('#search2').on('change', () => {
    const state = $("#search2").val();
    if (state === "none") {
      $(".status-active").parent().parent().attr("hidden", false);
      $(".status-inactive").parent().parent().attr("hidden", false);
      return;
    }

    $(".status-" + ((state === "active") ? 'inactive' : 'active')).parent().parent().attr("hidden", true);
    $(".status-" + state).parent().parent().attr("hidden", false);

  });
});
</script>
@endpush
