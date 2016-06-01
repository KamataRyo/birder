$ = jQuery
$('.toggle-menu').click ->
    $target = $ $(this).data('target')
    unless $target.hasClass 'collapsible' then return

    if $target.hasClass 'collapsed'
        $target.removeClass 'collapsed'
    else
        $target.addClass 'collapsed'


$(window).resize (a1, a2) ->
    $target = $ $('.toggle-menu').data('target')
    unless $target.hasClass 'collapsible' then return

    if $(window).width() > 767 and $target.hasClass 'collapsed'
        $target.removeClass 'collapsed'
    if $(window).width() < 768 and ! $target.hasClass 'collapsed'
        $target.addClass 'collapsed'
