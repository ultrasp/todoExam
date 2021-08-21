<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title><?=$title?></title>
  </head>
  <body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <?php if(!$is_logined):?>
      <li class="nav-item active">
        <a class="btn btn-outline-success my-2 my-sm-0" href="/login">Login </a>
      </li>
      <?php else: ?>
      <li class="nav-item active">
        <a class="btn btn-outline-success my-2 my-sm-0" href="/admin/todos">Admin dashboard </a>
      </li>
      <li>
        <form class="form-inline" action="/logout" method="post">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
        </form>
        
      </li>
      <?php endif;?>
    </ul>
  </div>
</nav>
