    <?php

    use App\Http\Controllers\ProfileController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\SearchController;
    use App\Http\Controllers\FriendRequestController;


    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        // Route::get('/profile', [UserController::class, 'profile'])->name('profile');
        Route::post('/upload-image', [UserController::class, 'uploadImage'])->name('upload.image');
        Route::get('/search', [SearchController::class, 'index'])->name('search');
        Route::post('/friends/request/{user}', [FriendRequestController::class, 'store'])
            ->middleware('auth')
            ->name('friends.request');
        Route::get('/users/{user}', [UserController::class, 'show'])
            ->middleware('auth')
            ->name('users.show');
        Route::post('/friend-requests/{user}', [FriendRequestController::class, 'store'])
            ->name('friend-requests.store');
        Route::get('/friend-requests', [FriendRequestController::class, 'index'])
            ->name('friend-requests.index');
        Route::get('/friend-requests/all', [FriendRequestController::class, 'allRequests'])
            ->name('friend-requests.all');

    });
    require __DIR__ . '/auth.php';
