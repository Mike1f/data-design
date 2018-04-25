<?php
class Article {
	protected $articleId;
	protected $articleCategoryId;
	protected $articleAuthor;
	protected $articleContent;
	protected $articleDateTime;
	protected $articleName;

	/**
	 * @return mixed
	 */
	public function getArticleId() {
		return $this->articleId;
	}

	/**
	 * @param mixed $articleId
	 */
	public function setArticleId($articleId): void {
		$this->articleId = $articleId;
	}

	/**
	 * @return mixed
	 */
	public function getArticleCategoryId() {
		return $this->articleCategoryId;
	}

	/**
	 * @param mixed $articleCategoryId
	 */
	public function setArticleCategoryId($articleCategoryId): void {
		$this->articleCategoryId = $articleCategoryId;
	}

	/**
	 * @return mixed
	 */
	public function getArticleAuthor() {
		return $this->articleAuthor;
	}

	/**
	 * @param mixed $articleAuthor
	 */
	public function setArticleAuthor($articleAuthor): void {
		$this->articleAuthor = $articleAuthor;
	}

	/**
	 * @return mixed
	 */
	public function getArticleContent() {
		return $this->articleContent;
	}

	/**
	 * @param mixed $articleContent
	 */
	public function setArticleContent($articleContent): void {
		$this->articleContent = $articleContent;
	}

	/**
	 * @return mixed
	 */
	public function getArticleDateTime() {
		return $this->articleDateTime;
	}

	/**
	 * @param mixed $articleDateTime
	 */
	public function setArticleDateTime($articleDateTime): void {
		$this->articleDateTime = $articleDateTime;
	}

	/**
	 * @return mixed
	 */
	public function getArticleName() {
		return $this->articleName;
	}

	/**
	 * @param mixed $articleName
	 */
	public function setArticleName($articleName): void {
		$this->articleName = $articleName;
	}
}

use Ramsey\Uuid\Uuid;
/**
 * Trait to validate a uuid
 *
 * This trait will validate a uuid in any of the following three formats:
 *
 * 1. human readable string (36 bytes)
 * 2. binary string (16 bytes)
 * 3. Ramsey\Uuid\Uuid object
 *
 * @author Dylan McDonald <dmcdonald21@cnm.edu>
 * @package Edu\Cnm\Misquote
 **/
trait ValidateUuid {
	/**
	 * validates a uuid irrespective of format
	 *
	 * @param string|Uuid $newUuid uuid to validate
	 * @return Uuid object with validated uuid
	 * @throws \InvalidArgumentException if $newUuid is not a valid uuid
	 * @throws \RangeException if $newUuid is not a valid uuid v4
	 **/
	private static function validateUuid($newUuid) : Uuid {
		// verify a string uuid
		if(gettype($newUuid) === "string") {
			// 16 characters is binary data from mySQL - convert to string and fall to next if block
			if(strlen($newUuid) === 16) {
				$newUuid = bin2hex($newUuid);
				$newUuid = substr($newUuid, 0, 8) . "-" . substr($newUuid, 8, 4) . "-" . substr($newUuid,12, 4) . "-" . substr($newUuid, 16, 4) . "-" . substr($newUuid, 20, 12);
			}
			// 36 characters is a human readable uuid
			if(strlen($newUuid) === 36) {
				if(Uuid::isValid($newUuid) === false) {
					throw(new \InvalidArgumentException("invalid uuid"));
				}
				$uuid = Uuid::fromString($newUuid);
			} else {
				throw(new \InvalidArgumentException("invalid uuid"));
			}
		} else if(gettype($newUuid) === "object" && get_class($newUuid) === "Ramsey\\Uuid\\Uuid") {
			// if the misquote id is already a valid UUID, press on
			$uuid = $newUuid;
		} else {
			// throw out any other trash
			throw(new \InvalidArgumentException("invalid uuid"));
		}
		// verify the uuid is uuid v4
		if($uuid->getVersion() !== 4) {
			throw(new \RangeException("uuid is incorrect version"));
		}
		return($uuid);
	}
}