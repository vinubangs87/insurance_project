@php
$routeName = '';
if($type == 'insurancesave')
{
	define("routeName", "insurancecompany.store");
	define("routeNameEdit", "insurancecompany.edit");
	define("routeDelete", "insurancecompany.delete");
}
else if($type == 'insuranceUpdate')
{
	define("routeName", "insurancecompany.update");
	define("routeCancel", "insurancecompany.index");
}

else if($type == 'brokernameSave')
{
	define("routeName", "broker.store");
	define("routeNameEdit", "broker.edit");
	define("routeDelete", "broker.delete");
}
else if($type == 'brokernameUpdate')
{
	define("routeName", "broker.update");
	define("routeCancel", "broker.index");
}

else if($type == 'enginetypeSave')
{
	define("routeName", "enginetype.store");
	define("routeNameEdit", "enginetype.edit");
	define("routeDelete", "enginetype.delete");
}
else if($type == 'enginetypeUpdate')
{
	define("routeName", "enginetype.update");
	define("routeCancel", "enginetype.index");
}
else if($type == 'permittypeSave')
{
	define("routeName", "permittype.store");
	define("routeNameEdit", "permittype.edit");
	define("routeDelete", "permittype.delete");
}
else if($type == 'permittypeUpdate')
{
	define("routeName", "permittype.update");
	define("routeCancel", "permittype.index");
}
else if($type == 'vechilestatusSave')
{
	define("routeName", "vechilestatus.store");
	define("routeNameEdit", "vechilestatus.edit");
	define("routeDelete", "vechilestatus.delete");
}
else if($type == 'vechilestatusUpdate')
{
	define("routeName", "vechilestatus.update");
	define("routeCancel", "vechilestatus.index");
}
else if($type == 'producttypeSave')
{
	define("routeName", "producttype.store");
	define("routeNameEdit", "producttype.edit");
	define("routeDelete", "producttype.delete");
}
else if($type == 'producttypeUpdate')
{
	define("routeName", "producttype.update");
	define("routeCancel", "producttype.index");
}
else if($type == 'procuctnameSave')
{
	define("routeName", "procuctname.store");
	define("routeNameEdit", "procuctname.edit");
	define("routeDelete", "procuctname.delete");
}
else if($type == 'procuctnameUpdate')
{
	define("routeName", "procuctname.update");
	define("routeCancel", "procuctname.index");
}
else if($type == 'financecompanysave')
{
	define("routeName", "financecompany.store");
	define("routeNameEdit", "financecompany.edit");
	define("routeDelete", "financecompany.delete");
}
else if($type == 'financecompanyUpdate')
{
	define("routeName", "financecompany.update");
	define("routeCancel", "financecompany.index");
}
@endphp