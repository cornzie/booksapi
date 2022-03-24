# booksapi Documentation
An API that formats and returns nice results from the https://www.anapioficeandfire.com/

## `GET` All Books
`booksapi.test/books`
Get all books from the https://www.anapioficeandfire.com/ API

## `GET` All Characters
`booksapi.test/characters`
Get all the characters from the https://www.anapioficeandfire.com/ API with cool filtering options.

## `GET` Filter Characters by gender, order
`booksapi.test/characters?gender=male&order=DESC`
Here's an example of how to filter the character results

### Query Params
```
gender
male
male or female

order
DESC
ASC or DESC
```

## `GET` Filter Characters by name
`booksapi.test/characters?name=Walder`
```
Query Params
name
Walder
name of character
```

## `POST` Post a comment
`booksapi.test/books/10/comments`
Post an anonymous comment about a book.

### Bodyraw (json)
```
{
  "comment": "This is yet another nice book"
}
```

## `GET`
Get a Book's Comments
`booksapi.test/books/12/comments`
Fetch comments for a book.