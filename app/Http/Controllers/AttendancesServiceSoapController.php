<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;    
use DB;
require_once"/nusoap-0.9.5/lib/nusoap.php";

class AttendancesServiceSoapController extends Controller

{



	public function __construct(){
		 
	}

	public function index()
    {


		  $soap = new soap_server;
		  $soap->configureWSDL('AddService', 'http://php.hoshmand.org/');
		  $soap->wsdl->schemaTargetNamespace = 'http://soapinterop.org/xsd/';

		  $soap->register(
		    'metodos.consulta',
		     array('dni' => 'xsd:int'),
		     array('return' => 'xsd:string'),
		    'http://soapinterop.org/'
		  );

		  $soap->service(isset($HTTP_RAW_POST_DATA) ?
		    $HTTP_RAW_POST_DATA : '');
    }

    public function consulta($dni){
    $attendances = DB::table('attendances as att')
                     ->join('employees as emp','emp.id','=','att.idemployee')
                    ->select('att.idemployee', DB::raw('SEC_TO_TIME(SUM(TIME_TO_SEC(att.hour_not_worked))) as totalHours'),DB::raw('CONCAT(emp.surname_paternal," ",emp.surname_maternal," ",emp.name) as employee'),'emp.dni')
                    ->where('att.state','=','1')
                    ->where('att.idemployee','=',$dni)
                    ->groupBy('att.idemployee','emp.name','emp.dni','emp.surname_paternal','emp.surname_maternal')
                    ->get();

        return $attendances;
	}

 

    

}
