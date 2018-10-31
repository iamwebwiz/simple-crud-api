<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * display all movies
     *
     * @return Response
     */
    public function showMovies()
    {
        return Movie::all();
    }
}
