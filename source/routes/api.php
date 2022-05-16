<?php

use App\Http\Actions\ReportHours\ActionShowReportHours;
use App\Http\Actions\ReportHours\ActionShowReportHoursByProject;
use App\Http\Actions\Sсhedule\ActionScheduleOfficial;
use App\Http\Actions\Sсhedule\ActionWorkersSchedule;
use App\Http\Actions\Token\Create\ActionCreateToken;
use App\Http\Actions\Token\Delete\ActionDeleteOneToken;
use App\Http\Actions\Token\Read\ActionReadAllTokens;
use App\Http\Actions\Token\Read\ActionReadOneToken;
use App\Http\Actions\Token\Update\ActionUpdateOneToken;
use App\Http\Actions\User\ActionLogin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('login', ActionLogin::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('token', ActionCreateToken::class);
    Route::get('token', ActionReadAllTokens::class);
    Route::get('token/{token_name}', ActionReadOneToken::class);
    Route::put('token/{token_name}', ActionUpdateOneToken::class);
    Route::delete('token/{token_name}', ActionDeleteOneToken::class);

    Route::get('report/hours/short', ActionShowReportHours::class);
    Route::get('report/hours/project', ActionShowReportHoursByProject::class);

    Route::get('shedule/official', ActionScheduleOfficial::class);
    Route::get('shedule/worker', ActionWorkersSchedule::class);
});
