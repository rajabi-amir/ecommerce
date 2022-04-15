<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\ProductImage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session ;
use Illuminate\Support\Facades\Storage;
use Flasher\Toastr\Prime\ToastrFactory;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Session::forget('images');
        
        $brands=Brand::all();
        $tags=Tag::all();
        $categories=Category::where('parent_id','!=' , 0)->get();
       
        return view('admin.page.products.create' , compact('brands','tags','categories') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request ,ToastrFactory $flasher)
    {
        try {
            DB::beginTransaction();

        if (isset($request->primary_image)) {
            $ImageController = new ImageController();
            $image_name = $ImageController->UploadeImage($request->primary_image, "primary_image", 800, 600);
        } else {
            $image_name = null;
        }
        $product = Product::create([
            'name' => $request->name,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'primary_image' => $image_name,
            'description' => $request->description,
            'is_active' => $request->is_active,
            'delivery_amount' => $request->delivery_amount,
            'delivery_amount_per_product' => $request->delivery_amount_per_product,
        ]);
        $imagesStore = Session::pull('images', []);

        foreach ($imagesStore as $imageStore) 
        {
            ProductImage::create([
                'product_id' => $product->id,
                'image' => $imageStore
        ]);
        }

        $productAttributeController = new ProductAttributeController();
        $productAttributeController->store($request->attribute_ids, $product);
   
        $category = Category::find($request->category_id);
        $productVariationController = new ProductVariationController();
        $productVariationController->store($request->variation_values, $category->attributes()->wherePivot('is_variation', 1)->first()->id, $product);

        $product->tags()->attach($request->tag_ids);
        DB::commit();
    } catch (\Exception $ex) {
        DB::rollBack();
        $flasher->addError('مشکل در ایجاد محصول');

        return redirect()->back();
    }
    $flasher->addSuccess('محصول مورد نظر ایجاد شد');
    return redirect()->route('admin.products.index');

       
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

  

    public function uploadImage(Request $request){
  
            $images = $request->file();
           
        
            if (count($images) > 0) {
            
                foreach ($images as $image) {
                    
                    $ImageController = new ImageController();
                    $image_name = $ImageController->UploadeImage($image, "test");
                    Session::push('images', $image_name);
                    $paths[] = ['url' => $image_name];
                }
        
            }
          
            
            return response()->json($image_name, 200);
           
        
    }

 

    public function deleteImage(Request $request){
        
            $namefile = $request->name;
            ProductImage::where('image',$namefile)->delete();
            Storage::delete('test/' .$namefile);

            $images = Session::pull('images', []); // Second argument is a default value
            if(($key = array_search($namefile, $images)) !== false) {
                unset($images[$key]);
            }
            Session::put('images', $images);
            
            
            return response()->json(['success' =>"تصویر حذف شد"]);
           
    }
}