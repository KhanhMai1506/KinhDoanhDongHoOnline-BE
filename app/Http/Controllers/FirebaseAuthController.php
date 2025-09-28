<?php

namespace App\Http\Controllers;

use App\Services\FirebaseService;
use Illuminate\Support\Facades\Auth;

class FirebaseAuthController extends Controller
{
    protected $firebase;

    public function __construct(FirebaseService $firebase)
    {
        $this->firebase = $firebase;
    }

    public function createToken()
    {

        // $user = Auth::guard('sanctum')->user();
        // Ví dụ user có id "user123"
        $customToken = $this->firebase->createCustomToken('1', [
            'role' => 'user'
        ]);

        // Trả token dạng string
        return response()->json([
            'custom_token' => $customToken->toString()
        ]);
    }
}
