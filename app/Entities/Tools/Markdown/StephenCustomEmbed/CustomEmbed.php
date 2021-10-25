<?php

namespace BookStack\Entities\Tools\Markdown\StephenCustomEmbed;

use League\CommonMark\Inline\Element\AbstractInline;

final class CustomEmbed extends AbstractInline {

	private $url;

	/**
	 * CustomEmbed constructor.
	 * @param CustomEmbedUrlInterface $url
	 */
	public function __construct(CustomEmbedUrlInterface $url) {
		$this->url = $url;
	}

	/**
	 * @return CustomEmbedUrlInterface
	 */
	public function getUrl(): CustomEmbedUrlInterface {
		return $this->url;
	}

}
