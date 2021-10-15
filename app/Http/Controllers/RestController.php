<?php

namespace App\Http\Controllers;

use App\Models\RestModel;
use App\Models\TimeModel;
use App\Models\DoctorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Exception;

class RestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $listRest = RestModel::where('date', 'like', "%$search%")->paginate(5);
        return view('admin.rest.index', compact('listRest', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $today = date('Y-m-d');
        $listTime = TimeModel::orderBy('start_time', 'ASC')->orderBy('end_time', 'ASC')->select('id_time', 'start_time', 'end_time')->get();
        $listDoctor = DoctorModel::orderBy('full_name')->select('id_doctor', 'full_name')->get();
        return view('admin.rest.create', compact('listTime', 'listDoctor'), [
            'today' => $today,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $today = date('Y-m-d');
        $date = $request->get('date');
        $id_time = $request->get('id_time');
        $id_doctor = $request->get('id_doctor');
        if ($date < $today) {
            return redirect()->back()->with('error', 'Ngày chọn phải lơn hơn hoặc bằng ngày hôm nay!');
        }
        $count = RestModel::where('date', "$date")->where('id_doctor', "$id_doctor")->where('id_time', "$id_time")->count();
        if ($count != 0) {
            return redirect()->back()->with('error', 'Lịch đã trùng!');
        } else {
            $rest = new RestModel();
            $rest->date = $date;
            $rest->id_time = $id_time;
            $rest->id_doctor = $id_doctor;
            $rest->save();
            return Redirect::route('rest.index');
        }
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
            $check = RestModel::where('id', $id)->firstOrfail();
            $rest = RestModel::find($id);

            $listTime = TimeModel::orderBy('start_time', 'ASC')->orderBy('end_time', 'ASC')->select('id_time', 'start_time', 'end_time')->get();
            $listDoctor = DoctorModel::orderBy('full_name')->select('id_doctor', 'full_name')->get();
            return view('admin.rest.edit', compact('rest', 'listTime', 'listDoctor'));
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
        $rest = RestModel::find($id);
        $rest->date = $request->get('date');
        $rest->id_doctor = $request->get('id_doctor');
        $rest->id_time = $request->get('id_time');
        $rest->save();
        return Redirect::route('rest.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RestModel::find($id)->delete();
        return Redirect::route('rest.index');
    }
}
