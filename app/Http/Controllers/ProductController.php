<?php

namespace App\Http\Controllers;
use App\Models\Product;


use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function product_registration()
    {
        return view('product_registration');
    }
    public function product_reg(Request $request)
    {
      $request->validate([
            'product_name'=>'required',
            'product_detail'=>'required',
            'product_price'=>'required',
            'image'=>'mimes:jpeg,jpg,png,gif|max:2048',
            

            
        ]);
        $data = $request->all();
        $path='asset/storage/images/'.$data['image'];
            $fileName=time().$request->file('image')->getClientoriginalName();
            $PATH=$request->file('image')->storeAs('images',$fileName,'public');
            $datas["image"]='/storage/'.$path;
            $data['image']=$fileName;
            
            $data['approval_status'] = 0;

        
            Product::create($data); 
            
            return redirect()->route('product_registration')->with('success','registered');
    }
    public function admin_view()
    {
        $view=Product::all();
        return view('admin_view',compact('view'));

    }


}
