<?php
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {
	Route::get('/categories', function () {
		$categories = App\Category::paginate(15);
	    return view('categories')->with('categories', $categories);
	});

	Route::get('/category/{id}', function ($id) {
		$category = App\Category::find($id);
	    return view('category')->with('category', $category);
	});

	Route::get('/question', function (Request $request) {
		$category = $request->input('category');
		$questions = App\Question::where('category_id', $category)->get();	
		$user = Auth::user();

		foreach ($user->questions as $answer) {
			if ($answer->pivot->is_correct) {
		    	for ($i = 0; $i < count($questions); $i++) {
		    		if ($questions[$i]->id == $answer->id)
		    			unset($questions[$i]);
		    	}
		    }
		}
		$num = rand (0, count($questions)-1);
	    return view('question')->with('question', $questions[$num]);
	});
});
