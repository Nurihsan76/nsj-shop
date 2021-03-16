<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Produk;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
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
            'active' => 'produk'
        ];
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kategori = Kategori::where('user_id', Auth::user()->nomor)->get();
        $produk = Produk::where('user_id', Auth::user()->nomor)->get();
        $page = $this->page;
        return view('produk.index', compact('kategori', 'produk', 'page'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function detail($id)
    {
        $produk = Produk::where('user_id', Auth::user()->nomor)->where('id', $id)->first();
        $page = $this->page;
        if ($produk) {
            return view('produk.detail', compact('produk', 'page'));
        } else {
            return abort(403, "Hmm Ini Bukan Produk Anda, Sebenarnya Apa Yang Anda Inginkan?");
        }
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
            'nama' => 'required|max:255',
            'merek' => 'required',
            'harga' => 'required',
            'kategori_id' => 'required',
            'descripsi_singkat' => 'required',
            'descripsi_lengkap' => 'required',
            'foto' => 'required',
        ]);

        $foto = null;
        if ($request->foto) {
            $image = $request->foto;
            $file = base64_encode(file_get_contents($image));

            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', 'https://freeimage.host/api/1/upload', [
                'form_params' => [
                    'key' => '6d207e02198a847aa98d0a2a901485a5',
                    'action' => 'upload',
                    'source' => $file,
                    'format' => 'json'
                ]
            ]);

            $data = $response->getBody()->getContents();
            $data = json_decode($data);
            $foto = $data->image->url;
        }

        try {
            Produk::create([
                'nama' => $request->nama,
                'merek' => $request->merek,
                'harga' => $request->harga,
                'kategori_id' => $request->kategori_id,
                'descripsi_singkat' => $request->descripsi_singkat,
                'descripsi_lengkap' => $request->descripsi_lengkap,
                'sembunyikan_produk' => $request->sembunyikan_produk,
                'foto' => $foto,
                'user_id' => Auth::user()->nomor,
            ]);
            return redirect('produk')->with('message', 'Produk Berhasil Ditambahkan');
        } catch (\Throwable $th) {
            return redirect('produk')->withErrors($th->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        // dd($request);
        $produk = Produk::where('user_id', Auth::user()->nomor)->where('id', $id)->first();
        if ($produk) {

            $request->validate([
                'nama' => 'required|max:255',
                'merek' => 'required',
                'harga' => 'required',
                'kategori_id' => 'required',
                'descripsi_singkat' => 'required',
                'descripsi_lengkap' => 'required',
                // 'foto' => 'required',
            ]);

            $data = $request->except(['foto']);

            $result = array_filter($data);

            if ($request->foto) {
                $image = $request->foto;
                $file = base64_encode(file_get_contents($image));

                $client = new Client();
                $response = $client->request('POST', 'https://freeimage.host/api/1/upload', [
                    'form_params' => [
                        'key' => '6d207e02198a847aa98d0a2a901485a5',
                        'action' => 'upload',
                        'source' => $file,
                        'format' => 'json'
                    ]
                ]);

                $data = $response->getBody()->getContents();
                $data = json_decode($data);
                $image = $data->image->url;

                $produk->foto = $image;
            }

            try {
                $produk->update($result);

                return redirect('produk')->with('message', 'Produk Berhasil Diupdate');
            } catch (\Throwable $th) {
                return redirect('produk')->withErrors($th->getMessage());
                // return redirect('produk')->with('message', 'Produk Gagal Diupdate');
            }
        } else {
            return abort(403, "Hmm Ini Bukan Produk Anda, Sebenarnya Apa Yang Anda Inginkan?");
        }
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function delete($id)
    {
        $produk = Produk::where('user_id', Auth::user()->nomor)->where('id', $id)->first();
        if ($produk) {
            try {
                $produk->delete();
                return redirect('produk')->with('message', 'Produk Berhasil Dihapus');
            } catch (\Throwable $th) {
                return redirect('produk')->withErrors($th->getMessage());
            }
        } else {
            return abort(403, "Hmm Ini Bukan Produk Anda, Sebenarnya Apa Yang Anda Inginkan?");
        }
    }
}
