
define([
    'jquery',
    "mage/adminhtml/events",
    "mage/adminhtml/wysiwyg/tiny_mce/setup"
], function ($) {
    'use strict';

    $.widget('geexu.mpBlogPostAction', {
            options: {},
            _create: function () {
                var self = this;

                $('button.mpblog-action-new').on('click', function () {
                    self._AddNew();
                });
            },
            _AddNew: function () {
                var form      = $('#mp_blog_post_form'),
                    formData  = new FormData(form[0]),
                    htmlPopup = $('#mp-blog-new-post-popup'),
                    url       = form.attr('action');

                $.ajax({
                    url: url,
                    type: "post",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    showLoader: true,
                    success: function (result) {
                        htmlPopup.data('mageModal').closeModal();
                        if (result.status === 1) {
                            setTimeout(function () {
                                location.reload();
                            }, 500);
                        }
                    }
                });
            }
        }
    );

    return $.geexu.mpBlogPostAction;
});
