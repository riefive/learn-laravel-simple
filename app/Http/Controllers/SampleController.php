<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class SampleController extends Controller
{
    public function create(): View
    {
        return view('demo');
    }

    public function displayQuery(Request $request) {
        $type = $request->query('type');
        $menu = $request->query('menu');
        if ($type == 'raw' && $menu == 'email') {
            
            $users = DB::select('select * from users where email=?', ['rie.five@gmail.com']);
        } else if ($type == 'builder' && $menu == 'email') {
            $users = DB::table('users')->where('email', 'rie.five@gmail.com')->get();
        } else if ($type == 'builder' && $menu == 'all') {
            // with query builder
            $users = DB::table('users')->get();
        } else {
            // with raw query
            $users = DB::select('select * from users');
        }
        // display result
        dd($users);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'username' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
        ]);

        return Redirect::route('demo')->with('message', 'Success to validate form');
    }
}
