<?
session_start();
require '../vendor/autoload.php';
use App\Models\Todo;
use App\Controllers\TodoController;
use App\Base\Route;

$routes = new Route();
$routes->get('/', 'TodoController@listItem');
$routes->get('/list/:page', 'TodoController@listItem');
$routes->post('/todo', 'TodoController@store');

$routes->get('/login', 'AuthController@showForm');
$routes->post('/login', 'AuthController@login');
$routes->post('/logout', 'AuthController@logout');

$routes->get('/admin/todos', 'AdminController@listItem');
$routes->get('/admin/todos/:page', 'AdminController@listItem');
$routes->get('/admin/todos/edit/:id', 'AdminController@listItem');
$routes->post('/admin/todos', 'AdminController@updateTodo');

