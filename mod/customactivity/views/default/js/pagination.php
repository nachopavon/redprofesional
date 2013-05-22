elgg.provide('elgg.pagination');

elgg.pagination.init = $(document).ready(function() {
    $('a[data-pagination]').live('click', function(event) {
        var element = $(this);
        var wrapper_element = element.parents('.wmpPaginatorWrapper');   
        var hidden_paginator = $(wrapper_element,'.wmpHiddenPaginator');
        var next_item = hidden_paginator.find('.elgg-state-selected').next('li').not('.elgg-state-disabled');
        if (next_item.length == 0) {
            return false;
        }
        wrapper_element.find('.wmpAjaxLoader.hidden').removeClass('hidden');
        element.hide();
        var next_link = $('a', next_item);
        var next_url = next_link.attr('href');
        $.ajax({
            url: next_url,
            success: function(html_data){
                var listing = $(html_data).find('.elgg-list-entity:first');
				var gallery = $(html_data).find('.elgg-gallery:first');
				var river = $(html_data).find('.elgg-list-river:first');
                var new_pager = $(html_data).find('.wmpPaginatorWrapper');
                if (listing.length > 0) {
                    $(wrapper_element).prev('.elgg-layout .elgg-list-entity').append(listing.children());
                }    
				 if (gallery.length > 0) {
                    $(wrapper_element).prev('.elgg-layout .elgg-gallery').append(gallery.children());
                }    
				if (river.length > 0) {
                    $(wrapper_element).prev('.elgg-layout .elgg-list-river').append(river.children());
                }  
                if (new_pager.length > 0) {
                    var new_hidden_paginator = new_pager.find('.elgg-state-selected').next('li').not('.elgg-state-disabled');
                    if (new_hidden_paginator.length == 0) {
                        $('.wmpPaginatorWrapper').remove();
                    } else {
                        $('.wmpPaginatorWrapper').replaceWith(new_pager);
                    }
                } else {
                    $('.wmpPaginatorWrapper').remove();
                }
            }
        });
    });
});
elgg.register_hook_handler('init', 'system', elgg.pagination.init);