<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Data Design</title>
	</head>
	<body>
		<h1>Data Design</h1>
		<div><h2>Persona</h2>
			<p>John Smith is a 25 year old man who enjoys reading about computer security news articles on the internet one
				site he enjoys the most is <a href="https://nakedsecurity.sophos.com/">Naked Security</a>. he likes to read
				at home on his Dell laptop or on the go on his HTC mobile smart phone. When it comes to him using his
				technology, He is very confident.</p>
		</div>
		<div>
			<h2>User Story</h2>
			<p>John wants to view different tags of computer security articles on Naked Security.</p>
			<img src="./images/Capture.PNG">
		</div>
		<h2>Use Case/Interaction Flow</h2>
		<p>Precondition:</p>
		<ul>
			<li>John is on the home page</li>
			<li>He clicks on a category that interests him</li>
			<li>He clicks on a tag that interests him</li>
			<li>John selects a Article</li>
			<li>The page loads up the article for him to read</li>
		</ul>
		<div>
			<h2>Conception Module</h2>
			<p>Many Categories can have many Articles and many Articles can have many Tags</p>
		</div>
		<h3>Entities &amp; Attributes</h3>
		<ul>
			<li>Category</li>
			<ul>
				<li>categoryId (primary key)</li>
				<li>categoryName (foreign key)</li>
			</ul>
			<li>Tag</li>
			<ul>
				<li>tagId (primary key)</li>
				<li>tagName (foreign key)</li>
			</ul>
			<li>Article</li>
			<ul>
				<li>articleId (primary key)</li>
				<li>articleName (foreign key)</li>
				<li>articleAuthor</li>
				<li>articleContent</li>
				<li>articleDateTime</li>
				<li>articleCategoryId</li>
				<li>articleTagId</li>
			</ul>
			<h1>ERD</h1>
			<img src="images/Untitled Diagram.png">
		</ul>
	</body>
</html>