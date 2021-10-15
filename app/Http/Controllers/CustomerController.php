<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerModel;
use Illuminate\Support\Facades\Redirect;
use Exception;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $search = $request->get('search');
        $listCustomer = CustomerModel::where('full_name', 'like', "%$search%")->paginate(5);
        return view(
            'admin.customer.index',
            compact($listCustomer),
            [
                'listCustomer' => $listCustomer,
                "search" => $search
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.customer.create');
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
        $full_name = $request->get('full_name');
        $date_birth = $request->get('date_birth');
        $address = $request->get('address');
        $phone = $request->get('phone');
        $gender = $request->get('gender');
        $email = $request->get('email');
        $password = $request->get('password');

        $customer = new CustomerModel();
        $customer->full_name = $full_name;
        $customer->date_birth = $date_birth;
        $customer->address = $address;
        $customer->phone = $phone;
        $customer->gender = $gender;
        $customer->email = $email;
        $customer->password = $password;

        $customer->save();

        return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $check = CustomerModel::where('id_customer', $id)->firstOrfail();
            $customer = CustomerModel::find($id);
            return view('admin.appointment.show', compact('customer'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Lỗi!');
        }
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
        $customer = CustomerModel::find($id);

        return view('admin.customer.edit', [
            "customer" => $customer
        ]);
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
        $customer = CustomerModel::find($id);
        $customer->full_name = $request->get('full_name');
        $customer->date_birth = $request->get('date_birth');
        $customer->address = $request->get('address');
        $customer->phone = $request->get('phone');
        $customer->gender = $request->get('gender');
        $customer->email = $request->get('email');
        $customer->password = $request->get('password');

        $customer->save();
        return Redirect::route('customer.index');
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
        CustomerModel::find($id)->delete();
        return Redirect::route('customer.index');
    }
}
