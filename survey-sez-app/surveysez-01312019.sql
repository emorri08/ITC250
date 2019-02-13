/*
  SurveySez-01312019.sql
  
  Second version of SQL file
  
  Includes 2 more Surveys
  
  Here are a few notes on things below that may not be self evident:
  
  INDEXES: You'll see indexes below for example:
  
  INDEX SurveyID_index(SurveyID)
  
  Any field that has highly unique data that is either searched on or used as a join should be indexed, which speeds up a  
  search on a tall table, but potentially slows down an add or delete
  
  TIMESTAMP: MySQL currently only supports one date field per table to be automatically updated with the current time.  We'll use a 
  field in a few of the tables named LastUpdated:
  
  LastUpdated TIMESTAMP DEFAULT 0 ON UPDATE CURRENT_TIMESTAMP
  
  The other date oriented field we are interested in, DateAdded we'll do by hand on insert with the MySQL function NOW().
  
  CASCADES: In order to avoid orphaned records in deletion of a Survey, we'll want to get rid of the associated Q & A, etc. 
  We therefore want a 'cascading delete' in which the deletion of a Survey activates a 'cascade' of deletions in an 
  associated table.  Here's what the syntax looks like:  
  
  FOREIGN KEY (SurveyID) REFERENCES wn19_surveys(SurveyID) ON DELETE CASCADE
  
  The above is from the Questions table, which stores a foreign key, SurveyID in it.  This line of code tags the foreign key to 
  identify which associated records to delete.
  
  Be sure to check your cascades by deleting a survey and watch all the related table data disappear!
  
  
*/


SET foreign_key_checks = 0; #turn off constraints temporarily

#since constraints cause problems, drop tables first, working backward
DROP TABLE IF EXISTS wn19_responses_answers; 
DROP TABLE IF EXISTS wn19_responses;
DROP TABLE IF EXISTS wn19_answers;
DROP TABLE IF EXISTS wn19_questions;
DROP TABLE IF EXISTS wn19_surveys;
  
#all tables must be of type InnoDB to do transactions, foreign key constraints
CREATE TABLE wn19_surveys(
SurveyID INT UNSIGNED NOT NULL AUTO_INCREMENT,
AdminID INT UNSIGNED DEFAULT 0,
Title VARCHAR(255) DEFAULT '',
Description TEXT DEFAULT '',
DateAdded DATETIME,
LastUpdated TIMESTAMP DEFAULT 0 ON UPDATE CURRENT_TIMESTAMP,
TimesViewed INT DEFAULT 0,
Status INT DEFAULT 0,
PRIMARY KEY (SurveyID)
)ENGINE=INNODB; 

#assigning first survey to AdminID == 1
INSERT INTO wn19_surveys VALUES (NULL,1,'Our First Survey','Description of Survey',NOW(),NOW(),0,0);

INSERT INTO wn19_surveys VALUES (NULL,1,'A Presidential Survey','Who would you like to see run for President?',NOW(),NOW(),0,0);

INSERT INTO wn19_surveys VALUES (NULL,1,'A Snack Survey','Please let us know about your eating habits.',NOW(),NOW(),0,0);


#foreign key field must match size and type, hence SurveyID is INT UNSIGNED
CREATE TABLE wn19_questions(
QuestionID INT UNSIGNED NOT NULL AUTO_INCREMENT,
SurveyID INT UNSIGNED DEFAULT 0,
Question TEXT DEFAULT '',
Description TEXT DEFAULT '',
DateAdded DATETIME,
LastUpdated TIMESTAMP DEFAULT 0 ON UPDATE CURRENT_TIMESTAMP,
PRIMARY KEY (QuestionID),
INDEX SurveyID_index(SurveyID),
FOREIGN KEY (SurveyID) REFERENCES wn19_surveys(SurveyID) ON DELETE CASCADE
)ENGINE=INNODB;

INSERT INTO wn19_questions VALUES (NULL,1,'Do You Like Our Website?','We really want to know!',NOW(),NOW());
INSERT INTO wn19_questions VALUES (NULL,1,'Do You Like Cookies?','We like cookies!',NOW(),NOW());
INSERT INTO wn19_questions VALUES (NULL,1,'Favorite Toppings?','We like chocolate!',NOW(),NOW());

INSERT INTO wn19_questions VALUES (NULL,2,'Who would you like to see run for President in 2020?','Enquiring minds want to know!',NOW(),NOW());
INSERT INTO wn19_questions VALUES (NULL,2,'What are your important issues at this time?','Your concerns are our concerns!',NOW(),NOW());

INSERT INTO wn19_questions VALUES (NULL,3,'How would you characterize your eating habits?','There has to be one!',NOW(),NOW());

INSERT INTO wn19_questions VALUES (NULL,3,'Please let us know which of the following fast foods you would be willing to try?','There is cutting edge quisine here!',NOW(),NOW());


CREATE TABLE wn19_answers(
AnswerID INT UNSIGNED NOT NULL AUTO_INCREMENT,
QuestionID INT UNSIGNED DEFAULT 0,
Answer TEXT DEFAULT '',
Description TEXT DEFAULT '',
DateAdded DATETIME,
LastUpdated TIMESTAMP DEFAULT 0 ON UPDATE CURRENT_TIMESTAMP,
Status INT DEFAULT 0,
PRIMARY KEY (AnswerID),
INDEX QuestionID_index(QuestionID),
FOREIGN KEY (QuestionID) REFERENCES wn19_questions(QuestionID) ON DELETE CASCADE
)ENGINE=INNODB;

INSERT INTO wn19_answers VALUES (NULL,1,'Yes','',NOW(),NOW(),0);
INSERT INTO wn19_answers VALUES (NULL,1,'No','',NOW(),NOW(),0);
INSERT INTO wn19_answers VALUES (NULL,2,'Yes','',NOW(),NOW(),0);
INSERT INTO wn19_answers VALUES (NULL,2,'No','',NOW(),NOW(),0);
INSERT INTO wn19_answers VALUES (NULL,2,'Maybe','',NOW(),NOW(),0);
INSERT INTO wn19_answers VALUES (NULL,3,'Chocolate','',NOW(),NOW(),0);
INSERT INTO wn19_answers VALUES (NULL,3,'Butterscotch','',NOW(),NOW(),0);
INSERT INTO wn19_answers VALUES (NULL,3,'Pineapple','',NOW(),NOW(),0);

INSERT INTO wn19_answers VALUES (NULL,4,'Donald Trump','',NOW(),NOW(),0);
INSERT INTO wn19_answers VALUES (NULL,4,'Oprah Winfrey','',NOW(),NOW(),0);
INSERT INTO wn19_answers VALUES (NULL,4,'Stephen Colbert','',NOW(),NOW(),0);

INSERT INTO wn19_answers VALUES (NULL,5,'A big beautiful border wall!','It\s beautiful and functional!',NOW(),NOW(),0);
INSERT INTO wn19_answers VALUES (NULL,5,'Free cars for everyone!','Or a new book from my bookclub, at the very least!',NOW(),NOW(),0);
INSERT INTO wn19_answers VALUES (NULL,5,'Truthiness','Because what I say is right, and nothing anyone else says could possibly be true!',NOW(),NOW(),0);

INSERT INTO wn19_answers VALUES (NULL,6,'Omnivore','A fancy word for the way many people eat.',NOW(),NOW(),0);
INSERT INTO wn19_answers VALUES (NULL,6,'Vegetarian','No legs or fins for me!',NOW(),NOW(),0);
INSERT INTO wn19_answers VALUES (NULL,6,'Vegan','Nor eggs or dairy!',NOW(),NOW(),0);
INSERT INTO wn19_answers VALUES (NULL,6,'Carnivore','Where\'s the Beef!',NOW(),NOW(),0);

INSERT INTO wn19_answers VALUES (NULL,7,'KFC Fried Chicken Cheetos Sandwich','In three US states in 2019!',NOW(),NOW(),0);
INSERT INTO wn19_answers VALUES (NULL,7,'Pumpkin Spice French Fries','Brought to you by McDonald\'s Japan, Halloween 2016!',NOW(),NOW(),0);
INSERT INTO wn19_answers VALUES (NULL,7,'Kimchi Quesadilla','Brought to you by Taco Bell South Korea!',NOW(),NOW(),0);
INSERT INTO wn19_answers VALUES (NULL,7,'Bacon Sundae','Brought to you by Burger King Nashville, 2012!',NOW(),NOW(),0);

CREATE TABLE wn19_responses(
ResponseID INT UNSIGNED NOT NULL AUTO_INCREMENT,
SurveyID INT UNSIGNED NOT NULL DEFAULT 0,
DateAdded DATETIME,
PRIMARY KEY (ResponseID),
INDEX SurveyID_index(SurveyID),
FOREIGN KEY (SurveyID) REFERENCES wn19_surveys(SurveyID) ON DELETE CASCADE
)ENGINE=INNODB;

INSERT INTO wn19_responses VALUES (NULL,1,NOW());


CREATE TABLE wn19_responses_answers(
RQID INT UNSIGNED NOT NULL AUTO_INCREMENT,
ResponseID INT UNSIGNED DEFAULT 0,
QuestionID INT DEFAULT 0,
AnswerID INT DEFAULT 0,
PRIMARY KEY (RQID),
INDEX ResponseID_index(ResponseID),
FOREIGN KEY (ResponseID) REFERENCES wn19_responses(ResponseID) ON DELETE CASCADE
)ENGINE=INNODB;

INSERT INTO wn19_responses_answers VALUES (NULL,1,1,1);
INSERT INTO wn19_responses_answers VALUES (NULL,1,2,5);
INSERT INTO wn19_responses_answers VALUES (NULL,1,3,6);
INSERT INTO wn19_responses_answers VALUES (NULL,1,3,7);
INSERT INTO wn19_responses_answers VALUES (NULL,1,3,8);
SET foreign_key_checks = 1; #turn foreign key check back on
