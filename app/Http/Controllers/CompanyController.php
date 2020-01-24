<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Company;

class CompanyController extends Controller
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
    public function _1579741653856(Request $request)
    {
        return SystemController::__store(Company::class,$request);
    }
    public function _store(Request $request)
    {
        return $this->_1579741653856($request);
    }
    public function store(Request $request)
    {
        //
        $return = $this->_1579741653856($request);
        if ( $return[0] == 'error' )
        {
            return redirect()->back()->with('message','Ocorreu um erro #1579741653856.');
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
    public function _1579741939356(Request $request,$id)
    {
        return SystemController::__update(Company::class,$id,$request);
    }
    public function _update(Request $request,$id)
    {
        return $this->_1579741939356($request,$id);
    }
    public function update(Request $request,$id)
    {
        //
        $return = $this->_1579741939356($request,$id);
        if ( $return[0] == 'error' )
        {
            return redirect()->back()->with('message','Ocorreu um erro #1579741939356 .');
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
