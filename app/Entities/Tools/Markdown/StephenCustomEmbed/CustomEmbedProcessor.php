<?php

namespace BookStack\Entities\Tools\Markdown\StephenCustomEmbed;

use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Inline\Element\Link;

final class CustomEmbedProcessor {

	private $parsers = [];

	/**
	 * CustomEmbedProcessor constructor.
	 * @param YouTubeUrlParserInterface[] $parsers
	 */
	public function __construct(array $parsers) {
		foreach ($parsers as $parser) {
			if (false/*!($parser instanceof YouTubeUrlParserInterface)*/) {
				throw new \TypeError();
			}
		}
		$this->parsers = $parsers;
	}

	/**
	 * @param DocumentParsedEvent $e
	 */
	public function __invoke(DocumentParsedEvent $e) {
		$walker = $e->getDocument()->walker();
		while ($event = $walker->next()) {
			if ($event->getNode() instanceof Link && !$event->isEntering()) {
				/** @var Link $link */
				$link = $event->getNode();

				/** @var CustomEmbedUrlParserInterface $parser */
				foreach ($this->parsers as $parser) {
					$url = $parser->parse($link->getUrl());
					if ($url === null) {
						continue;
					}
					$link->replaceWith(new CustomEmbed($url));
				}
			}
		}
	}

}
