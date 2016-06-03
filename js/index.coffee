$ = jQuery
windowWidthBefore = $(window).width()

$('.toggle-menu').click ->
    $target = $ $(this).data('target')
    unless $target.hasClass 'collapsible' then return

    if $target.hasClass 'collapsed'
        $target.removeClass 'collapsed'
    else
        $target.addClass 'collapsed'


toggleWithWidth = ->
    $target = $ $('.toggle-menu').data('target')
    unless $target.hasClass 'collapsible' then return

    widthSpreading = windowWidthBefore < $(window).width()
    overBreakPoint = $(window).width() > 767
    collapsed = $target.hasClass 'collapsed'

    if widthSpreading and overBreakPoint and collapsed
        $target.removeClass 'collapsed'
    if ! widthSpreading and ! overBreakPoint and ! collapsed
        $target.addClass 'collapsed'

    windowWidthBefore = $(window).width()


# judge at first
toggleWithWidth()

$(window).resize toggleWithWidth
