import './bootstrap';


 // Added: Popper.js dependency for popover support in Bootstrap
import '@popperjs/core';

import $ from 'jquery';

window.jQuery = $;
window.$ = $;


import ScrollMagic from "scrollmagic"
window.ScrollMagic = ScrollMagic

import { gsap } from "gsap";

window.gsap = gsap;


import { TweenMax, TimelineMax } from "gsap"; // What to import from gsap
import { ScrollMagicPluginGsap } from "scrollmagic-plugin-gsap";
 
ScrollMagicPluginGsap(ScrollMagic, TweenMax, TimelineMax)

import.meta.glob([
    '../images/**',
    '../plugins/**',
]);