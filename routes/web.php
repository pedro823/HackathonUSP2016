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
		$categories = App\Category::all();
		$user = Auth::user();
		$points = DB::table('question_user')
            ->join('questions', 'questions.id', '=', 'question_user.question_id')
            ->join('categories', 'categories.id', '=', 'questions.category_id')
            ->select(DB::raw('SUM(questions.points) as user_total') ,'categories.points AS category_total', 'categories.id AS id')
            ->where([['question_user.user_id', '=', $user->id], ['question_user.is_correct', '=', 1]])
            ->groupBy('id')
            ->get();

            foreach($categories as $category)
            	$category->unlocked = false;

           	if (count($categories) > 0) {
           		$categories[0]->unlocked = true;
           	}
           	for($i = 0; $i < count($points); $i++) {
           		$j = $i+1;
           		if ($points[$i]->user_total == $points[$i]->category_total) {
           			if ($j < count($categories)) {
           				$categories[$j]->unlocked = true;
           			}
           		} else {
           			if ($j < count($categories)) {
           				$categories[$j]->unlocked = false;
           			}
           		}
           	}

           	foreach($categories as $category) {
           		$category->video = str_replace("watch?v=", "v/", $category->video);
           	}

	    return view('categories')->with(['categories' => $categories, 'points' => $points]);
	});

	Route::get('/category_points', function() {
		$user = Auth::user();

		$result = DB::table('question_user')
            ->join('questions', 'questions.id', '=', 'question_user.question_id')
            ->join('categories', 'categories.id', '=', 'questions.category_id')
            ->select(DB::raw('SUM(questions.points) as user_total') ,'categories.points AS category_total', 'categories.id AS id')
            ->where([['question_user.user_id', '=', $user->id], ['question_user.is_correct', '=', 1]])
            ->groupBy('id')
            ->get();

            return $result;
	});

	Route::get('/total_points', function() {
		$user = Auth::user();

		$result = DB::table('question_user')
            ->join('questions', 'questions.id', '=', 'question_user.question_id')
            ->join('categories', 'categories.id', '=', 'questions.category_id')
            ->select(DB::raw('SUM(questions.points) as user_total'))
            ->where('question_user.user_id', '=', $user->id)
            ->get();

            return $result;
	});

	Route::get('/question', function (Request $request) {
		$category = $request->input('category');
		$questions = App\Question::where('category_id', $category)->get();	
		$user = Auth::user();
		$ids = [];
		if ($request->input('q') !== null) {
			$ids[] = $request->input('q');
		}
		foreach ($user->questions as $answer) {
			if ($answer->pivot->is_correct) {
		    	for ($i = 0; $i < count($questions); $i++) {
		    		if ($questions[$i]->id == $answer->id) {
		    			$ids[] = $answer->id;
		    		}
		    	}
		    }
		}
		$num = 0;
		foreach ($questions as $question) {
			if (!in_array($question->id, $ids))
				break;
			else
				$num++;
		}
		if ($num >= count($questions)) {
			return redirect('/categories');		
		}
		if ($request->input('c') !== null) {
			$correct = $request->input('c') == 1 ? true : false;
			foreach ($questions as $question)
				if ($question->id == $request->input('q'))
	    			return view('question')->with(['question' => $question, 'options' => $question->options, 'correct' => $correct]);	
		}
	    return view('question')->with(['question' => $questions[$num], 'options' => $questions[$num]->options]);
	})->name('question');

	Route::post('/question', function(Request $request) {
		$category = $request->input('category');
		$optId = $request->input('option');
		$question = $request->input('question');
		if ($optId == null)
			return redirect()->back();

		$option = App\Option::find($optId);

		$user = Auth::user();
		$user->questions()->attach($question, ['is_correct' => $option->is_correct]);

		return redirect()->route('question', ['category' => $category, 'q' => $question, 'c' => $option->is_correct]);
	});
});
