<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $this->page = [
            'active' => 'toko'
        ];
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $page = $this->page;
        return view('toko.index', compact('page'));
    }

    public function update(Request $request)
    {
        // dd($request);
        $user = User::findOrFail(Auth::id());

        $request->validate([
            'password' => 'confirmed',
            'foto' => 'mimes:jpeg,bmp,png,gif,jpg',
            'email' => 'unique:users,email,'.$user->id,
            'telpon' => 'unique:users,telpon,'.$user->id
        ]);

        $data = $request->except(['foto']);

        $result = array_filter($data);

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
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
            $image = $data->image->url;

            $user->foto = $image;
        }

        try {
            $user->update($result);
            
            return redirect('toko')->with('message', 'User Berhasil Diupdate');
        } catch (\Throwable $th) {
            return redirect('toko')->with('message', 'User Gagal Diupdate');
        }
    }
    
    public function ganti(Request $request)
    {
        // dd($request);

        $request->validate([
            'old_password' => 'required|string|max:255',
            'password' => 'required|string|max:255|min:8|confirmed'
        ]);
        
        $user = User::findOrFail(Auth::id());

        if (Hash::check($request->old_password, $user->password)) {

            $user->password = Hash::make($request->password);

            try {
                $user->save();

                return redirect()->back()->with('message', 'Password Berhasil Diubah');
            } catch (\Throwable $th) {
                return redirect()->back()->with('message', 'User Gagal Diupdate');
            }
        } else {
            return redirect()->back()->withErrors('Password Salah');
        }
    }

}
