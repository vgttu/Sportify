<?php

namespace App\Http\Controllers;

use App\Club;
use App\Training;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Get list of the clubs.
     *
     * @return \Illuminate\Http\Response
     */
    public function getClubs()
    {
    	return Club::all();
    }

    /**
     * Get trainings list of the club.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getClubTrainings($id)
    {
    	$club = Club::findOrFail($id);

    	return $club->trainings;
    }

    /**
     * Search a requested training.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchTraining(Request $request)
    {
        $trainings = Training::search($request->search)->get();
        
        return $trainings->load('club');
    }
}
