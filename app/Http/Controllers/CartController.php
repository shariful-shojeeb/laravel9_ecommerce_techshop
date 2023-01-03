<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function cartList()
    {
        $all_categories = DB::table('categories')
        ->where('category_status', '1')
        ->where('category_delete_status', '0')
        ->get();
        $cartItems = \Cart::getContent();
        // dd($cartItems);
        return view('frontend.cart', compact('cartItems'))->with('categories',$all_categories);
    }


    public function addToCart($id)
    {
        $product_details = DB::table('products')
        ->join('categories', 'products.category_id', '=', 'categories.id')
        ->join('brands', 'products.brand_id', '=', 'brands.id')
        ->select('products.*', 'categories.category_name', 'brands.brand_name')
        ->where('products.id', $id)
        ->where('product_status', '1')
        ->where('product_delete_status', '0')
        ->first();

       // dd( $product_details);


        \Cart::add([
            'id' => $product_details->id,
            'name' => $product_details->product_name,
            'price' => $product_details->product_selling_price,
            'quantity' => '1',
            'attributes' => array(
                'image' => $product_details->product_thumbnail,
            )
        ]);
        session()->flash('success', 'Product is Added to Cart Successfully !');

        return redirect()->route('cart.list');
    }

    public function updateCart(Request $request)
    {
        //dd($request->all());
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        session()->flash('success', 'Item Cart is Updated Successfully !');

        return redirect()->route('cart.list');
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        session()->flash('success', 'Item Cart Remove Successfully !');

        return redirect()->route('cart.list');
    }



    public function clearAllCart()
    {
        \Cart::clear();

        session()->flash('success', 'All Item Cart Clear Successfully !');

        return redirect()->route('cart.list');
    }
}
