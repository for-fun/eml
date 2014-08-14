confrimDelete = ->
  $(".deleteForm").submit (e) ->
    r = confirm("Вы уверены?")
    return false if not r

injectEditor = ->
  $('.editor').summernote
    height: 300
    focus: true


$ ->
  do confrimDelete
  do injectEditor