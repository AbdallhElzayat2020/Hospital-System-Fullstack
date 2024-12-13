<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\AdminLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

class AdminController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(AdminLoginRequest $request)
    {
        if($request->authenticate()){

            $request->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::ADMIN);
        }

        return redirect()->back()->withErrors(['name' => (trans('Dashboard/auth.failed'))]);
    }

    /**
     * Destroy an authenticated session for admin.
     */


    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }


}
