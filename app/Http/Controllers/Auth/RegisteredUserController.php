<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\Models\Persona;
use App\Models\User;
use App\Models\Usuario;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'apellido_paterno' => ['required', 'string', 'max:20'],
            'apellido_materno' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:100', 'unique:App\Models\Usuario,nombre_usuario'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = null;
        try{
            
            DB::beginTransaction();
            
            $persona = Persona::create([
                'nombre' => $request['name'],
                'apellido_paterno' => $request['apellido_paterno'],
                'apellido_materno' => $request['apellido_materno'],
                'email' => $request['email'],
            ]);

            $cliente = Cliente::create([
                'id' => $persona->id,
            ]);
    
           $user = Usuario::create([
                'nombre_usuario' => $request['email'],
                'password' => Hash::make($request['password']),
                'enable' => true,
                'id_persona' => $persona->id,
           ]);
        //    ->assignRole('cliente');

            DB::commit();

        }catch(Exception $e){
            DB::rollBack();
            return back();
        }

        // $user = Usuario::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
