<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AjaxImage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ajaxImage');
    }


    public function store(Request $request)
        {

            $img = $request->file('image');

            // eta file er original name (extension soho) collect korbe.
            //$img_name = $img->getClientOriginalName(); 

            // eta just file er name (extension baad diye) collect korbe.
            $base_name = pathinfo($img_name, PATHINFO_FILENAME); 

            // shudu extension collect korbe.
            $extension = $img->getClientOriginalExtension(); 

            // file name modify korar jonno
            $file_name_to_save = $base_name ."_".time().".".$extension;

            // file ta temp location theke laravel-er storage folder-a move korte hobe
            $img->storeAs('public/images', $file_name_to_save);

            // now you can return $file_name_to_save to display file name you just saved.
            $imagetable = new AjaxImage();
            $imagetable->title = $request->title;
            $imagetable->image = $file_name_to_save;
            $imagetable->save();
            echo('done hhh');

    
            
        }

        public function FunctionName(Type $var = null)
        {
            // $this->validate($request,[
            //     'title'     => 'required',
            //     'image' => 'required|mimes:png,jpg,jpeg,svg,bmp,ico|max:1024',
            // ]);
            $image = $request->file('image');
            // $image = $request->file("image['image']['tmp_name']");
            return $image;
            $slug = str_slug($request->name);
    
            if (isset($image)) {
                $currentDate = Carbon::now()->toDateString();
                $imageName = $slug.'-'.$currentDate.'-'.uniqid().'-'.$image->getClientOriginalExtension();
                if (!file_exists('thumbnail_images/')) {
                    mkdir('thumbnail_images/', 0777, true);
                }
                $image->move('thumbnail_images/', $imageName);
            }else {
                $imageName = 'default.png';
            }
            
            $slider= new AjaxImage();
            $slider->title = $request->title;
            
            $imageUrl = 'thumbnail_images/'.$imageName;
            $slider->image = $imageUrl;
            $slider->save();
            // return redirect('slider')->with('msg', 'image saved successfully'); 
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
