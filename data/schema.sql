CREATE TABLE todo (
    id INTEGER PRIMARY KEY,
    title varchar(100) NOT NULL, 
    completed tinyint(100) NOT NULL,
    created DATETIME NOT NULL
);


INSERT INTO todo (title, completed, created) VALUES ('walk the fish', 1, '2019-05-05');
INSERT INTO todo (title, completed, created) VALUES ('wash car', 0, '2019-05-07');
INSERT INTO todo (title, completed, created) VALUES ('become zen', 1, '2019-05-08');