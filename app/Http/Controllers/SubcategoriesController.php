<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SubcategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category = DB::table('category')->select('id','name')->get();

        $subdata = DB::table('subcategory')
        ->join('category','category.id','=','subcategory.category_id')
        ->select('subcategory.*','category.name as categrory_name')
        ->get();
        
        // dd($subdata);
        // dd($category);
        return view('Subcategories.index',[
            'category' =>$category,
            'data'=>$subdata


        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        
        $name = $request->category_name;
        if(!empty($request->status)){
            $staus = 1;
        }
        else{
            $staus = 0;
        }
         
        $MyArr = DB::table('subcategory')->insert([
            'category_id'=>$request->category,
            'subcategory_name' =>$request->subcategory,
            'status'=>$staus,
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]); 

        return redirect()->back();

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


        $category = DB::table('category')->select('id','name')->get();      

        // dd($category);

        $subdata = DB::table('subcategory')
        ->join('category','category.id','=','subcategory.category_id')
        ->select('subcategory.*','category.name as categrory_name')
        ->where('subcategory.id',$id)
        ->get();
        // dd($subdata);
        return view('Subcategories.edit' ,['data'=>$subdata , 'category'=>$category]);
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
        
        $category_id = $request->category_id;
        
        if(!empty($request->status)){
            $staus = 1;
        }
        else{
            $staus = 0;
        }

        $data = DB::table('subcategory')->where('id',$id)->update([
            'category_id'=>$category_id,
            'subcategory_name'=>$request->subcategory,
            'status'=>$staus,
            'created_at'=> date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect('subcategories');
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
        DB::table('subcategory')->where('id' , $id)->delete();

        return redirect()->back();
    }
}
