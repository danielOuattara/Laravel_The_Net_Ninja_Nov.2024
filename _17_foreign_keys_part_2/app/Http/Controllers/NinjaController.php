<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ninja;

class NinjaController extends Controller
{
    public function index()
    {
        // route --> /ninjas/
        // $ninjas = Ninja::orderBy('created_at', 'desc')->paginate(10);

        # eager loading
        $ninjas = Ninja::with('dojo')->orderBy('created_at', 'desc')->paginate(10);

        return view('ninjas.index', ['ninjas' => $ninjas]);
    }

    public function show($id)
    {
        // route --> /ninjas/{id}
        // $ninja = Ninja::findOrFail($id);

        # eager loading
        $ninja = Ninja::with('dojo')->findOrFail($id);
        return view('ninjas.show', ["ninja" => $ninja]);
    }

    public function create()
    {
        // route --> /ninjas/create
        // render a create view (with web form) to users
        return view('ninjas.create');
    }

    public function store()
    {
        // --> /ninjas/ (POST)
        // hanlde POST request to store a new ninja record in table
    }

    public function destroy($id)
    {
        // --> /ninjas/{id} (DELETE)
        // handle delete request to delete a ninja record from table
    }

    // edit() and update() for edit view and update requests
    // we won't be using these routes
}