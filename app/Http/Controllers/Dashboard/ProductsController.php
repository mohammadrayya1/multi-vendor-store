<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

//        $request=request();
//        $products=Category::leftJoin("storeproduct",'id',"=","store_id")
//            ->select(["products.*","storeproduct.store_id"])
//            ->$request->query()->paginate(5);

       $products=Product::with(['category','stores'])
           ->select("products.*")
         //  ->selectRaw('(select store_id  from storeproduct where storeproduct.product_id = products.id) as storeofproduct' )
           ->paginate(15);

        return view('dashboard.products.index',['products'=>$products,"product"=>"products"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            $product=Product::findOrFail($id);
            $tags=implode(',',$product->tags()->pluck('name')->toArray());
            return view("dashboard.products.edit",["product"=>$product,"product_edit"=>"product_edit",'tags'=>$tags]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->update($request->except('tags'));

       // $tags =explode(',',$request->tags);
        $tags =json_decode($request->tags);
        $tags_ids=[];
        $saved_tags=Tag::all();
        foreach ($tags as $items){
            $slug=Str::slug($items->value);
            $tag=$saved_tags->where('slug',$slug)->first();
            if(!$tag){
                $tag=Tag::create([
                    'name'=>$items->value,
                    'slug'=>$slug
                ]);
            }
            $tags_ids[]=$tag->id;
        }

        $product->tags()->sync($tags_ids);


        return Redirect::route ("dashboard.products.index")->with('crud', 'product is updated Successfully');
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
