<?php

namespace App\Http\Controllers;

use App\Share;
use Illuminate\Http\Request;

class ShareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shares = Share::all();
        $no = 1;
        return view('share.index', compact('shares','no'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('share.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'share_namer' => 'required',
            'share_pricer'=> 'required|integer',
            'share_qtyr' => 'required|integer',
        ]);

        $share = new Share([
                'share_name' => $request->get('share_namer'),
                'share_price' => $request->get('share_pricer'),
                'share_qty' => $request->get('share_qtyr'),
        ]);

        $share->save();
      //  return redirect('/shares/create');

        return redirect('/shares')->with('succes', 'Share has been added');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Share  $share
     * @return \Illuminate\Http\Response
     */
    public function show(Share $share)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Share  $share
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $shares = Share::find($id);
        return view('share.edit', compact('shares'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Share  $share
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $request->validate([
            'share_namer' => 'required',
            'share_pricer'=> 'required|integer',
            'share_qtyr' => 'required|integer',
        ]);

        $share = Share::find($id);
        $share->share_name = $request->get('share_namer');
        $share->share_price = $request->get('share_pricer');
        $share->share_qty = $request->get('share_qtyr');
        $share->save();
      
        return redirect('/shares')->with('succes', 'Share has been updated');


    }

    public function destroy($id)
    {
        $share = Share::find($id);
        $share->delete();
         return redirect('/shares')->with('succes', 'Share has been deleted');
    }
}
