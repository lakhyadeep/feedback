<?php

use App\Livewire\CreateFeedBack;
use App\Livewire\Home;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');

Route::get('citizen-feedback', CreateFeedBack::class)->name("citizen.feedback");
