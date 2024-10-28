<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

Route::get('/', [NoteController::class, 'index']);
Route::post('/notes', [NoteController::class, 'store'])->name('createNote');
Route::get('/notes/search', [NoteController::class, 'search'])->name('searchNotes');
Route::get('/notes/{id}', [NoteController::class, 'edit'])->name('editNote');
Route::patch('/notes/{id}/update', [NoteController::class, 'update'])->name('updateNote');
Route::delete('/notes/{id}', [NoteController::class, 'destroy'])->name('deleteNote');
Route::patch('/{note}/mark-done', [NoteController::class, 'updateStatus']);

Route::get('/notes', [NoteController::class, 'showAllNotes'])->name('showAllNotes');
Route::get('notes/create', [NoteController::class, 'createNote'])->name('createNote');
Route::post('/notes/store', [NoteController::class, 'storeNote'])->name('storeNote');
Route::get('notes/{id}', [NoteController::class, 'viewNote'])->name('viewNote');
Route::get('notes/{id}/edit', [NoteController::class, 'editNote'])->name('editNote');
Route::put('notes/{id}/update', [NoteController::class, 'updateNote'])->name('updateNote');
Route::delete('notes/{id}/delete', [NoteController::class, 'deleteNote'])->name('deleteNote');
Route::get('/notes/search', [NoteController::class, 'searchNote'])->name('searchNote');