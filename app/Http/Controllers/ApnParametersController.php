<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\APN_Parameters;
use App\Models\Operators;
use DB;
class ApnParametersController extends Controller {
    
    public function index(){
        $ApnParam = APN_Parameters::all();
        
        if($ApnParam->isEmpty()){
            return array('status'=> 0 , 'message' => 'No Data Found' );
        }else{
            return $ApnParam;
        }
    }
    
    public function show($id){
        $ApnParam = APN_Parameters::find($id);
        if(!isset($ApnParam) || is_null($ApnParam)){
            return array('status'=> 0 , 'message' => 'No Data Found' );
        }else{
            return $ApnParam;
        }
    }
    
    public function store(Request $request){
        return APN_Parameters::create($request->all());
    }
    
    public function update(Request $request, $id) {
        $ApnParam= APN_Parameters::findOrFail($id);
        $ApnParam->update($request->all());

        return $ApnParam;
    }
    
    public function ApnListIndex() {
        $apn_data = APN_Parameters::join('operators', 'operators.id', '=', 'apn_parameter.operator')
                ->get(['apn_parameter.*', 'operators.operator_name']);
        $apn_data = $apn_data->all();
        $data = compact('apn_data');
        return view('pages.apn.index')->with($data);
    }
    
    public function addApnForm(Request $request) {
        // get Operators
//        $operators = DB::table('operators')
//                ->select('operators.*')
//                ->leftJoin('apn_parameter', 'apn_parameter.operator', '=', 'operators.id')
//                ->whereNull('apn_parameter.operator')
//                ->orWhereNotNull('apn_parameter.deleted_at')
//                ->get();
        $operators = Operators::all();
        $data = compact('operators');
        return view('pages.apn.add')->with($data);
    }
    
    public function addApn(Request $request) {
        $objApn = new APN_Parameters();
        $result = $objApn->addApn($request);
        return redirect()->back();
    }
    
    public function editApnForm(Request $request, $id) {
        //Get APN list By Id
         $apn_data = APN_Parameters::join('operators', 'operators.id', '=', 'apn_parameter.operator')
                ->where('apn_parameter.id', $id)
                ->get(['apn_parameter.*', 'operators.operator_name']);
        $apn_data = $apn_data->all();
        
        // get Operators
//        $operators = DB::table('operators')
//                ->select('operators.*')
//                ->leftJoin('apn_parameter', 'apn_parameter.operator', '=', 'operators.id')
//                ->whereNull('apn_parameter.operator')
//                ->orWhereNotNull('operators.deleted_at')
//                ->get();
        
        $operators = Operators::all();

        $data = compact('apn_data', 'operators');
        return view('pages.apn.edit')->with($data);
    }
    
    public function editApn(Request $request, $id) {
        $objApn = new APN_Parameters();
        $result = $objApn->updateApn($request, $id);
        return redirect()->back();
    }
    
    public function deleteApn(Request $request){
        APN_Parameters::find($request->id)->delete();
        return true;
    }
    
    public function ajaxGetAPN(Request $request){
        $apn_data = APN_Parameters::join('operators', 'operators.id', '=', 'apn_parameter.operator')
                    ->where('apn_parameter.id', $request->id)
                    ->get(['apn_parameter.*', 'operators.operator_name']);
        
        $apn_data = $apn_data->all();
        $data = '<div class="table-responsive"><table class="table align-middle table-nowrap"><tbody>';
        $data .= '<tr><th scope="row">Operator</th><td>' . $apn_data[0]->operator_name .'</td></tr>';
        $data .= '<tr><th scope="row">APN Name</th><td>' . $apn_data[0]->apn_name .'</td></tr>';
        $data .= '<tr><th scope="row">APN</th><td>' . $apn_data[0]->apn .'</td></tr>';
        $data .= '<tr><th scope="row">Proxy</th><td>' . $apn_data[0]->proxy .'</td></tr>';
        $data .= '<tr><th scope="row">Port</th><td>' . $apn_data[0]->port .'</td></tr>';
        $data .= '<tr><th scope="row">Username</th><td>' . $apn_data[0]->username .'</td></tr>';
        $data .= '<tr><th scope="row">Password</th><td>' . $apn_data[0]->password .'</td></tr>';
        $data .= '<tr><th scope="row">Server</th><td>' . $apn_data[0]->server .'</td></tr>';
        $data .= '<tr><th scope="row">MMSC</th><td>' . $apn_data[0]->mmsc .'</td></tr>';
        $data .= '<tr><th scope="row">MMS Proxy</th><td>' . $apn_data[0]->mms_proxy .'</td></tr>';
        $data .= '<tr><th scope="row">MMS Port</th><td>' . $apn_data[0]->mms_port .'</td></tr>';
        $data .= '<tr><th scope="row">MCC</th><td>' . $apn_data[0]->mcc .'</td></tr>';
        $data .= '<tr><th scope="row">MNC</th><td>' . $apn_data[0]->mnc .'</td></tr>';
        $data .= '<tr><th scope="row">Auth Type</th><td>' . $apn_data[0]->auth_type .'</td></tr>';
        $data .= '<tr><th scope="row">APN Type</th><td>' . $apn_data[0]->apn_type .'</td></tr>';
        $data .= '<tr><th scope="row">APN Roaming</th><td>' . $apn_data[0]->apn_roaming .'</td></tr>';
        $data .= '<tr><th scope="row">Bearer</th><td>' . $apn_data[0]->bearer .'</td></tr>';
        $data .= '<tr><th scope="row">MVNO Type</th><td>' . $apn_data[0]->mvno_type .'</td></tr>';
        $data .= '<tr><th scope="row">MVNO Value</th><td>' . $apn_data[0]->mvno_value .'</td></tr>';
        $data .= '<tr><th scope="row">Created At</th><td>' . date("d-m-Y -- H:i:s", strtotime($apn_data[0]->created_at)) .'</td></tr>';
        $data .= '<tr><th scope="row">Updated At</th><td>' . date("d-m-Y -- H:i:s", strtotime($apn_data[0]->updated_at)) .'</td></tr>';
        $data .= '</tbody></table></div>';
        return $data;
    }
    
}
