<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AppointmentModel;
use App\Models\TimeModel;
use App\Models\DoctorModel;
use App\Models\CustomerModel;
class ListAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customer_id = $request->session()->get('id');
        $listAppointment = AppointmentModel::where('id_customer',$customer_id)->get();
        $listTime = TimeModel::orderBy('start_time','ASC')->orderBy('end_time','ASC')->select('id_time','start_time','end_time')->get();
        $listDoctor = DoctorModel::orderBy('full_name')->select('id_doctor','full_name')->get();
        $listCustomer = CustomerModel::orderBy('full_name')->select('id_customer','full_name')->get();
        return view('user.appointment',compact('listAppointment','listTime','listDoctor','listCustomer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
