<?php

namespace App\Http\Controllers;

use App\Models\Portifolio;
use App\Models\PortifolioBg;
use App\Models\PortifolioPhoto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class Portfolio extends Controller
{
    public function bg_upload(Request $request)
    {
        //dd($request);
        $image = $request->file('filepond');
        //dd($image);
        $file_name = $image->getClientOriginalName();
         
         $folder = $_COOKIE['photos'];

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
                $file_name = $image->getClientOriginalName();
                $folder = $portifolio->id;
                // dd($image);
                

                    $image = $request->file('filepond');
                    //dd($image);
                    Image::make($image->getRealPath());
                    $image->storePubliclyAs('/' . $folder, $file_name, ['visibility'=>'public', 'disk'=>'photos']);
                    
                    

                    $thumbnailImage = Image::make($image);
                    $thumbnailPath = public_path().'/thumbnail/';
                    $thumbnailImage->resize(150,150);
                    $thumbnailImage->storePubliclyAs('/' . $folder . '/thumb', $file_name, ['visibility'=>'public', 'disk'=>'photos']);



                    $photo = $portifolio->photos()->create([
                        'name' => '.',
                        'description' => '.',
                        'folder' => $folder,
                        'file' => 'photos/' . $folder . "/" . $file_name,
                        'tags' => '.',
                    ]);
                    //dd($user);

                    //Cookie::queue('photo', $photo->id , 10);

            return 'photos/' . $folder . "/" . $file_name;
        }

        

    public function create(Request $request){

        $photos = PortifolioBg::where('folder', "bg/" . $request->album)
        ->first();

        $port = Portifolio::create([
            'name' => $request->album,
            'description' => $request->description,
            'meta-title' => $request->meta_title,
            'tags' => $request->tags,
            'category' => ".",
            'meta-description' => 'Lilly Almeida',
            'bg' => "photos/sem-foto.gif",
        ]);

        return redirect(getRouterValue() . "/app/portifolio/photos/$port->id");
    }

    public function photo($id){
        
        $portifolio = Portifolio::find($id);

        //dd($portifolio);

        return view('pages.app.portifolio.photos', ['title' => env('NAME_PORTIFOLIO') . " | " . env('PROFISSAO'), 'breadcrumb' => 'This Breadcrumb'], compact('portifolio'));
    }

    public function photo_post(Request $request, $id){

        //dd($request->all());
        
        $photo = PortifolioPhoto::find($request->cookie('photo'));

        $photo->update([
            'name' => $request->name,
            'description' => $request->description,
            'tags' => $request->tags,
        ]);

        return back();
    }

    public function grid(){

        $portifolios = Portifolio::all();
        $i=2;

        foreach($portifolios as &$portifolio){

            $portifolio->photos = $portifolio->photos()->get();
        }
        //dd($portifolios);

        return view('pages.app.portifolio.grid', ['title' => env('NAME_PORTIFOLIO') . " | " . env('PROFISSAO'), 'breadcrumb' => 'This Breadcrumb'], compact('portifolios'));
    }

    public function show($id){
        
        $portifolio = Portifolio::find($id);
        $portifolio->photos = $portifolio->photos()->get();
        //dd($portifolio);

        return view('pages.app.portifolio.show', ['title' => env('NAME_PORTIFOLIO') . " | " . env('PROFISSAO'), 'breadcrumb' => 'This Breadcrumb'], compact('portifolio'));
    }

    public function list(){
        $portifolios = Portifolio::all();

        return view('pages.app.portifolio.list', ['title' => env('NAME_PORTIFOLIO') . " | " . env('PROFISSAO'), 'breadcrumb' => 'This Breadcrumb'], compact('portifolios'));
    }

    public function edit($id){
        $portifolio = Portifolio::find($id);
        $portifolio->photos = $portifolio->photos()->get();

        return view('pages.app.portifolio.list_photos', ['title' => env('NAME_PORTIFOLIO') . " | " . env('PROFISSAO'), 'breadcrumb' => 'This Breadcrumb'], compact('portifolio'));
    }

    public function photo_edit($album, $id){
        $portifolio = Portifolio::find($album);
        $portifolio->photo = $portifolio->photos()->where('id', $id)->first();

        //dd($portifolio->photo);

        return view('pages.app.portifolio.photo_edit', ['title' => env('NAME_PORTIFOLIO') . " | " . env('PROFISSAO'), 'breadcrumb' => 'This Breadcrumb'], compact('portifolio'));
    }

    public function photo_save(Request $request, $album, $id){
        //dd($request->all());
        $photo = PortifolioPhoto::find($id);
        $portifolio = Portifolio::find($album);
        
        $request->photo !== null ? $photo->name = $request->photo : "";
        $request->description !== null ? $photo->description = $request->description : "";
        $request->tags !== null ? $photo->tags = $request->tags : "";
        //dd($photo);
        $photo->save();
        return redirect(getRouterValue() . "/app/portifolio/edit/$portifolio->id");
    }

    public function album_save(Request $request, $album){
        //dd($request->all());
        //$photo = PortifolioPhoto::find($id);
        $portifolio = Portifolio::find($album);
        //$portifolio->description = Str::markdown($portifolio->description);
        $request->album !== null ? $portifolio->name = $request->album : "";
        $request->description !== null ? $portifolio->description = $request->description : "";
        $request->tags !== null ? $portifolio->tags = $request->tags : "";
        $request->category !== null ? $portifolio->category = $request->category : "";
        $request->bg !== null ? $portifolio->bg = $request->bg : "";

        $portifolio->save();
        //dd($request->all());
        //dd($portifolio);
        return redirect(getRouterValue() . "/app/portifolio/edit/$portifolio->id");
    }

    public function grid_redir(){

        return redirect("https://lillyalmeida.com.br/modern-light-menu/app/portifolio/grid");
    }

    public function up_bg(){
        $bg = "/" . User::find(2)->image;
        //dd($bg);
        $path = base_path('.env');
        $test = file_get_contents($path);
        
        $ini = [env('IMG_PORTIFOLIO'), env('IMG_POST')];
        $fim = [$bg, $bg];
        $status = file_put_contents($path, str_replace($ini, $fim, $test));
        //dd($status);
        return redirect("https://lillyalmeida.com.br/modern-light-menu/app/portifolio/grid");
    }

    public function save_bg(Request $request){

        $image = $request->file('filepond');
            $file_name = $image->getClientOriginalName();
            $image = $request->file('filepond');
            //dd($image);
            $image->storePubliclyAs('/', $file_name, ['visibility'=>'public', 'disk'=>'bg']);
            $path = base_path('.env');
            $test = file_get_contents($path);
            $ini = env('BG_PORTIFOLIO');
            $fim = "bg/$file_name";
            file_put_contents($path, str_replace($ini, $fim, $test));
            

            return redirect("https://lillyalmeida.com.br/modern-light-menu/app/portifolio/grid");
    }
    public function delete_album(Request $request, $id){

        $portifolio = Portifolio::find($id);
        
        if(isset($portifolio)){
        $path = explode('/', $portifolio->bg);
        Storage::deleteDirectory($path[0] . "/" . $path[1]);

        $photos = $portifolio->photos()->get();
        if(isset($photos[0]->file)){
        $path = explode('/', $photos[0]->file);
        Storage::deleteDirectory($path[0] . "/" . $path[1]);
        }
  
        foreach($photos as $photo){
            $photo->delete();
        }
        $portifolio->delete();
        }

        return back();
    }

    public function delete_photo(Request $request, $id){
        

        $photo = PortifolioPhoto::find($id);
        $portifolio = Portifolio::find($photo->portifolio_id);

        //Image::make($photo->file)->resize(300, 200);
        //dd($id);
        //dd($portifolio);
        if($photo->file == $portifolio->bg){
            if(isset($photo->file)){
                $path = explode('/', $photo->file);
                Storage::delete($photo->file);
                $photo->delete();
                $portifolio->bg = "photos/sem-foto.gif";
                $portifolio->save();
            }

        }else{
            if(isset($photo->file)){
                $path = explode('/', $photo->file);
                Storage::delete($photo->file);
                $photo->delete();
            }
        }

        

        return back();
    }

    public function album_bg($id){
        $photo = PortifolioPhoto::find($id);
        $portifolio = Portifolio::find($photo->portifolio_id);
        $portifolio->bg = $photo->file;
        //dd($portifolio);
        $portifolio->save();
        return back();
    }
}
