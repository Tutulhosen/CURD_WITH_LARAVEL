<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= Product::latest()->get();
        return view('admin.index',[
            'product_data'          => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'headline'             =>'required',
            'desc'                    =>'required',
            'price'                   =>'required',
            'sprice'                 =>'required',
            'catagory'            =>'required',
            'type'                    =>'required',
           
            
        ]);
        if ($request->hasFile('photo')) {
            $file= $request->file('photo');
            $file_name= md5(time() . rand()) . '.' . $file->clientExtension();
            $file->move(storage_path('app/public/product',), $file_name);
        } else {
            $file_name= 'avater.png';
        }

        Product::create( [
                    'headline'              =>$request->headline,
                    'description'           =>$request->desc,
                    'price'                    =>$request->price,
                    'sprice'                  =>$request->sprice,
                    'catagory'              =>$request->catagory,
                    'type'                      =>$request->type,
                    'photo'                    =>$file_name,
        ]);
        return redirect()->route('product.create')->with('success', 'successfully add a product');
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data= Product::find($id);
        return view('admin.show',[
            'product_data'      =>$data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_id= Product::find($id);
        return view('admin.edit',[
            'product_id'        =>$edit_id,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $edit_id= Product::find($id);
        $edit_id->headline           =$request->headline;
        $edit_id->description           =$request->desc;
        $edit_id->price           =$request->price;
        $edit_id->sprice           =$request->sprice;
        $edit_id->catagory           =$request->catagory;
        $edit_id->type           =$request->type;
        $edit_id->update();
        return redirect()->route('product.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data= Product::find($id);
        unlink(storage_path('app/public/product/') . $data->photo);
        $data->delete();
        return redirect()->route('product.index');
    }
}
