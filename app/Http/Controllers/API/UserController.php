<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function show(string $id)
    {
        $data = User::with('addresses')->findOrFail($id);

        return response()->json([
            'status' => 200,
            'data' => $data
        ]);
    }
}
