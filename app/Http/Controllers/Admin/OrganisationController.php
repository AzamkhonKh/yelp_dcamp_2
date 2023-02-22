<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\organisation\StoreOrganisationRequest;
use App\Http\Requests\organisation\UpdateRequest;
use App\Models\Organisation;
use Illuminate\Http\Request;

class OrganisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * 
     */
    public function index()
    {

        $org = Organisation::paginate(10);
        if($org->count() == 0 && request('page', "1") != "1") {
            return back();
        }
        return view(
            'admin.organisation_index', 
            ['organisations' => $org]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.organisation_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrganisationRequest $request)
    {
        $data = $request->validated();
        $data['source'] .= '_web'; 
        Organisation::add($request->validated());
        return redirect()->route('web.organisation.index')->with('message', 'Organisation succesfully added !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $organisation = Organisation::with('comments')->findOrFail($id);

        return view('admin.organisation_show', ['organisation' => $organisation]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orgnisation = Organisation::findOrFail($id);
        return view(
            'admin.organisation_edit', 
            ['organisation' => $orgnisation]
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $orgnisation = Organisation::findOrFail($id);
        if($orgnisation->update($request->validated()))
        {
            return redirect()->route('web.organisation.index');
        } else {
            return back()->with('errors', ['message' => 'Smth gone wrong']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orgnisation = Organisation::findOrFail($id);
        \DB::beginTransaction();
        try{
            $orgnisation->comments()->delete();
            $orgnisation->delete();
            \DB::commit();
            return redirect()->route('web.organisation.index');
        }catch(\Exception $e){
            \DB::rollBack();
            return back()->with('errors', ['message' => 'Smth gone wrong']);
        }
    }
}
