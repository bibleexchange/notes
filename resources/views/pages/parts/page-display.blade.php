<div dir="auto">

    <div id="quiz" class="chapter chapter-expansion">
        <div class="content">
            <button type="button" chapter-toggle="" aria-expanded="false" class="text-muted chapter-expansion-toggle"><svg class="svg-icon" data-icon="caret-right" role="presentation" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M9.5 17.5l5-5-5-5z"></path><path d="M0 0h24v24H0z" fill="none"></path></svg> <span>Review</span></button>
            <div class="inset-list">
                <div class="entity-list-item-children">
                    <div class="entity-list ">
                        <div class="content">
                            <div class="question"></div>
                            <input class="answered"></input>
                            <button onClick="score()">score</button>
                            <button onClick="skip()">skip</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h1 class="break-text" id="bkmrk-page-title">{{$page->name}}</h1>

    <div style="clear:left;"></div>

    @if (isset($diff) && $diff)
        {!! $diff !!}
    @else
        {!! isset($page->renderedHTML) ? $page->renderedHTML : $page->html !!}
    @endif


</div>