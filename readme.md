## simple crud api

**Base URL:** `http://simplecrudapi.herokuapp.com/api/movies`

### Endpoints
- **GET** `/`

Displays all movies in database.

- **GET** `/:movieId`

Displays information on a movie
    - Params:
        - `movieId`: integer

- **DELETE** `/:movieId`

Deletes a movie resource from database
    - Params
        - `movieId`: integer

