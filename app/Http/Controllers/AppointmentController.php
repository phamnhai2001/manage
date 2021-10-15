<?php

namespace App\Http\Controllers;
use App\Models\AppointmentModel;
use App\Models\CustomerModel;
use App\Models\DoctorModel;
use App\Models\TimeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $search = $request->get('search');
        $listAppointment = AppointmentModel::where('date','like',"%$search%")->paginate(5);
        return view('admin.appointment.index',[
            "listAppointment" => $listAppointment,
            "search" => $search
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $listCustomer = CustomerModel::orderBy('full_name')->select('id_customer','full_name')->get();
        $listDoctor = DoctorModel::orderBy('full_name')->select('id_doctor','full_name')->get();
        $listTime = TimeModel::orderBy('start_time','ASC')->orderBy('end_time','ASC')->select('id_time','start_time','end_time')->get();
        return view('admin.appointment.create',compact('listCustomer','listDoctor','listTime'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $date = $request->get('date');
        $id_customer = $request->get('id_customer');
        $id_doctor = $request->get('id_doctor');
        $id_time = $request->get('id_time');

        $appointment = new AppointmentModel();
        $appointment->date = $date;
        $appointment->id_customer =$id_customer;
        $appointment->id_doctor =$id_doctor;
        $appointment->id_time =$id_time;
        $appointment->save();
        return Redirect::route('appointment.index');
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
        $appointment = AppointmentModel::find($id);
        $lisCustomer = CustomerModel::orderBy('full_name')->select('id_customer','full_name')->get();
        $listDoctor = DoctorModel::orderBy('full_name')->select('id_doctor','full_name')->get();
        $listTime = TimeModel::orderBy('start_time','ASC')->orderBy('end_time','ASC')->select('id_time','start_time','end_time')->get();
        return view('admin.appointment.edit',compact('appointment','listCustomer','listDoctor','listTime'));
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
        $appointment = AppointmentModel::find($id);
        $appointment->date = $request->get('date');
        $appointment->id_customer = $request->get('id_customer');
        $appointment->id_doctor = $request->get('id_doctor');
        $appointment->id_time = $request->get('id_time');
        $appointment->save();
        return Redirect::route('appointment.index');
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
        AppointmentModel::find($id)->delete();
        return Redirect::route('appointment.index');
    }
}
