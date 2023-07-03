<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalController extends Controller
{
    public function changeScheduleStatus($id, $status){

        try {
            DB::table('jadwal')->where('id', $id)->update(['status' => $status]);
            $msg = 'success';
            $status = true;
        } catch (\Exception $e){
            $msg = $e->getMessage();
            $status = false;
        }

        return response()->json(compact('status', 'msg'));

    }
}
