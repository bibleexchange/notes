<?php

namespace BookStack\Entities\Tools\Markdown\StephenCustomEmbed;

use League\CommonMark\ConfigurableEnvironmentInterface;
use League\CommonMark\Event\DocumentParsedEvent;
use League\CommonMark\Extension\ExtensionInterface;

final class CustomEmbedExtension implements ExtensionInterface {

	/**
	 * @param ConfigurableEnvironmentInterface $environment
	 */
	public function register(ConfigurableEnvironmentInterface $environment) {
		$environment
			->addEventListener(DocumentParsedEvent::class, new CustomEmbedProcessor([
				new YouTubeLongUrlParser(),
				new YouTubeShortUrlParser(),
				new BibleUrlParser(),
				new ArchiveUrlParser(),
			]))
			->addInlineRenderer(CustomEmbed::class, new CustomEmbedRenderer(
				(string) $environment->getConfig('youtube_iframe_width', 640),
				(string) $environment->getConfig('youtube_iframe_height', 480),
				(bool) $environment->getConfig('youtube_iframe_allowfullscreen', true)
			))
		;
	}

}
