<?php 
class VistaUserFormulario {

    public static function render($mensaje){
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>API Songs</title>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        </head>
        <body class="bg-warning-subtle">

        <div class='container'>
            <center>
            <div class='row justify-content-center mt-5 pb-5 bg-warning p-3 mb-5 bg-body-tertiary rounded'>
                <div class='col-6 mt-5'>
                    <h2 class="text-dark">WELCOME TO MY SONGS</h2>
                    <form action='enrutador.php' method='post'>
                    <p class='text-danger'><?= $mensaje; ?></p>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="h5">Email</label>
                        <input type="email" name='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1" class="h5">Password</label>
                        <input type="password" name='password' class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                    </div>
                    <input type='hidden' name='accion' value='checkLogin'>
                    <button type="submit" class="btn btn-success h3">Acceso</button>
                    </form>
                </div>
            </div>
            </center>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        </body>
        </html>
        <?php 
        
    }

}
?>