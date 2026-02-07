    <?php

    use App\Http\Controllers\ProfileController;
    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\UserController;
    use App\Http\Controllers\SearchController;
    use App\Http\Controllers\FriendRequestController;
    use App\Http\Controllers\OffreController;
    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\ApplicationController;




    Route::get('/', function () {
        return view('welcome');
    });

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/dashboard', [FriendRequestController::class, 'allRequests'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


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

        Route::get('/dashboard', [FriendRequestController::class, 'allRequests'])
            ->middleware(['auth', 'verified'])
            ->name('dashboard');

        Route::patch('/friend-requests/{id}/accept', [FriendRequestController::class, 'accept'])
            ->name('friend-requests.accept');
        Route::patch('/friend-requests/{id}/refuse', [FriendRequestController::class, 'refuse'])
            ->name('friend-requests.refuse');

        Route::post('/experience', [ProfileController::class, 'storeExperience'])->name('experience.store');
        Route::post('/education', [ProfileController::class, 'storeEducation'])->name('education.store');
        Route::post('/skill', [ProfileController::class, 'storeSkill'])->name('skill.store');

        Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
        Route::get('/offre', [OffreController::class, 'show'])->name('offre.new');
        Route::post('/offre', [OffreController::class, 'storeOffer'])->name('offre.store');

        Route::get('/dashboard', [OffreController::class, 'allOffer'])
        ->middleware(['auth', 'verified'])
        ->name('dashboard');

        Route::get('/dashboard', [DashboardController::class, 'index'])
        ->middleware(['auth', 'verified'])
        ->name('dashboard');


        Route::post('/offers/{id}/apply', [ApplicationController::class, 'store'])
        ->middleware('auth')
        ->name('offers.apply');


        Route::middleware(['auth'])->group(function () {
    Route::post('/offres/{offre}/postuler', [OffreController::class, 'postuler'])
        ->name('offres.postuler');});


    });
    require __DIR__ . '/auth.php';
