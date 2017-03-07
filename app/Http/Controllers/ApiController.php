<?php

namespace App\Http\Controllers;

use App\Club;
use App\Training;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getClubs()
    {
    	$clubs = Club::all();

    	return $clubs;
    }

    public function getClubTrainings($id)
    {
    	$club = Club::findOrFail($id);
    	$trainings = $club->trainings;

    	return $trainings;
    }
}
