<?
session_start();
require '../vendor/autoload.php';
use App\Models\Todo;
use App\Controllers\TodoController;
use App\Base\Route;

$routes = new Route();
$routes->get('/', 'TodoController@list');
$routes->get('/list/:page', 'TodoController@list');
$routes->post('/todo', 'TodoController@store');

$routes->get('/login', 'AuthController@showForm');
$routes->post('/login', 'AuthController@login');
$routes->post('/logout', 'AuthController@logout');

$routes->get('/admin/todos', 'AdminController@list');
$routes->get('/admin/todos/:page', 'AdminController@list');
$routes->get('/admin/todos/edit/:id', 'AdminController@list');
$routes->post('/admin/todos', 'AdminController@updateTodo');

