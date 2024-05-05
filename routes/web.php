<?php

use Illuminate\Support\Facades\Route;
use App\Models\Staff;
use App\Models\Product;
use App\Models\Photo;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/create', function(){
    // $staff = new Staff;
    // $staff->name = "Peter Diaz";
    // $staff->save();

    // $product = new Product;
    // $product->name = "PHP Course";
    // $product->save();

    $staff = Staff::findOrFail(2);
    $staff->photos()->create(['path'=>'exampletoassign.jpg']);

});

Route::get('/update', function(){
    $staff = Staff::findOrFail(1);
    foreach($staff->photos as $photo)
    {
        $photo->path = "example.update.jpg";
        $photo->save();
    }
});

Route::get('/read', function(){
    $staff = Staff::findOrFail(1);
    foreach($staff->photos as $photo)
    {
        return $photo;
    }
});

Route::get('/delete', function(){
    $staff = Staff::findOrFail(2);
    foreach($staff->photos as $photo)
    {
        $photo->whereId(3)->delete();
    }
});

Route::get('/assign', function(){
    $staff = Staff::findOrFail(2);
    $photo = Photo::findOrFail(4);

    $staff->photos()->save($photo);
});