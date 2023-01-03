<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->join('brands', 'products.brand_id', '=', 'brands.id')
        ->select('products.*', 'categories.category_name', 'brands.brand_name')
        ->where('product_status','1')
        ->where('product_delete_status','0')
        ->get();
      return view('admin.products.list')->with('data', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = DB::table('categories')->where('category_status', '1')->where('category_delete_status', '0')->get();
        $brands = DB::table('brands')->where('brand_status', '1')->where('brand_delete_status', '0')->get();
        $products = DB::table('products')->where('product_status', '1')->where('product_delete_status', '0')->get();
        return view('admin.products.add')->with('categories', $categories)->with('brands', $brands)->with('products',$products);
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
            'product_name' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'product_purchase_price' => 'required',
            'product_selling_price' => 'required',
            'product_quantity' => 'required',
            'product_alert_quantity' => 'required',
            'product_tag' => 'max:4',
            'product_description' => 'required',
            'product_thumbnail' => 'required|mimes:jpeg,png,jpg|max:700',
            'product_images' => 'required|array|min:1|max:4',
            'product_images.*' => 'mimes:jpeg,png,jpg|max:700',
            'product_status' => 'required',
            'product_featured_status' => 'required',
        ]);


        $product_slug = Str::slug($request->product_name, '-');

        //Generate Thumbnail
        $thumbnail = $request->product_thumbnail;
        $thumbnailName = $product_slug . '-' . date('dmY') . time() . '.' . $thumbnail->getClientOriginalExtension();
        $directory = 'public/files/products/thumbnails/';
        Image::make($thumbnail)->resize(500, 500)->save($directory . $thumbnailName);

        //Upload Multiple Images
        $multiple_images = array();
        if ($request->product_images) {
            foreach ($request->product_images as $key => $single_image) {

                $image = $single_image;
                $imageName = $product_slug . '-' . $key + 1 . '-' . date('dmY') . time() . '.' . $image->getClientOriginalExtension();
                $path = 'public/files/products/images/';
                Image::make($image)->save($path . $imageName);
                array_push($multiple_images, $path . $imageName);
            }
        }

        $product_id=DB::table('products')->insertGetId([
            'product_name' => $request->product_name,
            'product_slug' =>  $product_slug,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'product_purchase_price' => $request->product_purchase_price,
            'product_selling_price' => $request->product_selling_price,
            'product_discount_price' => $request->product_discount_price,
            'product_quantity' => $request->product_quantity,
            'product_alert_quantity' => $request->product_alert_quantity,
            'product_tag' => $request->product_tag,
            'product_description' => $request->product_description,
            'related_products' => json_encode($request->related_products),
            'product_thumbnail' => $directory . $thumbnailName,
            'product_images' => json_encode($multiple_images),
            'product_status' => $request->product_status,
            'product_featured_status' => $request->product_featured_status,
        ]);




        session()->put('success_message', 'Product Added Successfully');
        return redirect()->route('product.add');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function add_veriant()
    {
        $products = DB::table('products')
        ->where('product_status','1')
        ->where('product_delete_status','0')
        ->get();
       return view('admin.products.add_veriant')->with('data',$products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function verientStore(Request $request)
    {
        DB::table('options')->insert([
            'product_id'=> $request->product_id,
            'size'=> $request->size,
            'color'=> $request->color,
            'quantity'=> $request->quantity,
        ]);

        session()->put('success_message', 'Added Successfully');
        return redirect()->route('product.add_veriant');
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
