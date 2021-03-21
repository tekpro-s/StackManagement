<?php

namespace App\Http\Controllers;

use App\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TemplatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Template::all();
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
        $item = new Template();
        $item->user_id = $request->user_id;

        $item->title1 = $request->title1;
        $item->time1 = $request->time1;
        $item->comment1 = $request->comment1;

        $item->title2 = $request->title2;
        $item->time2 = $request->time2;
        $item->comment2 = $request->comment2;

        $item->title3 = $request->title3;
        $item->time3 = $request->time3;
        $item->comment3 = $request->comment3;
        $item->save();
        return response()->json([
            'message' => 'Share created successfully',
            'data' => $item
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function show(Template $template)
    {
        $item = Template::where('id', $template->id)->first();
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
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Template $template)
    {
        $item = Template::where('id', $template->id)->first();
        $item->title = $request->title;
        $item->time = $request->time;
        $item->comment = $request->comment;
        $item->date = $request->date;
        $item->save();
        if ($item) {
            return response()->json([
                'message' => 'Updated successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found',
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function destroy(Template $template)
    {
        $item = Template::where('id', $template->id)->delete();
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
