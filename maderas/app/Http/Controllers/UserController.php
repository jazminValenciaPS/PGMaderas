<?php

namespace App\Http\Controllers;
use App\User;
use App\Rol;
use App\Person;
use App\Addresse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    
    public function index(Request $request)
    {
        // return $user = DB::table('users')
        // ->join('roles', 'roles.PK_roles', '=', 'users.id_role')
        // ->join('persons', 'persons.PK_persons', '=', 'users.id_person')
        // ->select('persons.PK_persons','users.id','roles.roles_name','persons.first_name','persons.last_name','persons.phone',
        // 'persons.birth_date','persons.gender','users.email','users.created_at','users.join_ate','users.status')
        // ->where('users.status', '=', '1')
        // ->distinct()
        // ->get();


        $buscar = $request->buscar;
        $criterio = $request->criterio;
        
        if ($buscar==''){

            $user = DB::table('users')
        ->join('roles', 'roles.PK_roles', '=', 'users.id_role')
        ->join('persons', 'persons.PK_persons', '=', 'users.id_person')
        ->select('persons.PK_persons','users.id','roles.PK_roles','roles.roles_name','persons.first_name','persons.last_name','persons.phone',
        'persons.birth_date','persons.gender','users.email','users.created_at','users.join_ate','users.status')
        ->where('users.status', '=', '1')
        ->where('roles.PK_roles', '=', '1')
        ->orWhere('roles.PK_roles', '=', '2')
        ->distinct()
        ->orderBy('users.id', 'desc')->paginate(5);


        }
        else{
            $user = DB::table('users')
            ->join('roles', 'roles.PK_roles', '=', 'users.id_role')
            ->join('persons', 'persons.PK_persons', '=', 'users.id_person')
            ->select('persons.PK_persons','users.id','roles.PK_roles','roles.roles_name','persons.first_name','persons.last_name','persons.phone',
            'persons.birth_date','persons.gender','users.email','users.created_at','users.join_ate','users.status')
            ->where('users.status', '=', '1')
            ->where('roles.PK_roles', '=', '1')
            ->orWhere('roles.PK_roles', '=', '2')
            ->distinct()
        ->where('users.'.$criterio, 'like', '%'. $buscar . '%')
        ->orderBy('users.id', 'desc')->paginate(5);
        }
        

        return [
            'pagination' => [
                'total'        => $user->total(),
                'current_page' => $user->currentPage(),
                'per_page'     => $user->perPage(),
                'last_page'    => $user->lastPage(),
                'from'         => $user->firstItem(),
                'to'           => $user->lastItem(),
            ],
            'user' => $user
        ];
    }

    public function customerIndex()
    {
        return $user = DB::table('users')
        ->join('roles', 'roles.PK_roles', '=', 'users.id_role')
        ->join('persons', 'persons.PK_persons', '=', 'users.id_person')
        ->join('addresses', 'addresses.id_user', '=', 'users.id')
        ->select('persons.PK_persons','users.id','persons.first_name','persons.last_name','persons.phone',
        'persons.birth_date','persons.gender','users.email','users.created_at','users.join_ate','users.status',
        'addresses.street','addresses.suburb','addresses.city','addresses.state','addresses.postal_code','roles.PK_roles')
        ->where('roles.PK_roles', '=', '3')
        ->distinct()
        ->get();
    }

    public function clientData(Request $request){

        $id = $request->id;
        // printf($id);

        return $user = DB::table('users')
        ->join('roles', 'roles.PK_roles', '=', 'users.id_role')
        ->join('persons', 'persons.PK_persons', '=', 'users.id_person')
        ->join('addresses', 'addresses.id_user', '=', 'users.id')
        ->select('persons.PK_persons','users.id','persons.first_name','persons.last_name','persons.phone',
        'persons.birth_date','persons.gender','users.email','users.status',
        'addresses.street','addresses.suburb','addresses.city','addresses.state','addresses.postal_code','addresses.reference','roles.PK_roles')
        ->where('roles.PK_roles', '=', '3')
        ->where('users.id','=',$id)
        ->get();

        // return $user;
    }

    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/administrador');

        $user = new User(); 
        $person = new Person();
        // $address = new Addresse();

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
        // $user->password =$request->password;
        $user->join_ate = now();
        $user->id_branch = '1';
        
        $user->save();

        // $id_user = $user->id;

        // $address->id_user=$id_user;

        // $address->street=$request->street;
        // $address->city=$request->city;
        // $address->state=$request->state;
        // $address->postal_code=$request->postal_code;
        // $address->suburb=$request->suburb;
        // $address->reference=$request->reference;
        // $address->is_default='0';
        // $address->status = '1';

        // $address->save();

    }   
    
    public function registroCliente(Request $request){


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
        $user->id_role = '3';
        $user->status = '1';
        $user->password =Hash::make($request->password);
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
        $address->outdoorNumber=$request->outdoorNumber;

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
        // $user->password =$request->password;
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
