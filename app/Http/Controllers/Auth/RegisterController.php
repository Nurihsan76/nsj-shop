<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'nomor' => ['required', 'max:255', 'unique:users'],
            'alamat' => ['required', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'foto' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // dd($data);
        $foto = null;

        if ($data['foto']) {
            $img = base64_encode(file_get_contents($data['foto']));
            $client = new Client();
            $res = $client->request('POST', 'https://freeimage.host/api/1/upload', [
                'form_params' => [
                    'key' => '6d207e02198a847aa98d0a2a901485a5',
                    'action' => 'upload',
                    'source' => $img,
                    'format' => 'json',
                ]
            ]);
            $array = json_decode($res->getBody()->getContents());
            $foto = $array->image->file->resource->chain->image;
        }

        return User::create([
            'foto' => $foto,
            'name' => $data['name'],
            'email' => $data['email'],
            'nomor' => $data['nomor'],
            'alamat' => $data['alamat'],
            'alamat' => $data['alamat'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
