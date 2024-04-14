<!DOCTYPE html>
<?php $previousDarkMode = $_SESSION['dark_mode'];?>
<html data-bs-theme="<?= $previousDarkMode ? $previousDarkMode : 'light' ?>" lang="en">
<?php include_once("$rootComponentFolder/page_head.php") ?>

<body>
    <div id="main-container" class="container-fluid">
        <?php include_once("$rootComponentFolder/navbar.php") ?>
        <?php include_once("$rootComponentFolder/main_content.php") ?>
    </div>
    <?php include_once("$rootComponentFolder/additional_scripts.php") ?>
</body>

</html>