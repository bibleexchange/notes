<?php

namespace Extended\Entities\Tools\Markdown\StephenCustomEmbed;

use League\CommonMark\ElementRendererInterface;
use League\CommonMark\HtmlElement;
use League\CommonMark\Inline\Element\AbstractInline;
use League\CommonMark\Inline\Renderer\InlineRendererInterface;

final class BibleIframeRenderer implements InlineRendererInterface {

	private $width;
	private $height;
	private $allowFullScreen;

	/**
	 * YouTubeIframeRenderer constructor.
	 * @param string $width
	 * @param string $height
	 * @param bool $allowFullScreen
	 */
	public function __construct(string $width, string $height, bool $allowFullScreen) {
		$this->width = $width;
		$this->height = $height;
		$this->allowFullScreen = $allowFullScreen;
	}

	/**
	 * @inheritDoc
	 */
	public function render(AbstractInline $inline, ElementRendererInterface $htmlRenderer) {
		if (!($inline instanceof CustomEmbed)) {
			throw new \InvalidArgumentException('Incompatible inline type: ' . get_class($inline));
		}

		$version = $inline->getUrl()->getOptions();

		$bible = json_decode(file_get_contents(base_path(). '/app-ext/Tools/bible/bible.json'));

		if($inline->getUrl()->getIdType() === "id"){
			$id = $inline->getUrl()->getId();
		}else{
			$book_id = 1;
			$ref = $inline->getUrl()->getReference();
			$rf = str_replace(" ","",strtolower($ref[0]));

			foreach($bible->books AS $book){
				$book_name = strtolower(str_replace(" ","",$book->name));

				if($rf === $book_name || in_array($rf,$book->aliases) || strpos($book_name, $rf) !== false){
					$book_id = $book->id;
				}
			}

			$id = 9 . str_pad($book_id ,2,"0", STR_PAD_LEFT).str_pad($ref[1] ,3,"0", STR_PAD_LEFT) . str_pad($ref[2] ,3,"0", STR_PAD_LEFT);
		}

		foreach($bible->verses AS $verse){
			if($verse->id === (int) $id){
				return "<span>".$verse->body."</span>";
			}
		}	

		return $inline;
	}
}
