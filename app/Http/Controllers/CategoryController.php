<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Http\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_categories = DB::table('categories')->get();
        return view('admin.categories.list')->with('data', $all_categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.add');
    }

    public function changeStatus($id, $status)
    {


        if ($status == '1') {
            DB::table('categories')->where('id', $id)->update([
                "category_status" => '2',
            ]);
            session()->put('success_message', 'Category Deactivated Successfully');
        } else {
            DB::table('categories')->where('id', $id)->update([
                "category_status" => '1',
            ]);
            session()->put('success_message', 'Category Activated Successfully');
        }


        return redirect()->route('category.list');
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
            'category_name' => 'required|unique:categories|max:50',
            'category_description' => 'required|max:100',
            'category_image' => 'mimes:jpeg,png,jpg|max:1000',
        ]);

        $image = $request->category_image;
        $imageName = date('d-m-Y') . '-' . time() . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(32, 32)->save('public/files/category/images/' . $imageName);



        DB::table('categories')->insert([
            'category_name' => $request->category_name,
            'category_description' => $request->category_description,
            'category_slug' => Str::slug($request->category_name, '-'),
            'category_image' =>  $imageName,

        ]);
        session()->put('success_message', 'Category Added Successfully');
        return redirect()->route('category.add');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category_data = DB::table('categories')->where('id', $id)->first();
        return view('admin.categories.view')->with('data', $category_data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category_data = DB::table('categories')->where('id', $id)->first();
        return view('admin.categories.edit')->with('data', $category_data);
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
        $category_data = DB::table('categories')->where('id', $id)->first();
        $category_image = $category_data->category_image;

        $this->validate($request, [
            'category_name' => ['required', 'max:50', Rule::unique('categories')->ignore($id)],
            'category_description' => 'required',
            'category_image' => 'mimes:jpeg,png,jpg|max:1000',
        ]);

        if ($request->file('category_image')) {
            if (file_exists('public/files/category/images/' .  $category_image)) {
                unlink('public/files/category/images/' .  $category_image);
           }

            $image = $request->category_image;
            $imageName = date('d-m-Y') . '-' . time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(32, 32)->save('public/files/category/images/' . $imageName);

            DB::table('categories')->where('id', $id)->update([
                'category_image' =>  $imageName,
            ]);
        }

        DB::table('categories')->where('id', $id)->update([
            'category_name' => $request->category_name,
            'category_description' => $request->category_description,
            'category_slug' => Str::slug($request->category_name, '-'),
            'category_status' => $request->category_status,
            'category_popular_status' => $request->category_popular_status,

        ]);

        session()->put('success_message', 'Category Updated Successfully');
        return redirect()->route('category.edit', $id);
    }


    public function posts_by_category_id()
    {
        return view('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('categories')->where('id', $id)->update([
            "category_status" => '2',
        ]);
        session()->put('success_message', 'Category Deleted Successfully');
        return redirect()->route('category.list');
    }
}
