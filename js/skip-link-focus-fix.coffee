###
 * File skip-link-focus-fix.js.
 *
 * Helps with accessibility for keyboard only users.
 *
 * Learn more: https://git.io/vWdr2
###

isWebkit = navigator.userAgent.toLowerCase().indexOf('webkit') > -1
isOpera  = navigator.userAgent.toLowerCase().indexOf('opera')  > -1
isIe     = navigator.userAgent.toLowerCase().indexOf('msie')   > -1

if ( isWebkit or isOpera or isIe ) and document.getElementById and window.addEventListener
    window.addEventListener 'hashchange', ->
        id = location.hash.substring 1

        if /^[A-z0-9_-]+$/.test id
            element = document.getElementById id
        else
            return

        if element
            unless /^(?:a|select|input|button|textarea)$/i.test element.tagName
                element.tabIndex = -1
            element.focus()

    , false
