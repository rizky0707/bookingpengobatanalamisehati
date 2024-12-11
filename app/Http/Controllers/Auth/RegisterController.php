<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    // Validation logic for registration request
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'no_rm' => ['nullable', 'string', 'min:9', 'max:9'],
        ]);
    }

    // Create a new user instance after a valid registration
    protected function create(array $data)
    {
        // Get the latest user to generate the next "no_rm"
        $user = User::latest()->first();
        $kodeRm = "ERM";

        if ($user == null) {
            // If no user exists, start the first record number
            $nomorUrut = 1;
        } else {
            // Generate the next record number based on the last user
            $nomorUrut = (int)substr($user->no_rm, 3, 6) + 1;
            $nomorUrut = str_pad($nomorUrut, 6, "0", STR_PAD_LEFT);
        }

        // Set the "no_rm" field with the generated code
        $data['no_rm'] = $kodeRm . $nomorUrut;
        
        // Hash the password before saving
        $data['password'] = Hash::make($data['password']);

        // Create the user and return the user instance
        return User::create($data);
    }
}

   

