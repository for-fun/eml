confrimDelete = ->
  $(".deleteForm").submit (e) ->
    r = confirm("Вы уверены?")
    return false if not r

injectEditor = ->
  $('.editor').summernote
    height: 300
    toolbar: [
      ['style', ['style']]
      ['style', ['bold', 'italic', 'underline', 'clear']]
      ['font', ['strikethrough']]
      ['fontsize', ['fontsize']]
      ['color', ['color']]
      ['para', ['ul', 'ol', 'paragraph']]
      ['table', ['table']]
      ['insert', ['picture', 'link', 'video', 'hr']]
      ['Misc', ['codeview', 'undo', 'redo', 'help']]
    ]
    styleTags: ['p', 'blockquote', 'h1', 'h2', 'h3'],
    lang: 'ru-RU'
    codemirror: {}

$ ->
  do confrimDelete
  do injectEditor
