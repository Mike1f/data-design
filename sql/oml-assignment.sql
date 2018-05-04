INSERT INTO category(categoryId, categoryName) VALUES (UNHEX(REPLACE("d8fb4da5-ecd0-46b8-ab13-123a23b171aa", "-", "")), "videogames");

INSERT INTO article(articleId, articleCategoryId, articleAuthor, articleContent, articleDate, articleName)
VALUES (UNHEX(REPLACE("c37bf6a6-cacf-4d79-9a31-1e0bb054cf1f", "-", "")), UNHEX(REPLACE("d8fb4da5-ecd0-46b8-ab13-123a23b171aa", "-", "")), "John Smith" , "FarCry 5 is a great game.", "2018-10-08", "FarCry5");

UPDATE article SET articleContent = "FarCry 5 is a fantastic game!", articleName = "FarCry 5 Video Game";

UPDATE category SET categoryName = "Video Games";

DELETE FROM article
