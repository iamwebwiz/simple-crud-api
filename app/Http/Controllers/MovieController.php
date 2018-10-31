<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * @var $movie
     */
    protected $movie;

    /**
     * constructor
     *
     * @return void
     */
    public function __construct(Movie $movie)
    {
        $this->movie = $movie;
    }

    /**
     * display all movies
     *
     * @return Response
     */
    public function showMovies()
    {
        return response()->json($this->movie->all(), 200);
    }
}
