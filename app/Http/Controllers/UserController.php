<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
//use http\Env\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index', ['users' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    // para permitir gerar alias
    public function _1579739058456(Request $request)
    {
        $user = new User();
        $fields = User::fields();
        foreach ($fields as $field)
        {
            if ( isset($request->$field))
            {
                $user->$field = $request->$field;
            }
        }
        $user->save();
        return ['sucess','user'=>$user];
        //exemple 2 padronizado
        return ['error','user'=>$user];
    }
    public function _store(Request $request)
    {
        return $this->_1579739058456($request);
    }
    public function store(Request $request)
    {
        $return = $this->_1579739058456($request);
        if ( $return[0] == 'error' )
        {
            return redirect()->back()->with('message','Ocorreu um erro #1579739504156.');
        }
        return redirect()->back()->with('message',$request->_message);
    }

    /**
     * Show the form for editing the specified user
     *
     * @param  \App\User  $user
     * @return \Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
//    public function update(UserRequest $request, User  $user)
//    {
//        $user->update(
//            $request->merge(['password' => Hash::make($request->get('password'))])
//                ->except([$request->get('password') ? '' : 'password']
//        ));
//
//        return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
//    }
    // para permitir gerar alias
    public function _1579896071037(Request $request,$id)
    {
        return SystemController::__update(User::class,$id,$request);
    }
    public function _update(Request $request,$id)
    {
        return $this->_1579896071037($request,$id);
    }
    public function update(Request $request,$id)
    {
        //
        $return = $this->_1579896071037($request,$id);
        if ( $return[0] == 'error' )
        {
            return redirect()->back()->with('message','Ocorreu um erro #123.');
        }
        return redirect()->back()->with('message',$request->_message);
    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User  $user)
    {
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }
}
