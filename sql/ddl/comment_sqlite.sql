DROP TABLE IF EXISTS Comment;

CREATE TABLE Comment (
    "id" INTEGER PRIMARY KEY NOT NULL,
    "commenttext" TEXT NOT NULL,
    "acronym" TEXT NOT NULL,
    "page" TEXT NOT NULL,
    "created" TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    "updated" DATETIME,
    "deleted" DATETIME,
    "active" DATETIME
);
