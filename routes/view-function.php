<?php

use Illuminate\Support\Facades\Route;

//-##################- Site Cache Clean ####################-->
Route::get('/clear-log', function() {
    Artisan::call('clear:log');
    return "Logs have been cleared <script> function myFunction() {  window.close(); } setTimeout(myFunction, 1000);</script>";
});
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared <script> function myFunction() {  window.close(); } setTimeout(myFunction, 1000);</script>";
});

Route::get('/route-cache', function() {
    Artisan::call('route:clear');
    return "Route is cleared <script> function myFunction() {  window.close(); } setTimeout(myFunction, 1000);</script>";
});

Route::get('/config-cache', function() {
    Artisan::call('config:clear');
    return "Config is cleared <script> function myFunction() {  window.close(); } setTimeout(myFunction, 1000);</script>";
});

Route::get('/view-cache', function() {
    Artisan::call('view:clear');
    return "View is cleared <script> function myFunction() {  window.close(); } setTimeout(myFunction, 1000);</script>";
});
//-##################- Site Cache Clean ####################-->
