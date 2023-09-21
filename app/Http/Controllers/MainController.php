<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MainController extends Controller
{
    public function videoIndex($type){
        $data = Video::all();

        return view('video.index', compact('data'));
    }

    public function videoDetail($id){
        $data = Video::findOrFail($id);
        $latestVideo = Video::latest()->take(4)->get();

        return view('video.detail', compact('data', 'latestVideo'));
    }

    public function store(Request $request){
        if(!isset($request->password)){
            $request->merge([
                'password' => bcrypt('12345678'),
            ]);
        }

        User::create($request->all());

        return redirect()->route('login');
    }

    public function login(Request $request){
        $user = User::where('username', $request->input('username'))->first();

        if (!$user) {
            return back()->with('error', 'Email atau password salah')->withInput();
        }

        $credentials = $request->only('username', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->route('profile');
        }

        return back()->with('error', 'Email atau password salah')->withInput();
    }

    public function updateProfile(Request $request){
        $user = User::findOrFail(auth()->user()->id);

        $user->update($request->all());

        return back()->with('success', 'Profile berhasil diupdate');
    }
}
