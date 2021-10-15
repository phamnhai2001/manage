<?php

namespace App\Http\Controllers;
use App\Models\RestModel;
use App\Models\TimeModel;
use App\Models\DoctorModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class InfoRestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id_doctor = $request->session()->get('id');
        $search = $request->get('search');
        $listRest = RestModel::where('date', 'like', "%$search%")->where('id_doctor',$id_doctor)->paginate(5);
        return view('doctor.info-rest.index', compact('listRest', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $today = date('Y-m-d');
        $id_doctor = $request->session()->get('id');
        $listTime = TimeModel::orderBy('start_time', 'ASC')->orderBy('end_time', 'ASC')->select('id_time', 'start_time', 'end_time')->get();
        $Doctor = DoctorModel::find($id_doctor);
        return view('doctor.info-rest.create', compact('listTime', 'Doctor'), [
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
            return Redirect::route('info-rest.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
