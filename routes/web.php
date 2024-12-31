<?php

use App\Livewire\Home;
use App\Livewire\ThankYou;
use App\Livewire\CreateFeedBack;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');

Route::get('citizen-feedback', CreateFeedBack::class)->name("citizen.feedback");
Route::get('thankyou', ThankYou::class)->name("thankyou");
