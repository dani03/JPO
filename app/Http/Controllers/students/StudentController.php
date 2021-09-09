<?php

namespace App\Http\Controllers\students;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Response;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('index');
    }

    public function index(){
        $students = Student::all()->sortBy(['temps'])->sortByDesc('point');
        return view('students.index', compact('students'));
     }
     public function score(Request $request){
         
         $time = strtotime($request->timer);  
         $newformat = date('i:s.u',$time);
        //  dd($newformat);
         $questionsUsers = $request->question;
         $reponseUsers = $request->user;
         $pointUser = 0;
         $somme = 0;
         $nbTours = 0;
         foreach ($questionsUsers as $question => $pointQuestion) {
             foreach ($request->user as $questionRepondu => $reponseUser) {
                 
                 
                 if($question === $questionRepondu) {
                     // dd($pointQuestion);
                    //  dd($request->user, $questionsUsers );
                    $theQuestion = Question::where('title', $question)->get();
                    foreach ($theQuestion as $value) {
                    
                        if($reponseUser == $value->reponse){
                            $pointUser += $pointQuestion;
                                                    
                        } 
                          
                    }               
                }
            }
            $somme += $pointQuestion;
            $nbTours++;
            
        }  
        
        $moyenne = $somme / $nbTours;
         $name = $request->name;
        
        $students = Student::where('name',$name)->get();
        foreach ($students as $student) {
           $student->point =  $pointUser; 
           $student->temps =  $newformat; 
           $student->save();
           
        }
        $questions = Question::all();

        Session::flash('note', $pointUser ); 
        Session::flash('somme', $somme);
        Session::flash('message', 'ok');
        Session::flash('name', $request->name);
        
       //return redirect()->route('accueil')->with(['message']);
      return view('students.result',compact('questionsUsers', 'reponseUsers', 'questions'))->with('message','ok');
     }

    

     public function create(Request $request){
        $student = Student::create([
            'name' => $request->nom,
            'point' => "0",
            'email' => $request->email,
            'telephone' => $request->telephone,
        ]);
        return redirect()->route('show.question', $student->name);
     }

     

}
