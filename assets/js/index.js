const toggleDarkModeButton = document.getElementById("dark-mode-toggle");
const darkModeApplyingElement = document.getElementsByTagName("html")[0];
const submitQueryButton = document.querySelector(".sql-button");
const editorTextArea = document.getElementById("editing-textarea");

toggleDarkModeButton.addEventListener("click", toggleDarkMode);
submitQueryButton.addEventListener("click", submitSQLQuery);

let cm = CodeMirror.fromTextArea(editorTextArea, {
  mode: "text/x-mysql",
  indentWithTabs: true,
  extraKeys: {"Ctrl-Space": "autocomplete"},
  smartIndent: true,
  autocorrect: true,
  lineNumbers: true,
  autofocus: true,
  matchBrackets: true,
  theme: initialTheme,
  hint: CodeMirror.hint.sql,
  hintOptions: { 
    tables: tableDetails,
    defaultTable: "db-book"
  }
});

function toggleDarkMode() {
  const codeMirrorTextArea = document.querySelector(".CodeMirror");
  const currentValueOnElement = darkModeApplyingElement.dataset.bsTheme;
  if (currentValueOnElement === "dark") {
    toggleDarkModeButton.firstElementChild.textContent = "🔆";
    darkModeApplyingElement.dataset.bsTheme = "light";
    codeMirrorTextArea.classList.remove(editor_themes["dark"]);
    codeMirrorTextArea.classList.add(editor_themes["light"]);
  }
  if (currentValueOnElement === "light") {
    toggleDarkModeButton.firstElementChild.textContent = "🌙";
    darkModeApplyingElement.dataset.bsTheme = "dark";
    codeMirrorTextArea.classList.remove(editor_themes["light"]);
    codeMirrorTextArea.classList.add(editor_themes["dark"]);
  }
}

/**
 * Creates a form with the given input query
 * @param {string} inputQuery
 * @param {string} textInEditor
 * @returns HTMLElement Form Element
 */
function createQueryForm(inputQuery, textInEditor) {
  const darkModeApplyingElement = document.getElementsByTagName("html")[0];

  const form = document.createElement("form");
  form.setAttribute("method", "post");
  form.setAttribute("action", "index.php");
  form.setAttribute("style", "display: none");

  const queryInput = document.createElement("input");
  queryInput.setAttribute("type", "text");
  queryInput.setAttribute("name", "SQLQuery");
  queryInput.setAttribute("value", inputQuery);

  const editorContent = document.createElement("input");
  editorContent.setAttribute("type", "text");
  editorContent.setAttribute("name", "editorContent");
  editorContent.setAttribute("value", textInEditor);

  const sqlFileName = document.createElement("input");
  sqlFileName.setAttribute("type", "text");
  sqlFileName.setAttribute("name", "sqlFileName");

  const previousDarkMode = document.createElement("input");
  previousDarkMode.setAttribute("type", "text");
  previousDarkMode.setAttribute("name", "previousDarkMode");
  previousDarkMode.setAttribute(
    "value",
    darkModeApplyingElement.dataset.bsTheme
  );

  const s = document.createElement("input");
  s.setAttribute("type", "submit");
  s.setAttribute("value", "Submit");

  form.appendChild(queryInput);
  form.appendChild(editorContent);
  form.appendChild(sqlFileName);
  form.appendChild(previousDarkMode);
  form.appendChild(s);

  return form;
}

/**
 * Get a sample of the Table's data
 * @param {HTMLElement} TableDetailsElement 
 */
function getTableHead(TableDetailsElement) {
  const tableNameEl = TableDetailsElement.getElementsByTagName("li");
  const tableName = tableNameEl.length > 0 ? tableNameEl[0].textContent.trim() : "";
  if(tableName !== "") {
    const textInEditor = cm.getValue().trim().replaceAll("\n", " \n");
    const query = `SELECT * FROM ${tableName} LIMIT 5`;
    let getTableHeadForm = createQueryForm(query, textInEditor);
    document.querySelector(".sql-button").append(getTableHeadForm);
    getTableHeadForm.submit()
  }
}

/**
 * Submit the SQL Query as written in the TextArea
 */
function submitSQLQuery() {
  const textInEditor = cm.getValue().trim().replaceAll("\n", " \n");
  const queryToSubmit = textInEditor;
  console.log(textInEditor);
  const submitFormElement = createQueryForm(queryToSubmit, textInEditor);
  document.querySelector(".sql-button").append(submitFormElement);
  submitFormElement.submit();
}
