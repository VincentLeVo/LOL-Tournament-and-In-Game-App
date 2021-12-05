<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="reset.css" />
    <link rel="stylesheet" href="styles.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap"
      rel="stylesheet"
    />

    <title>CPSC304 Project</title>
  </head>
  <?php
  include 'functions.php';
  ?>
  <body>
    <div class="ui">
      <header class="header is-flex">
        <div class="logo-container">
          <!-- Homepage Icon Link -->
          <a class="logo" href="homepage.php" title="Homepage">
            <p>LEAGUE OF LEGENDS TOURNAMENT INFO</p>
          </a>
        </div>

        <nav class="gn is-flex">
          <ul class="gn-items">
            <li>
              <a href="tournament.php" title="Tournament Info">Tournament</a>
            </li>
            <li>
              <a href="vote.php" title="Vote Page">Vote Page</a>
            </li>
            <li>
              <a class="admin" href="admin.php" title="Admin Page"
                >Admin Page</a
              >
            </li>
          </ul>
        </nav>
      </header>
      <main>
        <section class="banner is-flex">
          <div class="bannertext">
            <h1>Hello !</h1>
            <h2>
              Welcome to the League of Legends Tournament and Game Database
            </h2>
          </div>
        </section>
        <section class="about">
          <div class="container">
            <div class="row">
              <div class="col-sm">
                <a href="tournament.php"><i class="fas fa-trophy"></i></a>
                <p>View Tournament Information</p>
              </div>
              <div class="col-sm">
                <a href="admin.php"><i class="fas fa-user-cog"></i> </a>
                <p>Admin Options</p>
              </div>
              <div class="col-sm">
                <a href="vote.php"><i class="fas fa-vote-yea"></i> </a>
                <p>Vote Champions!</p>
              </div>
            </div>
          </div>
        </section>
      </main>

      <footer>
        <div>
          <p>
            2021&copy;. All Rights Reserved. Designed by: <br />
            <strong>VINCENT VO, KATIE WAI, PHILIP NG</strong>
          </p>
        </div>
      </footer>
    </div>
    <script
      src="https://kit.fontawesome.com/6af605f6e4.js"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
