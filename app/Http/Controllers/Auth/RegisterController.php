<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    // Method to display registration form (if you have one)
    public function showRegistrationForm()
    {
        return view('auth.register'); // Create a register view if you need
    }

    // Method to handle registration
    public function register(Request $request)
    {
        $data = $request->all();
        $this->validator($data)->validate();

        // Create the user and assign the default role
        $user = $this->create($data);

        // Log in the user if needed
        auth()->login($user);

        // Redirect to the intended location, or home page
        return redirect()->intended('/home');
    }

    // Validation rules for registration
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    // Method to create a new user with default role
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => Role::where('name', 'normal user')->first()->id, // Assign default role
        ]);
    }
}
