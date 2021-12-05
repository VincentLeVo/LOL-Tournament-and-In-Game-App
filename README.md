**DEVS ONLY** - checklist of queries todo (check them off in your PR):
- [x] insert
- [x] delete
- [x] update
- [x] selection - list pro players by region
- [x] projection - list all tournament people (names)
- [x] join - show items w/ tiers
- [x] aggregation group by - # of votes per champion
- [x] aggregation nested group by - top player kda for each champion where the champion is played more than 2 players
- [x] aggregation having - sponsors where sum > some amount
- [x] division - teams that participated in all the tournaments

## Set-up:
All scripts will run within SQL Plus:
- SSH into undergrad servers
- navigate to folder where script file(s) reside in
- login to sqlplus:
  - `sqlplus [YOUR_USERNAME]`(looks like ora_[CWL]@stu, password is a[studentNum])

Blow away potentially pre-existing tables:
- run `start dropTables.sql`

Create tables in DB:
- `start createTables.sql`
- you can double check the tables by running `select table_name from user_tables;`
  - there should be 24 tables

Populate data in tables:
- `start populateData.sql`

See the data is populated:
- `start displayData.sql`

- you can quit sqlplus by typing `quit`

## To run the project: 
- SSH into the undergrad servers
- under the ~/public_html directory, put the project /src contents into it
- change all the file permissions to 755 (enable all execute permissions)
- go to: students.cs.ubc.ca/~(CWL_ID)/(PATH_TO_PROJECT_FILES)

### Notes:
- currently deciding how we want to handle login credentials
    - either somehow maintain login state / credentials (page refreshes tho...)
    - manually change login in the file like in the tutorial (ugly)
    
**Webpage**: https://www.students.cs.ubc.ca/~philjng/project/homepage.php
![image](https://media.github.students.cs.ubc.ca/user/2129/files/43b6a300-926f-11eb-8393-12c2520b5885)
![image](https://media.github.students.cs.ubc.ca/user/2129/files/5630dc80-926f-11eb-8ce9-d7b1049e6743)
![image](https://media.github.students.cs.ubc.ca/user/2129/files/6052db00-926f-11eb-9419-91f4dae47ced)
![image](https://media.github.students.cs.ubc.ca/user/2129/files/6cd73380-926f-11eb-80b6-5be733542c96)
![image](https://media.github.students.cs.ubc.ca/user/2129/files/7c567c80-926f-11eb-86b1-5f347a9365d3)
![image](https://media.github.students.cs.ubc.ca/user/2129/files/837d8a80-926f-11eb-8b43-39c8df69ad1a)
