# simple crud api

**Base URL:** `http://simplecrudapi.herokuapp.com/api/movies`

## Endpoints

### Display all movies
* URL: `/`
* Method: `GET`

### Add a new movie
* URL: `/new`
* Method: `POST`
* Form Params
    * `title`: string
    * `genre`: string
    * `synopsis`: text
    * `image`: image (mimes: `jpg, jpeg, png`)

### Display the information on a movie
* URL: `/:movieId`
* Method: `GET`
* Params
    * `movieId`: integer

### Delete a movie resource
* URL: `/:movieId`
* Method: `DELETE`
* Params
    * `movieId`: integer

