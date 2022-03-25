# booksapi Documentation
An API that formats and returns nice results from the https://www.anapioficeandfire.com/ powered by Laravel Lumen

> ***Note that you can import the postman collection into your postman for a better view of this documentation, plus sample requests.***

# Responses

All API endpoints will respond with and object containing `status` (which will have a string value of `'error'` || `'success'`) and `data` (an object or an array of objects) properties. But it is recommended to check

Sample response:

```
{
    "status": "success",
    "data": {
        "characters": [
            {
                "url": "https://www.anapioficeandfire.com/api/characters/2",
                "name": "Walder",
                "gender": "Male",
                "culture": "",
                "born": "",
                "died": "",
                "titles": [
                    ""
                ],
                "aliases": [
                    "Hodor"
                ],
                "father": "",
                "mother": "",
                "spouse": "",
                "allegiances": [
                    "https://www.anapioficeandfire.com/api/houses/362"
                ],
                "books": [
                    "https://www.anapioficeandfire.com/api/books/1",
                    "https://www.anapioficeandfire.com/api/books/2",
                    "https://www.anapioficeandfire.com/api/books/3",
                    "https://www.anapioficeandfire.com/api/books/5",
                    "https://www.anapioficeandfire.com/api/books/8"
                ],
                "povBooks": [],
                "tvSeries": [
                    "Season 1",
                    "Season 2",
                    "Season 3",
                    "Season 4",
                    "Season 6"
                ],
                "playedBy": [
                    "Kristian Nairn"
                ]
            }
        ],
        "meta": {
            "current_result_count": 1,
            "total": 1,
            "links": [
                "<https://www.anapioficeandfire.com/api/characters?name=Walder&page=1&pageSize=50>; rel=\"first\", <https://www.anapioficeandfire.com/api/characters?name=Walder&page=1&pageSize=50>; rel=\"last\""
            ]
        }
    }
}

```
# Endpoints

## `GET` All Books

`https://cryptic-mesa-82506.herokuapp.com/books`
Get all books from the https://www.anapioficeandfire.com/ API

## `GET` All Characters

`https://cryptic-mesa-82506.herokuapp.com/characters`
Get all the characters from the https://www.anapioficeandfire.com/ API with cool filtering options.

## `GET` Filter Characters by gender, order

`https://cryptic-mesa-82506.herokuapp.com/characters?gender=male&order=DESC`
Here's an example of how to filter the character results. The order by works with the `name` property. This is because not all characters have known birth dates.

### Query Params

```
gender = male
# male or female

order = DESC
# ASC or DESC
```

## `GET` Filter Characters by name

`https://cryptic-mesa-82506.herokuapp.com/characters?name=Walder`
### Query Params
```
name = Walder
# name of character
```

## `POST` Post a comment

`https://cryptic-mesa-82506.herokuapp.com/books/10/comments`
Post an anonymous comment about a book.

### Bodyraw (json)
```
{
  "comment": "This is yet another nice book"
}
```

## `GET` Get a Book's Comments

Fetch comments for a book.
`https://cryptic-mesa-82506.herokuapp.com/books/12/comments`

# Setup Locally

To setup locally, you would need to ensure you have the standard Laravel Lumen Server requirements or use Home stead.
Essentially you will need to make sure your server meets the following requirements:

>PHP >= 7.1.3
>OpenSSL PHP Extension
>PDO PHP Extension
>Mbstring PHP Extension

Then run the following commands

```
# 1
git clone https://github.com/cornzie/booksapi.git

# 2
# cd into your cloned directory

# 3
composer install

# 4
cp .env.example .env

# 5
# set an environment key in .env APP_KEY. any random string would work, but Ideally 32 characters long is recommended
# Setup a database and fill out the values for the DB in .env

# 6
php artisan migrate

# 7 - run the App
# if you do not have Laravel Valet or Homestead 
# php -S localhost:8000 -t public

```

> ***A postman collection is included in the root of this app, so feel free to import it and test away!***