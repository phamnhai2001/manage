<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\RegisterModel;
use Illuminate\Support\Facades\Redirect;
use Session;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $listRegister = RegisterModel::all();
        return view('user.register.index', compact($listRegister), [
            "listRegister" => $listRegister,
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
        $validated = $request->validate([
            'full_name' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:customer',
            'password' => 'required',
            'address' => 'required',
            'date_birth' => 'required'
        ], [
            'email.required' => "Email không được để trống",
            'email.unique' => "Email đã tồn tại",
            'phone.required' => "Số điện thoại không được để trống",
            'password.required' => "Password không được trống",
            'full_name.required' => "Họ tên không được để trống",
            'date_bith.required' => "Ngày sinh không được để trống",
            'address.required' => "Địa chỉ không được để trống",
        ]);
        $full_name = $request->get('full_name');
        $date_birth = $request->get('date_birth');
        $address = $request->get('address');
        $phone = $request->get('phone');
        $gender = $request->get('gender');
        $email = $request->get('email');
        $password = $request->get('password');


        $register = new RegisterModel();
        $register->full_name = $full_name;
        $register->date_birth = $date_birth;
        $register->address = $address;
        $register->phone = $phone;
        $register->gender = $gender;
        $register->email = $email;
        $register->password = $password;


        $register->save();
        session()->flash('success', 'Đăng kí thành công!');
        return redirect('/');
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
