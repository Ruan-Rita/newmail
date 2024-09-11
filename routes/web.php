<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard/Dashboard');
    })->name('dashboard');
    Route::get('/customers', function () {
        return Inertia::render('Customers');
    })->name('customers');
    
    Route::get('/settings', function () {
        return Inertia::render('Settings');
    })->name('settings');
   
    Route::get('/reports', function () {
        return Inertia::render('Reports');
    })->name('reports');
});


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard/new-campaign', function () {
        return Inertia::render('Dashboard/CreateCampaigns');
    })->name('dashboard.create_campaign');
});
