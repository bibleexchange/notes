<?php

namespace Extended\Entities\Tools\Markdown\StephenCustomEmbed;

final class ArchiveUrlParser implements CustomEmbedUrlParserInterface {

	private const HOST = '@archive';

	/**
	 * @param string $url
	 * @return CustomEmbedUrlInterface|null
	 */
	public function parse(string $url): ?CustomEmbedUrlInterface {
		if (strpos($url, '@archive') === false ) {
			return null;
		}

		$url = str_replace("@archive","",$url);
		return new ArchiveUrl($url);
	}

}
