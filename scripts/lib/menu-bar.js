'use strict'

/**
 * [description]
 * @param  {[type]} $ jQuery
 * @return {void
 */
export default window => {

  const $ = window.jQuery

  let windowWidthBefore = 0

  // click event
  $('.toggle-menu .collapsible').on('touchstart mousedown', () => {
    const $target = $($(this).data('target'))

    if($target.hasClass('collapsed')) {
      $target.removeClass('collapsed')
    } else {
      $target.addClass('collapsed')
    }

  })

  // toggle with the width changing
  const toggleWithWidth = () => {
    const $target = $($('.toggle-menu collapsible').data('target'))
    const widthSpreading = windowWidthBefore < $(window).width()
    const overBreakPoint = $(window).width() > 767
    const collapsed = $target.hasClass('collapsed')

    if(widthSpreading && overBreakPoint && collapsed) {
      $target.removeClass('collapsed')
    }
    if(! widthSpreading && ! overBreakPoint && ! collapsed) {
      $target.addClass('collapsed')
    }

    windowWidthBefore = $(window).width()
  }


  // do at first
  toggleWithWidth()

  // register window resize event
  $(window).resize(toggleWithWidth)
}
