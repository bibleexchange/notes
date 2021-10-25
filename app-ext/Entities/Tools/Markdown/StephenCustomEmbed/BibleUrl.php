<?php

namespace Extended\Entities\Tools\Markdown\StephenCustomEmbed;

final class BibleUrl implements CustomEmbedUrlInterface {

	private $id;
	private $version;
	private $reference;

	/**
	 * BibleUrl constructor.
	 * @param string $reference
	 * @param string|null $version
	 */
	public function __construct(string $reference, string $version = "KJV") {
		$this->id = (int) $reference;
		$this->reference = explode("/",$reference);
		array_shift($this->reference);
		$this->idType = count($this->reference) === 1? "id":"string";
		$this->version = $version;
	}

	/**
	 * @return string
	 */
	public function getId(): string {
		return $this->id;
	}

	/**
	 * @return array
	 */
	public function getReference(): array {
		return $this->reference;
	}

	public function getIdType(): string {
		return $this->idType;
	}

	/**
	 * @return string
	 */
	public function getOptions(): string {
		return $this->version;
	}

}
