INSERT INTO Person
VALUES (1, 'Soren Bjerg');
INSERT INTO Person
VALUES (2, 'William Li');
INSERT INTO Person
VALUES (3, 'Lee Sang Hyeok');
INSERT INTO Person
VALUES (4, 'Aileena Xu');
INSERT INTO Person
VALUES (5, 'Jian Zi Hao');
INSERT INTO Person
VALUES (6, 'Dennis Johnsen');
INSERT INTO Person
VALUES (7, 'Joshua Hartnett');
INSERT INTO Person
VALUES (8, 'Zaqueri Black');
INSERT INTO Person
VALUES (9, 'Hai Lam');
INSERT INTO Person
VALUES (10, 'Peng Yiliang');
INSERT INTO Person
VALUES (11, 'Martin Larsson');
INSERT INTO Person
VALUES (12, 'Zachary Scuderi');
INSERT INTO Person
VALUES (13, 'Clement Ivanov');
INSERT INTO Person
VALUES (14, 'Chen Yao');
INSERT INTO Person
VALUES (15, 'Wang Zhaohui');

INSERT INTO Manager
VALUES (4);
INSERT INTO Manager
VALUES (6);
INSERT INTO Manager
VALUES (7);
INSERT INTO Manager
VALUES (8);
INSERT INTO Manager
VALUES (9);

INSERT INTO Coach
VALUES(2);
INSERT INTO Coach
VALUES(10);
INSERT INTO Coach
VALUES(11);
INSERT INTO Coach
VALUES(12);
INSERT INTO Coach
VALUES(13);

INSERT INTO Team
VALUES(1, 'TSM', 'NA');
INSERT INTO Team
VALUES(2, 'G2 Esports', 'EU');
INSERT INTO Team
VALUES(3, 'RNG', 'CN');
INSERT INTO Team
VALUES(4, 'SKT', 'KR');
INSERT INTO Team
VALUES(5, 'Amigos', 'BR');

INSERT INTO Player
VALUES (1, 1, 'Bjergsen', 'NA', 'Vancouver', 'America');
INSERT INTO Player
VALUES (3, 4, 'Faker', 'KR', 'Seoul', 'Korea');
INSERT INTO Player
VALUES (5, 3, 'UZI', 'CN', 'Beijing', 'China');
INSERT INTO Player
VALUES (14, 5, 'DoraDaExplora', 'BR', 'Salvador', 'Brazil');
INSERT INTO Player
VALUES (15, 5, 'ElDorito', 'BR', 'Salvador', 'Brazil');

INSERT INTO CoachCoachesTeam
VALUES(1, 2);
INSERT INTO CoachCoachesTeam
VALUES(2, 10);
INSERT INTO CoachCoachesTeam
VALUES(3, 11);
INSERT INTO CoachCoachesTeam
VALUES(4, 12);
INSERT INTO CoachCoachesTeam
VALUES(5, 13);
INSERT INTO ManagerManagesTeam
VALUES(1, 4);
INSERT INTO ManagerManagesTeam
VALUES(2, 6);
INSERT INTO ManagerManagesTeam
VALUES(3, 7);
INSERT INTO ManagerManagesTeam
VALUES(4, 8);
INSERT INTO ManagerManagesTeam
VALUES(5, 9);
INSERT INTO Champion
VALUES('Gnar');
INSERT INTO Champion
VALUES('Malphite');
INSERT INTO Champion
VALUES('Darius');
INSERT INTO Champion
VALUES('Volibear');
INSERT INTO Champion
VALUES('Maokai');
INSERT INTO Champion
VALUES('Katarina');
INSERT INTO Champion
VALUES('Galio');
INSERT INTO Champion
VALUES('Lux');
INSERT INTO Champion
VALUES('Zed');
INSERT INTO Champion
VALUES('Pantheon');
INSERT INTO Champion
VALUES('Hecarim');
INSERT INTO Champion
VALUES('Udyr');
INSERT INTO Champion
VALUES('Elise');
INSERT INTO Champion
VALUES('Shaco');
INSERT INTO Champion
VALUES('Karthus');
INSERT INTO Champion
VALUES('Senna');
INSERT INTO Champion
VALUES('Blitzcrank');
INSERT INTO Champion
VALUES('Alistar');
INSERT INTO Champion
VALUES('Leona');
INSERT INTO Champion
VALUES('Thresh');
INSERT INTO Champion
VALUES('Samira');
INSERT INTO Champion
VALUES('Tristana');
INSERT INTO Champion
VALUES('Sivir');
INSERT INTO Champion
VALUES('Jinx');
INSERT INTO Champion
VALUES('Vayne');
INSERT INTO PlayerPlaysChampion
VALUES(1, 'Gnar', 1.3, 0.99);
INSERT INTO PlayerPlaysChampion
VALUES(1, 'Maokai', 1.3, 0.99);
INSERT INTO PlayerPlaysChampion
VALUES(3, 'Udyr', 1.0, 0.2);
INSERT INTO PlayerPlaysChampion
VALUES(3, 'Thresh', 1.0, 0.2);
INSERT INTO PlayerPlaysChampion
VALUES(3, 'Lux', 1.0, 0.2);
INSERT INTO PlayerPlaysChampion
VALUES(5, 'Lux', 0.9, 0.3);
INSERT INTO PlayerPlaysChampion
VALUES(14, 'Jinx', 5.0, 0.4);
INSERT INTO PlayerPlaysChampion
VALUES(15, 'Thresh', 0.2, 0.5);
INSERT INTO PlayerPlaysChampion
VALUES(15, 'Gnar', 0.2, 0.5);
INSERT INTO PlayerPlaysChampion
VALUES(15, 'Maokai', 0.2, 0.5);
INSERT INTO PlayerPlaysChampion
VALUES(15, 'Karthus', 0.2, 0.5);
INSERT INTO TopLaner
VALUES('Gnar');
INSERT INTO TopLaner
VALUES('Malphite');
INSERT INTO TopLaner
VALUES('Darius');
INSERT INTO TopLaner
VALUES('Volibear');
INSERT INTO TopLaner
VALUES('Maokai');
INSERT INTO MidLaner
VALUES('Katarina');
INSERT INTO MidLaner
VALUES('Galio');
INSERT INTO MidLaner
VALUES('Lux');
INSERT INTO MidLaner
VALUES('Zed');
INSERT INTO MidLaner
VALUES('Pantheon');
INSERT INTO Jungler
VALUES('Hecarim');
INSERT INTO Jungler
VALUES('Udyr');
INSERT INTO Jungler
VALUES('Elise');
INSERT INTO Jungler
VALUES('Shaco');
INSERT INTO Jungler
VALUES('Karthus');
INSERT INTO Support
VALUES('Senna');
INSERT INTO Support
VALUES('Blitzcrank');
INSERT INTO Support
VALUES('Alistar');
INSERT INTO Support
VALUES('Leona');
INSERT INTO Support
VALUES('Thresh');
INSERT INTO BottomLaner
VALUES('Samira');
INSERT INTO BottomLaner
VALUES('Tristana');
INSERT INTO BottomLaner
VALUES('Sivir');
INSERT INTO BottomLaner
VALUES('Jinx');
INSERT INTO BottomLaner
VALUES('Vayne');

INSERT INTO ItemCostTier
VALUES(400, 'starter');
INSERT INTO ItemCostTier
VALUES(2800, 'basic');
INSERT INTO ItemCostTier
VALUES(4000, 'legendary');

INSERT INTO ItemNameCost
VALUES('Dorans ring', 400);
INSERT INTO ItemNameCost
VALUES('Dorans shield', 400);
INSERT INTO ItemNameCost
VALUES('Dorans blade', 400);
INSERT INTO ItemNameCost
VALUES('Sunfire cape', 4000);
INSERT INTO ItemNameCost
VALUES('Ardent censer', 2800);

INSERT INTO ChampionUsesItems
VALUES('Gnar', 'Dorans shield');
INSERT INTO ChampionUsesItems
VALUES('Udyr', 'Dorans shield');
INSERT INTO ChampionUsesItems
VALUES('Lux', 'Dorans ring');
INSERT INTO ChampionUsesItems
VALUES('Jinx', 'Dorans blade');
INSERT INTO ChampionUsesItems
VALUES('Thresh', 'Sunfire cape');

INSERT INTO Tournament
VALUES(1, 'Worlds', DATE '2008-09-01', DATE '2008-09-30', 1);
INSERT INTO Tournament
VALUES(2, 'Qualifiers', DATE '2009-01-01', DATE '2009-01-11', 2);
INSERT INTO Tournament
VALUES(3, 'Worlds', DATE '2009-09-01', DATE '2009-09-30', 2);
INSERT INTO Tournament
VALUES(4, 'Worlds', DATE '2011-09-01', DATE '2011-09-30', 4);
INSERT INTO Tournament
VALUES(5, 'Regionals', DATE '2012-05-01', DATE '2012-05-30', 5);

INSERT INTO Match
VALUES(1, 1, DATE '2008-09-01', 20);
INSERT INTO Match
VALUES(2, 1, DATE '2008-09-02', 40);
INSERT INTO Match
VALUES(3, 2, DATE '2009-09-01', 60);
INSERT INTO Match
VALUES(4, 2, DATE '2009-09-02', 100);
INSERT INTO Match
VALUES(5, 4, DATE '2011-09-01', 90);

INSERT INTO TeamsPlaysMatch
VALUES(1, 2, 1, 1);
INSERT INTO TeamsPlaysMatch
VALUES(3, 4, 1, 2);
INSERT INTO TeamsPlaysMatch
VALUES(1, 5, 2, 3);
INSERT INTO TeamsPlaysMatch
VALUES(1, 3, 2, 4);
INSERT INTO TeamsPlaysMatch
VALUES(2, 4, 4, 5);

INSERT INTO RankingFurthestRound
VALUES(1, 'Finals');
INSERT INTO RankingFurthestRound
VALUES(2, 'Finals');
INSERT INTO RankingFurthestRound
VALUES(3, 'Semifinals');
INSERT INTO RankingFurthestRound
VALUES(4, 'Semifinals');
INSERT INTO RankingFurthestRound
VALUES(5, 'Quarterfinals');

INSERT INTO TeamParticipantsTournament
VALUES(1, 1, 1);
INSERT INTO TeamParticipantsTournament
VALUES(1, 2, 3);
INSERT INTO TeamParticipantsTournament
VALUES(1, 3, 2);
INSERT INTO TeamParticipantsTournament
VALUES(1, 4, 4);
INSERT INTO TeamParticipantsTournament
VALUES(1, 5, 5);
INSERT INTO TeamParticipantsTournament
VALUES(2, 1, 1);
INSERT INTO TeamParticipantsTournament
VALUES(3, 1, 1);
INSERT INTO TeamParticipantsTournament
VALUES(4, 1, 1);
INSERT INTO TeamParticipantsTournament
VALUES(5, 1, 1);

INSERT INTO Sponsor
VALUES('SK Telecom');
INSERT INTO Sponsor
VALUES('Telus');
INSERT INTO Sponsor
VALUES('Cisco');
INSERT INTO Sponsor
VALUES('Microsoft');
INSERT INTO Sponsor
VALUES('NordVPN');

INSERT INTO SponsorSponsorsTeam
VALUES(1, 1, 'SK Telecom', 10000.00);
INSERT INTO SponsorSponsorsTeam
VALUES(2, 1, 'Telus', 500000.00);
INSERT INTO SponsorSponsorsTeam
VALUES(3, 1, 'Cisco', 200.00);
INSERT INTO SponsorSponsorsTeam
VALUES(4, 1, 'Microsoft', 5000.00);
INSERT INTO SponsorSponsorsTeam
VALUES(5, 1, 'NordVPN', 1000000.00);