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
        <section class="vote is-flex">

            <div>
                <h1>Vote for your favorite champion!</h1>
                <form method="POST" action="vote.php"> <!--refresh page when submitted-->
                    <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
                    RiotID: <input type="text" name="riotID"> <br /><br />
                    Your Favorite Champion:
                        <select name="champion">
                        <?php
                            showChampionOptions();

                            function showChampionOptions() {
                                connectToDB();
                                $result = executePlainSQL("SELECT * FROM Champion");
                                if(($row = oci_fetch_row($result)) != false) {
                                    echo '<option value="' . $row[0] . '">' . $row[0] . '</option>';
                                    while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                                        $name = $row['NAME'];
                                        echo '<option value="' . $name . '">' . $name . '</option>';
                                    }
                                }

                            }
                        ?>
                        </select> <br>
                    <input class="btn" type="submit" value="Vote" name="insertSubmit"></p>
                </form>
            </div>

            <div>
                <h1>Changed your mind? Vote again here!</h1>

                <form method="POST" action="vote.php"> <!--refresh page when submitted-->
                    <input type="hidden" id="updateQueryRequest" name="updateQueryRequest">
                    RiotID: <input type="text" name="updateRiotID"> <br /><br />
                    Your Favorite Champion:
                        <select name="updateChamp">
                        <?php
                            showChampionOptions();
                        ?>
                        </select> <br>
                    <input class="btn" type="submit" value="Revote" name="updateSubmit">
                </form>
            </div>

            <div>
                <h1>Don't want to participate anymore? Delete your vote!</h1>
                <form method="POST" action="vote.php"> <!--refresh page when submitted-->
                    <input type="hidden" id="deleteQueryRequest" name="deleteQueryRequest">
                    RiotID: <input type="text" name="deleteRiotID"> <br /><br />
                    <input class="btn red" type="submit" value="Remove Vote" name="deleteSubmit">
                </form>
            </div>

        </section>
        <section class="userVotes is-flex">
          <div class="item">
              <h1>Users Votes</h1>
              <?php
              displayUsersVotes();
              ?>
          </div>

          <div class="item">
              <h1>Champion by Popularity</h1>
              <form method="GET" action="vote.php"> <!--refresh page when submitted-->
                  <input type="hidden" id="displayVotesRequest" name="displayVotesRequest">
                  <input type="submit" class="btn" value="Show Results" name="displayVotes">
              </form>
              <?php
              if (isset($_GET['displayVotesRequest'])) {
                  handleGETRequest();
              }
              ?>
          </div>

          <div class="item">
              <h1>Champions</h1>
              <form method="GET" action="vote.php"> <!--refresh page when submitted-->
                  <select name="role">
                      echo '<option value="ALL">ALL</option>';
                      echo '<option value="Top">Top</option>';
                      echo '<option value="Mid">Mid</option>';
                      echo '<option value="Jungle">Jungle</option>';
                      echo '<option value="Support">Support</option>';
                      echo '<option value="Bottom">Bottom</option>';
                  </select>
                  <input type="hidden" id="displayChampionsRequest" name="displayChampionsRequest">
                  <input type="submit" class="btn" value="Submit" name="displayChampions">
              </form>
              <?php
              if (isset($_GET['displayChampionsRequest'])) {
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
