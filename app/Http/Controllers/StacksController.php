<?php

namespace App\Http\Controllers;

use App\Stack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StacksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Stack::all();
        return response()->json([
            'message' => 'OK',
            'data' => $items
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Stack;
        $item->user_id = $request->user_id;
        $item->title = $request->title;
        $item->time = $request->time;
        $item->comment = $request->comment;
        $item->save();
        return response()->json([
            'message' => 'Share created successfully',
            'data' => $item
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stack  $stack
     * @return \Illuminate\Http\Response
     */
    public function show(Stack $stack)
    {
        $item = Stack::where('id', $stack->id)->first();
        $user_id = $item->user_id;
        $user = DB::table('users')->where('id', (int)$user_id)->first();

        $items = [
            "item" => $item,
            "name" => $user->name,
        ];
        return response()->json($items, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stack  $stack
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stack $stack)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stack  $stack
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stack $stack)
    {
        $item = Stack::where('id', $stack->id)->delete();
        if ($item) {
            return response()->json(
                ['message' => 'Share deleted successfully'],
                200
            );
        } else {
            return response()->json(
                ['message' => 'Share not found'],
                404
            );
        }
    }
}
