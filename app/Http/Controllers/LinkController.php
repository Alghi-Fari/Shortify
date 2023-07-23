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

        // if (isset($request->link['shorted'])) {
        //     $shorted_link = $request->link['shorted'] == '' ? bin2hex(random_bytes(5)) : $request->link['shorted'];
        // } else {
        $shorted_link =  bin2hex(random_bytes(5));


        $existed_link = Link::pluck('shorted_link')->toArray();
        $original_link = Link::pluck('original_link')->where('user_id', Auth::user()->id)->toArray();

        //Digunakan untuk mengecek redudansi Original Link
        if (in_array($request->link['destination'], $original_link)) {
            return redirect()->back()->with('errors', "Link already been created");
        }

        //Digunakan untuk mengecek redudansi Custom Back Half
        if (in_array($shorted_link, $existed_link)) {
            return redirect()->back()->with('errors', "Please retry!");
        } else {
            $link = Link::create([
                'original_link' => $request->link['destination'],
                'shorted_link'  => $shorted_link,
                'user_id'       => Auth::user()->id,
            ]);
        }
        // return redirect()->route('route.name', ['param1' => $value1, 'param2' => $value2]);
        return redirect()->route('home', ['shorted' => $shorted_link])->with('success', "Link get shorted!");
    }

    public function guest(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (isset($request->link['shorted'])) {
                $shorted_link = $request->link['shorted'] == '' ? bin2hex(random_bytes(5)) : $request->link['shorted'];
            } else {
                $shorted_link =  bin2hex(random_bytes(5));
            }
            $existed_link = Link::pluck('shorted_link')->toArray();

            if (in_array($shorted_link, $existed_link)) {
                return redirect()->back()->with('errors', "Please retry!");
            } else {
                $original_link = Link::pluck('original_link')->toArray();

                //Digunakan untuk mengecek redudansi Original Link
                if (in_array($request->link['destination'], $original_link)) {
                    return redirect()->back()->with('errors', "Link already been created");
                }
                $link = Link::create([
                    'original_link' => $request->link['destination'],
                    'shorted_link'  => $shorted_link,
                    'user_id'       => Auth::user()->id,
                ]);
            }
            return redirect()->route('home')->with('success', "Link get shorted!");
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
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
        $shorted_link = $request->link['shorted'];
        $existed_link = Link::pluck('shorted_link')->toArray();
        if (in_array($shorted_link, $existed_link)) {
            return redirect()->back()->with('errors', "Custom Link already exist");
        }
        $link = Link::where('id', $id)->first();
        $link->update([
            'shorted_link' => $request->link['shorted']
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
