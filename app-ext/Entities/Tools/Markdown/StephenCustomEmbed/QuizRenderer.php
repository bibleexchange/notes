<?php

namespace Extended\Entities\Tools\Markdown\StephenCustomEmbed;

use League\CommonMark\ElementRendererInterface;
use League\CommonMark\HtmlElement;
use League\CommonMark\Inline\Element\AbstractInline;
use League\CommonMark\Inline\Renderer\InlineRendererInterface;

final class QuizRenderer implements InlineRendererInterface {

	/**
	 * QuizRenderer constructor.
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

		$id = $inline->getUrl()->getId();
		$id = explode("/",str_replace("@quiz/","",$id));

		$book_id = \BookStack\Entities\Models\Book::where("slug",$id[1])->first()->id;
		$quiz = \BookStack\Entities\Models\Page::where("slug",$id[3])->where("book_id",$book_id)->first();

		$quiz = new \Extended\Tools\MarkdownToJson($quiz->name,$quiz->markdown);
		dd($quiz->getData());
		$html = "<form>";
		foreach($quiz->questions AS $question){
			$html .= "<li>".$question->q." : ".$question->a."</li>";
		}
		$html .= "</form>";

		return $html;
	}
}
