<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Field;
use App\Company;
use App\Address;

use Illuminate\Support\Facades\Request;

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
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function recorder(Request $request)
    {
        return 'ok';
        $user = Auth::user();

        //var_dump($request);
        //return;
        //echo $request->email;
        //return;
        //verificar se o email é único
        //$user = User::where('email', $request->email)->first();
        //if ($user) {
        //    return redirect()->route("register")
        //        ->with("message", "O email " . $request->email . " já está sendo utilizado .");
        //}
        //verificar se o email é válido?
        //if (!checkdnsrr(explode('@', $request->email)[1])) {
        //    return redirect()->route("register")
        //        ->with("message", "O domínio do email " .
        //            $request->email . " não retornou ao pedido de conexão .");
        //}
        //verificar se senha existe
        //if ( empty($request->password) )
        //{
        //    return redirect()->route("register")
        //        ->with("message", "A senha não pode ser em branca ");
        //}

        //$request->_message = "Você foi cadastrado com sucesso com nome " . $user->username . " .";
        //criar a company
        //$company = new Company();
        //$company->save();
        //$return = (new CompanyController())->_store(new Request());;
        $request->user_id = $user->id;
        $return = (new CompanyController())->_store($request);;
        if ( $return[0] == 'error' )
        {
            return redirect()->back()->with('message','Ocorreu um erro #1579739493157.');
        }
        $company = $return['object'];
        //criar user
//        $return = (new UserController())->_store($request);
//        if ( $return[0] == 'error' )
//        {
//            return redirect()->back()->with('message','Ocorreu um erro #1579739493157.');
//        }
//        $user = $return['user'];
        //$user = new User();
        //$user->password = Hash::make($request->password);
        //$user->email = $request->email;
        //$user->save();

        $return = (new UserController())->_update($request,$user->id);;
        if ( $return[0] == 'error' )
        {
            return redirect()->back()->with('message','Ocorreu um erro #1579739493157.');
        }
        $user = $return['object'];

        //atualizar company
//        $aux = new Request();
//        $aux->user_id = $user->id;
//        $return = (new CompanyController())->_update($aux,$company->id);;
//        if ( $return[0] == 'error' )
//        {
//            return redirect()->back()->with('message','Ocorreu um erro #1579739493157.');
//        }
//        $company = $return['object'];
        //$company->user_id = $user->id;
        //$company->save();

        //return redirect()->route("login")
        //    ->with("message",
        //        "Você foi cadastrado com sucesso com nome " . $user->username . " .");
        return redirect()->back()
            ->with("message",
                "Você foi cadastrado com sucesso com email " . $user->email . " .");

        //$aux = new Request();
        //$request = $aux;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function _create()
    {
        //
        $aux = [];

        //$fields = User::fields();

        //$fields2 = Field::fields();
        //$aux = [];
        //$i = 0;

        //$fields = Field::where('table','user');
        $fields = (Object)User::form()[0];
        foreach ($fields as $field)
        {
            $field = (Object)$field;
            if ( $field->name != 'cpf'
                &&
                $field->name != 'rg'
                &&
                $field->name != 'phone'
            )
            {
                continue;
            }
            $options = [];
            if ( $field->type == 'select' or $field->type == 'radio' )
            {
                foreach ($field->options as $option )
                {
                    $options[] = [
                        'value' => $option->value,
                        'text' => $option->text,
                    ];
                }
            }
            $aux[] = [
                'type' => $field->type,
                'name' => $field->name,
                'label' => $field->label,
                'placeholder' => $field->placeholder,
                'options' => $options,
            ];
        }
        //$fields = Field::where('table','company');
        $fields = Company::form()[0];
        foreach ($fields as $field)
        {
            $field = (Object)$field;
            if ( $field->name != 'cnpj'
                &&
                $field->name != 'business_name'
                &&
                $field->name != 'billing'
            )
            {
                continue;
            }
            $options = [];
            if ( $field->type == 'select' or $field->type == 'radio' )
            {
                foreach ($field->options as $option )
                {
                    $options[] = [
                        'value' => $option->value,
                        'text' => $option->text,
                    ];
                }
            }
            $aux[] = [
                'type' => $field->type,
                'name' => $field->name,
                'label' => $field->label,
                'placeholder' => $field->placeholder,
                'options' => $options,
            ];
        }
        //$fields = Field::where('table','address');
        $fields = Address::form()[0];
        foreach ($fields as $field)
        {
            $field = (Object)$field;
            if ( $field->name != 'address'
                &&
                $field->name != 'number'
                &&
                $field->name != 'zip'
                &&
                $field->name != 'neighborhood'
                &&
                $field->name != 'city'
                &&
                $field->name != 'complement'
                &&
                $field->name != 'state'
                &&
                $field->name != 'country'
            )
            {
                continue;
            }
            $options = [];
            if ( $field->type == 'select' or $field->type == 'radio' )
            {
                foreach ($field->options as $option )
                {
                    $options[] = [
                        'value' => $option->value,
                        'text' => $option->text,
                    ];
                }
            }
            $aux[] = [
                'type' => $field->type,
                'name' => $field->name,
                'label' => $field->label,
                'placeholder' => $field->placeholder,
                'options' => $options,
            ];
        }

        $fields = $aux;

        //base
        //$field = [
        //    'type' => '',
        //    'name' => '',
        //    'label' => '',
        //    'placeholder' => '',
        //    'option' => [
        //        'value' => '',
        //        'text' => '',
        //    ],
        //];

        return view('form',
            [
                'route'=>'recorder',
                'fields'=> $fields,
                'register' => '',
            ]);
        //return view('auth.form');
    }
}
