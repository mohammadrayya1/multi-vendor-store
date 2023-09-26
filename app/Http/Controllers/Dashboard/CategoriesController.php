<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categories = Category::all();
        return  view("dashboard.categories.index",["category"=>"categories","categories"=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $parents =Category::all();
        $category=new Category();
        return  view("dashboard.categories.create",
            ["parents"=>$parents,
            "Createcategory"=>"Create-category", "category"=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['slug'=>Str::slug($request->name)]);
        $data=$request->except('imag');


       $request->validate([
          "name"=>['required','min:5'],
           "status"=>"required"
       ]);
        $data['imag']=$this->uploadImage($request);
//       $category=new Category();
//       $category->slug=$request->name;
//       $category->name=$request->name;
//       $category->status=$request->status;
//       $category->category_id=$request->parent_id;
//       $category->save();


        //Math assignment
        $category=Category::create($data);
        return redirect()->route('dashboard.categories.index')->with('crud', 'Category is created Successfully');

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

        $categoryById=Category::find($id);
        $parents =Category::all();
        return view("dashboard.categories.edit",
            ['category'=>$categoryById,
            'categoryedit'=>"Category Edit",
            "parents"=>$parents]);
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
        $request->merge(['slug'=>Str::slug($request->name)]);
        $data=$request->except('imag');


        $request->validate([
            "name"=>['required','min:5'],
            "status"=>"required"
        ]);
            $data['imag']=$this->uploadImage($request);

            $category= Category::find($id);
            $old_image=$category->imag;
            $category->update($data);
            $category->save();
          if ($old_image && $data['imag']){
              Storage::disk('uploads')->delete($old_image);
          }

            return Redirect::route("dashboard.categories.index")->with('crud', 'Category is updated Successfully');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::findOrFail($id);
        if($category->delete()){
            Storage::disk('uploads')->delete($category->imag);
        }
//       Category::destroy($id);
        return Redirect::route("dashboard.categories.index")->with('crud', 'Category is deleted Successfully');
    }

    protected function uploadImage(Request $request){
        if(!$request->imag){
            return;
        }
            $request->hasFile('imag');
            $file=$request->file('imag');
            $path= $file->store('categories',['disk'=>'uploads']);
          return $path;


    }

}
