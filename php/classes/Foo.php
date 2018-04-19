<?php
class Article {
	protected $articleId;
	protected $articleName;
	protected $articleDateTime;
	protected $articleAuthor;
	protected $articleContent;
	protected $articleCategoryId;

	/**
	 * @return mixed
	 */
	public function getArticleId(): Uuid {
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
	public function getArticleName(): string {
		return $this->articleName;
	}

	/**
	 * @param mixed $articleName
	 */
	public function setArticleName($articleName): void {
		$this->articleName = $articleName;
	}

	/**
	 * @return mixed
	 */
	public function getArticleDateTime(): string {
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
	public function getArticleAuthor(): string {
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
	public function getArticleContent(): string {
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
	public function getArticleCategoryId(): string {
		return $this->articleCategoryId;
	}

	/**
	 * @param mixed $articleCategoryId
	 */
	public function setArticleCategoryId($articleCategoryId): void {
		$this->articleCategoryId = $articleCategoryId;
	}
}