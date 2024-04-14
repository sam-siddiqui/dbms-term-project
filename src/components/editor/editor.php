<div id="editor-parent-row" class="row">
    <div id="editor-tabs-parent">
        <ul class="nav nav-tabs d-flex justify-content-between" role="tablist" style="padding-right: 10px;">
            <li class="nav-item border rounded-0" role="presentation">
                <div class="bg-body-tertiary border rounded-0" role="tab" style="padding: 0.5rem;" data-bs-toggle="tab" href="#tab-1">Input</d>
            </li>
            <li class="nav-item" role="query">
                <button class="nav-link text-bg-primary border rounded sql-button" role="button" rel="search">Run SQL</button>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" role="tabpanel" id="tab-1">
                <div class="row" style="padding: 0; margin: 0px;">
                    <div id="textarea-parent-col" class="">
                        <textarea class="" aria-label="editor" name="EditingArea" id="editing-textarea"><?= isset($_SESSION['text_in_editor']) ? $_SESSION['text_in_editor'] : '' ?></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>