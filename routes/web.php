<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'penjualan'], function () use ($router) {
    $router->get('/', function () {
        return response()->json([
            [
                "id" => "1",
                "nomor" => "SALE/00001",
                "customer" => 'Joko',
            ],
            [
                "id" => "2",
                "nomor" => "SALE/00002",
                "customer" => 'Widodo',
            ],
            [
                "id" => "3",
                "nomor" => "SALE/00003",
                "customer" => 'Anum',
            ],
            [
                "id" => "4",
                "nomor" => "SALE/00004",
                "customer" => 'Jodi',
            ],
            [
                "id" => "5",
                "nomor" => "SALE/00005",
                "customer" => 'Johan',
            ],
            [
                "id" => "6",
                "nomor" => "SALE/00006",
                "customer" => 'Joshua',
            ],
            [
                "id" => "7",
                "nomor" => "SALE/00008",
                "customer" => 'Jovi',
            ],
            [
                "id" => "8",
                "nomor" => "SALE/00008",
                "customer" => 'Joseph',
            ],
            [
                "id" => "9",
                "nomor" => "SALE/00009",
                "customer" => 'Juminten',
            ],
            [
                "id" => "10",
                "nomor" => "SALE/00010",
                "customer" => 'Jubaedah',
            ],
        ]);
    });

    $router->get('/{id}', function ($id) {
        return response()->json(['data' => [
            "id" => "1",
            "nomor" => "SALE/0001",
            "customer" => 'Joko',
            "total" => 1_000_000,
            "alamat" => "Jakarta"
        ]]);
    });

    $router->post('/', function () {
        return response()->json([
            'msg' => 'Berhasil',
            'id' => 4,
        ]);
    });

    $router->put('/{id}', function (Request $request, $id) {
        $nomor = $request->input('nomor');

        return response()->json(['data' => [
            "id" => $id,
            "nomor" => $nomor,
            "customer" => 'Joko',
            "total" => 1_000_000,
            "alamat" => "Jakarta"
        ]]);
    });

    $router->delete('/{id}', function ($id) {
        return response()->json(['msg' => 'Berhasil delete']);
    });

    //                                      👇 (kalau pakai ini ga perlu cek user lagi)
    $router->get('/{id}/confirm', ['middleware' => 'auth', function (Request $request, $id) {
        $user = $request->user();

        // ini tidak perlu dilakukan jika mencantumkan middleware auth seperti di atas
//        if ($user === null) {
//            return response()->json(['error' => 'Unauthorized'], 401, ['X-Header-One' => 'Header Value']);
//        }

        return response()->json([
            'msg' => 'Berhasil confirm',
            'data' => $user
        ]);
    }]);

    $router->get('/{id}/send-email', ['middleware' => 'auth', function (Request $request, $id) {
        Mail::raw('This is the email body', function ($message) {
            $message->to('rafiqifariz123@gmail.com')
                ->subject('Lumen Email Test');
        });

        return response()->json(['msg' => 'Berhasil kirim email']);
    }]);
});
