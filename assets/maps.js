(function($) {
    $(function() {
        if ($('[data-map]').length == 0) return;

        $('[data-map]').each(function(index, el) {
            var $el = $(el).find('[data-address]');
            var html = $el.html();
            var id = $el.attr('id');

            var map = new GMaps({
                div: '#' + id,
                lat: -12.043333,
                lng: -77.028333,
                scrollWheel: false
            });

            GMaps.geocode({
                address: $el.data('address'),
                callback: function(results, status) {
                    if (status == 'OK') {
                        var latlng = results[0].geometry.location;
                        map.setCenter(latlng.lat(), latlng.lng());
                        var marker = map.addMarker({
                            lat: latlng.lat(),
                            lng: latlng.lng(),
                            infoWindow: {
                                content: html
                            }
                        });
                        marker.infoWindow.open(marker.map, marker);
                    }
                }
            });
        });

        // Events
        $('div[data-map]').addClass('GoogleMaps-scroll-disabled');
        $('div[data-map]').click(function() {
            $(this).removeClass('GoogleMaps-scroll-disabled').addClass('GoogleMaps-scroll-enabled');
        });
        $('div[data-map] > div').mouseleave(function() {
            $(this).parent().addClass('GoogleMaps-scroll-disabled').removeClass('GoogleMaps-scroll-enabled');
        });
    });
})(jQuery);