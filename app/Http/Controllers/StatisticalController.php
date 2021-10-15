<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\DoctorModel;
use App\Models\SpecialistModel;
use App\Models\CustomerModel;
use App\Models\AppointmentModel;
use App\Models\RestModel;
use App\Charts\AdminChart;
use App\Http\Controllers\SpecialistController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\RestController;
use DB;
use Exception;
class StatisticalController extends Controller
{
    public function index()
    {
        $specialist = DB::table('specialist')->count();
        $doctor = DB::table('doctors')->count();
        $customer = DB::table('customer')->count();
        $news = DB::table('news')->count();
        $appointment = DB::table('appointment_schedule')->get();
        $today = date('Y-m-d');

        $date_from = date('Y-m-1') ;
        if((request()->date_from) > $today){
            return redirect()->back()->with('error', 'Ngày chọn phải bé hơn ngày hôm nay!');
        } else {
            $date_from = request()->date_from;
        }

        $date_to = date('Y-m-d');
        if(request()->date_to){
            $date_to = request()->date_to;
        }

        //thống kê lịch làm
            $time = DB::table('appointment_schedule')
            ->select(array('doctors.full_name as full_name', DB::raw('COUNT(appointment_schedule.id_time) as times')))
            ->whereBetween('date',[$date_from,$date_to])
            ->join('doctors', 'doctors.id_doctor', '=', 'appointment_schedule.id_doctor')
            ->groupBy('appointment_schedule.id_doctor','full_name')
            ->orderBy('full_name', 'asc')
            ->get();

        $dataChartJS = array();        
        foreach ($time as $value) {
            $dataChartJS[] = $value;
        }
        $dataChartJS = json_encode($dataChartJS);
        

        //thống kê lịch hẹn
        $year =  2021;
        $data = DB::table("appointment_schedule")
            ->select(DB::raw("count(id) as appointment"),DB::Raw("month(date) as months"))
            ->whereYear('date',$year)
            ->groupBy(DB::raw("month(date)"))
            ->get();

        $data_appointment = array();
        foreach ($data as $value) {
            $data_appointment[] = $value;
        }
        $data_appointment = json_encode($data_appointment);
       
        return view('admin.statistical.index', compact('specialist','doctor','customer','news','appointment','dataChartJS','data_appointment','today','date_from','date_to'));

    }
}
    