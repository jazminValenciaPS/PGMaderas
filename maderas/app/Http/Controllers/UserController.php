<?php

namespace App\Http\Controllers;
use App\User;
use App\Rol;
use App\Person;
use App\Addresse;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    
    public function index()
    {
        return $user = DB::table('users')
        ->join('roles', 'roles.PK_roles', '=', 'users.id_role')
        ->join('persons', 'persons.PK_persons', '=', 'users.id_person')
        ->select('persons.PK_persons','users.id','roles.roles_name','persons.first_name','persons.last_name','persons.phone',
        'persons.birth_date','persons.gender','users.email','users.created_at','users.join_ate','users.status')
        ->where('users.status', '=', '1')
        ->distinct()
        ->get();
    }

    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/administrador');

        $user = new User(); 
        $person = new Person();
        $address = new Addresse();

        $person->first_name = $request->first_name;
        $person->last_name = $request->last_name;
        $person->gender = $request->gender;
        $person->birth_date = $request->birth_date;
        $person->phone = $request->phone;
        $person->save();
       

        $id_user = $person->PK_persons;


        $user->email = $request->email;
        // $user->email_verified_at = $request->email_verified_at;
        $user->id_person=$id_user;
        $user->id_role = $request->id_role;
        $user->status = '1';
        $user->password =$request->password;
        $user->join_ate = now();
        $user->id_branch = '1';
        
        $user->save();

        $id_user = $user->id;

        $address->id_user=$id_user;

        $address->street=$request->street;
        $address->city=$request->city;
        $address->state=$request->state;
        $address->postal_code=$request->postal_code;
        $address->suburb=$request->suburb;
        $address->reference=$request->reference;
        $address->is_default='0';
        $address->status = '1';

        $address->save();

    }   
    
    public function update(Request $request){
        if (!$request->ajax()) return redirect('/administrador');

        $PK_persons = $request->PK_persons;
        printf($PK_persons);
    
        $person = Person::findOrFail($PK_persons);

        $person->first_name = $request->first_name;
        $person->last_name = $request->last_name;
        $person->gender = $request->gender;
        $person->birth_date = $request->birth_date;
        $person->phone = $request->phone;

        $person->save();
       

        $id_user = $request->id;

        $user = User::findOrFail($id_user);

        $user->email = $request->email;
        // $user->id_person=$PK_persons;
        $user->id_role = $request->id_role;
        $user->status = '1';
        $user->password =$request->password;
        // $user->join_ate = now();
        $user->id_branch = '1';
        
        $user->save();
    }

    public function desactivar(Request $request)
    {
        // if (!$request->ajax()) return redirect('/administrador');

        $id_user = $request->id;
        printf($id_user);
        $user = User::findOrFail($id_user);
        $user->status = '0';
        $user->save();
    }
}
