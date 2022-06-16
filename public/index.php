<?php session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $password = $_POST["password"];
  if (isset($password)) {
    $fn = fopen("/var/www/passwords.txt","r");
    $succes=False;
    while(! feof($fn))  {
      $validPassword = fgets($fn);
      if  ($password."\n" == $validPassword) {
        $_SESSION["$password"] = TRUE;
        $succes=TRUE;
        break;
      }
    } 
    fclose($fn);
  } 
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>at-puzzel</title>

    <!-- Favicons -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link href="images/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="signin.css" rel="stylesheet">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->
  </head>
  <body> 
    <header>
      <a href="https://github.com/atcomputing/atpuzzel">
        <img width="149" height="149" style="position:absolute;top:0px" src="images/forkme_left_red_aa0000.png" alt="Fork me on GitHub" >
      </a>
    </header>
    <div class="container text-center">
      <main>
        <div class="container text-center">
          <img class="mb-6 sm-6 lg-6 center" src="images/atcomputing.png" alt="" height="200">
          <form class="form-signin"  method="post" >
            <h1 class="h5 mb-3 font-weight-normal">Fill in the password...</h1>
            <label for="inputPassword" class="sr-only">Password</label>

            <?php if (isset($succes) and ! $succes ){ ?>
            <div class="alert alert-warning" role="alert">
              Wrong password
            </div>
            <?php } ?>
            
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
            <button class="btn btn-lg btn-block" style="background-color:#3399cc" type="submit"  value="Submit" >Log in</button>
          </form>
        </div>
        <?php if ($succes) {?>
          <!-- Modal -->
          <div class="modal" id="prompt" tabindex="-1" role="dialog" >
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Succes</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  You found a password (<?php echo count($_SESSION);?>/7)
                </div>
              </div>
            </div>
          </div>
          "<script> $('#prompt').modal('show') </script>" ;
        <?php } ?>

	<!-- Here is the first password of the total of seven: Bootstrap_Rulez
	The first one was easy, so go go find the other six...
	versie 0.12
	  -->

      </main>
      <div class="row g-5">
        <footer class="pt-5 my-5 text-muted border-top">
          <a href="https://shell.atcomputing.nl" target="_blank">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAA0ElEQVRIS2NkoDFgpLH5DMPLAgdgcM0HYgUKg+0BUH8iEB8AmYMcRCAJeQoNh2kHmaWIbsF/qCyl8YJiDrJhA2JBADQsP5AQdET7AGT4eiC+AMSOQEysJURbIAB1vT6JlhBtAShUyLGEZAv2Ay0yAOKLQAzKK4SCimgLQK4n1XCQr4m2ABbJ6C6HGYCesGBJnmgLQAZgS6ZUtYCE5A9XSpIPqGoBKHXwk2MiFj0PgWIK6IUdKAkuAGJKS1SQ4QnQTDrMajQqBT+qMZRWLgQdBQBXpjoZCdS73wAAAABJRU5ErkJggg=="/></a>
        </footer>
      </div>
    </div>
  </body>
</html>

