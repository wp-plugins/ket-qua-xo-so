jQuery(document).ajaxSuccess(function(e, xhr, settings) {
    var widget_id_base = 'xoso';
    if(settings.data.search('action=save-widget') != -1 && settings.data.search('id_base=' + widget_id_base) != -1) {
        if(settings.data.search('add_new=multi') == -1)
            location.reload();
    }
}); 