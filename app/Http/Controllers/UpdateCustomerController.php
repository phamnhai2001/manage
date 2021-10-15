<?php

namespace App\Http\Controllers;
use App\Models\CustomerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UpdateCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id_customer)
    {
        $customer = CustomerModel::find($id_customer);
        $id = $request->session()->get('id');
        if($id_customer != $id){
            return redirect()->back()->with('error','Lỗi!!!');
        }
        return view('user.customer.edit', [
            "customer" => $customer
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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_customer)
    {
        $customer = CustomerModel::find($id_customer);
        $id = $request->session()->get('id');
        if($id_customer != $id){
            return redirect()->back()->with('error','Lỗi!!!');
        }
        $customer->full_name = $request->get('full_name');
        $customer->date_birth = $request->get('date_birth');
        $customer->address = $request->get('address');
        $customer->phone = $request->get('phone');
        $customer->gender = $request->get('gender');
        $customer->email = $request->get('email');
        // $customer->password = $request->get('password');

        $customer->save();
        return redirect()->back()->with('success','Cập nhật thành công!');
    }

    public function change_password(Request $request)
    {
        $id_customer = $request->session()->get('id');
        return view('user.customer.change_password',[
            'id_customer' => $id_customer,
        ]);
    }
    public function update_password(Request $request, $id_customer)
    {

        $mat_khau_cu = $request->get('mat_khau_cu');
        $mat_khau_moi = $request->get('mat_khau_moi');
        $mat_khau_xac_nhan = $request->get('mat_khau_xac_nhan');

        $count = CustomerModel::where('id_customer', $id_customer)->where('password', $mat_khau_cu)->count();
        if ($count == 0) {
            return redirect()->back()->with('error', 'Mật khẩu hiện tại không chính xác!');
        }

        if ($mat_khau_moi == $mat_khau_xac_nhan) {
            $Customer = CustomerModel::find($id_customer);
            $Customer->password = $mat_khau_moi;
            $Customer->save();
            return redirect()->back()->with('success', 'Đổi mật khẩu thành công!');
        } else {
            return redirect()->back()->with('error', 'Mật khẩu xác nhận không đúng!');
        }
    }
}
