INSERT INTO article(articleId, articleName, articleDateTime, articleAuthor, articleContent, articleCategoryId);
VALUES ("UNHEX(REPLACE("01ceecf9-d01b-4af2-b5dcf1235891044f", "-", ""))", "FarCry5", "October 8, 2018", "John Smith", "FarCry 5 is a great game.", "UNHEX(REPLACE("01ceecf9-d01b-4af2-b5dcf1235891044f", "-", ""))");

INSERT INTO category(categroyId, categoryName);
VALUES ("UNHEX(REPLACE("01ceecf9-d01b-4af2-b5dcf1235891044f", "-", ""))");

UPDATE article(articleId, articleContent);
VALUES ("UNHEX(REPLACE("01ceecf9-d01b-4af2-b5dcf1235891044f", "-", ""))","FarCry 5 is a fantastic game!" )

UPDATE article(articleId, articleName);
VALUES ("UNHEX(REPLACE("01ceecf9-d01b-4af2-b5dcf1235891044f", "-", ""))","FarCry 5 Video Game" )

DELETE FROM article(articleId)
VALUES ("UNHEX(REPLACE("01ceecf9-d01b-4af2-b5dcf1235891044f", "-", ""))")
