CREATE TABLE Person (
id INTEGER PRIMARY KEY,
name CHAR(30) NOT NULL
);

CREATE TABLE Manager (
   id INTEGER PRIMARY KEY,
       FOREIGN KEY(id) REFERENCES Person
       ON DELETE CASCADE
);

CREATE TABLE Coach (
   id INTEGER PRIMARY KEY,
       FOREIGN KEY (id) REFERENCES Person
       ON DELETE CASCADE
);

CREATE TABLE Team (
id INTEGER PRIMARY KEY,
name CHAR(30) NOT NULL UNIQUE,
region CHAR(4)
);

CREATE TABLE Player (
id INTEGER PRIMARY KEY,
teamId INTEGER DEFAULT -1 NOT NULL,
username CHAR(30),
region CHAR(4),
city CHAR(30),
country CHAR(30),
FOREIGN KEY (id) REFERENCES Person
ON DELETE CASCADE,
FOREIGN KEY(teamId)
REFERENCES Team,
UNIQUE(username, region)
);

CREATE TABLE CoachCoachesTeam (
teamId INTEGER,
coachId INTEGER,
PRIMARY KEY(teamId, coachId),
FOREIGN KEY(teamId)
REFERENCES Team
ON DELETE CASCADE,
FOREIGN KEY(coachId)
REFERENCES Person
ON DELETE CASCADE
);
CREATE TABLE ManagerManagesTeam (
teamId INTEGER,
managerId INTEGER,
PRIMARY KEY(teamId, managerId),
FOREIGN KEY (teamId)
REFERENCES Team
ON DELETE CASCADE,
FOREIGN KEY(managerId)
REFERENCES Manager
ON DELETE CASCADE
);
CREATE TABLE Champion (
name CHAR(30) PRIMARY KEY
);
CREATE TABLE PlayerPlaysChampion (
id INTEGER,
championName CHAR(30),
KDARatio FLOAT,
winPercentage FLOAT,
PRIMARY KEY(id, championName),
FOREIGN KEY(id)
REFERENCES Player
ON DELETE CASCADE,
FOREIGN KEY(championName)
REFERENCES Champion
ON DELETE CASCADE
);
CREATE TABLE TopLaner (
name CHAR(30) PRIMARY KEY,
FOREIGN KEY(name)
REFERENCES Champion
ON DELETE CASCADE
);
CREATE TABLE MidLaner (
name CHAR(30) PRIMARY KEY,
FOREIGN KEY(name)
REFERENCES Champion
ON DELETE CASCADE
);
CREATE TABLE Jungler (
name CHAR(30) PRIMARY KEY,
FOREIGN KEY(name)
REFERENCES Champion
ON DELETE CASCADE
);
CREATE TABLE Support (
name CHAR(30) PRIMARY KEY,
FOREIGN KEY(name)
REFERENCES Champion
ON DELETE CASCADE
);
CREATE TABLE BottomLaner (
name CHAR(30) PRIMARY KEY,
FOREIGN KEY(name)
REFERENCES Champion
ON DELETE CASCADE
);

CREATE TABLE ItemCostTier (
cost INTEGER PRIMARY KEY,
tier CHAR(30)
);

CREATE TABLE ItemNameCost (
name CHAR(30) PRIMARY KEY,
cost INTEGER,
FOREIGN KEY(cost)
REFERENCES ItemCostTier
ON DELETE SET NULL
);

CREATE TABLE ChampionUsesItems (
championName CHAR(30),
itemName CHAR (30),
PRIMARY KEY(itemName, championName),
FOREIGN KEY(championName)
REFERENCES Champion
  ON DELETE CASCADE,
FOREIGN KEY(itemName)
REFERENCES ItemNameCost
ON DELETE CASCADE
);

CREATE TABLE Tournament (
tournamentId INTEGER PRIMARY KEY,
name CHAR(20),
dateStart DATE,
dateEnd DATE,
season INTEGER,
UNIQUE(name, season)
);

CREATE TABLE Match (
matchId INTEGER,
tournamentId INTEGER,
matchDate DATE,
gameLength DECIMAL,
PRIMARY KEY (MatchId, tournamentId),
FOREIGN KEY(tournamentId)
REFERENCES Tournament
ON DELETE CASCADE
);

CREATE TABLE TeamsPlaysMatch (
winningTeamId INTEGER NOT NULL,
losingTeamId INTEGER NOT NULL,
tournamentId INTEGER NOT NULL,
matchId INTEGER NOT NULL,
PRIMARY KEY (tournamentId, MatchId),
FOREIGN KEY (winningTeamId) REFERENCES Team(id),
FOREIGN KEY (losingTeamId) REFERENCES Team(id),
FOREIGN KEY (matchId, tournamentId) REFERENCES Match
);

CREATE TABLE RankingFurthestRound (
   ranking INTEGER PRIMARY KEY,
   furthestRound CHAR(30)
);

CREATE TABLE TeamParticipantsTournament (
tournamentId INTEGER,
teamId INTEGER,
ranking INTEGER,
PRIMARY KEY(tournamentId, teamId),
FOREIGN KEY(teamId)
REFERENCES Team
ON DELETE CASCADE,
FOREIGN KEY(tournamentId)
REFERENCES Tournament
ON DELETE CASCADE,
FOREIGN KEY(ranking)
REFERENCES RankingFurthestRound
ON DELETE CASCADE,
UNIQUE(tournamentId, ranking)
);

CREATE TABLE Sponsor (
   companyName CHAR(30) PRIMARY KEY
);

CREATE TABLE SponsorSponsorsTeam(
teamId INTEGER,
tournamentId INTEGER,
companyName CHAR(30),
Amount DECIMAL,
PRIMARY KEY (teamId, tournamentId, companyName),
FOREIGN KEY (teamId) REFERENCES Team,
FOREIGN KEY (tournamentId) REFERENCES Tournament,
FOREIGN KEY (companyName) REFERENCES Sponsor
);

CREATE TABLE VoteChampion (
   riotID CHAR(30) PRIMARY KEY,
   champion CHAR(30)
);