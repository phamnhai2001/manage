<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoctorModel;
use App\Models\TimeModel;
use App\Models\RestModel;
use App\Models\AppointmentModel;
use App\Models\NewsModel;
use App\Models\SpecialistModel;
use Illuminate\Support\Facades\Redirect;

use Exception;


class InfoDoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id_doctor)
    {
        try {
            $check = DoctorModel::where('id_doctor', $id_doctor)->firstOrfail();
            $array_time = array();
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $today = date('Y-m-d');
            $doctor = DoctorModel::find($id_doctor);
            $specialist = SpecialistModel::orderBy('name_specialist')->select('id_specialist', 'name_specialist')->get();
            $rest_schedule = RestModel::where('date', $today)->where('id_doctor', $id_doctor)->get();
            $time = TimeModel::orderBy('start_time', 'ASC')->orderBy('end_time', 'ASC')->select('id_time', 'start_time', 'end_time')->get();
            $appointment_schedule = AppointmentModel::where('date', $today)->where('id_doctor', $id_doctor)->get();
            foreach ($rest_schedule as $value) {
                array_push($array_time, $value->id_time);
            }
            foreach ($appointment_schedule as $value) {
                array_push($array_time, $value->id_time);
            }

            $empty_time_id = TimeModel::all()->whereNotIn('id_time', $array_time);

            return view('user.info-doctor', ['empty_time_id' => $empty_time_id, 'today' => $today], compact('doctor', 'time'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Lỗi!');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id_doctor)
    {
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
            'name_customer' => 'required',
            'phone_customer' => 'required',
        ], [
            'name_customer.required' => "Điền đầy đủ họ tên",
            'phone_customer.required' => "Điền số điện thoại",
        ]);

        $specialist = SpecialistModel::all();
        $doctor = DoctorModel::all();
        $news = NewsModel::all();

        $user = $request->session()->get('user');
        $id_customer = $user->id_customer;
        $name_customer = $request->get('name_customer');
        $phone_customer = $request->get('phone_customer');
        $id_doctor = $request->get('id_doctor');
        $date = $request->get('date');
        $id_time = $request->get('id_time');

        $appointment = new AppointmentModel();
        $appointment->name_customer = $name_customer;
        $appointment->phone_customer = $phone_customer;
        $appointment->date = $date;
        $appointment->id_doctor = $id_doctor;
        $appointment->id_customer = $id_customer;
        $appointment->id_time = $id_time;

        $appointment->save();
        // return Redirect::route('user.info-doctor/{id_doctor}')->with('success','Đăng ký thành công');

        return view('user.welcome', [
            'specialist' => $specialist,
            'doctor' => $doctor,
            'news' => $news,
        ]);
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
