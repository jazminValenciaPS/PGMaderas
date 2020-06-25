<?php

namespace App\Http\Controllers;
use App\User;
use App\Rol;
use App\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    
    public function index()
    {
        return $user = DB::table('users')
        ->join('roles', 'roles.PK_roles', '=', 'users.id_role')
        ->join('persons', 'persons.PK_persons', '=', 'users.id_person')
        ->select('roles.roles_name','persons.first_name','persons.last_name',
        'users.email','users.created_at')
        ->distinct()
        ->get();
    }

    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/administrador');
       
        $user = new User();        
       
        $user->email = $request->email;
        $user->email_verified_at = $request->email_verified_at;
        $user->status = '1';
        $user->password =$request->password;
        
        $user->save();
        $idCate = $categoria->idCategoria;
        $data = explode(",", $request->idCarac);

        foreach ($data as $idCarac){
            $caracteristica = new Caracteristica_categoria();
            $caracteristica->idCate = $idCate;
            $caracteristica->idCarac = $idCarac;
            $caracteristica->save();
        }
    }

 
    public function update(Request $request, $id)
    {
        //
    }

}
