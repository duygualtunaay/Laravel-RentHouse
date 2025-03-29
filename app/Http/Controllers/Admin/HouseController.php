<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\House;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class HouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datalist=House::all();
        return view('admin.house',['datalist'=>$datalist]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datalist = Category::with('children')->get();
        return view('admin.house_add', ['datalist' => $datalist]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new House;

        $data->title = $request->input('title');
        $data->keywords = $request->input('keywords');
        $data->description = $request->input('description');
        $data->address = $request->input('address');
        $data->phone = $request->input('phone');
        $data->metrekare = $request->input('metrekare');
        $data->isitma = $request->input('isitma');
        $data->odasayisi = $request->input('odasayisi');
        $data->katsayisi = $request->input('katsayisi');
        $data->esya = $request->input('esya');
        $data->binayasi = $request->input('binayasi');
        $data->price = $request->input('price');
        $data->aidat = $request->input('aidat');
        $data->image = $request->input('image');
        $data->category_id = $request->input('category_id');
        $data->user_id = Auth::id();
        $data->detail = $request->input('detail');
        $data->slug = $request->input('slug');
        $data->status = $request->input('status');
        $data->image = Storage::putFile('images', $request->file('image'));
        $data->save();

        return redirect()->route('admin_houses');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function show(House $house)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function edit(House $house,$id)
    {
        $data=House::find($id);
        $datalist = Category::with('children')->get();
        return view('admin.house_edit',['data'=>$data,'datalist'=>$datalist]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\House  $house
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, house $house,$id)
    {
        $data=House::find($id);
        $data->title = $request->input('title');
        $data->keywords = $request->input('keywords');
        $data->description = $request->input('description');
        $data->address = $request->input('address');
        $data->phone = $request->input('phone');
        $data->metrekare = $request->input('metrekare');
        $data->isitma = $request->input('isitma');
        $data->odasayisi = $request->input('odasayisi');
        $data->katsayisi = $request->input('katsayisi');
        $data->esya = $request->input('esya');
        $data->binayasi = $request->input('binayasi');
        $data->price = $request->input('price');
        $data->aidat = $request->input('aidat');
        $data->image = $request->input('image');
        $data->category_id = $request->input('category_id');
        $data->user_id = $data->user_id;
        $data->detail = $request->input('detail');
        $data->slug = $request->input('slug');
        $data->status = $request->input('status');
        if($request->file('image')!=null)
        {
            $data->image = Storage::putFile('images',$request->file('image'));
        }


        $data->save();
        return redirect()->route('admin_houses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\house  $house
     * @return \Illuminate\Http\Response
     */
    public function destroy(house $house,$id)
    {
        DB::table('houses')->where('id','=',$id)->delete();
        return redirect()->route('admin_houses');
    }
}
