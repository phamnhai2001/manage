<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpecialistModel;
use Illuminate\Support\Facades\Redirect;
use Exception;

class SpecialistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');


        $listSpecialist = SpecialistModel::where('name_specialist', 'like', "%$search%")->paginate(5);
        return view('admin.specialist.index', [
            "listSpecialist" => $listSpecialist,
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
        return view('admin.specialist.create');
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
            'name_specialist' => 'required',
            'image' => 'required',
            'introduce' => 'required',
        ], [
            'name_specialist.required' => "Điền tên chuyên ngành",
            'image.required' => "Chọn ảnh",
            'introduce.required' => "Điền giới thiêu",

        ]);
        $name_specialist = $request->get('name_specialist');
        $image = $request->file('image');
        $newImageName = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $newImageName);
        $introduce = $request->get('introduce');

        $specialist = new SpecialistModel();
        $specialist->name_specialist = $name_specialist;
        $specialist->image = $newImageName;
        $specialist->introduce = $introduce;
        $specialist->save();

        return Redirect::route('specialist.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
            $check = SpecialistModel::where('id_specialist', $id)->firstOrfail();
            $specialist = SpecialistModel::find($id);

            return view('admin.specialist.edit', [
                "specialist" => $specialist,
                "check" => $check
            ]);
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
        $specialist = SpecialistModel::find($id);
        $specialist->name_specialist = $request->get('name_specialist');
        $image = $request->file('image_old');
        if ($image != '') {
            $newImageName = time() . '.' . $image->getClientOriginalExtension();
            $request->image_old->move(public_path('images'), $newImageName);
        } else {
            $newImageName = $request->hidden_image;
        }
        $specialist->image = $newImageName;
        $specialist->introduce = $request->get('introduce');

        $specialist->save();
        return Redirect::route('specialist.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SpecialistModel::find($id)->delete();
        return Redirect::route('specialist.index');
    }
}
