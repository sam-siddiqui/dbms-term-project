<?php
$editorThemes = '';
$tables = [];
foreach ($_SESSION['editor_themes'] as $mode => $theme) {
    $editorThemes = $editorThemes . "'$mode':'cm-s-$theme',";
}
foreach ($_SESSION['tables'] as $tableName => $col) {
    $tables[$tableName] = [];
    foreach($col as $colIndex => $colProperty) {
        array_push($tables[$tableName], $colProperty['COLUMN_NAME']);
    }
}
?>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/codemirror/lib/codemirror.js"></script>
<script src="assets/codemirror/mode/sql/sql.js"></script>
<script src="assets/codemirror/hint/show-hint.js"></script>
<script src="assets/codemirror/hint/sql-hint.js"></script>
<script>
    const editor_themes = <?= "{" . $editorThemes . "}" ?>;
    const initialTheme = "<?= $_SESSION['editor_themes'][$_SESSION["dark_mode"]] ?>";
    const tableDetails = <?= json_encode($tables) ?>;
</script>
<script src="assets/js/index.js"></script>