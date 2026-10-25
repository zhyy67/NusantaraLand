<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    public function create(Request $request): View
    {
        // Jika URL memiliki ?direct=1 (dari tombol Lupa Sandi di Login)
        if ($request->has('direct')) {
            return view('auth.reset-password', [
                'request' => $request,
                'token' => 'direct-bypass', // Token dummy untuk jalan pintas
                'email' => '', 
            ]);
        }

        // Tampilan normal jika diakses lewat URL /forgot-password
        return view('auth.forgot-password');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status == Password::RESET_LINK_SENT
                    ? back()->with('status', __($status))
                    : back()->withInput($request->only('email'))
                            ->withErrors(['email' => __($status)]);
    }
}