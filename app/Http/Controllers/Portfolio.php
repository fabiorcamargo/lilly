<?php

namespace App\Http\Controllers;

use App\Models\Portifolio;
use App\Models\PortifolioBg;
use App\Models\PortifolioPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class Portfolio extends Controller
{
    public function bg_upload(Request $request)
    {
        
        $image = $request->file('filepond');
        // dd($image);
        $file_name = $image->getClientOriginalName();
         
         $folder = $_COOKIE['name'];

            $image = $request->file('filepond');

            $image->storePubliclyAs('/' . $folder, $file_name, ['visibility'=>'public', 'disk'=>'bg']);
            
        PortifolioBg::create([
                'folder' => $folder,
                'folder' => 'bg/' . $folder,
                'file' => 'bg/' . $folder . "/" . $file_name,
            ]);
            //dd($user);

    return $folder;
}

        public function photos_upload(Request $request, $id)
            {
                //dd($id);
                $portifolio = Portifolio::find($id);
                //dd($portifolio);
                $image = $request->file('filepond');
                // dd($image);
                $file_name = $image->getClientOriginalName();
                
                $folder = $portifolio->id;

                    $image = $request->file('filepond');
                    //dd($image);
                    $image->storePubliclyAs('/' . $folder, $file_name, ['visibility'=>'public', 'disk'=>'photos']);

                    $photo = $portifolio->photos()->create([
                        'name' => '.',
                        'description' => '.',
                        'folder' => $folder,
                        'file' => 'photos/' . $folder . "/" . $file_name,
                        'category' => '.',
                    ]);
                    //dd($user);

                    Cookie::queue('photo', $photo->id , 10);

            return 'photos/' . $folder . "/" . $file_name;
        }

        

    public function create(Request $request){
        //dd($request->all());
        $photos = PortifolioBg::where('folder', "bg/" . $request->name)
        ->first();

          //dd($photos->file);


        $port = Portifolio::create([
            'name' => $request->name,
            'description' => $request->description,
            'meta-title' => $request->meta_title,
            'tags' => $request->tags,
            'category' => $request->category,
            'meta-description' => 'Lilly Almeida',
            'bg' => "$photos->file",
        ]);

        return redirect(getRouterValue() . "/app/portifolio/photos/$port->id");
    }

    public function photo($id){
        
        $portifolio = Portifolio::find($id);

        //dd($portifolio);

        return view('pages.app.portifolio.photos', ['title' => 'Blog List | CORK - Multipurpose Bootstrap Dashboard Template ', 'breadcrumb' => 'This Breadcrumb'], compact('portifolio'));
    }

    public function photo_post(Request $request, $id){

        //dd($request->all());
        
        $photo = PortifolioPhoto::find($request->cookie('photo'));

        $photo->update([
            'name' => $request->name,
            'description' => $request->description,
            'category' => $request->category,
        ]);

        return back();
    }

    public function grid(){
        
        $portifolios = Portifolio::all();
        $i=2;
        foreach($portifolios as &$portifolio){
            $portifolio->photos = $portifolio->photos()->get();
        }
        //dd($portifolio);

        return view('pages.app.blog.grid', ['title' => 'Blog List | CORK - Multipurpose Bootstrap Dashboard Template ', 'breadcrumb' => 'This Breadcrumb'], compact('portifolios'));
    }

    public function show($id){
        
        $portifolio = Portifolio::find($id);
        $portifolio->photos = $portifolio->photos()->get();
        //dd($portifolio);

        return view('pages.app.blog.show', ['title' => 'Blog List | CORK - Multipurpose Bootstrap Dashboard Template ', 'breadcrumb' => 'This Breadcrumb'], compact('portifolio'));
    }
}