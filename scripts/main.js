'use strict'
import { initHighlightingOnLoad as hilight } from 'highlight.js'
import enableMenuBarToggle  from './lib/menu-bar.js'
import fixSkipLinkFocus from './lib/skip-link-focus-fix.js'

hilight()

enableMenuBarToggle(window)

fixSkipLinkFocus(window)
