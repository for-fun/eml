var confrimDelete, injectEditor;

confrimDelete = function() {
  return $(".deleteForm").submit(function(e) {
    var r;
    r = confirm("Вы уверены?");
    if (!r) {
      return false;
    }
  });
};

injectEditor = function() {
  return $('.editor').summernote({
    height: 300,
    toolbar: [['style', ['style']], ['style', ['bold', 'italic', 'underline', 'clear']], ['font', ['strikethrough']], ['fontsize', ['fontsize']], ['color', ['color']], ['para', ['ul', 'ol', 'paragraph']], ['height', ['height']], ['table', ['table']], ['insert', ['picture', 'link', 'video', 'hr']], ['Misc', ['codeview', 'undo', 'redo', 'help']]],
    lang: 'ru-RU',
    codemirror: {}
  });
};

$(function() {
  confrimDelete();
  return injectEditor();
});
