<?php

namespace Extended\Entities\Tools\Markdown\StephenCustomEmbed;

final class ArchiveUrl implements CustomEmbedUrlInterface {

	private $id;
	private $options;

	/**
	 * BibleUrl constructor.
	 * @param string $id
	 * @param string|null $options
	 */
	public function __construct(string $id, string $options = null) {
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
