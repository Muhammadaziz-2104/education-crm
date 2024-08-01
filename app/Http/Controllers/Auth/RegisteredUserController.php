<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;
use OpenApi\Annotations as OA;

/**
 * @OA\Post(
 *        path="/api/register",
 *        summary="Register",
 *        tags={"Authentication"},
 *        operationId="Register",
 *        @OA\RequestBody(
 *            required=true,
 *            @OA\JsonContent(
 *                @OA\Property(property="name", type="string", format="text", example="John Adams"),
 *                @OA\Property(property="email", type="string", format="email", example="user@gmail.com"),
 *                @OA\Property(property="password", type="string", format="password", example="abc123456"),
 *            )
 *        ),
 *        @OA\Response(
 *            response=200,
 *            description="Successful operation",
 *             @OA\JsonContent(
 *                 @OA\Property(property="data", type="object",
 *                          @OA\Property(property="name", type="string", format="text", example="John Adams"),
 *                          @OA\Property(property="email", type="string", format="email", example="user@gmail.com"),
 *                          @OA\Property(property="password", type="string", format="password", example="abc123"),
 *                 ),
 *             ),
 *        ),
 *    )
 */

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'role_id' => 2,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
