ALTER DATABASE mfigueroa14 CHARACTER SET utf8 COLLATE utf8_unicode_ci;

DROP TABLE IF EXISTS article;
DROP TABLE IF EXISTS category;

CREATE TABLE category (
categoryId BINARY (16) NOT NULL,
categoryName VARCHAR (64) NOT NULL,
PRIMARY KEY(categoryId)
);

CREATE TABLE article (
articleId BINARY (16) NOT NULL,
articleCategoryId BINARY (16) NOT NULL,
articleAuthor BINARY (16) NOT NULL,
articleContent VARCHAR (240) NOT NULL,
articleDate BINARY (16) NOT NULL,
articleName VARCHAR (64) NOT NULL,
INDEX(articleCategoryId),
PRIMARY KEY(articleId),
FOREIGN KEY (articleCategoryId) REFERENCES category(categoryId)
);

