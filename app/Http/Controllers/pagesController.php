<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function index(){
        //To pass title to route(web.php)
        $title='Howfa Guys welcome to laravel!';
         return view('pages.index', compact('title'));
    
    }
    public function about(){
        //Another method of passing title
        $title = 'About Us';
        return view('pages.about')->with('title',$title);
    }
    public function services(){
        //passing multiple title 
        $data = array(
            'title' => 'Our Services',
            'services' => ['Web Design','Andriod App','AR/VR']
    
        );
        return view ('pages.services')->with($data);
    }
}
   ?>