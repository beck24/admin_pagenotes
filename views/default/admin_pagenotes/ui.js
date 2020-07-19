define(['jquery', 'elgg/Ajax', 'elgg/spinner'], function($, Ajax, spinner) {
    var ajax = new Ajax();
    
    $(document).on('click', 'a.admin-pagenotes', function() {
        $('.admin-pagenotes-wrapper').addClass('visible');

        var url = $('form.elgg-form-admin-pagenotes-edit .admin-pagenotes-url-input').val();

        ajax.view('admin_pagenotes/notes_list', {
            data: {
                url: url
            },
            beforeSend: spinner.start,
            complete: spinner.stop,
        }).done(function(output, statusText, jqXHR) {
            $('.admin-pagenotes-list').html(output);
        });
    });

    $(document).on('click', 'a.admin-pagenotes-close', function() {
        $('.admin-pagenotes-wrapper').removeClass('visible');

        $('.admin-pagenotes-list').html('');
    });

    $(document).on('submit', 'form.elgg-form-admin-pagenotes-edit', function(e) {
        e.preventDefault();

        var $form = $('form.elgg-form-admin-pagenotes-edit');

        var formData = $form.serializeArray();

        var results = {};
        formData.forEach(function(v) {
            results[v.name] = v.value;
        });

        console.log(results);

        ajax.action('admin_pagenotes/edit', {
            data: results
        }).done(function(output, statusText, jqXHR) {
            if (jqXHR.AjaxData.status == -1) {
                return;
            }

            $('.admin-pagenotes-list').html(output);
        });
    });
});