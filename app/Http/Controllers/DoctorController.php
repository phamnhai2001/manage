<?php

namespace App\Http\Controllers;

use App\Models\DoctorModel;
use App\Models\SpecialistModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Exception;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        $listDoctor = DoctorModel::where('full_name', 'like', "%$search%")->paginate(5);
        return view('admin.doctor.index', [
            "listDoctor" => $listDoctor,
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
        $listSpecialist = SpecialistModel::orderBy('name_specialist')->select('id_specialist', 'name_specialist')->get();
        return view('admin.doctor.create', compact('listSpecialist'));
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
            'full_name' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:customer',
            'introduce' => 'required',
            'address' => 'required',
            'date_birth' => 'required',
            'image' => 'required',
        ], [
            'email.required' => "Điền mail",
            'email.unique' => "Email đã tồn tại",
            'phone.required' => "Điền số điện thoại",
            'introduce.required' => "Điền giới thiệu",
            'full_name.required' => "Điền họ tên đầy đủ",
            'date_bith.required' => "Điền ngày sinh",
            'address.required' => "Điền địa chỉ",
            'image.required' => "Chọn ảnh",

        ]);

        $address = $request->get('address');
        $image = $request->file('image');
        $newImageName = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $newImageName);
        $full_name = $request->get('full_name');
        $email = $request->get('email');
        $gender = $request->get('gender');
        $phone = $request->get('phone');
        $id_specialist = $request->get('id_specialist');
        $date_birth = $request->get('date_birth');
        $introduce = $request->get('introduce');


        $doctor = new DoctorModel();
        $doctor->full_name = $full_name;
        $doctor->email = $email;
        $doctor->phone = $phone;
        $doctor->gender = $gender;
        $doctor->image = $newImageName;
        $doctor->address = $address;
        $doctor->password = $phone;
        $doctor->date_birth = $date_birth;
        $doctor->id_specialist = $id_specialist;
        $doctor->introduce = $introduce;
        $doctor->save();
        return Redirect::route('doctor.index');
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
            return view('admin.doctor.edit', compact('doctor', 'listSpecialist'));
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
        return Redirect::route('doctor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DoctorModel::find($id)->delete();
        return Redirect::route('doctor.index');
    }
}
