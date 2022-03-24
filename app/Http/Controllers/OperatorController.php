<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operators;

class OperatorController extends Controller {
    
    public function OperatorListIndex () {
        $operator_data = Operators::all();
        $data = compact('operator_data');
        return view('pages.operator.index')->with($data);
    }
    
    public function addOperatorForm() {
        return view('pages.operator.add');
    }
    
    public function addOperator(Request $request) {
        
        $request->validate([
            'operator_logo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        
        $objApn = new Operators();
        $result = $objApn->addOperator($request);
        return redirect()->back();
    }
    
    public function editOperatorForm(Request $request, $id) {
        $operator_data = Operators::find($id);
        $data = compact('operator_data');
        return view('pages.operator.edit')->with($data);
    }
    
    public function editOperator(Request $request, $id) {
        
        $objOperator = new Operators();
        $result = $objOperator->updateOperator($request, $id);
        return redirect()->back();
    }
    
    public function deleteOperator(Request $request){
        Operators::find($request->id)->delete();
        return true;
    }
    
    
    
    public function ajaxGetOperators(Request $request){
        $operator_data = Operators::find($request->id);
        
        $active_status = $operator_data->active_status == 1 ? 'Active' : 'Inactive';
        $data = '<div class="table-responsive"><table class="table align-middle table-nowrap"><tbody>';
        $data .= '<tr><th scope="row" style="text-align:center">Icon</th><td style="text-align:center"><img src="'. $operator_data->operator_logo .'"title="' . $operator_data->operator_name . '" class="rounded mr-3" height="80" ></td></tr>';
        $data .= '<tr><th scope="row" style="text-align:center">Operator Name</th><td style="text-align:center">' . $operator_data->operator_name .'</td></tr>';
        $data .= '<tr><th scope="row" style="text-align:center">Status</th><td style="text-align:center">' . $active_status .'</td></tr>';
        $data .= '<tr><th scope="row" style="text-align:center">Created At</th><td style="text-align:center">' . date("d-m-Y -- H:i:s", strtotime($operator_data->created_at)) .'</td></tr>';
        $data .= '<tr><th scope="row" style="text-align:center">Updated At</th><td style="text-align:center">' . date("d-m-Y -- H:i:s", strtotime($operator_data->updated_at)) .'</td></tr>';
        $data .= '</tbody></table></div>';
        return $data;
    }
    
    public function index(){
        $operators = Operators::all();
        
        if($operators->isEmpty()){
            return array('status'=> 0 , 'message' => 'No Data Found' );
        }else{
            return $operators;
        }
    }
    
    public function show($id){
        $operators = Operators::find($id);
         
        if(!isset($operators) || is_null($operators)){
            return array('status'=> 0 , 'message' => 'No Data Found' );
        }else{
            return $operators;
        }
    }
    
    public function store(Request $request){
        return Operators::create($request->all());
    }
    
    public function update(Request $request, $id) {
        $operators = Operators::findOrFail($id);
        $operators->update($request->all());

        return $operators;
    }
    
}
