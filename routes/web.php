<?php
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\BookingController;

Route::get('/welcome', function () {
    return view('welcome');
});



Route::resource('movies', MovieController::class)->middleware('auth');

Route::get('/booking/{movie}', [MovieController::class,'create'])->name('booking.create');


Route::middleware('auth')->group(function () {
    Route::get('/booking/{movie}', [BookingController::class, 'create'])->name('booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
});




// REGISTER form
Route::view('/register', 'auth.register')->name('register');

// REGISTER submit
Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|confirmed|min:6',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'role' => 'admin', // Test Admin vs user
        'password' => bcrypt($request->password),
    ]);

    Auth::login($user);

    return redirect('/movies');
});


Route::view('/login', 'auth.login')->name('login');


Route::post('/login', function (Request $request) {
    if (Auth::attempt($request->only('email', 'password'))) {
        $request->session()->regenerate();
        return redirect('/movies');
    }

    return back()->withErrors(['email' => 'Invalid credentials.']);
});

// LOGOUT
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');
