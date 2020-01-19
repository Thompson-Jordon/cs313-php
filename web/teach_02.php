<?php $thisPage = "Teach_02"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="./styles/teach_02.css" />
    <!--For jQuery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!--For Bootstrap-->
    <!-- Latest compiled and minified CSS -->
    <link
    rel="stylesheet"
    href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    />
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>Teach 02: HTML Review</title>
  </head>
  <body>
    <?php include("nav.php"); ?>
    <div class="row">
      <div id="div1" class="bold col text-center">
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae,
          dolor? Perspiciatis libero aspernatur saepe natus esse qui blanditiis
          nemo, voluptate provident vel ex, magnam consequuntur eum soluta
          inventore quam ratione?
        </p>
        <input
          type="text"
          name="color"
          id="txtColor"
          class="form-control"
        /><button type="button" id="btnColor" class="btn btn-dark">
          Change Color
        </button>
      </div>
      <div id="div2" class="bold col">
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora
          ratione modi culpa qui id minima molestiae omnis impedit recusandae
          exercitationem nemo dicta nostrum pariatur hic porro incidunt, ad eos
          suscipit!
        </p>
      </div>
      <div id="div3" class="bold col bg-success">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates
        exercitationem amet aliquam atque, quis doloremque quibusdam explicabo
        enim reprehenderit architecto dolore necessitatibus ex provident
        doloribus harum consequuntur dolorum eligendi. Reiciendis!
      </div>
    </div>
    <div class="row bg-dark">
      <div class="col text-center">
        <button id="btn1" class="btn btn-warning">Click Me</button>
      </div>
      <div class="col text-center">
        <button id="toggle" class="btn btn-success">Toggle div3</button>
      </div>
    </div>
    <script src="./scripts/teach_02.js"></script>
  </body>
</html>
