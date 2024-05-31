<?php

namespace App\Http\Controllers;

use App\Models\Tempat;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() : View
    {
        $tempat = DB::table('tempat')->get();

        return view('home.index',  compact('tempat'));
    }

    public function store(Request $request){
        try{

            DB::beginTransaction();
            $insert                 = new Tempat();
            $insert->nama           = $request->nama;
            $insert->kategori       = $request->kategori;
            $insert->deskripsi      = $request->deskripsi;
            $insert->lat            = $request->latitude;
            $insert->lng            = $request->longitude;    
            $insert->save();

            DB::commit();

            return redirect()->route('home');
        } catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function show(string $id) : View
    {

        // $detail = DB::table('tempat')->get()->where('id','=',$id);
        $detail = Tempat::findOrFail($id);

        return view('home.detail', compact('detail'));

    }

    public function update(Request $request, $id) {
        try{

            $tempat = Tempat::findOrFail($id);
            $tempat->update([
                'nama'          => $request->nama,
                'kategori'      => $request->kategori,
                'deskripsi'     => $request->deskripsi,
                'lat'           => $request->lat,
                'lng'           => $request->lng
            ]);

            return redirect()->route('home');
        } catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function destroy($id){
        try{

            $tempat = Tempat::findOrFail($id);
            $tempat->delete();

            return redirect()->route('home');
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

}
