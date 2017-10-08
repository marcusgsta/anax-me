DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `userid` INTEGER PRIMARY KEY,
  `name` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `gravatar` varchar(100) DEFAULT NULL,
  `role` varchar(2) DEFAULT '0'
);

DROP TABLE IF EXISTS `comment`;

CREATE TABLE `comment` (
  `commentid` INTEGER PRIMARY KEY,
  `commenttext` text DEFAULT NULL,
  `datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `author` varchar(2) NOT NULL,
  `page` varchar NOT NULL
);

DROP TABLE IF EXISTS `commentreply`;

CREATE TABLE `commentreply` (
    `text` text,
    `datetime` DATETIME DEFAULT CURRENT_TIMESTAMP,
    `author` varchar(2) NOT NULL,
    `commentid` INTEGER,
    FOREIGN KEY(commentid) REFERENCES comment(id),
    FOREIGN KEY(author) REFERENCES comment(author)
)
