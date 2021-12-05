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
    <div class="ui tournament">
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
        <section class="proPlayersRegion is-flex">
            <div class="item">
                <h1>
                    Select pro players by region:
                </h1>
                <form method="GET" action="tournament.php">
                    <select name="region">
                        <?php
                        showRegionOptions();

                        function showRegionOptions() {
                            connectToDB();
                            $result = executePlainSQL("SELECT DISTINCT region FROM Player");
                            echo '<option value="ALL">ALL</option>';
                            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                                $region = $row['REGION'];
                                echo '<option value="' . $region . '">' . $region . '</option>';
                            }
                        }
                        ?>
                    </select>
                    <br>
                    <input class="btn" type="submit" value="select" name="regionSubmit">
                </form>
                <?php
                    displayPlayers();
                ?>
            </div>

        </section>

      <section class="participants is-flex">
          <div class="item">
              <h1>Past Tournaments:</h1>
              <?php
              displayTournaments();
              ?>
          </div>
      </section>

      <section class="esports is-flex">
          <div class="item">
                <h2>Check out our dedicated sponsors!</h2>
              
                <form method="GET" action="tournament.php">
                    <input type="hidden" id="displaySponsors" name="displaySponsors">
                    <input type="submit" class="btn" value="Show Sponsors" name="displaySponsors">
                </form>
                <?php
                    if (isset($_GET['displaySponsors'])) {
                        handleGETRequest();
                    }
                ?>
          </div>

          <div class="item">
              <h2>Esport Team Spotlight</h2>
              <form method="GET" action="tournament.php">
                <input type="hidden" id="displaySponsors" name="displayTeams">
                <input type="submit" class="btn" value="Show Teams" name="displayTeams">
              </form>
                <?php
                if (isset($_GET['displayTeams'])) {
                    handleGETRequest();
                }
                ?>
          </div>

          <div class="item">
              <h2>Esport Player Spotlight</h2>
              <form method="GET" action="tournament.php">
                <input type="hidden" id="displaySponsors" name="displayPlayers">
                <input type="submit" class="btn" value="Show Players" name="displayPlayers">
              </form>
                <?php
                if (isset($_GET['displayPlayers'])) {
                    handleGETRequest();
                }
                ?>
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
