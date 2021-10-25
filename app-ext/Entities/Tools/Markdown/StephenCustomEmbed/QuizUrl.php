<?php

namespace Extended\Entities\Tools\Markdown\StephenCustomEmbed;

final class QuizUrl implements CustomEmbedUrlInterface {

	private $id;
	private $version;

	/**
	 * BibleUrl constructor.
	 * @param string $id
	 * @param string|null $version
	 */
	public function __construct(string $id, string $options = "") {
		$this->id = $id;
		$this->options = $options;
	}

	/**
	 * @return string
	 */
	public function getId(): string {
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getOptions(): string {
		return $this->options;
	}

}
