$(document).ready(function() {
    var n_prev = {};
    
    var resize_item_containers = function(force) {
        $('.tiled-items-wrapper').each(function(e) {
            var $this = $(this);
            var w = $this.width();
            var iw = $this.data('item-minwidth');
            var n = Math.floor(w / iw);
            if (force === true || n_prev[iw] != n) {
                var items = $this.find('.tiled-item');
                $this.find('.tiled-items-row').remove();
                var k = 0;
                var row;
                
                for (var i = 0; i < items.length; i++, k++) {
                    if (k % n == 0) {
                        row = $('<div class="tiled-items-row"></div>');
                        $this.append(row);
                    }
                    row.append(items[i]);
                }
            }
            n_prev[iw] = n;
        });
    };
    
    resize_item_containers(true);
    
    $(window).resize(resize_item_containers);
});