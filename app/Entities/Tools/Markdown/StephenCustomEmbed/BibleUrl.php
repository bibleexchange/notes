<?php

namespace BookStack\Entities\Tools\Markdown\StephenCustomEmbed;

final class BibleUrl implements CustomEmbedUrlInterface {

	private $version;
	private $reference;

	/**
	 * BibleUrl constructor.
	 * @param string $reference
	 * @param string|null $version
	 */
	public function __construct(string $reference, string $version = "KJV") {
		$this->reference = $reference;
		$this->version = $version;
	}

	/**
	 * @return string
	 */
	public function getId(): string {
		return $this->reference;
	}

	/**
	 * @return string
	 */
	public function getOptions(): string {
		return $this->version;
	}

}
