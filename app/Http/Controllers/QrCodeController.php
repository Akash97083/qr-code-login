<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class QrCodeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['showQrCodeLoginForm', 'qrCodeLogin']);
    }

    public function showQrCode()
    {
        return view('qr-code');
    }

    public function regenerate(): \Illuminate\Http\RedirectResponse
    {
        auth()->user()->update([
            'qr_code_token' => Str::random(25)
        ]);

        return back()->with('status', 'Qr-Code regenerate successful.');
    }

    public function showQrCodeLoginForm()
    {
        return view('auth.qr-code-login');
    }

    public function qrCodeLogin(Request $request): \Illuminate\Http\JsonResponse
    {
        $user = User::where('qr_code_token', $request->input('qr_code_token'))->first();

        if ($user) {
            Auth::loginUsingId($user->id);

            return response()->json([
                'status'  => true,
                'message' => 'Login successful'
            ], 200);
        }

        return response()->json([
            'status'  => false,
            'message' => 'Login failed for invalid qr-code, Please scan valid qr-code.'
        ], 404);
    }
}
