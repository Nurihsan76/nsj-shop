<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KategoriController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->page = [
            'active' => 'kategori'
        ];    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kategori = Kategori::where('user_id', Auth::user()->nomor)->get();
        $page = $this->page;
        return view('kategori.index', compact('kategori', 'page'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'kategori' => 'required',
        ]);

        try {
            Kategori::create([
                'kategori' => $request->kategori,
                'user_id' => Auth::user()->nomor,
            ]);
            return redirect('kategori')->with('message', 'Kategori Berhasil Ditambahkan');
        } catch (\Throwable $th) {
            return redirect('kategori')->withErrors($th->getMessage());
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $request->validate([
            'kategori' => 'required',
        ]);

        $kategori = Kategori::where('user_id', Auth::user()->nomor)->where('id', $id)->first();
        if ($kategori) {
            try {
                $kategori->kategori = $request->kategori;
                $kategori->user_id = Auth::user()->nomor;
                $kategori->update();
    
                return redirect('kategori')->with('message', 'Kategori Berhasil Diubah');
            } catch (\Throwable $th) {
                return redirect('kategori')->withErrors($th->getMessage());
            }
        } else {
            return abort(403, "Hmm Ini Bukan Kategori Anda, Sebenarnya Apa Yang Anda Inginkan?");
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function delete($id)
    {
        $kategori = Kategori::where('user_id', Auth::user()->nomor)->where('id', $id)->first();
        if ($kategori) {
            try {
                Produk::where('kategori_id', $id)->delete();
                $kategori->delete();
                return redirect('kategori')->with('message', 'Kategori Berhasil Dihapus');
            } catch (\Throwable $th) {
                return redirect('kategori')->withErrors($th->getMessage());
            }
        } else {
            return abort(403, "Hmm Ini Bukan Kategori Anda, Sebenarnya Apa Yang Anda Inginkan?");
        }
    }

}
