<?php
namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller {
    public function index () {
        return view('register');
    }

    public function create (Request $request) {
        $this->validate($request, [
            "company_address" => "required",
            "company_email" => "nullable|email",
            "company_name" => "required",
            "company_phone" => "required|digits_between:10,14",
            "company_rif" => "required|digits_between:6,10",
            "company_rif_prefix" => "required",
            "user_document" => "required|digits_between:6,10",
            "user_document_prefix" => "required",
            "user_email" => "required|email|unique:users,email",
            "user_first_name" => "required",
            "user_last_name" => "required",
            "user_password" => "required|confirmed|min:8",
            "user_phone" => "required|digits_between:10,14"
        ]);
        try {
            $data = $request->input();
            //  Create company
            $company = new Company;
            $company->name = $data['company_name'];
            $company->rif = $data['company_rif_prefix'] . "-" . $data['company_rif'];
            $company->email = $data['company_email'];
            $company->phone = $data['company_phone'];
            $company->address = $data['company_address'];
            $company->save();
            //  Create user
            $user = new User;
            $user->password = Hash::make($data["user_password"]);
            $user->document = $data['user_document_prefix'] . "-" . $data['user_document'];
            $user->email = $data['user_email'];
            $user->first_name = $data['user_first_name'];
            $user->last_name = $data['user_last_name'];
            $user->phone = $data['user_phone'];
            //  Associate user with the company
            $company->user()->save($user);

            return redirect("login")->with("status", "Usuario creado exitosamente");
        }
        catch (\Exception $e) {
            throw ValidationException::withMessages(["Error inesperado, intente de nuevo mas tarde"]);
        }
    }

    public function loginView () {
        return view('login');
    }

    public function login (Request $request) {
        try {
            $this->validate($request, [
                "email" => "required|email",
                "password" => "required"
            ]);
            $credentials = $request->only('email', "password");
        }
        catch (ValidationException $e) {
            return redirect("login")->with("error", "Los datos ingresados son invalidos");
        }
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended("home");
        }

        return redirect("login")->with("error", "Usuario o contrasena invalido");
    }

    public function logout (Request $request, Redirector $redirect) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return $redirect->to("/")->with("status", "Ha cerrado sesión con exito");
    }
}
