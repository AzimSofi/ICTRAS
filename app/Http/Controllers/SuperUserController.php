<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\SuperUser;

class SuperUserController extends Controller
{
    public function validatePassword(Request $request)
    {
        $password = $request->input('password');
        $superUser = SuperUser::first();

        if ($superUser && Hash::check($password, $superUser->password)) {
            $superUser->update(['status' => true]);
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function revokeAccess(Request $request)
    {
        $superUser = SuperUser::first();
        if ($superUser) {
            $superUser->update(['status' => false]);
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false]);
    }

}
