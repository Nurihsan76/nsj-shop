<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Produk;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokoController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($nomor)
    {
        $user = User::where('nomor', $nomor)->first();
        $produk = Produk::where('user_id', $user->nomor)->where('sembunyikan_produk', 'false')->get();
        if ($nomor) {
            return view('toko', compact('user', 'produk'));
        } else {
            return abort(403, "Maaf Toko Tidak Ditemukan");
        }
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function detail($nomor, $id)
    {
        $user = User::where('nomor', $nomor)->first();
        $produk = Produk::where('user_id', $nomor)->where('id', $id)->first();
        if ($produk) {
            return view('detailProduk', compact('produk', 'user'));
        } else {
            return abort(403, "Hmm Sepertinya Anda Nyasar");
        }
    }
}
