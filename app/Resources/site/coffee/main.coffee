searchTypeahead =  (data) ->
  arabicPhrases = new Bloodhound(
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace("name")
    queryTokenizer: Bloodhound.tokenizers.whitespace
    local: data
  )
  arabicPhrases.initialize()
  $(".typeahead").typeahead
    hint: false
    highlight: true
  ,
    name: "search"
    displayKey: "name"
    source: arabicPhrases.ttAdapter()
  $(".typeahead").attr('disabled', false)
  $(".typeahead").focus()

search = ->
  return false if $('.typeahead').length < 1
  promise = $.getJSON("/api/groups/")
  promise.done (data) ->
    searchTypeahead(data)

superAwesomeMethod = ->
  if $('#maps_groupsbundle_groupscomments_groupsId').length > 0
    $('#maps_groupsbundle_groupscomments_groupsId').val(group_id);

$ ->
  do search
  do superAwesomeMethod

openWindow = (url, width, height, options, name) ->
  width = (if width then width else 800)
  height = (if height then height else 600)
  options = (if options then options else "resizable=yes")
  name = (if name then name else "openWindow")
  window.open url, name, "screenX=" + (screen.width - width) / 2 + ",screenY=" + (screen.height - height) / 2 + ",width=" + width + ",height=" + height + "," + options
  return