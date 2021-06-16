<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    
    
    public function getCategoryList(){
        $data =  Category::all();
        if(count($data) < 1){
            $data = 'Data Not Found';
        }
        $responseArray = [
            'status'=>'ok',
            'data'=>$data
        ]; 
        return response()->json($responseArray,200);
    }

    public function getProductList(){
        
        $data =  Product::all();
        if(count($data) < 1){
            $data = 'Data Not Found';
        }
        $responseArray = [
            'status'=>'ok',
            'data'=>$data
        ]; 
        return response()->json($responseArray,200);
    }

    public function getCategory($id){
    
        $data =  Category::find($id);

        if($data == null){

            $data = 'Data not found with this id';
            $responseArray = [
                'status'=>'failed',
                'data'=>$data
            ]; 
        }
        $responseArray = [
            'status'=>'ok',
            'data'=>$data
        ]; 
       
        return response()->json($responseArray,200);
    }

    public function addProduct(Request $request)
    {
        
       $check = Product::find($request->product_id);
     
       $input =  $request->all();

       if(isset($check)){

            $input['user_id'] = Auth::user()->id;
            $Cart = Cart::create($input);
            
            $responseArray = [
                'status'=>'ok',
                'message'=>'Product added into cart successfully'
            ]; 
 
        }else{

            $responseArray = [
                'status'=>'failed',
                'message'=> 'Product not found'
            ]; 
        }

        return response()->json($responseArray,200);
    }

    public function userCart()
    {
        $user_id = Auth::user()->id;
        $cart = Cart::where('user_id',$user_id)->with('product')->get();
        return response()->json($cart,200);
        dd($Cart);
    }
}
