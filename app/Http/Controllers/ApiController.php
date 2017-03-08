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
     * Search a club
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function searchClub(Request $request)
    {
        return Club::search($request->search)->get();
    }
}
