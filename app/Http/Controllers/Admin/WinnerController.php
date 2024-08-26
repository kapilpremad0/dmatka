<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\WinnerResource;
use App\Models\Winner;
use Illuminate\Http\Request;

class WinnerController extends Controller
{
    function index(){
        $winners = Winner::with('user','game','bid')->latest()->paginate(10);
        $data = json_decode(json_encode(WinnerResource::collection($winners)));
        return view('admin.winners.index',compact('winners','data'));
    }
}
