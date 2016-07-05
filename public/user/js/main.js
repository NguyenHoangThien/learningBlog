(function ($) {
	"use strict";


    jQuery(document).ready(function($){

        // jQuery sticky menu
        $(".header-bottom").sticky({topSpacing:0});
        
        
        // jQuery OwlCarousel
        var owl = $('.slide-list');
        
        owl.owlCarousel({
            loop:true,
            margin:30,
            autoplay: 5000,
            nav:true,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            items:1      
        });    
        
        
        owl.on('translated.owl.carousel',function(e){
            $(".active .slide-text").addClass("fadeInUp").show();
        }); 
        
        owl.on('translate.owl.carousel',function(e){
            $(".active .slide-text").removeClass("fadeInUp").hide();
        });
        
        
        // jQuery Instafeed
        var userFeed = new Instafeed({
            limit: 12,
            get: 'tagged',
            tagName: 'nature',
            accessToken: '1189321718.467ede5.59564e795f3d4cedbd2d5c5a33b03ca1',
            template: '<a target="_blank" href="{{link}}"><img src="{{image}}" /></a>'
        });
        userFeed.run();     
        
        // jQuery twittie
        // $('#tweet').twittie({
        //     count: 3,
        //     template: '{{tweet}} <div class="twieet-date"><i class="fa fa-twitter"></i> {{date}}</div>'
        // });  
        
        
        // jQuery Lightbox
        $('.post-lightbox').venobox();        
        


    });


    jQuery(window).load(function(){
        $('.grid-blog').masonry({ singleMode: true });
        
        // Preloader
        $("#preloader").fadeOut(500);
        
        $(".active .slide-text").addClass("fadeInUp").show();
    });


}(jQuery));	