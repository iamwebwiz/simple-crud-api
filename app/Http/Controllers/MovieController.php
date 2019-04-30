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
            // 'image' => 'image|mimes:jpeg,jpg,png|max:10240'
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors(), 400);
        }

        $movie = new Movie();
        $movie->title = request('title');
        $movie->genre = request('genre');
        $movie->synopsis = request('synopsis');

        /**
        if (request('image')) {
            // upload image to cloudinary
            Cloudder::upload(request('image'), request('title').time());
            $image = Cloudder::getResult();
            $movie->image = $image['url'];
        }
        */

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
     * update information on a movie
     *
     * @param Request $request
     * @param App\Movie $movie
     * @return Response
     */
    public function update(Request $request, $movie)
    {
        $movie = $this->movie->find($movie);

        $validation = validator($request->all(), [
            'title' => 'required|string',
            'genre' => 'required|string',
            'synopsis' => 'required',
            'image' => 'image|mimes:jpeg,jpg,png|between:1,10000'
        ]);

        if ($validation->fails()) {
            return response()->json($validation->errors(), 400);
        }

        if (request('image')) {
            // upload image to cloudinary
            Cloudder::upload(request('image'), request('title').time());
            $image = Cloudder::getResult();
            $movie->image = $image['url'];
        }

        $movie->title = request('title');
        $movie->genre = request('genre');
        $movie->synopsis = request('synopsis');

        if ($movie->save()) {
            return response()->json('Movie updated.', 201);
        }

        return response()->json('An error occured. Please try again.', 500);
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
