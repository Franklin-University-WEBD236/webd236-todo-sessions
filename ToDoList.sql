PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
DROP TABLE IF EXISTS `todo`;
DROP TABLE IF EXISTS `user`;

CREATE TABLE `todo` (
  description VARCHAR(50) NOT NULL,
  done INTEGER NOT NULL,
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  user_id INTEGER NOT NULL FOREIGN KEY REFERENCES user(id)
);

INSERT INTO "todo" VALUES('Prepare a model 1 architecture example',1,2,4);
INSERT INTO "todo" VALUES('Teach class on Wednesday, 7:30 PM EST.',1,5,4);
INSERT INTO "todo" VALUES('Prepare a model 2 architecture example',1,6,4);
INSERT INTO "todo" VALUES('Get this sample app working on Glitch',0,8,4);

CREATE TABLE `user` (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  email TEXT UNIQUE NOT NULL,
  password TEXT NOT NULL,
  firstName TEXT NOT NULL,
  lastName TEXT NOT NULL
);

-- it is a very bad, bad idea to store plaintext passwords like this
-- but we'll get into the solution to that later.
INSERT INTO "user" VALUES(1,'nobody@nowhere.com','v@larM0rghul1s','Arya','Stark');
INSERT INTO "user" VALUES(2,'ironborn@pyke.com','!r0nBorn','Theon','Greyjoy');
INSERT INTO "user" VALUES(3,'alwayspayshisdebts@casterlyrock.com','th3Imp','Tyrion','Lannister');
INSERT INTO "user" VALUES(4,'todd.whittaker@franklin.edu','NicePassword','Todd','Whittaker');

DELETE FROM sqlite_sequence;
INSERT INTO "sqlite_sequence" VALUES('todo',10);
INSERT INTO "sqlite_sequence" VALUES('user',5);
COMMIT;
