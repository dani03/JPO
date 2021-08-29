<?php

namespace App\Http\Controllers\questions;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Response;
use Astatroth\LaravelTimer\Timer;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          
       $question = Question::create([
            'title' => $request->question,
            'reponse' => $request->goodResponse,
            'point' => $request->point
        ]);
        sleep(1);
        
        $response1 =  new Response();
        $response1->question_id = $question->id;
        $response1->title = $request->response1;
        $response1->point = 0;
        $response1->save();

        $response2 =  new Response();
        $response2->question_id = $question->id;
        $response2->title = $request->response2;
        $response2->point = 0;

        $response2->save();

        $response3 =  new Response();
        $response3->question_id = $question->id;
        $response3->title = $request->response3;
        $response3->point = 0;

        $response3->save();

        $response4 =  new Response();
        $response4->question_id = $question->id;
        $response4->title = $request->goodResponse;
        $response4->point = $request->point;

        $response4->save();
        
        return view('home')->with('message', 'ok');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name, Request $request)
    {
        
         $questions = Question::all()->random(10);
        
         $reponses = Response::all();
         $allquestions = Question::all();
        //  dd(Timer::timerRead('timer'));
         return view('questions.index', compact('questions', 'reponses', 'allquestions', 'name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
