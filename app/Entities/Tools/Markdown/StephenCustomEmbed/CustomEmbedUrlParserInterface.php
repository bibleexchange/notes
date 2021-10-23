<?php

namespace BookStack\Entities\Tools\Markdown\StephenCustomEmbed;

interface CustomEmbedUrlParserInterface {

	/**
	 * @param string $url
	 * @return CustomEmbedUrlInterface|null
	 */
	public function parse(string $url): ?CustomEmbedUrlInterface;

}
