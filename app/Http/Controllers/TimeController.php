<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeModel;
use Illuminate\Support\Facades\Redirect;
use Exception;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listTime = TimeModel::all();
        //$listTime = TimeModel::where('name_specialist','like',"%$search%")->paginate(5);
        return view('admin.time.index', [
            "listTime" => $listTime,
            // "search" => $search
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.time.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'start_time' => 'required',
            'end_time' => 'required',
        ], [
            'start_time.required' => "Điền thời gian bắt đầu",
            'end_time.required' => "Điền thời gian kết thúc",
        ]);

        $start_time = $request->get('start_time');
        $end_time = $request->get('end_time');

        $time = new TimeModel();
        $time->start_time = $start_time;
        $time->end_time = $end_time;
        $time->save();

        return Redirect::route('time.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $check = TimeModel::where('id_time', $id)->firstOrfail();
            $time = TimeModel::find($id);

            return view('admin.time.edit', [
                "time" => $time,
                'check' => $check
            ]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Lỗi!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $time = TimeModel::find($id);
        $time->start_time = $request->get('start_time');
        $time->end_time = $request->get('end_time');

        $time->save();
        return Redirect::route('time.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TimeModel::find($id)->delete();
        return Redirect::route('time.index');
    }
}
