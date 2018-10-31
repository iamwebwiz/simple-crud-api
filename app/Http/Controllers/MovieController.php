<?php

namespace App\Http\Controllers;

use App\Movie;
use Illuminate\Http\Request;
use JD\Cloudder\Facades\Cloudder;

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
     * add a new movie to collection
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validation = validator($request->all(), [
            'title' => 'required|string',
            'genre' => 'required|string',
            'synopsis' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png,gif,bmp|between:1,10000'
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors(), 400);
        }

        // upload image to cloudinary
        Cloudder::upload(request('image'), request('title').time());
        $image = Cloudder::getResult();

        $movie = new Movie();
        $movie->title = request('title');
        $movie->genre = request('genre');
        $movie->synopsis = request('synopsis');
        $movie->image = $image['url'];

        if ($movie->save()) {
            return response()->json('Movie successfully added.', 201);
        }

        return response()->json('An error occured. Please try again.', 500);
    }

    /**
     * show movie information
     *
     * @param App\Movie $movie
     * @return Response
     */
    public function showMovieInformation($movie)
    {
        $movie = $this->movie->find($movie);

        return response()->json($movie, 200);
    }

    /**
     * delete a movie
     *
     * @param Request $request
     * @param App\Movie $movie
     * @return Response
     */
    public function delete(Request $request, $movie)
    {
        $this->movie->find($movie)->delete();

        return response()->json('Movie has been deleted.', 200);
    }
}
