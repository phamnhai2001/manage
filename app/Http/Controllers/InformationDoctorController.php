<?php

namespace App\Http\Controllers;
use App\Models\DoctorModel;
use App\Models\SpecialistModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Exception;


class InformationDoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id_doctor = $request->session()->get('id');
        $Doctor = DoctorModel::find($id_doctor);
        return view('doctor.info-doctor.index', [
            "Doctor" => $Doctor,

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
        try {
            $check = DoctorModel::where('id_doctor', $id)->firstOrfail();
            $doctor = DoctorModel::find($id);
            $listSpecialist = SpecialistModel::orderBy('name_specialist')->select('id_specialist', 'name_specialist')->get();
            return view('doctor.info-doctor.edit', compact('doctor', 'listSpecialist'));
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
        $doctor = DoctorModel::find($id);
        //image
        $image = $request->file('image_old');
        if ($image != '') {
            $newImageName = time() . '.' . $image->getClientOriginalExtension();
            $request->image_old->move(public_path('images'), $newImageName);
        } else {
            $newImageName = $request->hidden_image;
        }
        $doctor->image = $newImageName;
        $doctor->address = $request->get('address');
        $doctor->full_name = $request->get('full_name');
        $doctor->email = $request->get('email');
        $doctor->gender = $request->get('gender');
        $doctor->phone = $request->get('phone');
        $doctor->id_specialist = $request->get('id_specialist');
        $doctor->date_birth = $request->get('date_birth');
        $doctor->introduce = $request->get('introduce');
        $doctor->save();
        return Redirect::route('info-doctor.index');
    }
    public function change_password(Request $request)
    {
        $id_doctor = $request->session()->get('id');
        return view('doctor.info-doctor.change-password',[
            'id_doctor' => $id_doctor,
        ]);
    }
    public function update_password(Request $request, $id_doctor)
    {

        $mat_khau_cu = $request->get('mat_khau_cu');
        $mat_khau_moi = $request->get('mat_khau_moi');
        $mat_khau_xac_nhan = $request->get('mat_khau_xac_nhan');

        $count = DoctorModel::where('id_doctor', $id_doctor)->where('password', $mat_khau_cu)->count();
        if ($count == 0) {
            return redirect()->back()->with('error', 'Mật khẩu hiện tại không chính xác!');
        }

        if ($mat_khau_moi == $mat_khau_xac_nhan) {
            $Doctor = DoctorModel::find($id_doctor);
            $Doctor->password = $mat_khau_moi;
            $Doctor->save();
            return redirect()->back()->with('success', 'Đổi mật khẩu thành công!');
        } else {
            return redirect()->back()->with('error', 'Mật khẩu xác nhận không đúng!');
        }
    }
}
