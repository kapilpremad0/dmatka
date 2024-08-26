<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\GameResource;
use App\Models\Game;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class GameController extends Controller
{
    use ApiResponse;
    function index(){
        try{
            $games = Game::paginate(20);
            $data = GameResource::collection($games);
            return $this->sendSuccess('Register Successfully',$games);
        } catch (\Throwable $e) {
            return $this->sendFailed($e->getMessage() . ' On Line ' . $e->getLine(), 500);
        }
    }
}
