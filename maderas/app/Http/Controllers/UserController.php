<?php

namespace App\Http\Controllers;
use App\User;
use App\Rol;
use App\Person;
use App\Addresse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class UserController extends Controller
{
    
    public function index(Request $request)
    {
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
            ->orWhere('roles.PK_roles', '=', '4')
            ->orWhere('roles.PK_roles', '=', '5')


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
        if (!$request->ajax()) return redirect('/iniciar-sesion');

        $correo = $request->correo;
        return $user = DB::table('users')
        ->join('roles', 'roles.PK_roles', '=', 'users.id_role')
        ->join('persons', 'persons.PK_persons', '=', 'users.id_person')
        ->join('addresses', 'addresses.id_user', '=', 'users.id')
        ->select('users.id','users.email','users.status','persons.PK_persons','users.id','persons.first_name','persons.last_name',
        'persons.phone','persons.birth_date','persons.gender','persons.RFC','addresses.street','addresses.suburb',
        'addresses.city','addresses.state','addresses.postal_code','addresses.reference','addresses.outdoorNumber','addresses.PK_addresses')
        ->where('roles.PK_roles', '=', '3')
        ->where('users.email','=',$correo)
        ->get();
    }

    public function store(Request $request)
    {
        if (!$request->ajax()) return redirect('/administrador');

        $user = new User(); 
        $person = new Person();

        $person->first_name = $request->first_name;
        $person->last_name = $request->last_name;
        $person->gender = $request->gender;
        $person->birth_date = $request->birth_date;
        $person->phone = $request->phone;

        $person->save();
       

        $id_user = $person->PK_persons;
        $user->email = $request->email;
        $user->id_person=$id_user;
        $user->id_role = $request->id_role;
        $user->status = '1';
        $user->join_ate = now();
        $user->id_branch = '1';
        $user->password = Hash::make($request->password);

        
        $user->save();

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

    public function updateClient(Request $request){
        if (!$request->ajax()) return redirect('/inicio-sesion');

        $PK_persons = $request->PK_persons;
        printf($PK_persons);

    
        $person = Person::findOrFail($PK_persons);

        $person->first_name = $request->first_name;
        $person->last_name = $request->last_name;
        $person->gender = $request->gender;
        $person->birth_date = $request->birth_date;
        $person->phone = $request->phone;

        if($request->RFC != ""){
            $person->RFC = $request->RFC;

        }else{
            $person->RFC = "";

        }


        $person->save();

        $PK_adresses = $request->PK_addresses; 

        $address = Addresse::findOrFail($PK_adresses);

        $address->street=$request->street;
        $address->city=$request->city;
        $address->state=$request->state;
        $address->postal_code=$request->postal_code;
        $address->suburb=$request->suburb;
        $address->outdoorNumber=$request->outdoorNumber;

        $address->reference=$request->reference;
      
        
        $address->save();

    }

    public function info(Request $request){

        if(Auth::user()){
            $id= Auth::user()->id; 

        

        return $user = DB::table('users')
        ->join('roles', 'roles.PK_roles', '=', 'users.id_role')
        ->join('persons', 'persons.PK_persons', '=', 'users.id_person')
        ->join('addresses', 'addresses.id_user', '=', 'users.id')
        ->join('_p_g_branches','_p_g_branches.PK_PG_branches','=','users.id_branch')
        ->select('users.id','id_branch')
        ->where('roles.PK_roles', '=', '3')
        ->where('users.id','=',$id)
        ->get(1);

        }else{

            return 0;
        }

          
    }

    public function updateBranch(Request $request){

        $id = Auth::user()->id;
        printf("imprimmiento el i");
        printf($id);

        $user = User::findOrFail($id);

        $user->id_branch = $request->id;
        $user->save();

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
        $user->id_role = $request->id_role;
        $user->status = '1';
        $user->id_branch = '1';
        $user->password = Hash::make($request->password);

        
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
