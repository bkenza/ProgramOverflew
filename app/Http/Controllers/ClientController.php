<?php
/**
 * Created by PhpStorm.
 * User: Kevin
 * Date: 2/14/2018
 * Time: 2:56 PM
 */

namespace App\Http\Controllers;

use bar\baz\source_with_namespace;
use Hash;
use Illuminate\Http\Request;
use DB;
use function Sodium\increment;

class ClientController extends Controller {

    //Login Stuff
    public function authenticate(Request $request) {
        $username = $request->input('username');
        $pw = $request->input('password');

        $user = DB::table('user')
                    ->where('username', $username)
                    ->first();
        /*if(!empty($user) && $pw == $user->password) {*/
        if(!empty($user) && Hash::check($pw, $user->password)) {
            $this->createSession($user);
        } else {
            abort(400, "Invalid username or password.");
        }
        return redirect('/');
    }

    public function hash($password) {
        return Hash::make($password);
    }

    //Register Stuff
    public function createSession($user) {
        session()->flush();
        session(['id' => $user->user_ID]);
        session(['email' => $user->email]);
        session(['username' => $user->username]);
    }

    public function postQuestion(Request $request) {
        $title = $request->input('title');
        $content = $request->input('content');
        $category = $request->input('category');
        $user_ID = session()->get('id');
        $result = DB::select('select category from category');
        $exists = false;
        foreach ($result as $key => $value){
            if ($category == $value->category){
                $exists = true;
            }
        }
        if (!$exists){
            DB::table('category')->insert(array("category" => $category));
        }
        $category_ID = DB::select('select category_ID from category where category.category = \'' . $category . '\'')[0]->category_ID;
        if(DB::table('question')->insert(
            array("title" => $title, "content" => $content, "category_ID1" => $category_ID, "user_ID1" => $user_ID)
        )) {
            return redirect('/');
        } else {
            return abort('400');
        }
    }

    public function register(Request $request){
        $username = $request->Input('username');
        $email = $request->Input('email');
        $password = $request->Input('password');
        $newPassword = $this->hash($password);
        if($this->insertRegisterToDB($username, $email, $newPassword)){
            return redirect('/');
        } else{
            return abort('400', 'A problem occurred during the registration process!');
        }
    }

    public function insertRegisterToDB($username, $email, $password) {
        /*$solve = '0';*/
        return DB::table('user')->insert(
            array("username" => $username, "email" => $email, "password" => $password /*"is_Solver" => $solve*/)
        );
    }

    //Display homepage stuff


    public function getHomepage() {
        //Get posts stuff
        $java = $this->getPostsByCategoryQuery(1);
        $js = $this->getPostsByCategoryQuery(2);
        $php = $this->getPostsByCategoryQuery(3);
        $c = $this->getPostsByCategoryQuery(4);

        return view('pages.homepage', ['java' => $java, 'js' => $js, 'php' => $php, 'c' => $c]);
    }

    public function getPostsByCategoryQuery($category) {
        $post = DB::select('
            SELECT
                q.question_ID,
                q.title,
                q.content,
                q.category_ID1,
                q.user_ID1 as userID,
                q.create_time,
                q.upvotes,
                q.comments,
                q.views,
                u.username
            FROM question q
            INNER JOIN user u
                ON q.user_ID1 = u.user_ID AND q.category_ID1 = ' . $category . ' AND q.is_hidden = 0
            ORDER BY q.question_ID DESC
        ');

        return $post;
    }

    public function getFullPostById($id) {
        if ($this->incrementView($id)) {
            ClientControllerHelper::setQuestionID($id);
            $post = DB::select('
            SELECT
                q.question_ID,
                q.title,
                q.content,
                q.category_ID1,
                q.user_ID1 as userID,
                q.create_time,
                q.upvotes,
                q.comments,
                q.views,
                u.username
            FROM question q
            INNER JOIN user u
                ON q.user_ID1 = u.user_ID AND q.question_ID = ' . $id . ' AND q.is_hidden = 0
            ORDER BY q.question_ID DESC
        ');

            $answer = DB::select('
            SELECT
                a.answer_ID,
                a.answer,
                a.user_ID2,
                a.question_ID1,
                a.upvotes,
                a.is_hidden,
                a.create_time,
                u.username
            FROM answer a
            INNER JOIN user u
                ON a.user_ID2 = u.user_ID AND a.question_ID1 = ' . $id . ' AND a.is_hidden = 0
        ');
            return view('pages.post', ['post' => $post[0], 'answer' => $answer]);
        } else {
            return abort('400', 'A problem has occurred!');
        }
    }

    public function incrementView($id) {
        return DB::table('question')->where('question_ID', $id)->increment('views', 1);
    }

    public function postAnswer(Request $request, $id) {
        $content = $request->input('content');
        $userId = session()->get('id');
        $questionId = $id;

        if($userId == null) {
            echo "<script type='text/javascript'>alert('Please login before posting an answer.');</script>";
            return redirect('/');
        }

        if($this->insertAnswerToDB($content, $userId, $questionId)){
            return redirect('./post/' . $id . '');
        } else{
            return abort('400', 'A problem occurred during the answer posting process!');
        }
    }

    public function insertAnswerToDB($answer, $userId, $postId) {
        $answer = DB::table('answer')->insert(
                    array("answer" => $answer, "user_ID2" => $userId, "question_ID1" => $postId)
                );

        if ($this->incrementAnswer($postId)) {
            return $answer;
        } else {
            return abort('400', 'A problem occurred during the answer posting process!');
        }

    }

    public function incrementAnswer($postId) {
        return DB::table('question')->where('question_ID', $postId)->increment('comments', 1);
    }

    //Favourites stuff

    public function favourite($questionId) {
        if (session()->has('id')) {
            $favourite = DB::table('favourite')->insert(
                array("user_ID3" => session()->get('id'), "question_ID2" => $questionId, "favourite" => 1)
            );
            if ($favourite) {
                return redirect('/post/' . $questionId . '');
            } else {
                return abort('400', 'A problem occurred during the favourite process!');
            }
        } else {
            $unfavorite = DB::table('favourites')->where([
                ['question_ID2', $questionId],
                ['user_ID3', session()->get('id')]
            ])->delete();
            if ($unfavorite) {
                return redirect('/post/' . $questionId . '');
            } else {
                return abort('400', 'A problem occurred during the unfavourite process!');
            }
        }
    }

    public static function isFavourite($questionId) {
        $result = DB::table('favourites')->where([
            ['question_ID2', $questionId],
            ['user_ID3', session()->get('id')]
        ])->first();
        if(empty($result)) {
            return true;
        } else {
            return false;
        }
    }

    public function getFavourites(){
        $favourites = DB::select('
            SELECT
                q.question_ID,
                q.title,
                q.content,
                q.category_ID1,
                q.user_ID1 as userID,
                q.create_time,
                q.upvotes,
                q.comments,
                q.views
            FROM question q
            INNER JOIN favourite ON q.question_ID = favourite.question_ID2 AND q.is_hidden = 0
            WHERE user_ID3 = ' . session()->get('id') . ';'
        );

        return view('pages.favourites', ['favourites' => $favourites]);
    }

    public function upvote($id) {
        if (session()->has('username')) {
            $vote = DB::select('
            SELECT 
                vote
            FROM questionvote v
            INNER JOIN user u
            INNER JOIN question q
                ON v.user_ID4 = u.user_ID AND v.question_ID3 = q.question_ID
            WHERE u.username = \'' . session()->get('username') . '\' AND v.question_ID3 = \'' . $id . '\'');
            $voteId = DB::select('
                    SELECT 
                        questionvote_ID
                    FROM questionvote v
                    INNER JOIN user u
                    INNER JOIN question q
                        ON v.user_ID4 = u.user_ID AND v.question_ID3 = q.question_ID
                    WHERE u.username = \'' . session()->get('username') . '\' AND v.question_ID3 = \'' . $id . '\'');
            if($vote == null){ //not voted, first vote
                DB::table('question')->where('question_ID', $id)->increment('upvotes', 1);
                DB::table('questionvote')->insert(array('user_ID4' => session()->get('id'), 'question_ID3' => $id, 'vote' => 1));
            } else if ($vote[0]->vote == 1){ //already upvoted
                DB::table('question')->where('question_ID', $id)->increment('upvotes', -1);
                DB::table('questionvote')->where('questionvote_ID', $voteId[0]->questionvote_ID)->delete();
            } else if ($vote[0]->vote == 0){ // downvoted before
                DB::table('question')->where('question_ID', $id)->increment('upvotes', 2);
                DB::table('questionvote')->where('questionvote_ID', $voteId[0]->questionvote_ID)->update(array('vote' => 1));
            }
        }
        return redirect('/post/' . $id . '');
    }

    public function downvote($id) {
        if (session()->has('username')) {
            $vote = DB::select('
            SELECT 
                vote
            FROM questionvote v
            INNER JOIN user u
            INNER JOIN question q
                ON v.user_ID4 = u.user_ID AND v.question_ID3 = q.question_ID
            WHERE u.username = \'' . session()->get('username') . '\' AND v.question_ID3 = \'' . $id . '\'');
            $voteId = DB::select('
                    SELECT 
                        questionvote_ID
                    FROM questionvote v
                    INNER JOIN user u
                    INNER JOIN question q
                        ON v.user_ID4 = u.user_ID AND v.question_ID3 = q.question_ID
                    WHERE u.username = \'' . session()->get('username') . '\' AND v.question_ID3 = \'' . $id . '\'');
            if($vote == null){ //not voted, first vote
                DB::table('question')->where('question_ID', $id)->increment('upvotes', -1);
                DB::table('questionvote')->insert(array('user_ID4' => session()->get('id'), 'question_ID3' => $id, 'vote' => 0));
            } else if ($vote[0]->vote == 0){ //already downvoted
                DB::table('question')->where('question_ID', $id)->increment('upvotes', 1);
                DB::table('questionvote')->where('questionvote_ID', $voteId[0]->questionvote_ID)->delete();
            } else if ($vote[0]->vote == 1){ // upvoted before
                DB::table('question')->where('question_ID', $id)->increment('upvotes', -2);
                DB::table('questionvote')->where('questionvote_ID', $voteId[0]->questionvote_ID)->update(array('vote' => 0));
            }
        }
        return redirect('/post/' . $id . '');
    }
    public function upvoteA($id, $id2) {
        if (session()->has('username')) {
            $vote = DB::select('
            SELECT 
                vote
            FROM answervote v
            INNER JOIN user u
            INNER JOIN answer a
                ON v.user_ID5 = u.user_ID AND v.answer_ID1 = a.answer_ID
            WHERE u.username = \'' . session()->get('username') . '\' AND v.answer_ID1 = \'' . $id . '\'');
            $voteId = DB::select('
            SELECT 
                answervote_ID
            FROM answervote v
            INNER JOIN user u
            INNER JOIN answer a
                ON v.user_ID5 = u.user_ID AND v.answer_ID1 = a.answer_ID
            WHERE u.username = \'' . session()->get('username') . '\' AND v.answer_ID1 = \'' . $id . '\'');
            if($vote == null){ //not voted, first vote
                DB::table('answer')->where('answer_ID', $id)->increment('upvotes', 1);
                DB::table('answervote')->insert(array('user_ID5' => session()->get('id'), 'answer_ID1' => $id, 'vote' => 1));
            } else if ($vote[0]->vote == 1){ //already upvoted
                DB::table('answer')->where('answer_ID', $id)->increment('upvotes', -1);
                DB::table('answervote')->where('answervote_ID', $voteId[0]->answervote_ID)->delete();
            } else if ($vote[0]->vote == 0){ // downvoted before
                DB::table('answer')->where('answer_ID', $id)->increment('upvotes', 2);
                DB::table('answervote')->where('answervote_ID', $voteId[0]->answervote_ID)->update(array('vote' => 1));
            }
        }
        return redirect('/post/' . $id2 . '');
    }

    public function downvoteA($id, $id2) {
        if (session()->has('username')) {
            $vote = DB::select('
            SELECT 
                vote
            FROM answervote v
            INNER JOIN user u
            INNER JOIN answer a
                ON v.user_ID5 = u.user_ID AND v.answer_ID1 = a.answer_ID
            WHERE u.username = \'' . session()->get('username') . '\' AND v.answer_ID1 = \'' . $id . '\'');
            $voteId = DB::select('
            SELECT 
                answervote_ID
            FROM answervote v
            INNER JOIN user u
            INNER JOIN answer a
                ON v.user_ID5 = u.user_ID AND v.answer_ID1 = a.answer_ID
            WHERE u.username = \'' . session()->get('username') . '\' AND v.answer_ID1 = \'' . $id . '\'');
            if($vote == null){ //not voted, first vote
                DB::table('answer')->where('answer_ID', $id)->increment('upvotes', -1);
                DB::table('answervote')->insert(array('user_ID5' => session()->get('id'), 'answer_ID1' => $id, 'vote' => 0));
            } else if ($vote[0]->vote == 0){ //already downvoted
                DB::table('answer')->where('answer_ID', $id)->increment('upvotes', 1);
                DB::table('answervote')->where('answervote_ID', $voteId[0]->answervote_ID)->delete();
            } else if ($vote[0]->vote == 1){ // upvoted before
                DB::table('answer')->where('answer_ID', $id)->increment('upvotes', -2);
                DB::table('answervote')->where('answervote_ID', $voteId[0]->answervote_ID)->update(array('vote' => 0));
            }
        }
        return redirect('/post/' . $id2 . '');
    }
  
    public function editQuestion(Request $request) {
        $title = $request->input('title');
        $content = $request->input('content');
        $category = $request->input('category');
        $id = $request->input('hiddenID');
        $result = DB::select('select category from category');
        //check for current category
        $exists = false;
        foreach ($result as $key => $value){
            if ($category == $value->category){
                $exists = true;
            }
        }
        if (!$exists){
            DB::table('category')->insert(array("category" => $category));
        }

        $category_ID = DB::select('select category_ID from category where category.category = \'' . $category . '\'')[0]->category_ID;

        if(DB::table('question')->where('question_ID', $id)->update(
            array('title' => $title == null ? ' ' : $title, 'content' => $content == null ? ' ' : $content , 'category_ID1' => $category_ID == null ? '1' : $category_ID)
        )){}
        return redirect('/post/' . $id . '');
    }

    public function updateUserProfile(Request $request) {
        if (session()->has('username')) {
            $newUserName = $request->input('userName');
            $newEmail = $request->input('email');


            if ($newUserName == null || $newEmail == null) {
                return redirect('/');
            }

            DB::table('user')->where('username', session()->get('username'))->update(
                array('username' => $newUserName, 'email' => $newEmail));
                return redirect('/');
        }
    }

    public function getSearch($id) {

        $post = DB::select('
            SELECT 
                q.question_ID, 
                q.title,
                q.content,
                q.category_ID1,
                q.user_ID1 as userID,
                q.create_time,
                q.upvotes,
                q.comments,
                q.views,
                u.username
            FROM question q
            INNER JOIN user u WHERE q.title LIKE \'%' . $id . '%\' AND q.is_hidden = 0
        ');

        return view('pages.search', ['post' => $post]);
    }
}