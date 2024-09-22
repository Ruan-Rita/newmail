<?php

use App\Models\Website;
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
    
    Route::get('/dashboard/new-campaign', function () {
        return Inertia::render('Dashboard/CreateCampaigns');
    })->name('dashboard.create_campaign');

    Route::get('/customers', function () {
        return Inertia::render('Customers');
    })->name('customers');
    
    Route::get('/settings', function () {
        return Inertia::render('Settings/Show');
    })->name('settings');
   
    Route::get('/reports', function () {
        return Inertia::render('Reports');
    })->name('reports');

    Route::get('/website', function () {
        return Inertia::render('Website/Website');
    })->name('website');

    Route::get('/website/new-webiste', function () {
        return Inertia::render('Website/CreateWebsite');
    })->name('website.create');

    Route::get('/automation', function () {
        return Inertia::render('Automation/Automation');
    })->name('automation');
});