<div class="row" id="nav-container-row" style="margin-bottom: 5px;">
    <div class="col" id="nav-container-col" style="border-bottom: 1px solid;padding-left: 0;padding-right: 0;">
        <nav class="navbar navbar-expand-md bg-body py-3" id="navbar" style="padding-top: 1vh !important;padding-bottom: 1vh !important;">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <span class="bs-icon-sm bs-icon-rounded bs-icon-primary d-flex justify-content-center align-items-center me-2 bs-icon">
                        <img src="assets/img/branding-icon.png" width="15" height="15">
                    </span>
                    <span>Online SQL Editor</span>
                </a>
                <button class="btn border" type="button" title="Toggle dark mode" id="dark-mode-toggle">
                    <span><?= $previousDarkMode === "dark" ? '🌙' : '🔆' ?></span>
                </button>
                
                <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navcol-2">
                    <ul class="navbar-nav ms-auto"></ul>
                    <span style="margin-left: 1%;">Press Ctrl+Space for Autocomplete!</span>
                    <!-- <a class="btn btn-primary bg-danger-subtle ms-md-2" role="button" href="#">Change SQL
                        File</a> -->
                </div>
            </div>
        </nav>
    </div>
</div>