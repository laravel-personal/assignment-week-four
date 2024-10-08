<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index( Request $request )
    {
        $sort_order   = $request->get('sort');
        $search_query = $request->get('search' );
        if ( $sort_order ) {
            $contacts = DB::table('contacts')->orderBy($sort_order, 'asc')->get();
        } elseif ( $search_query ) {
            $contacts = DB::table('contacts')
                ->where('name', 'like', "%{$search_query}%")
                ->orWhere('email', 'like', "%{$search_query}%")
                ->get();
        } else {
            $contacts = DB::table('contacts')->get();
        }
        return view('contacts.index', compact('contacts'));
    }

    public function create() {
        return view('contacts.component.create');
    }

    public function store(Request $request) {
        $insert = DB::table('contacts')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        return redirect('/contacts');
    }

    public function show($id) {
        $contact = DB::table('contacts')->find($id);
        return view('contacts.component.show', compact('contact'));
    }

    public function edit($id) {
        $contact = DB::table('contacts')->find($id);
        return view('contacts.component.edit', compact('contact'));
    }

    public function update(Request $request, $id) {
        $update = DB::table('contacts')->where('id', $id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        return redirect('/contacts');
    }

    public function destroy($id) {
        DB::table('contacts')->where('id', $id)->delete();
        return redirect('/contacts');
    }
}
