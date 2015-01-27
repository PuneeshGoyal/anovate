// JavaScript Document

    $(function(){
      SyntaxHighlighter.all();
    });
	    $(window).load(function(){
      $('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 118,
        itemMargin: 8,
        asNavFor: '#slider'
      });

      $('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  
  
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('#carousel_a').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 118,
        itemMargin: 8,
        asNavFor: '#slider_a'
      });

      $('#slider_a').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel_a",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  
  
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('#carousel_b').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 118,
        itemMargin: 8,
        asNavFor: '#slider_b'
      });

      $('#slider_b').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel_b",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('#carousel_c').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 118,
        itemMargin: 8,
        asNavFor: '#slider_c'
      });

      $('#slider_c').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel_c",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });

 $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('#carousel_ab').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth: 127,
        itemMargin: 8,
        asNavFor: '#slider_ab'
      });

      $('#slider_ab').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel_ab",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });