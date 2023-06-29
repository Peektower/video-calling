<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/agora-chat', 'App\Http\Controllers\AgoraVideoController@index');
    Route::post('/agora/token', 'App\Http\Controllers\AgoraVideoController@token');
    Route::post('/agora/call-user', 'App\Http\Controllers\AgoraVideoController@callUser');
});

//Route::get('/chat', 'ChatController@showChat')->name('chat.show');
//Route::post('/chat/message', 'ChatController@messageReceived')->name('chat.message');
//Route::post('/chat/greet/{user}', 'ChatController@greetReceived')->name('chat.greet');

//Route::post('/broadcasting/auth', function () {
//    $user = auth()->user();
//    $socket_id = request()->socket_id;
//    $channel_name = request()->channel_name;
//
//    $pusher = new Pusher\Pusher(
//        env('PUSHER_APP_KEY'),
//        env('PUSHER_APP_SECRET'),
//        env('PUSHER_APP_ID'),
//        [
//            'cluster' => env('PUSHER_APP_CLUSTER'),
//            'useTLS' => true,
//        ]
//    );
//
//    $presence_data = [
//        'user_id' => $user->id,
//        'user_info' => [
//            'name' => $user->name,
//        ],
//    ];
//
//    $auth = $pusher->presence_auth($channel_name, $socket_id, $user->id, $presence_data);
//
//    return response()->json($auth);
//})->middleware('auth');

//Route::post('/broadcasting/auth', function (Illuminate\Http\Request $request) {
//    $user = auth()->user();
//        $socketId = $request->input('socket_id');
//        $channelName = $request->input('channel_name');
//        $channelData = json_encode(['name' => $user->name, 'user_id' => $user->id]);
//
//        $pusher = new Pusher\Pusher(
//            config('broadcasting.connections.pusher.key'),
//            config('broadcasting.connections.pusher.secret'),
//            config('broadcasting.connections.pusher.app_id'),
//            [
//                'cluster' => config('broadcasting.connections.pusher.options.cluster'),
//                'useTLS' => true,
//            ]
//        );
//
//        $auth = $pusher->socketAuth($channelName, $socketId, $channelData);
//
//        return response($auth);
//
//
//    return abort(403);
//});

require __DIR__.'/auth.php';
