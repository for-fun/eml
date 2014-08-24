searchTypeahead =  (data) ->
  return false if $('.typeahead').length < 1
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
  promise = $.getJSON("/api/groups/")
  promise.done (data) ->
    searchTypeahead(data)

superAwesomeMethod = ->
  if $('#maps_groupsbundle_groupscomments_groupsId').length > 0
    $('#maps_groupsbundle_groupscomments_groupsId').val(group_id);

$ ->
  do search
  do superAwesomeMethod