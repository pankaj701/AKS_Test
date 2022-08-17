<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Crypt;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $category = DB::table('category')
            ->select('id', 'name')
            ->get();

        $subcat = [];
        $new_array = [];
        $asd = [];

        $data = DB::table('products')
            ->join('category', 'category.id', '=', 'products.category_id')
            ->join('subcategory', 'subcategory.id', '=', 'products.subcategory_id')
            ->select('category.name  as category_name', 'subcategory.subcategory_name as subcat_name', 'products.*')
            // ->groupBy('products.product_name')
            ->get();

        // dd($data);

        $subcatdata = DB::table('subcategory')
            ->join('category', 'category.id', '=', 'subcategory.category_id')
            ->select('category.id as catid', 'subcategory.id', 'subcategory.subcategory_name')
            ->get();

        // $idi = array();
        // foreach($subcatdata as $lk =>$vk){
        //     $idi[$vk->catid][$vk->id] =  $vk->subcategory_name;
        // }

        foreach ($data as $key => $val) {
            $subcat[$val->id] = $val->subcategory_id;
        }
        // dd($subcat);
        foreach ($subcat as $k => $v) {
            $asd[$k] = explode(',', $subcat[$k]);
        }
        // dd($asd);
        return view('Product.index', [
            'category' => $category,
            'data' => $data,
            'asd' => $asd,
            'sub' => $subcatdata,
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

        $titlecount = $request->input('title');
        $heading = $request->input('heading');
        $description = $request->input('description');
        $pdfheading = $request->input('pdfheading');
        $subcat[] = $request->input('subcategory');
        $sad = $subcat[0];
        $br = [];
        $storedata = implode(',', $sad);
        $subname = DB::table('subcategory')
            ->select('subcategory_name')
            ->whereIn('id', $sad)
            ->get();

        foreach ($subname as $k => $v) {
            $br[] = $v->subcategory_name;
        }
        $ad = implode(',', $br);
        $countsub = $request->input('subcategory');

        if (!empty($request->status)) {
            $staus = 1;
        } else {
            $staus = 0;
        }
        
        // without resized
        // if (!empty($request->file('photo'))) {
        //     $name = $request->file('photo')->getClientOriginalName();
        //     $pathInfo = pathinfo($name);
        //     $extension = isset($pathInfo['extension']) ? '.' . $pathInfo['extension'] : '';
        //     $base = $pathInfo['filename'];
        //     $newname = $base . date('YmdHis') . $extension;

        //     $request->file('photo')->move(public_path('images'), $newname);
        // }

        if (!empty($request->hasFile('photo'))) {
            $image = $request->file('image');
            $filename = $request->file('photo')->getClientOriginalName();
            $image_resize = Image::make($request->file('photo')->getRealPath());
            $image_resize->resize(596, 390);
            $image_resize->save(public_path('images/' . $filename));
        }

        if (!empty($request->file('pdf'))) {
            $pcount = $request->file('pdf');
            for ($k = 0; $k < COUNT($pcount); $k++) {
                $uniqueFileName[$k] = $pcount[$k]->getClientOriginalName();
                $pcount[$k]->move(public_path('pdf'), $uniqueFileName[$k]);
            }
        }

        $data = DB::table('products')->insert([
            'category_id' => $request->category,
            'subcategory_id' => $storedata,
            'product_name' => $request->product_name,
            'image' => !empty($filename) ? $filename : '',
            'short_description' => $request->short_description,
            // 'title' => $titlecount[$i],
            // 'heading' => $heading[$i],
            // 'description' => $description[$i],
            'txtcontainer' => $request->txtcontainer,
            // 'pdfheading' => !empty($pdfheading[$i]) ? $pdfheading[$i] : '',
            // 'pdf' => !empty($uniqueFileName[$i]) ? $uniqueFileName[$i] : '',
            'status' => $staus,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'subcategory_name' => $ad,
        ]);
        
        $last_id = DB::table('products')
            ->latest('id')
            ->first();

        for ($i = 0; $i < COUNT($titlecount); $i++) {
            $description = DB::table('description')->insert([
                'product_id' => $last_id->id,
                'title' => $titlecount[$i],
                'heading' => $heading[$i],
                'description' => $description[$i],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }
        
        for ($k = 0; $k < COUNT($pdfheading); $k++) {
            $pdf_update = DB::table('pdf_details')->insert([
                'product_id' => $last_id->id,
                'pdf_heading' => !empty($pdfheading[$k]) ? $pdfheading[$k] : '',
                'pdf' => !empty($uniqueFileName[$k]) ? $uniqueFileName[$k] : '',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        return redirect()
            ->back()
            ->with('insert', 'inserted successfully');
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
    public function edit(Request $request, $id)
    {
        // dd($id);
        $decrypt_id = Crypt::decrypt($id);
        $category = DB::table('category')
            ->select('id', 'name')
            ->get();
        $subid = [];
        $dd = [];

        $category_id = DB::table('products')
            ->join('category', 'category.id', '=', 'products.category_id')
            ->join('subcategory', 'subcategory.id', '=', 'products.subcategory_id')
            // ->join('description','description.id','=' ,'products.id')
            ->select('category.id')
            ->where('products.id', $decrypt_id)
            ->get();


        $description = DB::table('description')
            ->select('description.*')
            ->where('product_id', $decrypt_id)
            ->get();

        $pdf_details = DB::table('pdf_details')
            ->select('pdf_details.*')
            ->where('product_id', $decrypt_id)
            ->get();

        $cat_id = [];
        foreach ($category_id as $key => $value) {
            $cat_id = $value->id;
        }


        $datamultiple = DB::table('subcategory')
            ->select('subcategory.*')
            ->where('category_id', $cat_id)
            ->get();

        $data = DB::table('products')
            ->join('category', 'category.id', '=', 'products.category_id')
            ->join('subcategory', 'subcategory.id', '=', 'products.subcategory_id')
            ->select('category.name  as category_name', 'subcategory.subcategory_name as subcat_name', 'products.*')
            ->where('products.id', $decrypt_id)
            ->groupBy('products.product_name')
            ->get();

        // dd($data);

        return view('Product.edit', [
            'category' => $category,
            'data' => $data,
            'multiple' => $datamultiple,
            'description' => $description,
            'pdfss' => $pdf_details,
        ]);
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
        // dd($request);
        $titlecount = $request->input('title');
        $heading = $request->input('heading');
        $description = $request->input('description');

        // dd($description);
        $pdfheading = $request->input('pdfheading');
        $subcat[] = $request->input('subcategory');
        $sad = $subcat[0];
        $br = [];
        $storedata = implode(',', $sad);
        $subname = DB::table('subcategory')
            ->select('subcategory_name')
            ->whereIn('id', $sad)
            ->get();

        foreach ($subname as $k => $v) {
            $br[] = $v->subcategory_name;
        }

        $ad = implode(',', $br);

        $countsub = $request->input('subcategory');
        $category_id = $request->category;

        if (!empty($request->status)) {
            $staus = 1;
        } else {
            $staus = 0;
        }

        if (!empty($request->hasFile('photo'))) {
            $image = $request->file('image');
            $filename = $request->file('photo')->getClientOriginalName();
            $image_resize = Image::make($request->file('photo')->getRealPath());
            $image_resize->resize(596, 390);
            $image_resize->save(public_path('images/' . $filename));
        }

        if (!empty($request->file('pdf'))) {
            $pcount = $request->file('pdf');
            for ($k = 0; $k < COUNT($pcount); $k++) {
                $uniqueFileName[$k] = $pcount[$k]->getClientOriginalName();
                $pcount[$k]->move(public_path('pdf'), $uniqueFileName[$k]);
            }
        }

        $data = DB::table('products')
            ->where('id', $id)
            ->update([
                'category_id' => $request->category,
                'subcategory_id' => $storedata,
                'product_name' => $request->product_name,
                'image' => !empty($filename) ? $filename : '',
                'short_description' => $request->short_description,
                'txtcontainer' => $request->txtcontainer,
                'status' => $staus,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'subcategory_name' => $ad,
            ]);

        $descriptiondata = DB::table('description')
            ->select('description.id')
            ->where('product_id', $id)
            ->get();

        $desval = [];
        foreach ($descriptiondata as $h => $hh) {
            $desval[] = $hh->id;
        }

        $asd = implode(',', $desval); // value for update multiple id

        //delete existing data

        $del = DB::table('description')
            ->where('product_id', $id)
            ->delete();

        for ($i = 0; $i < COUNT($titlecount); $i++) {
            $update_des = DB::table('description')->insert([
                'product_id' => $id,
                'title' => $titlecount[$i],
                'heading' => $heading[$i],
                'description' => $description[$i],
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        }

        $pdf_details = DB::table('pdf_details')
            ->select('pdf_details.id')
            ->where('product_id', $id)
            ->get();

        $pdf_id = [];
        foreach ($pdf_details as $da => $va) {
            $pdf_id[] = $va->id;
        }

        $pdf_data = implode(',', $pdf_id);

        $del_pdf = DB::table('pdf_details')
            ->where('product_id', $id)
            ->delete();

        for ($k = 0; $k < COUNT($pdfheading); $k++) {
            $update = DB::table('pdf_details')
                // ->where('id', $pdf_data[$k])
                ->insert([
                    'product_id' => $id,
                    'pdf_heading' => !empty($pdfheading[$k]) ? $pdfheading[$k] : '',
                    'pdf' => !empty($uniqueFileName[$k]) ? $uniqueFileName[$k] : '',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]);
        }

        return redirect('product')->with('success', 'updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $decrypt_id = Crypt::decrypt($id);

        DB::table('products')
            ->where('id', $decrypt_id)
            ->delete();
        return redirect()->back();
    }

    public function selectbox(Request $request)
    {
        $id = $request->id;
        $data = DB::table('subcategory')
            ->select('id', 'subcategory_name')
            ->where('category_id', $id)
            ->get();
        return response()->json(['data' => $data]);
    }
}
