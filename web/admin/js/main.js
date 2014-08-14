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
    focus: true
  });
};

$(function() {
  confrimDelete();
  return injectEditor();
});
