confrimDelete = ->
  $(".deleteForm").submit (e) ->
    r = confirm("Вы уверены?")
    return false if not r

$ ->
  do confrimDelete