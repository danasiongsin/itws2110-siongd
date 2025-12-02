CREATE TABLE `courses` ( 
   `crn` int(11),
   `prefix` varchar(4) not null,
   `number` smallint(4) not null,
   `title` varchar(255) not null,
   PRIMARY KEY (`crn`)
);

CREATE TABLE `students` ( 
   `rin` int(9)
   `rcsID` (char 7)
   `first_name` varchar(100) not null,
   `last_name` varchar (100) not null,
   `alias` varchar (100) not null,
   `phone` int (10),
   PRIMARY KEY (`rin`)
);

ALTER TABLE students
ADD COLUMN `street` varchar(255) NOT NULL,
ADD COLUMN `city` varchar(255) NOT NULL,
ADD COLUMN `state` char(2) NOT NULL,
ADD COLUMN `zip` varchar(5) NOT NULL;


ALTER TABLE courses 
   ADD `section` int(2) not null,
   ADD `year` int(4) not null
;

CREATE TABLE `grades` (
   `id` int AUTO_INCREMENT,
   `crn` int NOT NULL,
   `rin` int NOT NULL,
   `grade` int NOT NULL,
   PRIMARY KEY (`id`),
   FOREIGN KEY (`crn`) REFERENCES courses(crn),
   FOREIGN KEY (`rin`) REFERENCES students(rin)
);


INSERT INTO courses
VALUES (36655, 'MANE', '4220', 'Inventor''s Studio 2', 1, 2025),
   (36083, 'CSCI', '4150', 'Intro to AI', 1, 2025),
   (36216, 'CSCI', '4320', 'Parallel Programming', 1, 2025),
   (37091, 'CSCI', '4520', 'Web Science Systems Development', 1, 2025);

INSERT INTO students
VALUES (662040406, 'siongd', 'Dana', 'Siong Sin', 'Dana', 9292881712, '1567 Tibbits Ave', 'Troy', 'NY', 12180),
   (662123456, 'lottie', 'Elizabeth', 'Lottinger', 'Lizzie', 5047281234, '1567 Tibbits Ave', 'Troy', 'NY', 12180),
   (662111222, 'brahmr', 'Ritika', 'Brahm', 'Tika', 5181231234, '1567 Tibbits Ave', 'Troy', 'NY', 12180),
   (662888999, 'suditm', 'Melany', 'Suditu', 'Mel', 5168881234, '1567 Tibbits Ave', 'Troy', 'NY', 12180);

INSERT INTO grades
VALUES (1, 36655, 662040406, 94),
   (2, 36655, 662888999, 95),
   (3, 36083, 662040406, 84),
   (4, 36083, 662123456, 86),
   (5, 36083, 662111222, 87),
   (6, 36216, 662040406, 88),
   (7, 36216, 662111222, 84),
   (8, 36216, 662123456, 90),
   (9, 37091, 662040406, 94),
   (10, 37091, 662888999, 90);

SELECT s.rin, s.rcsID, s.first_name, s.last_name, s.alias, s.phone, s.street, s.city, s.state, s.zip
FROM students s
ORDER BY rin asc, last_name asc, rcsID asc, firstname asc;

SELECT g.rin, s.first_name, s.last_name, s.street, s.city, s.state, s.zip
FROM grades g join students s on g.rin = s.rin
WHERE g.grade > 90;

SELECT avg(g.grade)
FROM grades g
GROUP BY g.crn;


SELECT c.title, COUNT(DISTINCT g.RIN) AS num_students FROM grades g JOIN courses c ON g.crn = c.crn GROUP BY c.crn;

