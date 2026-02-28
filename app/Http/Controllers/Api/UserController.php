<?php

// namespace App\Http\Controllers\Api;

// use App\Http\Controllers\Controller;
// use App\Models\User;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Validation\ValidationException;

// class UserController extends Controller
// {
//     // REGISTER
//     public function register(Request $request)
//     {
//         try {
//             $validated = $request->validate([
//                 'name' => 'required|string|max:255',
//                 'email' => 'required|email|unique:users,email',
//                 'password' => 'required|min:6'
//             ]);

//             $validated['password'] = Hash::make($validated['password']);

//             $user = User::create($validated);

//             return response()->json([
//                 'status' => true,
//                 'message' => 'User registered successfully',
//                 'data' => $user
//             ], 201);

//         } catch (ValidationException $e) {
//             return response()->json([
//                 'status' => false,
//                 'message' => $e->errors()
//             ], 422);
//         }
//     }

//     // LOGIN
//     // public function login(Request $request)
//     // {
//     //     $request->validate([
//     //         'email' => 'required|email',
//     //         'password' => 'required'
//     //     ]);

//     //     $user = User::where('email', $request->email)->first();

//     //     if (!$user) {
//     //         return response()->json([
//     //             'status' => false,
//     //             'message' => 'User not found'
//     //         ], 404);
//     //     }

//     //     if (!Hash::check($request->password, $user->password)) {
//     //         return response()->json([
//     //             'status' => false,
//     //             'message' => 'Invalid password'
//     //         ], 401);
//     //     }

//     //     return response()->json([
//     //         'status' => true,
//     //         'message' => 'Login successful',
//     //         'data' => $user
//     //     ], 200);
//     // }

//     // // GET ALL USERS
//     // public function index()
//     // {
//     //     $users = User::all();

//     //     return response()->json([
//     //         'status' => true,
//     //         'data' => $users
//     //     ], 200);
//     // }
//     public function login(Request $request)
// {
//     $request->validate([
//         'email' => 'required|email',
//         'password' => 'required'
//     ]);

//     $user = User::where('email', $request->email)->first();

//     if (!$user || !Hash::check($request->password, $user->password)) {
//         return response()->json([
//             'status' => false,
//             'message' => 'Invalid credentials'
//         ], 401);
//     }



//     // Delete old tokens (optional but professional)
//     $user->tokens()->delete();

//     $token = $user->createToken('api-token')->plainTextToken;

//     return response()->json([
//         'status' => true,
//         'message' => 'Login successful',
//         'token' => $token,
//         'data' => $user
//     ], 200);
// }


// // public function logout(Request $request)
// // {
// //     $request->user()->currentAccessToken()->delete();

// //     return response()->json([
// //         'status' => true,
// //         'message' => 'Logged out successfully'
// //     ]);
// // }

//     // GET USER BY ID
//     public function show($id)
//     {
//         $user = User::find($id);

//         if (!$user) {
//             return response()->json([
//                 'status' => false,
//                 'message' => 'User not found'
//             ], 404);
//         }

//         return response()->json([
//             'status' => true,
//             'data' => $user
//         ], 200);
//     }

//     // UPDATE USER
//     public function update(Request $request, $id)
//     {
//         $user = User::find($id);

//         if (!$user) {
//             return response()->json([
//                 'status' => false,
//                 'message' => 'User not found'
//             ], 404);
//         }

//         $request->validate([
//             'name' => 'sometimes|string|max:255',
//             'email' => 'sometimes|email|unique:users,email,' . $id
//         ]);

//         $user->update($request->only('name', 'email'));

//         return response()->json([
//             'status' => true,
//             'message' => 'User updated successfully',
//             'data' => $user
//         ], 200);
//     }

//     // DELETE USER
//     public function destroy($id)
//     {
//         $user = User::find($id);

//         if (!$user) {
//             return response()->json([
//                 'status' => false,
//                 'message' => 'User not found'
//             ], 404);
//         }

//         $user->delete();

//         return response()->json([
//             'status' => true,
//             'message' => 'User deleted successfully'
//         ], 200);
//     }
// }





namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    // =========================
    // REGISTER
    // =========================
    public function register(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:6'
            ]);

            $validated['password'] = Hash::make($validated['password']);

            $user = User::create($validated);

            return response()->json([
                'status' => true,
                'message' => 'User registered successfully',
                'data' => $user
            ], 201);

        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'errors' => $e->errors()
            ], 422);
        }
    }

    // =========================
    // LOGIN (Generate Token)
    // =========================
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid credentials'
            ], 401);
        }

        // Delete old tokens (optional but good practice)
        $user->tokens()->delete();

        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'Login successful',
            'token' => $token,
            'data' => $user
        ], 200);
    }

    // =========================
    // LOGOUT
    // =========================
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => true,
            'message' => 'Logged out successfully'
        ], 200);
    }

    // =========================
    // GET ALL USERS
    // =========================
    public function index()
    {
        $users = User::all();

        return response()->json([
            'status' => true,
            'data' => $users
        ], 200);
    }

    // =========================
    // GET USER BY ID
    // =========================
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $user
        ], 200);
    }

    // =========================
    // UPDATE USER
    // =========================
    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found'
            ], 404);
        }

        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $id
        ]);

        $user->update($request->only('name', 'email'));

        return response()->json([
            'status' => true,
            'message' => 'User updated successfully',
            'data' => $user
        ], 200);
    }

    // =========================
    // DELETE USER
    // =========================
    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found'
            ], 404);
        }

        $user->delete();

        return response()->json([
            'status' => true,
            'message' => 'User deleted successfully'
        ], 200);
    }
}