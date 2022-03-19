<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', 'BookAPIController@index'); // docs

$router->get('/books', 'BookController@index'); // get all books
$router->get('/books/{book}', 'BookController@find'); // get a book

$router->post('books/{book}/comments', 'BookController@storeComments'); // add anon comment to a book
$router->get('books/{book}/comments', 'BookController@comments'); // get a book's comments

$router->get('books/{book}/characters', 'BookController@characters'); // get a book's characters

