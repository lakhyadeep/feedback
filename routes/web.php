<?php

use App\Livewire\Home;
use App\Livewire\ThankYou;
use App\Livewire\CreateFeedBack;
use Illuminate\Support\Facades\Route;

Route::get('/', CreateFeedBack::class)->name("citizen.feedback");
Route::get('/dashboard', Home::class)->name('home');
Route::get('thank-you', ThankYou::class)->name("thankyou");
