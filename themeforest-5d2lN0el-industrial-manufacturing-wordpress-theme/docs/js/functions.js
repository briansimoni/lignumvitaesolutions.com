$(document).ready(function() {

    /* Main Navigation */

    function getNavigationLinks() {

        var regex = new RegExp(' ', 'g');

        $("h2, h3, h4, h5").each(function(index) {

            var el = $("h2, h3, h4, h5").eq(index);

            el.attr("id", el.html().replace(regex, '-').toLowerCase());

        });

        $("section").each(function(index) {

            var el = $("section").eq(index);

            $("#main-navigation").append('<li><a href="#' + el.find("h2").html().replace(regex, '-').toLowerCase() + '">' + el.find("h2").html() + '</a></li>');

            if( el.children("h3").length > 0 ) {

                var lastChild = $("#main-navigation").children("li").last();
                lastChild.append("<ul />");

                el.children("h3").each(function(index) {
                    lastChild.children("ul").append('<li><a href="#' + el.children("h3").eq(index).html().replace(regex, '-').toLowerCase() + '">' + el.children("h3").eq(index).html() + '</a></li>');
                });
            }

        });
    }

    getNavigationLinks();


    $(function() {
      $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'')
            || location.hostname == this.hostname) {

          var target = $(this.hash);
          var href = $.attr(this, 'href');
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
              console.log(target);
            $('html,body').animate({
              scrollTop: target.offset().top
            }, 1000, function () {
                window.location.hash = href;
            });
            return false;
          }
        }
      });
    });

    $('section, #preface').waypoint(function(direction) {

        isSmall();

        var $links = $('aside a[href="#' + $(this).children("h2").attr("id") + '"]');
        $links.parent().toggleClass('visible-item', direction === 'down');
    }, {
        offset: '100%'
    })

    .waypoint(function(direction) {

        isSmall();

        var $links = $('aside a[href="#' + $(this).children("h2").attr("id") + '"]');
        $links.parent().toggleClass('visible-item', direction === 'up');
    }, {
        offset: function() {
          return -$(this).height();
        }
    });

    /* Add scroll bar if screen is too small */

    function isSmall() {
        if( $(window).height() < $("#main-navigation").height() ) {
            $("aside").addClass("scroll");
        } else {
            $("aside").removeClass("scroll");
        }
    }

    isSmall();

    $(window).resize(function(){
        isSmall();
    });

    $("#main-navigation ul li").eq(0).css("display", "none");

});
