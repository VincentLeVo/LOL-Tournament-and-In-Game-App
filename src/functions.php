<?php
$success = True; //keep track of errors so it redirects the page only if there are no errors
$db_conn = NULL; // edit the login credentials in connectToDB()
echo "<script>console.log('Debug Objects: " . $db_conn . "' );</script>";
$show_debug_alert_messages = False; // set to True if you want alerts to show you which methods are being triggered (see how it is used in debugAlertMessage())

function debugAlertMessage($message) {
    global $show_debug_alert_messages;

    if ($show_debug_alert_messages) {
        echo "<script type='text/javascript'>alert('" . $message . "');</script>";
    }
}

function displayChampions() {
    global $db_conn;

    switch ($_GET['role']) {
        case "Top":
            $role = "TopLaner";
            break;
        case "Mid":
            $role = "MidLaner";
            break;
        case "Jungle":
            $role = "Jungler";
            break;
        case "Support":
            $role = "Support";
            break;
        case "Bottom":
            $role = "BottomLaner";
            break;
    }

    connectToDB();
    $result = executePlainSQL("select name from Champion");
    if (!($_GET['role'] == 'ALL')) {
        $result = executePlainSQL("select * from Champion JOIN " . $role . " ON Champion.name=" . $role . ".name");
    }
    OCICommit($db_conn);
    echo "<table>";
    echo "<tr><th>Champion</th></tr>";
    while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
        echo "<tr><td>" . $row["NAME"] . "</td></tr>";
    }
    echo "</table>";
}

function displayUsersVotes() {
    global $db_conn;
    echo "<table>";
    echo "<tr><th>User</th><th>Champion</th></tr>";
    connectToDB();
    $result = executePlainSQL("select * from VoteChampion");
    OCICommit($db_conn);
    while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
        echo "<tr><td>" . $row["RIOTID"] . "</td><td>" . $row["CHAMPION"] . "</td></tr>";
    }
    echo "</table>";
}

function displayTeamPlayer() {
    global $db_conn;
    echo "<table>";
    echo "<tr><th>Name</th><th>Username</th><th>Region</th><th>Team Name</th></tr>";
    connectToDB();
    $result = executePlainSQL("select person.name, player.username, player.region, team.name as teamname from person, player, team where player.id=person.id and team.id=player.teamid");
    OCICommit($db_conn);
    while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
        echo "<tr><td>" . $row["NAME"] . "</td><td>" . $row["USERNAME"] . "</td><td>" . $row["REGION"] . "</td><td>" . $row["TEAMNAME"] . "</td></tr>";
    }
    echo "</table>";
}

function displaySponsors() {
    global $db_conn;
    echo "<table>";
    echo "<tr><th>Sponsors</th></tr>";
    connectToDB();
    $result = executePlainSQL("SELECT companyName FROM SponsorSponsorsTeam GROUP BY companyName HAVING sum(Amount) >= 250000.00");
    OCICommit($db_conn);
    while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
        echo "<tr><td>" . $row["COMPANYNAME"] . "</td></tr>";
    }
    echo "</table>";
}

function displayTeamVeterans() {
    global $db_conn;
    echo "<table>";
    echo "<tr><th>Team Name</th><th>Region</th></tr>";
    connectToDB();
    $result = executePlainSQL(
        "SELECT t.name, t.region FROM Team t WHERE NOT EXISTS
        ((SELECT tr.tournamentId FROM tournament tr)
        MINUS
        (SELECT tpt.tournamentId FROM TeamParticipantsTournament tpt WHERE tpt.teamid = t.id))");
    OCICommit($db_conn);
    while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
        echo "<tr><td>" . $row["NAME"] . "</td><td>" . $row["REGION"] . "</td></tr>";
    }
    echo "</table>";
}

function displayTopPlayers() {
    global $db_conn;
    echo "<table>";
    echo "<tr><th>Player Username</th><th>Region</th><th>Champion</th><th>KDA</th></tr>";
    connectToDB();
    $result = executePlainSQL("SELECT p.username, p.region, pp.championName, pp.KDARatio
        FROM Player p, PlayerPlaysChampion pp
        WHERE p.id = pp.id
        AND (pp.championName, pp.KDARatio)
        IN (
        SELECT ppc.championName, max(ppc.KDARatio)
        FROM Player p, PlayerPlaysChampion ppc
        WHERE p.id = ppc.id
        GROUP BY ppc.championName
        HAVING 1 < (SELECT count(*)
        FROM PlayerPlaysChampion ppc2
        WHERE ppc.championName = ppc2.championName))");
    OCICommit($db_conn);
    while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
        echo "<tr><td>" . $row["USERNAME"] . "</td><td>" . $row["REGION"] . "</td><td>" . $row["CHAMPIONNAME"] . "</td><td>" . $row["KDARATIO"] . "</td></tr>";
    }
    echo "</table>";
}

function displayPlayers() {
    global $db_conn;

    $result = executePlainSQL("SELECT username, region FROM Player ORDER BY region");
    if (!($_GET['region'] == 'ALL')) {
        connectToDB();
        $result = executePlainSQL("SELECT username, region FROM Player WHERE region='" . $_GET['region'] . "' ORDER BY region");
    }
    OCICommit($db_conn);

    echo "<table>";
    echo "<tr><th>Username</th><th>Region</th></tr>";
    while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
        echo "<tr><td>" . $row["USERNAME"] . "</td><td>" . $row["REGION"] . "</td></tr>"; //or just use "echo $row[0]"
    }
    echo "</table>";
}

function displayTournaments() {
    global $db_conn;
    connectToDB();
    $result = executePlainSQL("SELECT name, dateStart, dateEnd, season FROM Tournament");
    OCICommit($db_conn);

    echo "<table>";
    echo "<tr><th>Tournament Name</th> <th>Start Date</th> <th>End Date</th> <th>Season</th></tr>";
    while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
        echo "<tr><td>" . $row["NAME"] . "</td> <td>" . $row["DATESTART"] . "</td> <td>" . $row["DATEEND"] . "</td> <td>" . $row["SEASON"] . "</td></tr>"; //or just use "echo $row[0]"
    }
    echo "</table>";
}

function executePlainSQL($cmdstr) { //takes a plain (no bound variables) SQL command and executes it
    //echo "<br>running ".$cmdstr."<br>";
    global $db_conn, $success;

    $statement = OCIParse($db_conn, $cmdstr);
    //There are a set of comments at the end of the file that describe some of the OCI specific functions and how they work

    if (!$statement) {
        echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
        $e = OCI_Error($db_conn); // For OCIParse errors pass the connection handle
        echo htmlentities($e['message']);
        $success = False;
    }

    $r = OCIExecute($statement, OCI_DEFAULT);
    if (!$r) {
        echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
        $e = oci_error($statement); // For OCIExecute errors pass the statementhandle
        echo htmlentities($e['message']);
        $success = False;
    }

    return $statement;
}

function executeBoundSQL($cmdstr, $list) {
    /* Sometimes the same statement will be executed several times with different values for the variables involved in the query.
In this case you don't need to create the statement several times. Bound variables cause a statement to only be
parsed once and you can reuse the statement. This is also very useful in protecting against SQL injection.
See the sample code below for how this function is used */

    global $db_conn, $success;
    $statement = OCIParse($db_conn, $cmdstr);

    if (!$statement) {
        echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
        $e = OCI_Error($db_conn);
        echo htmlentities($e['message']);
        $success = False;
    }

    foreach ($list as $tuple) {
        foreach ($tuple as $bind => $val) {
            //echo $val;
            //echo "<br>".$bind."<br>";
            OCIBindByName($statement, $bind, $val);
            unset ($val); //make sure you do not remove this. Otherwise $val will remain in an array object wrapper which will not be recognized by Oracle as a proper datatype
        }

        $r = OCIExecute($statement, OCI_DEFAULT);
        if (!$r) {
            echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
            $e = OCI_Error($statement); // For OCIExecute errors, pass the statementhandle
            echo htmlentities($e['message']);
            echo "<br>";
            $success = False;
        }
    }
}

function connectToDB() {
    global $db_conn;

    // Your username is ora_(CWL_ID) and the password is a(student number). For example,
    // ora_platypus is the username and a12345678 is the password.
    $db_conn = OCILogon("ora_kat28wai", "a21934161", "dbhost.students.cs.ubc.ca:1522/stu");

    if ($db_conn) {
        debugAlertMessage("Database is Connected");
        return true;
    } else {
        debugAlertMessage("Cannot connect to Database");
        $e = OCI_Error(); // For OCILogon errors pass no handle
        echo htmlentities($e['message']);
        return false;
    }
}

function disconnectFromDB() {
    global $db_conn;

    debugAlertMessage("Disconnect from Database");
    OCILogoff($db_conn);
}

function handleDeleteRequest() {
    global $db_conn;

    $riot_id = $_POST['deleteRiotID'];

    // you need the wrap the old name and new name values with single quotations
    executePlainSQL("DELETE FROM VoteChampion WHERE riotID='" . $riot_id . "'");
    OCICommit($db_conn);
}

function handleDeleteCascadeRequest() {
    global $db_conn;

    $user_id = $_POST['deleteUserName'];
    $region_id = $_POST['deleteRegion'];

    // you need the wrap the old name and new name values with single quotations
    executePlainSQL("DELETE FROM Player WHERE username='" . $user_id . "' AND region='" . $region_id . "'");
    OCICommit($db_conn);
}

function handleUpdateRequest() {
    global $db_conn;

    $riot_id = $_POST['updateRiotID'];
    $new_champ = $_POST['updateChamp'];
    echo "<script>console.log('new champ: " . $new_champ . "' );</script>";

    // you need the wrap the old name and new name values with single quotations
    executePlainSQL("UPDATE VoteChampion SET champion='" . $new_champ . "' WHERE riotID='" . $riot_id . "'");
    OCICommit($db_conn);
}

function handleInsertRequest() {
    global $db_conn;

    //Getting the values from user and insert data into the table
    $tuple = array (
        ":bind1" => $_POST['riotID'],
        ":bind2" => $_POST['champion']
    );

    $alltuples = array (
        $tuple
    );

    executeBoundSQL("insert into VoteChampion values (:bind1, :bind2)", $alltuples);
    OCICommit($db_conn);
}

function handleDisplayVotesRequest() {
    global $db_conn;

    $result = executePlainSQL("SELECT Champion,COUNT(riotID) AS Votes FROM VoteChampion GROUP BY Champion ORDER BY Votes DESC");
    echo "<table>";
    echo "<tr><th>Champion</th><th>Votes</th></tr>";
    while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
        echo "<tr><td>" . $row["CHAMPION"] . "</td><td>" . $row["VOTES"] . "</td></tr>"; //or just use "echo $row[0]"
    }
    echo "</table>";
}

function handlePOSTRequest() {
    if (connectToDB()) {
        if (array_key_exists('deleteQueryRequest', $_POST)) {
            handleDeleteRequest();
        } else if (array_key_exists('updateQueryRequest', $_POST)) {
            handleUpdateRequest();
        } else if (array_key_exists('insertQueryRequest', $_POST)) {
            handleInsertRequest();
        } else if (array_key_exists('deleteCascadeQueryRequest', $_POST)) {
            handleDeleteCascadeRequest();
    }
  }
}

function handleGETRequest() {
    if (connectToDB()) {
        if (array_key_exists('displayVotes', $_GET)) {
            handleDisplayVotesRequest();
        } else if (array_key_exists('displaySponsors', $_GET)) {
            displaySponsors();
        } else if (array_key_exists('displayTeams', $_GET)) {
            displayTeamVeterans();
        } else if (array_key_exists('displayPlayers', $_GET)) {
            displayTopPlayers();
        } else if (array_key_exists('displayChampionsRequest', $_GET)) {
            displayChampions();
        }
    }
}

if (isset($_POST['updateSubmit']) || isset($_POST['insertSubmit']) || isset($_POST['deleteSubmit'])) {
    handlePOSTRequest();
}

?>
