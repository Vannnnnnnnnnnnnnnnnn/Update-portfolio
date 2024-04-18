<?php

namespace App\Http\Controllers;
use App\Models\home;
use App\Models\about;
use App\Models\education;
use App\Models\experience;
use App\Models\skill;
use App\Models\work;
use App\Models\service;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class homeController extends Controller
{
    //
    public function index()
    {
        $home = home::all();
        $education = education::all();
        $work = work::all();
       
        return view('landingpage.index',[

            'home' => $home,
            'work' => $work,
            'education' => $education
        ]);
    }

    public function skill()
    {
        $skill = skill::all();
        
        
       
        return view('landingpage.sections.skills',[

            'skill' => $skill
           
        ]);
    }

    public function experience()
    {
        $experience = experience::all();
        
        
       
        return view('landingpage.sections.experience',[

            'experience' => $experience
            
        ]);
    }

    public function work()
    {
        $work = work::all();
        
        
       
        return view('landingpage.sections.portfolio',[

            'work' => $work
            
        ]);
    }
}
