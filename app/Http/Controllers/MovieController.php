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

    /**
     * show movie information
     *
     * @param Movie $movie
     * @return Response
     */
    public function showMovieInformation($movie)
    {
        $movie = $this->movie->find($movie);

        return response()->json($movie, 200);
    }
}
