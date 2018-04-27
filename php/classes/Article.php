<?php
namespace Edu\Cnm\DataDesign;
require_once("autoload.php");
require_once(dirname(__DIR__, 2) . "/vendor/autoload.php");

use Ramsey\Uuid\Uuid;

/**
 * Small Cross Section of a Twitter like Message
 *
 * This Article can be considered a small example of what services like Twitter store when messages are sent and
 * received using Twitter. This can easily be extended to emulate more features of Twitter.
 *
 * @author Dylan McDonald <dmcdonald21@cnm.edu>
 * @version 3.0.0
 **/
class Article implements \JsonSerializable {
	use ValidateDate;
	use ValidateUuid;
	/**
	 * id for this Article; this is the primary key
	 * @var Uuid $articleId
	 **/
	private $articleId;
	/**
	 * id of the Category that references this article; this is a foreign key
	 * @var Uuid $articleCategoryId
	 **/
	private $articleCategoryId;
	/**
	 * author of the article
	 * @var string $articleAuthor
	 **/
	private $articleAuthor;
	/**
	 * actual textual content of this article
	 * @var string $articleContent
	 **/
	private $articleContent;
	/**
	 * date and time this article was sent, in a PHP DateTime object
	 * @var \DateTime $articleDate
	 **/
	private $articleDate;
	/**
	 * title/name of the article
	 * @var string $articleName
	 **/
	private $articleName;
	/**
	 * constructor for this article
	 *
	 * @param string|Uuid $newArticleId id of this article or null if a new article
	 * @param string|Uuid $newArticleCategoryId id of the Category that references this article
	 * @param string $newArticleContent string containing actual article data
	 * @param \DateTime|string|null $newArticleDate date and time article was sent or null if set to current date and time
	 * @throws \InvalidArgumentException if data types are not valid
	 * @throws \RangeException if data values are out of bounds (e.g., strings too long, negative integers)
	 * @throws \TypeError if data types violate type hints
	 * @throws \Exception if some other exception occurs
	 * @Documentation https://php.net/manual/en/language.oop5.decon.php
	 **/

	/**
	 * accessor method for article id
	 *
	 * @return Uuid value of article id
	 **/
	public function getArticleId() : Uuid {
		return($this->articleId);
	}
	/**
	 * mutator method for article id
	 *
	 * @param Uuid/string $newArticleId new value of article id
	 * @throws \RangeException if $newArticleId is n
	 * @throws \TypeError if $newArticleId is not a uuid.e
	 **/
	public function setArticleId( $newArticleId) : void {
		try {
			$uuid = self::validateUuid($newArticleId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		// convert and store the article id
		$this->articleId = $uuid;
	}
	/**
	 * accessor method for article Category id
	 *
	 * @return Uuid value of article Category id
	 **/
	public function getArticleCategoryId() : Uuid {
		return($this->articleCategoryId);
	}
	/**
	 * mutator method for article Category id
	 *
	 * @param Uuid/string $newArticleCategoryId new value of article Category id
	 * @throws \RangeException if $newArticleCategoryId is n
	 * @throws \TypeError if $newArticleCategoryId is not a uuid.e
	 **/
	public function setArticleCategoryId( $newArticleCategoryId) : void {
		try {
			$uuid = self::validateUuid($newArticleCategoryId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		// convert and store the article Category id
		$this->articleCategoryId = $uuid;
	}
	/**
	 * accessor method for article Author
	 *
	 * @return Uuid value of article Author
	 **/
	public function getArticleAuthor() : Uuid{
		return($this->articleAuthor);
	}
	/**
	 * mutator method for article Author
	 *
	 * @param string | Uuid $newArticleAuthor new value of articleName
	 * @throws \RangeException if $newArticleAuthor is not positive
	 * @throws \TypeError if $newArticleAuthor is not an UUI
	 **/
	public function setArticleAuthor( $newArticleAuthor) : void {
		try {
			$uuid = self::validateUuid($newArticleAuthor);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		// convert and store the article name
		$this->articleAuthor = $uuid;
	}
	/**
	 * accessor method for article content
	 *
	 * @return string value of article content
	 **/
	public function getArticleContent() :string {
		return($this->articleContent);
	}
	/**
	 * mutator method for article content
	 *
	 * @param string $newArticleContent new value of article content
	 * @throws \InvalidArgumentException if $newArticleContent is not a string or insecure
	 * @throws \TypeError if $newArticleContent is not a string
	 **/
	public function setArticleContent(string $newArticleContent) : void {
		// verify the article content is secure
		$newArticleContent = trim($newArticleContent);
		$newArticleContent = filter_var($newArticleContent, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($newArticleContent) === true) {
			throw(new \InvalidArgumentException("article content is empty or insecure"));
		}
		// verify the article content will fit in the database
		if(strlen($newArticleContent) > 140) {
			throw(new \RangeException("article content too large"));
		}
		// store the article content
		$this->articleContent = $newArticleContent;
	}
	/**
	 * accessor method for article date
	 *
	 * @return \Date value of article date
	 **/
	public function getArticleDate() : \Date {
		return($this->articleDate);
	}
	/**
	 * mutator method for article date
	 *
	 * @param \Date|string|null $newArticleDate article date as a Date object or string (or null to load the current time)
	 * @throws \InvalidArgumentException if $newArticleDate is not a valid object or string
	 * @throws \RangeException if $newArticleDate is a date that does not exist
	 **/
	public function setArticleDate($newArticleDate = null) : void {
		// base case: if the date is null, use the current date and time
		if($newArticleDate === null) {
			$this->articleDate = new \DateTime();
			return;
		}
		// store the like date using the ValidateDate trait
		try {
			$newArticleDate = self::validateDate($newArticleDate);
		} catch(\InvalidArgumentException | \RangeException $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		$this->articleDate = $newArticleDate;
	}
	/**
	 * inserts this article into mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	/**
	 * accessor method for article name
	 *
	 * @return Uuid value of article name
	 **/
	public function getArticleName() : Uuid{
		return($this->articleName);
	}
	/**
	 * mutator method for article name
	 *
	 * @param string | Uuid $newArticleName new value of articleName
	 * @throws \RangeException if $newArticleName is not positive
	 * @throws \TypeError if $newArticleName is not an UUI
	 **/
	public function setArticleName( $newArticleName) : void {
		try {
			$uuid = self::validateUuid($newArticleName);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			$exceptionType = get_class($exception);
			throw(new $exceptionType($exception->getMessage(), 0, $exception));
		}
		// convert and store the article name
		$this->articleName = $uuid;
	}

	public function insert(\PDO $pdo) : void {
		// create query template
		$query = "INSERT INTO article(articleId, articleCategoryId, articleAuthor, articleContent, articleDate, articleName) VALUES(:articleId, :articleCategoryId, :articleAuthor, :articleContent, :articleDate,:articleName)";
		$statement = $pdo->prepare($query);
		// bind the member variables to the place holders in the template
		$formattedDate = $this->articleDate->format("Y-m-d H:i:s.u");
		$parameters = ["articleId" => $this->articleId->getBytes(), "articleCategoryId" => $this->articleCategoryId->getBytes(), "articleAuthor" => $this->articleAuthor "articleContent" => $this->articleContent, "articleDate" => $formattedDate];
		$statement->execute($parameters);
	}
	/**
	 * deletes this article from mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function delete(\PDO $pdo) : void {
		// create query template
		$query = "DELETE FROM article WHERE articleId = :articleId";
		$statement = $pdo->prepare($query);
		// bind the member variables to the place holder in the template
		$parameters = ["articleId" => $this->articleId->getBytes()];
		$statement->execute($parameters);
	}
	/**
	 * updates this article in mySQL
	 *
	 * @param \PDO $pdo PDO connection object
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError if $pdo is not a PDO connection object
	 **/
	public function update(\PDO $pdo) : void {
		// create query template
		$query = "UPDATE article SET articleCategoryId = :articleCategoryId, articleContent = :articleContent, articleDate = :articletDate WHERE articleId = :articleId";
		$statement = $pdo->prepare($query);
		$formattedDate = $this->articleDate->format("Y-m-d H:i:s.u");
		$parameters = ["articleId" => $this->articleId->getBytes(),"articleCategoryId" => $this->articleCategoryId->getBytes(), "articleContent" => $this->articleContent, "articleDate" => $formattedDate];
		$statement->execute($parameters);
	}
	/**
	 * gets the Article by articleId
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param string|Uuid $articleId article id to search for
	 * @return Article|null Article found or null if not found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when a variable are not the correct data type
	 **/
	public static function getArticleByArticleId(\PDO $pdo, $articleId) : ?Article {
		// sanitize the articleId before searching
		try {
			$articleId = self::validateUuid($articleId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		// create query template
		$query = "SELECT articleId, articleCategoryId, articleContent, articleDate FROM article WHERE articleId = :articleId";
		$statement = $pdo->prepare($query);
		// bind the article id to the place holder in the template
		$parameters = ["articleId" => $articleId->getBytes()];
		$statement->execute($parameters);
		// grab the article from mySQL
		try {
			$article = null;
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			$row = $statement->fetch();
			if($row !== false) {
				$article = new Article($row["articleId"], $row["articleCategoryId"], $row["articleContent"], $row["articleDate"]);
			}
		} catch(\Exception $exception) {
			// if the row couldn't be converted, rethrow it
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		return($article);
	}
	/**
	 * gets the Article by profile id
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param string $articleCategoryId profile id to search by
	 * @return \SplFixedArray SplFixedArray of Articles found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 **/
	public static function getArticleByArticleCategoryId(\PDO $pdo, string  $articleCategoryId) : \SPLFixedArray {
		try {
			$articleCategoryId = self::validateUuid($articleCategoryId);
		} catch(\InvalidArgumentException | \RangeException | \Exception | \TypeError $exception) {
			throw(new \PDOException($exception->getMessage(), 0, $exception));
		}
		// create query template
		$query = "SELECT articleId, articleCategoryId, articleContent, articleDate FROM article WHERE articleCategoryId = :articleCategoryId";
		$statement = $pdo->prepare($query);
		// bind the article profile id to the place holder in the template
		$parameters = ["articleCategoryId" => $articleCategoryId->getBytes()];
		$statement->execute($parameters);
		// build an array of articles
		$articles = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$article = new Article($row["articleId"], $row["articleCategoryId"], $row["articleContent"], $row["articleDate"]);
				$articles[$articles->key()] = $article;
				$articles->next();
			} catch(\Exception $exception) {
				// if the row couldn't be converted, rethrow it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return($articles);
	}
	/**
	 * gets the Article by content
	 *
	 * @param \PDO $pdo PDO connection object
	 * @param string $articleContent article content to search for
	 * @return \SplFixedArray SplFixedArray of Articles found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 **/
	public static function getArticleByArticleContent(\PDO $pdo, string $articleContent) : \SPLFixedArray {
		// sanitize the description before searching
		$articleContent = trim($articleContent);
		$articleContent = filter_var($articleContent, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
		if(empty($articleContent) === true) {
			throw(new \PDOException("article content is invalid"));
		}
		// escape any mySQL wild cards
		$articleContent = str_replace("_", "\\_", str_replace("%", "\\%", $articleContent));
		// create query template
		$query = "SELECT articleId, articleCategoryId, articleContent, articleDate FROM article WHERE articleContent LIKE :articleContent";
		$statement = $pdo->prepare($query);
		// bind the article content to the place holder in the template
		$articleContent = "%$articleContent%";
		$parameters = ["articleContent" => $articleContent];
		$statement->execute($parameters);
		// build an array of articles
		$articles = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$article = new Article($row["articleId"], $row["articleCategoryId"], $row["articleContent"], $row["articleDate"]);
				$articles[$articles->key()] = $article;
				$articles->next();
			} catch(\Exception $exception) {
				// if the row couldn't be converted, rethrow it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return($articles);
	}
	/**
	 * gets all Articles
	 *
	 * @param \PDO $pdo PDO connection object
	 * @return \SplFixedArray SplFixedArray of Articles found or null if not found
	 * @throws \PDOException when mySQL related errors occur
	 * @throws \TypeError when variables are not the correct data type
	 **/
	public static function getAllArticles(\PDO $pdo) : \SPLFixedArray {
		// create query template
		$query = "SELECT articleId, articleCategoryId, articleContent, articleDate FROM article";
		$statement = $pdo->prepare($query);
		$statement->execute();
		// build an array of articles
		$articles = new \SplFixedArray($statement->rowCount());
		$statement->setFetchMode(\PDO::FETCH_ASSOC);
		while(($row = $statement->fetch()) !== false) {
			try {
				$article = new Article($row["articleId"], $row["articleCategoryId"], $row["articleContent"], $row["articleDate"]);
				$articles[$articles->key()] = $article;
				$articles->next();
			} catch(\Exception $exception) {
				// if the row couldn't be converted, rethrow it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
		}
		return ($articles);
	}
	/**
	 * formats the state variables for JSON serialization
	 *
	 * @return array resulting state variables to serialize
	 **/
	public function jsonSerialize() {
		$fields = get_object_vars($this);
		$fields["articleId"] = $this->articleId;
		$fields["articleCategoryId"] = $this->articleCategoryId;
		//format the date so that the front end can consume it
		$fields["articleDate"] = round(floatval($this->articleDate->format("U.u")) * 1000);
		return($fields);
	}
}