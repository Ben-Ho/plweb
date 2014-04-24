Kwf.onElementReady('.form-field-tag-select', function(el) {
    var addNewTag = function () {
        var selectedTagsEl = el.child('.selected-tags');
        var value = el.child('.new-tag input').getValue();
        el.child('.new-tag input').dom.value = '';
        var tagTpl = new Ext.XTemplate(
            '<div class="tag selected">',
                '{name}',
                '<input type="hidden" name="XX_{normalizedName}" value="{name}"/>',
            '</div>'
        );
        tagTpl.insertFirst(selectedTagsEl, { name: value, normalizedName: value.replace(/[^\w]/gi, '') });
        var newEl = selectedTagsEl.first('.tag.selected');
        newEl.on('click', function (ev, el) {
            el.remove();
        });
    };

    el.child('.new-tag input').on('keydown', function (ev) {
        //FIXME filter tag
        if (ev.keyCode == 13) {
            addNewTag();
        }
    });
    el.child('.new-tag .add-button').on('click', function () {
        addNewTag();
    });

    el.child('.select-tags .tag-pool').select('.tag').each(function (el) {
        el.on('click', function (ev, el) {
            el = Ext.get(el);
            el.removeClass('not-selected');
            var tagId = el.dom.getAttribute('data-tag-id');
            var tagEl = el.parent('.form-field-tag-select').child('.selected-tags').child('.tag.'+tagId);
            tagEl.addClass('selected');
            tagEl.child('input').dom.value = 'true';
        });
    });

    el.child('.selected-tags').select('.tag').each(function (el) {
        el.on('click', function (ev, el) {
            el = Ext.get(el);
            el.removeClass('selected');
            el.child('input').dom.value = 'false';
            var tagId = el.child('input').dom.name.substr('tag_id_'.length);
            var tagEl = el.parent('.form-field-tag-select').child('.select-tags').child('.tag-pool').child('.tag.'+tagId);
            tagEl.addClass('not-selected');
        });
    });
});
