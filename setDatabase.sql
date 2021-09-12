CREATE TABLE IF NOT EXISTS `GLaDOS`(
   `SubjectId` VARCHAR(100) NOT NULL,
   `Password` VARCHAR(100) NOT NULL,
   PRIMARY KEY ( `SubjectId` )
);

INSERT INTO GLaDOS
VALUES ('GLaDOS', 'ISawDeer');

CREATE TABLE IF NOT EXISTS `testQuestions`(
   `Id` INT UNSIGNED AUTO_INCREMENT,
   `Label` VARCHAR(100) NOT NULL,
   `Type` VARCHAR(100) NOT NULL,
   `Required` VARCHAR(100) NOT NULL,
   `OptionsId` VARCHAR(100),
   PRIMARY KEY ( `Id` )
);

INSERT INTO testQuestions
VALUES
    ('1', 'What colour are your toes today?', 'select', 'false', '1'),
    ('2', 'At any point this week, did you experience overwhelming feelings of doom?', 'text', 'false', null),
    ('3', 'Are you currently alive?', 'boolean', 'false', null),
	('4', 'Was there cake?', 'boolean', 'true', null);

CREATE TABLE IF NOT EXISTS `questionOptions`(
   `OptionsId` VARCHAR(100),
   `OptionLabel` VARCHAR(100) NOT NULL,
   `OptionValue` VARCHAR(100) NOT NULL
);

INSERT INTO questionOptions
VALUES
    ('1', 'Normal coloured', 'normal'),
    ('1', 'Orange', 'orange'),
	('1', 'Blue', 'blue');

CREATE TABLE IF NOT EXISTS `subjects`(
   `subjectsSubjectId` VARCHAR(100) NOT NULL,
   `Username` VARCHAR(100) NOT NULL,
   `TestChamber` VARCHAR(100) NOT NULL,
   `DateOfBirth` VARCHAR(100) NOT NULL,
   `TotalScore` VARCHAR(100) NOT NULL,
   `Alive` VARCHAR(100) NOT NULL,
   `Password` VARCHAR(100) NOT NULL,
   PRIMARY KEY ( `subjectsSubjectId` )
);

INSERT INTO subjects
VALUES
    ('f1ba33b5-07bf-4d55-9ea4-ea20c4348c49', '1', '1', '1988-04-07T07:50:00Z', '86', 'true', 'ILoveCube11'),
    ('6ee6de51-a43e-48cb-83db-f6fc82f941d9', '2', '14', '1974-12-24T08:53:00Z', '12', 'false', 'WeightedLove'),
	('442619aa-8850-47b0-8c85-f46f6b5ba4a8', '3', '54', '1999-03-20T01:53:00Z', '90', 'false', 'Cubecubecube'),
	('ed5183fc-af62-4867-a705-a3ef96024e34', '4', '1', '1988-01-17T10:52:00Z', '86', 'true', 'thereisnocube'),
	('614cfcb9-0111-43dd-81c7-5a4340e9f99e', '5', '14', '1974-02-08T11:20:00Z', '12', 'false', '123companion'),
	('175636a6-1e4a-4e8a-b72d-145e9f042bae', '6', '54', '1980-06-26T01:02:00Z', '90', 'false', 'potato');
	
CREATE TABLE IF NOT EXISTS `testSubmissions`(
   `subId` INT UNSIGNED AUTO_INCREMENT,
   `testDate` VARCHAR(100) NOT NULL,
   `SubjectId` VARCHAR(100) NOT NULL,
   `Responses` VARCHAR(100),
   PRIMARY KEY ( `subId` )
);

INSERT INTO testSubmissions
VALUES
    ('1', '2021-01-01T00:00:00Z', '175636a6-1e4a-4e8a-b72d-145e9f042bae', '1'),
    ('2', '2021-01-02T00:00:00Z', '175636a6-1e4a-4e8a-b72d-145e9f042bae', '2'),
    ('3', '2021-01-10T00:00:00Z', '175636a6-1e4a-4e8a-b72d-145e9f042bae', '3'),
	('4', '2021-01-01T00:00:00Z', 'ed5183fc-af62-4867-a705-a3ef96024e34', '4'),
	('5', '2021-01-08T00:00:00Z', '442619aa-8850-47b0-8c85-f46f6b5ba4a8', '5'),
	('6', '2021-01-09T00:00:00Z', 'f1ba33b5-07bf-4d55-9ea4-ea20c4348c49', '6');

CREATE TABLE IF NOT EXISTS `ResponsesOptions`(
   `Responses` VARCHAR(100) NOT NULL,
   `ResponsesQuestion1` VARCHAR(100) NOT NULL,
   `ResponsesQuestion2` VARCHAR(100),
   `ResponsesQuestion3` VARCHAR(100) NOT NULL,
   `ResponsesQuestion4` VARCHAR(100) NOT NULL
);

INSERT INTO ResponsesOptions
VALUES
    ('1', 'blue', 'yes', 'true', 'true'),
	('2', 'orange', 'Cubes are nice', 'true', 'true'),
	('3', 'orange', '', 'false', 'false'),
    ('4', 'blue', 'yes', 'true', 'true'),
    ('5', 'normal', 'yes', 'true', 'false'),
    ('6', 'normal', 'no', 'true', 'false');

CREATE TABLE IF NOT EXISTS `admin`(
   `SubjectId` VARCHAR(100) NOT NULL,
   `Password` VARCHAR(100) NOT NULL,
   PRIMARY KEY ( `SubjectId` )
);

INSERT INTO GLaDOS
VALUES ('admin', 'admin');