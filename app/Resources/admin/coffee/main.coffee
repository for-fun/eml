confrimDelete = ->
  $(".deleteForm").submit (e) ->
    r = confirm("Вы уверены?")
    return false if not r

injectEditor = ->
  $('.editor').summernote
    height: 300
    focus: true
    toolbar: [
      ['style', ['style']]
      ['style', ['bold', 'italic', 'underline', 'clear']]
      ['font', ['strikethrough']]
      ['fontsize', ['fontsize']]
      ['color', ['color']]
      ['para', ['ul', 'ol', 'paragraph']]
      ['height', ['height']]
      ['table', ['table']]
      ['insert', ['picture', 'link', 'video', 'hr']]
      ['Misc', ['codeview', 'undo', 'redo', 'help']]
    ]
    lang: 'ru-RU'
    codemirror: {}

$ ->
#  do confrimDelete
  do injectEditor