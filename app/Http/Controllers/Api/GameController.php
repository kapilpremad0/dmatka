<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\GetGameRequest;
use App\Http\Resources\Api\GameResource;
use App\Http\Resources\Api\LeaderBoardResource;
use App\Models\Game;
use App\Models\User;
use App\Traits\ApiResponse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    use ApiResponse;
    function index(GetGameRequest $request){
        try{
            $games = Game::paginate(20);
            $date = $request->date ?? $todayDate = Carbon::today()->toDateString();
            foreach($games as $key => $val){
                $val['result_declare'] = $val->date_result($date);
            }
            $data = GameResource::collection($games);
            return $this->sendSuccess('Register Successfully',$games);
        } catch (\Throwable $e) {
            return $this->sendFailed($e->getMessage() . ' On Line ' . $e->getLine(), 500);
        }
    }


    function leaderboard(){
        try{
            $users = User::withSum('winners as total_amount', 'amount')
            ->orderByDesc('total_amount')
            ->has('winners')
            ->limit(10)
            ->get();

            $users = json_decode(json_encode(LeaderBoardResource::collection($users)));
            return $this->sendSuccess('Register Successfully',$users);
            
        } catch (\Throwable $e) {
            return $this->sendFailed($e->getMessage() . ' On Line ' . $e->getLine(), 500);
        }
    }
}
