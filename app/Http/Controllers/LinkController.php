<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.links.index', [
            'title' => 'History',
            'links' => Link::where('user_id', Auth::user()->id)->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $shorted_link = $request->link['shorted'] == '' ? bin2hex(random_bytes(5)) : $request->link['shorted'];
        $existed_link = Link::pluck('shorted_link')->toArray();

        if (in_array($shorted_link, $existed_link)) {
            return redirect()->back()->with('errors', "Please retry!");
        } else {
            $link = Link::create([
                'original_link' => $request->link['destination'],
                'shorted_link'  => $shorted_link,
                'user_id'       => Auth::user()->id,
            ]);
        }


        return redirect()->back()->with('success', "Link get shorted!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('backend.links.edit', [
            'title' => 'Edit',
            'link' => Link::where('id', $id)->first(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $link = Link::where('id', $id)->first();
        $link->update([
            'original_link' => $request->link['destination']
        ]);

        $link->save();

        return redirect()->back()->with('success', "Link get updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $link = Link::find($id);

        $link->delete();
        return redirect()->back()->with('success', 'Link deleted successfully');
    }
}
