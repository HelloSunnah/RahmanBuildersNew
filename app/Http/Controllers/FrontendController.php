<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class FrontendController extends Controller
{
 public function index()
    {
        return view('Frontend.index');
    }

    public function aboutCompany()
    {
        return view('Frontend.AboutCompany');
    }

    public function contact()
    {
        return view('Frontend.Contact');
    }

    public function project()
    {
              
             $projects = Project::all();
        return view('Frontend.Project', compact('projects'));
    }

    public function service()
    {
        return view('Frontend.Service');
    }

    public function team()
    {
        return view('Frontend.Team');
    }

    public function testimonial()
    {
        return view('Frontend.Testimonial');
    }}
