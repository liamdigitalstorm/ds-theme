/*
* jquery-match-height 0.7.2 by @liabru
* http://brm.io/jquery-match-height/
* License MIT
*/
!function(t){"use strict";"function"==typeof define&&define.amd?define(["jquery"],t):"undefined"!=typeof module&&module.exports?module.exports=t(require("jquery")):t(jQuery)}(function(t){var e=-1,o=-1,n=function(t){return parseFloat(t)||0},a=function(e){var o=1,a=t(e),i=null,r=[];return a.each(function(){var e=t(this),a=e.offset().top-n(e.css("margin-top")),s=r.length>0?r[r.length-1]:null;null===s?r.push(e):Math.floor(Math.abs(i-a))<=o?r[r.length-1]=s.add(e):r.push(e),i=a}),r},i=function(e){var o={
byRow:!0,property:"height",target:null,remove:!1};return"object"==typeof e?t.extend(o,e):("boolean"==typeof e?o.byRow=e:"remove"===e&&(o.remove=!0),o)},r=t.fn.matchHeight=function(e){var o=i(e);if(o.remove){var n=this;return this.css(o.property,""),t.each(r._groups,function(t,e){e.elements=e.elements.not(n)}),this}return this.length<=1&&!o.target?this:(r._groups.push({elements:this,options:o}),r._apply(this,o),this)};r.version="0.7.2",r._groups=[],r._throttle=80,r._maintainScroll=!1,r._beforeUpdate=null,
r._afterUpdate=null,r._rows=a,r._parse=n,r._parseOptions=i,r._apply=function(e,o){var s=i(o),h=t(e),l=[h],c=t(window).scrollTop(),p=t("html").outerHeight(!0),u=h.parents().filter(":hidden");return u.each(function(){var e=t(this);e.data("style-cache",e.attr("style"))}),u.css("display","block"),s.byRow&&!s.target&&(h.each(function(){var e=t(this),o=e.css("display");"inline-block"!==o&&"flex"!==o&&"inline-flex"!==o&&(o="block"),e.data("style-cache",e.attr("style")),e.css({display:o,"padding-top":"0",
"padding-bottom":"0","margin-top":"0","margin-bottom":"0","border-top-width":"0","border-bottom-width":"0",height:"100px",overflow:"hidden"})}),l=a(h),h.each(function(){var e=t(this);e.attr("style",e.data("style-cache")||"")})),t.each(l,function(e,o){var a=t(o),i=0;if(s.target)i=s.target.outerHeight(!1);else{if(s.byRow&&a.length<=1)return void a.css(s.property,"");a.each(function(){var e=t(this),o=e.attr("style"),n=e.css("display");"inline-block"!==n&&"flex"!==n&&"inline-flex"!==n&&(n="block");var a={
display:n};a[s.property]="",e.css(a),e.outerHeight(!1)>i&&(i=e.outerHeight(!1)),o?e.attr("style",o):e.css("display","")})}a.each(function(){var e=t(this),o=0;s.target&&e.is(s.target)||("border-box"!==e.css("box-sizing")&&(o+=n(e.css("border-top-width"))+n(e.css("border-bottom-width")),o+=n(e.css("padding-top"))+n(e.css("padding-bottom"))),e.css(s.property,i-o+"px"))})}),u.each(function(){var e=t(this);e.attr("style",e.data("style-cache")||null)}),r._maintainScroll&&t(window).scrollTop(c/p*t("html").outerHeight(!0)),
this},r._applyDataApi=function(){var e={};t("[data-match-height], [data-mh]").each(function(){var o=t(this),n=o.attr("data-mh")||o.attr("data-match-height");n in e?e[n]=e[n].add(o):e[n]=o}),t.each(e,function(){this.matchHeight(!0)})};var s=function(e){r._beforeUpdate&&r._beforeUpdate(e,r._groups),t.each(r._groups,function(){r._apply(this.elements,this.options)}),r._afterUpdate&&r._afterUpdate(e,r._groups)};r._update=function(n,a){if(a&&"resize"===a.type){var i=t(window).width();if(i===e)return;e=i;
}n?o===-1&&(o=setTimeout(function(){s(a),o=-1},r._throttle)):s(a)},t(r._applyDataApi);var h=t.fn.on?"on":"bind";t(window)[h]("load",function(t){r._update(!1,t)}),t(window)[h]("resize orientationchange",function(t){r._update(!0,t)})});

!function(e){function t(){var e=!1;return window.getSelection?e=window.getSelection().toString():document.getSelection?e=document.getSelection():document.selection&&(e=document.selection.createRange().text),e}var n="2.0";e.fn.bigTarget=function(n){var o=e.extend({},e.fn.bigTarget.defaults,n);return this.each(function(n){var i=e(this),a=this.href||!1,c=this.title||!1;if(a){var r=e.metadata?e.extend({},o,i.metadata()):o;i.addClass(r.anchorClass).hover(function(){i.toggleClass(r.anchorHoverClass)}).parents(r.clickZone).each(function(n){var o=e(this);c&&r.copyTitleToClickZone&&o.attr("title",c),o.addClass(r.clickZoneClass).hover(function(){o.toggleClass(r.clickZoneHoverClass)}).click(function(e){e.metaKey||e.ctrlKey||""==t()&&(i.is("[rel*=external]")&&r.openRelExternalInNewWindow?window.open(a):window.location=a)})})}})},e.fn.bigTarget.ver=function(){return n},e.fn.bigTarget.defaults={clickZone:"div:eq(0)",clickZoneClass:"big-target-click-zone",clickZoneHoverClass:"big-target-click-zone-hover",anchorClass:"big-target-anchor",anchorHoverClass:"big-target-anchor-hover",copyTitleToClickZone:!0,openRelExternalInNewWindow:!0}}(jQuery);

function popup(mylink, windowname) { 
    if (! window.focus)return true;
    var href;
    if (typeof(mylink) == 'string') href=mylink;
    else href=mylink.href; 
    window.open(href, windowname, 'width=650,height=650,scrollbars=yes'); 
    return false; 
  };

jQuery(document).ready(function ($) {
	
	    setTimeout(function() {
        $('.homeBanner,.logoBanner,.testimonialBanner').hide().css('visibility','visible').fadeIn('slow');
    }, 150);

$("a.bigTarget").bigTarget({clickZone: 'div:eq(0)'});
$("a.bigTarget1").bigTarget({clickZone: 'div:eq(1)'});
	
	$('a[href*="#"]')
  // Remove links that don't actually link to anything
  .not('[href="#"]')
  .not('[href="#0"]')
	.not('[data-vc-tabs]')
	.not ('[data-vc-accordion]')
	.not('[data-toggle="tab"]')
    .not('[data-toggle="collapse"]')
  .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
      && 
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top -40
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });
	
	
    $(window).on("load", function() {
     setTimeout(function() {
         $('.matchHeight').matchHeight({
           byRow: true,
           property: 'height',
           target: null,
           remove: false
         });
     }, 150);
    });   
    
	
	$(window).on("load", function() {
	
var owl1 = $('.home-banner');
owl1.owlCarousel({
items:1,
nav:false,
loop:true,
singleItem : true,
responsiveClass:true,
dots:false,
mouseDrag:false,
touchDrag:true,
autoplay:true,
autoWidth: false,
lazyLoad: false,
autoplayTimeout:4000,
autoplayHoverPause:false,
autoplaySpeed:1200,
responsive : {
    // breakpoint from 0 up
    0 : {
   nav:false,
    autoHeight: true,
            mouseDrag: false,
            touchDrag: true,
     dots:false
	
    },
    // breakpoint from 976 up
    976: {
     
    }
}
});

//owl1.on('change.owl.carousel', function(event) {
//        setTimeout(function() {
//            $('.owl-carousel').find('.active').find('.banner-content').addClass('animated fadeInUp displayBlock');
//        }, 150);
 //       $('.owl-carousel').find('.banner-content').removeClass('animated fadeInUp displayBlock');

 //   });
	
	var owl2 = $('.logoBanner');
owl2.owlCarousel({
items:5,
nav:false,
loop:true,
singleItem : false,
dots:false,
mouseDrag:false,
autoplay:true,
autoWidth: false,
lazyLoad: false,
autoplayTimeout:2750,
autoplayHoverPause:true,
autoplaySpeed:500,
responsiveClass:true,
    responsive:{
        0:{
            items:2,
            nav:false
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:5,
            nav:false,
            loop:true
        }
    }
});  

var owl3 = $('.testimonialBanner');
owl3.owlCarousel({
items:1,
nav:false,
loop:true,
singleItem : true,
dots:true,
mouseDrag:false,
autoplay:true,
autoWidth: false,
lazyLoad: false,
autoplayTimeout:6500,
autoplayHoverPause:true,
autoplaySpeed:500
}); 
		
});
	
});