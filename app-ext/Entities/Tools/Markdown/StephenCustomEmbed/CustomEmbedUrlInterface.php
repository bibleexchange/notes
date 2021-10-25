<?php

namespace Extended\Entities\Tools\Markdown\StephenCustomEmbed;

interface CustomEmbedUrlInterface {

	/**
	 * @return string
	 */
	public function getId(): string;

	/**
	 * @return string|null
	 */
	public function getOptions(): ?string;

}