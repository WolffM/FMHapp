CREATE TABLE questions
(
questionid int NOT NULL AUTO_INCREMENT,
questiontext varchar(500),
questionset int NOT NULL,
PRIMARY KEY (questionid)
)

CREATE TABLE clients
(
clientid int NOT NULL AUTO_INCREMENT,
age int NOT NULL,
name varchar(100),
email varchar(200),
score int,
percentile int,
PRIMARY KEY (clientid)
)

CREATE TABLE answers
(
answerid int NOT NULL AUTO_INCREMENT,
questionid int NOT NULL,
clientid int NOT NULL,
response bool NOT NULL,
PRIMARY KEY (answerid),
FOREIGN KEY (clientid) REFERENCES clients(clientid),
FOREIGN KEY (questionid) REFERENCES questions(questionid)
)

