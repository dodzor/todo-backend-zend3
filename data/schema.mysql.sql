-- To create a new database, run MySQL client:
--   mysql -u root -p
-- Then in MySQL client command line, type the following (replace <password> with password string):
--   create database blog;
--   grant all privileges on blog.* to blog@localhost identified by '<password>';
--   quit
-- Then, in shell command line, type:
--   mysql -u root -p blog < schema.mysql.sql

-- set names 'utf8';

-- -- Post
-- CREATE TABLE `post` (     
--   `id` int(11) PRIMARY KEY AUTO_INCREMENT, -- Unique ID
--   `title` text NOT NULL,      -- Title  
--   `content` text NOT NULL,    -- Text 
--   `status` int(11) NOT NULL,  -- Status  
--   `date_created` datetime NOT NULL -- Creation date    
-- ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='utf8_general_ci';

CREATE TABLE `todo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `completed` tinyint(100) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
);


INSERT INTO todo (title, completed, created) VALUES ('try not to dwell in the past', 1, '2019-05-05');
INSERT INTO todo (title, completed, created) VALUES ('do not dream of the future', 0, '2019-05-07');
INSERT INTO todo (title, completed, created) VALUES ('concentrate the mind in the present moment', 1, '2019-05-08');
INSERT INTO todo (title, completed, created) VALUES ('make an attempt to no be a dick', 1, '2019-05-08');