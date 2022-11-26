<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_brands = DB::table('brands')->where('brand_delete_status', '0')->get();
        return view('admin.brands.list')->with('data', $all_brands);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brands.add');
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
            'brand_name' => 'required|unique:brands|max:100',
            'brand_image' => 'mimes:jpeg,png,jpg|max:500',
        ]);

        $brand_slug = Str::slug($request->brand_name, '-');

        $image = $request->brand_image;
        $imageName = $brand_slug . '-' . date('dmY') . time() . '.' . $image->getClientOriginalExtension();
        $directory = 'public/files/brands/images/';
        Image::make($image)->save($directory . $imageName);



        DB::table('brands')->insert([
            'brand_name' => $request->brand_name,
            'brand_slug' => $brand_slug,
            'brand_image' =>  $directory . $imageName,

        ]);
        session()->put('success_message', 'Brand Added Successfully');
        return redirect()->route('brand.add');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand_data = DB::table('brands')->where('id', $id)->where('brand_delete_status', '0')->first();
        return view('admin.brands.view')->with('data', $brand_data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand_data = DB::table('brands')->where('id', $id)->where('brand_delete_status', '0')->first();
        return view('admin.brands.edit')->with('data', $brand_data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->route('id');

        $brand_data = DB::table('brands')->where('id', $id)->first();
        $brand_image = $brand_data->brand_image;

        $this->validate($request, [
            'brand_name' => ['required', 'max:100', Rule::unique('brands')->ignore($id)],
            'brand_image' => 'mimes:jpeg,png,jpg|max:500',
        ]);


        $brand_slug = Str::slug($request->brand_name, '-');

        if ($request->brand_image) {
            if (file_exists($brand_image)) {
                unlink($brand_image);
            }


            $image = $request->brand_image;
            $imageName = $brand_slug . '-' . date('dmY') . time() . '.' . $image->getClientOriginalExtension();
            $directory = 'public/files/brands/images/';
            Image::make($image)->save($directory . $imageName);

            DB::table('brands')->where('id', $id)->update([
                'brand_image' => $directory . $imageName,
            ]);
        }

        DB::table('brands')->where('id', $id)->update([
            'brand_name' => $request->brand_name,
            'brand_slug' =>   $brand_slug,
            'brand_status' => $request->brand_status,
            'brand_feature_status' => $request->brand_feature_status,
        ]);

        session()->put('success_message', 'Brand Updated Successfully');
        return redirect()->route('brand.edit', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function changeStatus($id, $status)
    {


        if ($status == '1') {
            DB::table('brands')->where('id', $id)->update([
                "brand_status" => '2',
            ]);
            session()->put('success_message', 'Brand Deactivated Successfully');
        } else {
            DB::table('brands')->where('id', $id)->update([
                "brand_status" => '1',
            ]);
            session()->put('success_message', 'Brand Activated Successfully');
        }


        return redirect()->route('brand.list');
    }

    public function destroy($id)
    {
        DB::table('brands')->where('id', $id)->update([
            "brand_delete_status" => '1',
        ]);
        session()->put('success_message', 'Brand Deleted Successfully');
        return redirect()->route('brand.list');
    }
}
