<?php

Route::group(["prefix" => "tickets"], function () {
    Route::post('/', Tickets\Controllers\CreateATicket::class)->name('store.ticket');
});
