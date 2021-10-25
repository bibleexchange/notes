<?php

namespace Extended\Entities\Tools\Markdown\StephenCustomEmbed;

final class YouTubeUrl implements CustomEmbedUrlInterface {

	private $videoId;
	private $startTimestamp;

	/**
	 * YouTubeUrl constructor.
	 * @param string $videoId
	 * @param string|null $startTimestamp
	 */
	public function __construct(string $videoId, ?string $startTimestamp = null) {
		$this->videoId = $videoId;
		$this->startTimestamp = $startTimestamp;
	}

	/**
	 * @return string
	 */
	public function getId(): string {
		return $this->videoId;
	}

	/**
	 * @return string|null
	 */
	public function getOptions(): ?string {
		return $this->startTimestamp;
	}

}
