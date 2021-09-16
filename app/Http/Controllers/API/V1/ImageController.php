<?php

namespace App\Http\Controllers\API\V1;
use App\Models\Orders;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class ImageController extends Controller
{
   /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function formSubmit(Request $request)
    {
        $file = $request->file('file');
        if (!is_array($file)) {
            $file = [$file];
        }
        for ($i = 0; $i < count($file); $i++) {
            $files = $file[$i];

            $imageName = $files->getClientOriginalName();
            $path ='resources/'.$request->type.'/';
            $files->move(public_path($path), $imageName);
            $filepath[$i]=$imageName;
        }
    	// $imageName = time().'.'.$request->file->getClientOriginalExtension();
        // $path ='resources/'.$request->type.'/';
        // $request->file->move(public_path($path), $imageName);
       // $filepath =  $path.$imageName;

    	return response()->json(['success'=>'You have successfully upload file.','filepath'=>$filepath]);
    }

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteFile(Request $request)
    {
    	$filepath =  $request->filepath;

        unlink($filepath);

    	return response()->json(['success'=>'File has been removed.']);
    }
	public function generateOrderNumber()
    {
        
        $ddate = date("Y-m-d");
        $date = new \DateTime($ddate);
        $week = $date->format("W");
        $week_res = sprintf("%'03d", $week);
        $year = $date->format("Y");
        $weekday = $date->format("N");
        
       
        $orders = DB::table('orders')->get();
        $order_array = Orders::orderBy('id', 'DESC')->first();
        if(!empty( $order_array))
        {
            $ordernum_from_db = $order_array->order_num;
            if($ordernum_from_db)
            {
                // get week digits
                $week_result_from_db = substr($ordernum_from_db, 4, 3);
                $week_to_check_from_db = ltrim($week_result_from_db, '0');
                if($week_to_check_from_db == $week)
                {
                    $order_num  = $ordernum_from_db + 1;
                }
                else{
                    $to_append_order_num = sprintf("%'03d", 1);
                    $order_num = $year.$week_res.$to_append_order_num;
                }
               
            }
        }
        else{
            $to_append_order_num = sprintf("%'03d", 1);
            $order_num = $year.$week_res.$to_append_order_num;
        }
      
        return response()->json(['success'=>'Success','order_num'=>$order_num]);
    }
}
