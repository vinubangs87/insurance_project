@extends('layouts.adminapp')
@section('content')

<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Vehicle details</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
		              <div class="col-md-12">
		                <div class="x_panel">
		                  <div class="x_title">
		                    <h2>RC Status</h2>
		                    
		                    <div class="clearfix"></div>
		                  </div>
		                  <div class="x_content">

		                    <section class="content invoice">
		                      <!-- info row -->
		                      <div class="row invoice-info">
		                        <div class="col-sm-4 invoice-col">
		                          <b>Owner detail: </b>
		                          <address>
                                      <strong>Name: </strong>{{ $vehicledetail->customer_name }}
                                      <br/>
                                      <strong>Mobile: </strong>{{ $vehicledetail->customer_mobile }}
                                      <br/>
                                      <strong>Email: </strong>{{ $vehicledetail->customer_email }}
                                      <br/>
                                      <strong>Address: </strong>
                                      <br/>
                                      {{ $vehicledetail->customer_address }}
                                  </address>
		                        </div>
		                        <!-- /.col -->
		                        <div class="col-sm-4 invoice-col">
		                          <b> Vehicle detail: </b>
		                          <address>
                                      <strong>Vehicle number: </strong>{{ $vehicledetail->vehicle_number }}
                                      <br/>
                                      <strong>Registration number: </strong>{{ $vehicledetail->registration_number }}
                                      <br/>
                                      <strong>Product type: </strong>{{ $vehicledetail->pt_title }}
                                      <br/>
                                      <strong>Product name: </strong>{{ $vehicledetail->pn_title }}
                                      <br/>
                                      <strong>Engine type: </strong>{{ $vehicledetail->et_title }}
                                      <br/>
                                      <strong>Permit type: </strong>{{ $vehicledetail->pert_title }}
                                      <br/>
                                      <strong>Insurance company: </strong>{{ $vehicledetail->ic_title }}
                                      <br/>
                                  </address>
		                        </div>
		                        <!-- /.col -->
		                        <div class="col-sm-4 invoice-col">
		                          <b>Status:</b> 
		                          @if((\Carbon\Carbon::now()->format('Y-m-d') > $vehicledetail->registration_date) || (\Carbon\Carbon::now()->format('Y-m-d') > $vehicledetail->fitness_expiry_date) || (\Carbon\Carbon::now()->format('Y-m-d') > $vehicledetail->mv_tax_expiry_date) || (\Carbon\Carbon::now()->format('Y-m-d') > $vehicledetail->insurance_expiry_date) || (\Carbon\Carbon::now()->format('Y-m-d') > $vehicledetail->pucc_expiry_date) || (\Carbon\Carbon::now()->format('Y-m-d') > $vehicledetail->permit_valid_upto_date) || (\Carbon\Carbon::now()->format('Y-m-d') > $vehicledetail->policy_start_date) || (\Carbon\Carbon::now()->format('Y-m-d') > $vehicledetail->policy_end_date))
		                          <span class="red">Inactive</span>
		                          @else
		                          <span>Active</span>
		                          @endif
		                          <br>
		                          {{-- <br>
		                          <b>Registration date:</b> {{ $vehicledetail->registration_date }} --}}
		                          <br>
		                          <b>Registration/Expiry date:</b> <span  class="{{ \Carbon\Carbon::now()->format('Y-m-d') > $vehicledetail->registration_date ? 'red': '' }}">{{ \Carbon\Carbon::parse($vehicledetail->registration_date)->format('d/m/Y') }}</span> <br>
		                          <b>Engine number:</b> {{ $vehicledetail->engine_number }}
		                          <br>
		                          <b>chasis_number:</b> {{ $vehicledetail->chasis_number }}                                  
                                  <br/>
                                  <strong>Renewal premium: </strong>{{ $vehicledetail->renewal_premium }}
		                        </div>
		                        <!-- /.col -->
		                      </div>
		                      <hr/>
		                      <!-- /.row -->
		                      <div class="row">
		                        <!-- /.col -->
		                        <div class="col-md-6">
		                          <p class="lead">Validity</p>
		                          <div class="table-responsive">
		                            <table class="table">
		                              <tbody>
		                                <tr>
		                                  <th>Fitness/Regn:</th>
		                                  <td class="{{ \Carbon\Carbon::now()->format('Y-m-d') > $vehicledetail->fitness_expiry_date ? 'red': '' }}">{{ \Carbon\Carbon::parse($vehicledetail->fitness_expiry_date)->format('d/m/Y') }}</td>
		                                </tr>
		                                <tr>
		                                  <th>MV Tax: </th>
		                                  <td class="{{ \Carbon\Carbon::now()->format('Y-m-d') > $vehicledetail->mv_tax_expiry_date ? 'red': '' }}">{{ \Carbon\Carbon::parse($vehicledetail->mv_tax_expiry_date)->format('d/m/Y') }}</td>
		                                </tr>
		                                <tr>
		                                  <th>Insurance:</th>
		                                  <td class="{{ \Carbon\Carbon::now()->format('Y-m-d') > $vehicledetail->insurance_expiry_date ? 'red': '' }}">{{ \Carbon\Carbon::parse($vehicledetail->insurance_expiry_date)->format('d/m/Y') }}</td>
		                                </tr>
		                                <tr>
		                                  <th>PUCC:</th>
		                                  <td class="{{ \Carbon\Carbon::now()->format('Y-m-d') > $vehicledetail->pucc_expiry_date ? 'red': '' }}">{{ \Carbon\Carbon::parse($vehicledetail->pucc_expiry_date)->format('d/m/Y') }}</td>
		                                </tr>
		                              </tbody>
		                            </table>
		                          </div>
		                        </div>
		                        <div class="col-md-6">
		                          <p class="lead">Permit detail</p>
		                          <div class="table-responsive">
		                            <table class="table">
		                              <tbody>
		                                <tr>
		                                  <th>Permit number:</th>
		                                  <td>{{ $vehicledetail->permit_number }}</td>
		                                </tr>
		                                <tr>
		                                  <th>Valid upto: </th>
		                                  <td class="{{ \Carbon\Carbon::now()->format('Y-m-d') > $vehicledetail->permit_valid_upto_date ? 'red': '' }}">{{ \Carbon\Carbon::parse($vehicledetail->permit_valid_upto_date)->format('d/m/Y') }}</td>
		                                </tr>
		                              </tbody>
		                            </table>
		                          </div>
		                        </div>

		                        <div class="col-md-6">
		                          <p class="lead">Finance detail</p>
		                          <div class="table-responsive">
		                            <table class="table">
		                              <tbody>
		                                <tr>
		                                  <th>Finance:</th>
		                                  <td>{{ $vehicledetail->finance_type == 1 ? 'Yes' : 'No'  }}</td>
		                                </tr>
		                                @if($vehicledetail->finance_type == 1)
		                                <tr>
		                                  <th>Finance company: </th>
		                                  <td>{{ $vehicledetail->fc_title }}</td>
		                                </tr>
		                                @endif
		                              </tbody>
		                            </table>
		                          </div>
		                        </div>

		                         <div class="col-md-6">
		                          <p class="lead">Policy detail</p>
		                          <div class="table-responsive">
		                            <table class="table">
		                              <tbody>
		                                <tr>
		                                  <th>Policy number: </th>
		                                  <td>{{ $vehicledetail->policy_number }}</td>
		                                </tr>
		                                <tr>
		                                  <th>Policy start date: </th>
		                                  <td class="{{ \Carbon\Carbon::now()->format('Y-m-d') > $vehicledetail->policy_start_date ? 'red': '' }}">{{ \Carbon\Carbon::parse($vehicledetail->policy_start_date)->format('d/m/Y') }}</td>
		                                </tr>
		                                <tr>
		                                  <th>Policy end date: </th>
		                                  <td class="{{ \Carbon\Carbon::now()->format('Y-m-d') > $vehicledetail->policy_end_date ? 'red': '' }}">{{ \Carbon\Carbon::parse($vehicledetail->policy_end_date)->format('d/m/Y') }}</td>
		                                </tr>
		                              </tbody>
		                            </table>
		                          </div>
		                        </div>
		                        <!-- /.col -->
		                      </div>
		                      <hr/>
		                      <!-- /.row -->

		                      <!-- this row will not appear when printing -->
		                      <div class="row no-print">
		                        <div class=" ">
		                         {{--  <button class="btn btn-primary pull-right" onclick="window.print();" style="margin-right: 5px;"><i class="fa fa-download"></i> Print</button> --}}
		                         <a href="{{ route('vehicledetails.edit', $vehicledetail->id) }}" class="btn btn-primary">Update this customer</a>
		                        </div>
		                      </div>
		                    </section>
		                  </div>
		                </div>
		              </div>
		            </div>
	</div>
</div>        
@endsection