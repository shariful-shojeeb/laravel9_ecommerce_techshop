<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $featured_products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'categories.category_name', 'brands.brand_name')
            ->where('product_status', '1')
            ->where('product_featured_status', '1')
            ->where('product_delete_status', '0')
            ->get();

        $new_arraivals=DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->join('brands', 'products.brand_id', '=', 'brands.id')
        ->select('products.*', 'categories.category_name', 'brands.brand_name')
        ->where('product_status', '1')
        ->where('product_new_arraival_status', '1')
        ->where('product_delete_status', '0')
        ->get();

        $all_categories = DB::table('categories')
            ->where('category_status', '1')
            ->where('category_delete_status', '0')
            ->get();

        return view('frontend.index')
            ->with('featured_products', $featured_products)
            ->with('categories', $all_categories)
            ->with('new_arraivals',);
    }

    public function cart()
    {

        $all_categories = DB::table('categories')
            ->where('category_status', '1')
            ->where('category_delete_status', '0')
            ->get();
        return view('frontend.cart') ->with('categories', $all_categories);
    }

    public function shop()
    {
        $all_categories = DB::table('categories')
            ->where('category_status', '1')
            ->where('category_delete_status', '0')
            ->get();
        return view('frontend.shop')->with('categories', $all_categories);
    }
    public function product($id)
    {

        $all_categories = DB::table('categories')
            ->where('category_status', '1')
            ->where('category_delete_status', '0')
            ->get();

        $product_details = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'categories.category_name', 'brands.brand_name')
            ->where('products.id', $id)
            ->where('product_status', '1')
            ->where('product_delete_status', '0')
            ->first();
        // dd(json_decode($product_details->related_products));

        $veriants = DB::table('options')->where('product_id', $id)->where('status', '1')->get();
        //dd($veriants);

        //Related Products
        $related_products = array();

        if (!empty($product_details->related_products)) {
            foreach (json_decode($product_details->related_products) as $product_id) {
                $related = DB::table('products')->where('id', $product_id)->where('product_status', '1')
                    ->where('product_delete_status', '0')->first();
                array_push($related_products, $related);
            }
        }



        return view('frontend.product')
            ->with('categories', $all_categories)
            ->with('product_details', $product_details)
            ->with('veriants', $veriants)
            ->with('related_products', $related_products);
    }
    public function contact()
    {
        return view('frontend.contact');
    }

    public function loginView()

    {
        $all_categories = DB::table('categories')
        ->where('category_status', '1')
        ->where('category_delete_status', '0')
        ->get();
        return view('frontend.customer_login')->with('categories', $all_categories);
    }
    public function billing()

    {
        $all_categories = DB::table('categories')
        ->where('category_status', '1')
        ->where('category_delete_status', '0')
        ->get();
        return view('frontend.bill_ship')->with('categories', $all_categories);
    }
    public function loginCkeck(Request $request)

    {

        $hashed_password=md5($request->customer_password);
        $customer_data=DB::table('customers')
        ->where('customer_email',$request->customer_email)
        ->where('customer_password',$hashed_password)
        ->first();

        //dd($customer_data);

            //Adding Admin Data to Session
            session()->put('customer_name', $customer_data->customer_name);
            session()->put('id', $customer_data->id);

        $all_categories = DB::table('categories')
        ->where('category_status', '1')
        ->where('category_delete_status', '0')
        ->get();
        return view('frontend.bill_ship')->with('categories', $all_categories);
    }
    public function regView()

    {
        $all_categories = DB::table('categories')
        ->where('category_status', '1')
        ->where('category_delete_status', '0')
        ->get();
        return view('frontend.customer_register')->with('categories', $all_categories);
    }
    public function customerCreate(Request $request)

    {

        $all_categories = DB::table('categories')
        ->where('category_status', '1')
        ->where('category_delete_status', '0')
        ->get();

        DB::table('customers')->insert([
            'customer_name'=> $request->customer_name,
            'customer_email'=> $request->customer_email,
            'customer_phone'=> $request->customer_phone,
            'customer_password'=> md5($request->customer_password),
            'customer_address'=> $request->customer_address,
            'customer_city'=> $request->customer_city,
            'customer_country'=> $request->customer_country,
            'customer_zip'=> $request->customer_zip,
        ]);
        session()->put('success_message', 'Registered Successfully. You can login now');
        return view('frontend.customer_login')->with('categories', $all_categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category($id)
    {

        $all_categories = DB::table('categories')
            ->where('category_status', '1')
            ->where('category_delete_status', '0')
            ->get();

        $category_data= DB::table('categories')
        ->where('id', $id)
        ->where('category_status', '1')
        ->where('category_delete_status', '0')
        ->first();

        $category_products=DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->join('brands', 'products.brand_id', '=', 'brands.id')
        ->select('products.*', 'categories.category_name', 'brands.brand_name')
        ->where('products.category_id', $id)
        ->where('product_status', '1')
        ->where('product_delete_status', '0')
        ->get();



        return view('frontend.category')->with('products',$category_products)->with('categories',$all_categories)->with('category_data',$category_data);
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
        //
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
