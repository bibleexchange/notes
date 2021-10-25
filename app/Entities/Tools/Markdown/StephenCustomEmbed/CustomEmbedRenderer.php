<?php

namespace BookStack\Entities\Tools\Markdown\StephenCustomEmbed;

use League\CommonMark\ElementRendererInterface;
use League\CommonMark\HtmlElement;
use League\CommonMark\Inline\Element\AbstractInline;
use League\CommonMark\Inline\Renderer\InlineRendererInterface;

final class CustomEmbedRenderer implements InlineRendererInterface {

	/**
	 * CustomEmbedRenderer constructor.
	 * @param string $width
	 * @param string $height
	 * @param bool $allowFullScreen
	 */
	public function __construct($width, $height, $allowFullScreen) {
		$this->width = $width;
		$this->height = $height;
		$this->allowFullScreen = $allowFullScreen;
	}

	/**
	 * @inheritDoc
	 */
	public function render(AbstractInline $inline, ElementRendererInterface $htmlRenderer) {
		switch(get_class($inline->getUrl())){

			case "BookStack\Entities\Tools\Markdown\StephenCustomEmbed\YouTubeUrl":
				$youtube =  new YouTubeIframeRenderer($this->width, $this->height, $this->allowFullScreen);
				return $youtube->render($inline, $htmlRenderer);

			case "BookStack\Entities\Tools\Markdown\StephenCustomEmbed\BibleUrl":
				$bible =  new BibleIframeRenderer($this->width, $this->height, $this->allowFullScreen);
				return $bible->render($inline, $htmlRenderer);
			case "BookStack\Entities\Tools\Markdown\StephenCustomEmbed\ArchiveUrl":
				$arch =  new ArchiveRenderer($this->width, $this->height, $this->allowFullScreen);
				return $arch->render($inline, $htmlRenderer);

		}

	}
}
