<?php
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use \App\posts;
use Illuminate\http\Request;

Route::get('/', function () {
    $posts = posts::orderBy('id','asc')->get();

    return view('home',compact('posts'));
});

Route::post('/posts',function (Request $request){
    //Validate Information
    $validator = Validator::make($request->all(),[
        'name' =>'required|max:255',
    ]);

    if ($validator->fails()){
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $posts = new \App\posts();
    $posts->title = $request->title;
    $posts->price = $request->price;
    $posts->images = $request->images;
    $posts->save();

    return redirect('/');

});

/**
 *
 */
Route::get('/delete/{delete}',function ($id){
    posts::findOrFail($id)->delete();
    /*Task::where('id','=',$id)->delete();*/
    return redirect('/');
});





Route::post('/search',function (Request $request){
//    Validate Information
    $validator = Validator::make($request->all(),[
        'name' =>'required|max:255',
    ]);

    if ($validator->fails()){
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $posts = posts::where('title' , 'like', $request->name, 'or','id', $request->name)->get();
    return view('home', compact('posts'));

});

Route::get('add',function (Request $request){
    //Validate Information
    $validator = Validator::make($request->all(),[
        'title' =>'required|max:255',

    ]);

    if ($validator->fails()){
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $postud = new posts;
    $postud->title = $request->title;
    $postud->price = $request->price;
    $postud->images = $request->images;
    $postud->save();
    return 'done';
});

Route::get('update/{id}',function (Request $request, $id){
    //Validate Information
    $validator = Validator::make($request->all(),[
        'title' =>'required|max:255',

    ]);

    if ($validator->fails()){
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $postud = new posts($id);

    $postud->title = $request->title;
    $postud->price = $request->price;
    $postud->images = $request->images;
    $postud->save();
    return 'cap nhat thanh cong';
});
