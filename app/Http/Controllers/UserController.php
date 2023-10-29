<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();

        return view('admin.user-setting.index', compact('data'));
    }

    public function store(Request $request)
    {
        if (!isset($request->password)) {
            $request->merge([
                'password' => bcrypt('12345678'),
            ]);
        }

        User::create($request->all());

        return redirect()->route('user-setting.index');
    }

    public function update(Request $request, $id)
    {
        $data = User::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('user-setting.index');
    }

    public function destroy($id)
    {
        $data = User::findOrFail($id);
        $data->delete();

        return redirect()->route('user-setting.index');
    }

    public function search(Request $request)
    {
        $data = User::where('nama', 'like', '%' . $request->get('nama') . '%')->get();

        return view('admin.user-setting.index', compact('data'));
    }
}
