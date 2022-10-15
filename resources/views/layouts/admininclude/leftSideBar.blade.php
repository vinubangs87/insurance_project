<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>Menu</h3>
    <ul class="nav side-menu">
      <li><a><i class="fa fa-home"></i> Master <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{ route('insurancecompany.index') }}">Insurance company</a></li>
          <li><a href="{{ route('broker.index') }}">Broker / IRDA</a></li>
          <li><a href="{{ route('producttype.index') }}">Product type</a></li>
          <li><a href="{{ route('procuctname.index') }}">Product name</a></li>
          <li><a href="{{ route('enginetype.index') }}">Fuel type</a></li>
          <li><a href="{{ route('permittype.index') }}">Permit type</a></li>
          <li><a href="{{ route('financecompany.index') }}">Finance company</a></li>
         {{--  <li><a href="{{ route('vechilestatus.index') }}">Vechile Status</a></li> --}}
        </ul>
      </li>
    </ul>
    <ul class="nav side-menu">
      <li><a><i class="fa fa-home"></i> Vehicle details <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="{{ route('vehicledetails.index') }}">Save details</a></li>
          <li><a href="{{ route('vehicledetails.vehiclerecords') }}">View/Update details</a></li>
        </ul>
      </li>
    </ul>
  </div>
</div>