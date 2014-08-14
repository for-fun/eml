var confrimDelete;

confrimDelete = function() {
  return $(".deleteForm").submit(function(e) {
    var r;
    r = confirm("Вы уверены?");
    if (!r) {
      return false;
    }
  });
};

$(function() {
  return confrimDelete();
});
