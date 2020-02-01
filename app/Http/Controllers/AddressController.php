<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Address;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // para permitir gerar alias
    public function _1579914334590(Request $request)
    {
        return SystemController::__store(Address::class,$request);
    }
    public function _store(Request $request)
    {
        return $this->_1579914334590($request);
    }
    public function store(Request $request)
    {
        //
        $return = $this->_1579914334590($request);
        if ( $return[0] == 'error' )
        {
            return redirect()->back()->with('message','Ocorreu um erro #1579914334590 .');
        }
        return redirect()->back()->with('message',$request->_message);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // para permitir gerar alias
    public function _1580500327017(Request $request,$id)
    {
        echo json_encode($request);
        echo '<br>';
        echo 'id_address';
        echo '<br>';
        echo $id;
        echo '<br>';
        return SystemController::__update(Address::class,$id,$request);
    }
    public function _update(Request $request,$id)
    {
        return $this->_1580500327017($request,$id);
    }
    public function update(Request $request,$id)
    {
        //
//        $return = $this->_123($request,$id);
//        if ( $return[0] == 'error' )
        $retorno = $this->_1580500327017($request,$id);
        if ( $retorno[0] == 'error' )
        {
            return redirect()->back()->with('message','Ocorreu um erro #1580500327017 .');
        }
        return redirect()->back()->with('message',$request->_message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
