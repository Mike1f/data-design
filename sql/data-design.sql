ALTER DATABASE data_desgin_CHANGE_ME CHARACTER SET utf8 COLLATE utf8_unicode_ci;

DROP TABLE IF EXISTS category;
DROP TABLE IF EXISTS tag;
DROP TABLE IF EXISTS article;

CREATE TABLE category (
categoryId BINARY (16) NOT NULL,
categoryName BINARY (16) NOT NULL,
PRIMARY KEY(categoryId)
);

CREATE TABLE tag (
tagId BINARY (16) NOT NULL,
tagName BINARY (16) NOT NULL,
PRIMARY KEY (tagId)
);

CREATE TABLE article (
articleId BINARY (16) NOT NULL,
articleName BINARY (16) NOT NULL,
articleDateTime BINARY (16) NOT NULL,
articleAuthor BINARY (16) NOT NULL,
articleContent VARCHAR (240) NOT NULL,
articleCategoryId BINARY (16) NOT NULL,
articleTagId BINARY (16) NOT NULL,
FOREIGN KEY (articleCategoryId),
FOREIGN KEY (articleTagId),
PRIMARY KEY (articleId)
);
