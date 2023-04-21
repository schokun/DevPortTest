<?php

namespace App\Http\Controllers\Auth;

use App\Commands\Page\StorePageCommand;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * @var StorePageCommand
     */
    private StorePageCommand $storePageCommand;

    public function __construct(
            StorePageCommand $storePageCommand
    )
    {
        $this->storePageCommand = $storePageCommand;
    }

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => 'unique:users|required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone
        ]);

        event(new Registered($user));

        $page = $this->storePageCommand->execute($user->id);

        Auth::login($user);

        return redirect("/pages/{$page->link}");
    }
}
