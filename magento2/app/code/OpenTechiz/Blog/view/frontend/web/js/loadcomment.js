define([
    "jquery",
    "mage/template",
    "mage/translate",
    "domReady!"
], function($, mageTemplate) {
    "use strict";

        return {
            loadComments : function(config, data_comment){
                var template = mageTemplate('#blog-comment-abc');

                var comments = data_comment;
                console.log(comments);
                var newField = template({
                    cmt: {
                        author: data_comment['author'],
                        content: data_comment['content']
                    }
                });
                console.log(newField);
                $('ul#data').append(newField);
            }
        };
});