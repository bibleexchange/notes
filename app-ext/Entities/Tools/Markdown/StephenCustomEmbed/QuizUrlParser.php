<?php

namespace Extended\Entities\Tools\Markdown\StephenCustomEmbed;

final class QuizUrlParser implements CustomEmbedUrlParserInterface {

	/**
	 * @param string $url
	 * @return CustomEmbedUrlInterface|null
	 */
	public function parse(string $url): ?CustomEmbedUrlInterface {

		if (strpos($url, '@quiz') === false ) {
			return null;
		}

		return new QuizUrl($url);
	}

}
