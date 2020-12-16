<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function store(Request $request)
    {

        $this->validate($request, [

            'name' => 'required',

        ]);

        $team = new Team();
        $team->name = $request->name;

        if (auth()->user()->teams()->save($team))

            return response()->json([
                'success' => true,
                'data' => $team->toArray()
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'team could not be added'
            ], 500);
    }
    public function show($id)
    {
        $team = auth()->user()->teams()->find($id);

        if (!$team) {
            return response()->json([
                'success' => false,
                'message' => 'Product with id ' . $id . ' not found'
            ], 400);
        }
        $players=$team->players;
        return response()->json([
            'success' => true,
            'team' => $team->toArray(),$players->toArray()
        ], 400);
    }
}
