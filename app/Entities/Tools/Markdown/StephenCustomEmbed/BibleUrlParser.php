<?php

namespace BookStack\Entities\Tools\Markdown\StephenCustomEmbed;

final class BibleUrlParser implements CustomEmbedUrlParserInterface {

	private const HOST = '@bible';
	private const PATH = '/kjv';
	private const TIMESTAMP_GET = [
		't',
		'time_continue',
		'start',
	];
	private const ID_GET = 'v';

	/**
	 * @param string $url
	 * @return CustomEmbedUrlInterface|null
	 */
	public function parse(string $url): ?CustomEmbedUrlInterface {
		if (strpos($url, '@bible') === false ) {
			return null;
		}

		$arr = explode("/",$url);

		return new BibleUrl($arr[2], $arr[1]);
	}

}
