<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function store(Request $request)
    {

        $this->validate($request, [
            'team_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        $player = new Player();
        $player->team_id = $request->team_id;
        $player->first_name = $request->first_name;
        $player->last_name = $request->last_name;

        if (auth()->user()->players()->save($player))
            return response()->json([
                'success' => true,
                'data' => $player->toArray()
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'player could not be added'
            ], 500);
    }
    public function update(Request $request, $id)
    {
        $player = auth()->user()->players()->find($id);

        if (!$player) {
            return response()->json([
                'success' => false,
                'message' => 'Player with id ' . $id . ' not found'
            ], 400);
        }

        $updated = $player->fill($request->all())->save();

        if ($updated)
            return response()->json([
                'success' => $player
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Player could not be updated'
            ], 500);
    }
}
