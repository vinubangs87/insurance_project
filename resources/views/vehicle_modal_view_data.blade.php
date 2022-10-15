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
                                      <strong>Vehicle/Registration number: </strong>{{ $vehicledetail->vehicle_number }}
                                      <br/>
                                      {{-- <strong>Registration number: </strong>{{ $vehicledetail->registration_number }}
                                      <br/> --}}
                                      <strong>Product type: </strong>{{ $vehicledetail->pt_title }}
                                      <br/>
                                      <strong>Product name: </strong>{{ $vehicledetail->pn_title }}
                                      <br/>
                                      <strong>Fuel type: </strong>{{ $vehicledetail->et_title }}
                                      <br/>
                                      <strong>Permit type: </strong>{{ $vehicledetail->pert_title }}
                                      <br/>
                                  </address>
		                        </div>
		                        <!-- /.col -->
		                        <div class="col-sm-4 invoice-col">
		                          <b>Status:</b>
		                          @if((\Carbon\Carbon::now()->format('Y-m-d') > $vehicledetail->expiry_date) || (\Carbon\Carbon::now()->format('Y-m-d') > $vehicledetail->insurance_expiry_date) || (\Carbon\Carbon::now()->format('Y-m-d') > $vehicledetail->fitness_expiry_date) || (\Carbon\Carbon::now()->format('Y-m-d') > $vehicledetail->mv_tax_expiry_date) || (\Carbon\Carbon::now()->format('Y-m-d') > $vehicledetail->pucc_expiry_date) || (\Carbon\Carbon::now()->format('Y-m-d') > $vehicledetail->permit_valid_upto_date))
		                          <b class="red inactive-class">INACTIVE</b>
		                          @else
		                          <b class="blue">ACTIVE</b>
		                          @endif
		                          <br>
		                          {{-- <br>
		                          <b>Registration date:</b> {{ $vehicledetail->registration_date }} --}}
		                          <br>
		                          <b>Registration date:</b> {{ \Carbon\Carbon::parse($vehicledetail->registration_date)->format('d/m/Y') }} <br>
		                          <b>Registration Expiry date:</b> <span  class="{{ \Carbon\Carbon::now()->format('Y-m-d') > $vehicledetail->expiry_date ? 'red': 'blue' }}">{{ \Carbon\Carbon::parse($vehicledetail->expiry_date)->format('d/m/Y') }}</span> <br>
		                          
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
		                          <p class="lead">Insurance Details:</p>
		                          <div class="table-responsive">
		                            <table class="table">
		                              <tbody>
		                                <tr>
		                                  <th>Insurance company:</th>
		                                  <td>{{ $vehicledetail->ic_title }}</td>
		                                </tr>
		                                <tr>
		                                  <th>Broker / IRDA:</th>
		                                  <td>{{ $vehicledetail->br_title }}</td>
		                                </tr>
		                                <tr>
		                                  <th>Insurance start date:</th>
		                                  <td>{{ \Carbon\Carbon::parse($vehicledetail->insurance_start_date)->format('d/m/Y') }}</td>
		                                </tr>
		                                <tr>
		                                  <th>Insurance expiry date:</th>
		                                  <td class="{{ \Carbon\Carbon::now()->format('Y-m-d') > $vehicledetail->insurance_expiry_date ? 'red': 'blue' }}">{{ \Carbon\Carbon::parse($vehicledetail->insurance_expiry_date)->format('d/m/Y') }}</td>
		                                </tr>
		                                <tr>
		                                  <th>Insurance amount:</th>
		                                  <td>{{ $vehicledetail->insurance_amount }}</td>
		                                </tr>
		                              </tbody>
		                            </table>
		                          </div>
		                        </div>
		                        <div class="col-md-6">
		                          <p class="lead">Permit/Validity Details:</p>
		                          <div class="table-responsive">
		                            <table class="table">
		                              <tbody>
		                                <tr>
		                                  <th>Permit number:</th>
		                                  <td>{{ $vehicledetail->permit_number }}</td>
		                                </tr>
		                                <tr>
		                                  <th>Permit valid upto: </th>
		                                  <td class="{{ \Carbon\Carbon::now()->format('Y-m-d') > $vehicledetail->permit_valid_upto_date ? 'red': 'blue' }}">{{ \Carbon\Carbon::parse($vehicledetail->permit_valid_upto_date)->format('d/m/Y') }}</td>
		                                </tr>
		                                <tr>
		                                  <th>Fitness expiry date:</th>
		                                  <td class="{{ \Carbon\Carbon::now()->format('Y-m-d') > $vehicledetail->fitness_expiry_date ? 'red': 'blue' }}">{{ \Carbon\Carbon::parse($vehicledetail->fitness_expiry_date)->format('d/m/Y') }}</td>
		                                </tr>
		                                <tr>
		                                  <th>MV tax expiry date: </th>
		                                  <td class="{{ \Carbon\Carbon::now()->format('Y-m-d') > $vehicledetail->mv_tax_expiry_date ? 'red': 'blue' }}">{{ \Carbon\Carbon::parse($vehicledetail->mv_tax_expiry_date)->format('d/m/Y') }}</td>
		                                </tr>
		                                <tr>
		                                  <th>PUCC expiry date:</th>
		                                  <td class="{{ \Carbon\Carbon::now()->format('Y-m-d') > $vehicledetail->pucc_expiry_date ? 'red': 'blue' }}">{{ \Carbon\Carbon::parse($vehicledetail->pucc_expiry_date)->format('d/m/Y') }}</td>
		                                </tr>
		                              </tbody>
		                            </table>
		                          </div>
		                        </div>

		                        <div class="col-md-6">
		                          <p class="lead">Finance Details:</p>
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
		                          <p class="lead">Policy Details:</p>
		                          <div class="table-responsive">
		                            <table class="table">
		                              <tbody>
		                                <tr>
		                                  <th>Policy number: </th>
		                                  <td>{{ $vehicledetail->policy_number }}</td>
		                                </tr>
		                                {{-- <tr>
		                                  <th>Policy start date: </th>
		                                  <td>{{ \Carbon\Carbon::parse($vehicledetail->policy_start_date)->format('d/m/Y') }}</td>
		                                </tr>
		                                <tr>
		                                  <th>Policy end date: </th>
		                                  <td class="{{ \Carbon\Carbon::now()->format('Y-m-d') > $vehicledetail->policy_end_date ? 'red': 'blue' }}">{{ \Carbon\Carbon::parse($vehicledetail->policy_end_date)->format('d/m/Y') }}</td>
		                                </tr> --}}
		                              </tbody>
		                            </table>
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