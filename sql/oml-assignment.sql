INSERT INTO category(categoryId, categoryName) VALUES (UNHEX(REPLACE("02eccef9-d01b-4af2-d5bcf1235891044f", "-", "")), "videogames");

INSERT INTO article(articleId, articleCategoryId, articleAuthor, articleContent, articleDate, articleName) 
VALUES (UNHEX(REPLACE("01ceecf9-d01b-4af2-b5dcf1235891044f", "-", "")), UNHEX(REPLACE("02eccef9-d01b-4af2-d5bcf1235891044f", "-", "")), "John Smith" , "FarCry 5 is a great game.", "October 8, 2018", "FarCry5");

UPDATE article SET articleContent = "FarCry 5 is a fantastic game!", articleName = "FarCry 5 Video Game";

UPDATE category SET categoryName = "Video Games";

DELETE FROM article
