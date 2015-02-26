jQuery(document).ready(function() {

    var $collectionHolder = $('ul.images');
    var $collectionImage = $('.small-block-grid-6');
    var $formDiv = $('form > div');
    var $formSelect = $('form select');
    var val = $formSelect.val();

    if ($collectionHolder.length != 0) {

        $collectionHolder.data('index', $collectionHolder.find('li').length);
        addImageForm($('.imageHeader'));

        for (var i = 0; i < 6; i++ ) {
            addImageForm($collectionHolder);
        }

        changePortfolioType(val);

    }

    if ($collectionImage.length != 0) {
        changePortfolioType(val);
    }

    function addImageForm($collection) {

        var prototype = $('form').data('prototype');
        var index = $collection.data('index') + 1;
        var newForm = prototype.replace(/__name__/g, index);
        $collection.data('index', index);

        var $newFormLi;
        if ($collection == $collectionHolder) {
            $newFormLi = $('<li class="large-4 columns">Image '+index+'</li>').append(newForm);
        } else {
            $newFormLi = newForm;
        }

        $collection.append($newFormLi);
    }

    function changePortfolioType($type) {

        var $newForm = $('form .'+$type);

        $formDiv.hide();
        $newForm.show();

    }

   $formSelect.change(function () {

        var val = $(this).val();
        changePortfolioType(val);

    });

});