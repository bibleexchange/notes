<?php

namespace BookStack\Entities\Tools\Markdown\StephenCustomEmbed;

final class YouTubeShortUrlParser implements CustomEmbedUrlParserInterface {

	private const HOST = 'youtu.be';
	private const TIMESTAMP_GET = [
		't',
		'time_continue',
		'start',
	];

	/**
	 * @param string $url
	 * @return CustomEmbedUrlInterface|null
	 */
	public function parse(string $url): ?CustomEmbedUrlInterface {
		if (parse_url($url, PHP_URL_HOST) !== self::HOST) {
			return null;
		}

		$videoId = substr((string)parse_url($url, PHP_URL_PATH), 1);
		if ($videoId === '') {
			return null;
		}

		parse_str((string)parse_url($url, PHP_URL_QUERY), $getParams);

		foreach (self::TIMESTAMP_GET as $timeGet) {
			if (array_key_exists($timeGet, $getParams) && $getParams[$timeGet] !== '') {
				return new YouTubeUrl($videoId, $getParams[$timeGet]);
			}
		}

		return new YouTubeUrl($videoId);
	}

}
