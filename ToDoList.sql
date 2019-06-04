PRAGMA foreign_keys=OFF;
BEGIN TRANSACTION;
CREATE TABLE `todo`
-- This table created by SQLite2009 Pro Enterprise Manager 
-- Osen Kusnadi - http://www.osenxpsuite.net 
-- Create date:2012-01-17 11:18:09
(
       description VARCHAR(50) NOT NULL,
       done INTEGER NOT NULL,
       id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT
);
INSERT INTO "todo" VALUES('Prepare a model 1 architecture example',1,2);
INSERT INTO "todo" VALUES('Teach class on Wednesday, 7:30 PM EST.',1,5);
INSERT INTO "todo" VALUES('Prepare a model 2 architecture example',1,6);
INSERT INTO "todo" VALUES('Get this sample app working on Glitch',0,8);
DELETE FROM sqlite_sequence;
INSERT INTO "sqlite_sequence" VALUES('todo',10);
COMMIT;
