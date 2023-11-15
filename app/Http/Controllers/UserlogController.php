<?php

namespace App\Http\Controllers;

use App\Models\Userlog;
use Illuminate\Http\Request;

class UserlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            $userlogs = Userlog::where('user_id', 'like', "%{$search}%")
                ->orWhere('ip_address', 'like', "%{$search}%")
                ->orWhere('login_at', 'like', '%{$search}%');

            $userlogs = $userlogs->get();
        } else {
            $userlogs = Userlog::all();
        }

        return view('admin.userlog.index', compact('userlogs'));
    }
}
