<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\AppConfig;

class Operators extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public function addOperator($request) {
        
        $imageName = 'op_' .time().'.'.$request->operator_logo->extension();  
        $request->operator_logo->move(public_path('images/operator'), $imageName);
        $logo_path = '/images/operator/' . $imageName;
        
        $objOperator = new Operators();
        $objOperator->operator_name = $request->operator_name;
        $objOperator->operator_logo = $logo_path;
        $objOperator->active_status = $request->active_status == 'on' ? 1 : 0;
        $objOperator->created_at = date("Y-m-d h:i:s");
        $objOperator->updated_at = date("Y-m-d h:i:s");
        $objOperator->save();
        
        $appConf = new AppConfig();
        $appConf->createAppConfig($objOperator->id);
        
        return $objOperator;
    }
    
    public function updateOperator($request) {
        $objOperator = Operators::find($request->id);
        
        if ($request->file()) {
            $imageName = 'op_' .time().'.'.$request->operator_logo->extension();  
            $request->operator_logo->move(public_path('images/operator'), $imageName);
            $logo_path = '/images/operator/' . $imageName;
            $objOperator->operator_logo = $logo_path;
        }
        
        $objOperator->operator_name = $request->operator_name;
        $objOperator->active_status = $request->active_status == 'on' ? 1 : 0;
        $objOperator->updated_at = date("Y-m-d h:i:s");
        
        $appConf = AppConfig::where('operator', '=', $request->id)->first();
        
        if($appConf === NULL){
            $appConf = new AppConfig();
            $appConf->createAppConfig($id);
        }
        return $objOperator->save();
    }
}
