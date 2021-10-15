<?php

namespace App\Http\Controllers;

use App\Models\NewsModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Exception;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $listNews = NewsModel::where('title', 'like', "%$search%")->paginate(5);
        return view('admin.news.index', [
            "listNews" => $listNews,
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
        return view('admin.news.create');
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
            'title' => 'required',
            'image' => 'required',
            'content' => 'required',
        ], [
            'title.required' => "Điền thời tiêu đề",
            'image.required' => "Chọn ảnh",
            'content.required' => "Điền nội dung",

        ]);
        $title = $request->get('title');
        $image = $request->file('image');
        $newImageName = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $newImageName);
        $content = $request->get('content');

        $news = new NewsModel();
        $news->title = $title;
        $news->image = $newImageName;
        $news->content = $content;
        $news->save();
        return Redirect::route('news.index');
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
            $check = NewsModel::where('id', $id)->firstOrfail();
            $news = NewsModel::find($id);

            return view('admin.news.edit', [
                "news" => $news,
                'check' => $check
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
        $news = NewsModel::find($id);
        //image
        $image = $request->file('image_old');
        if ($image != '') {
            $newImageName = time() . '.' . $image->getClientOriginalExtension();
            $request->image_old->move(public_path('images'), $newImageName);
        } else {
            $newImageName = $request->hidden_image;
        }
        $news->image = $newImageName;
        $news->title = $request->get('title');
        $news->content = $request->get('content');

        $news->save();
        return Redirect::route('news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        NewsModel::find($id)->delete();
        return Redirect::route('news.index');
    }
}
