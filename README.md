# booksapi Documentation
An API that formats and returns nice results from the https://www.anapioficeandfire.com/

> ***Note that you can import the postman collection into your postman for a better view of this documentation, plus sample requests.***

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