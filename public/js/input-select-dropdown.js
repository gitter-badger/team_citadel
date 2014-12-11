$(document).ready(function(){

    $('#searchbox').selectize({
        valueField: 'id', // value which you want to pass to the database
        labelField: 'name',
        searchField: ['name', 'serial_number'], // items used in the search field
        maxOptions: 1000,
        options: [],
        create: false,
        render: {
            option: function(item) {
                var searchHTML = '<div class="row">'+
                            '<div class="col-md-12">'+
                                '<span class=name>'  +
                                    item.name +
                                '</span>' +
                            '</div>' +

                            '<div class="col-md-12 search-subtext">'+
                                '<span>'  +
                                    "series: " + item.series.name +
                                '</span>'+
                                '<span class="serial_number search-subtext"> - '+
                                    item.serial_number +
                                '</span>' +
                            '</div>'+
                        '</div>';

                return searchHTML;
            }
        },
        optgroups: [
            {value: 'serial_number', label: 'serial_number'}
        ],
        optgroupField: 'class',
        load: function(query, callback) {
            if (!query.length) return callback();
            // for the first two letters perform an ajax request
            // after which it will use the cached data
            if (query.length <= 2){
                $.ajax({
                    url: '/decks/getcards',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        term: query,
                        game: $('#searchbox').data('id')
                    },
                    error: function() {
                        callback();
                    },
                    success: function(result) {
                        callback(result.data);
                    }
                });
            }

            //if no results from whats typed check the database again
            if (!$('.selectize-dropdown-content').children().length){
                $.ajax({
                    url: '/decks/getcards',
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        term: query,
                        game: $('#searchbox').data('id')
                    },
                    error: function() {
                        callback();
                    },
                    success: function(result) {
                        callback(result.data);
                    }
                });
            }
        },
        onChange: function(){
            $('.selectize-dropdown-content').empty();
        },
    });

    $('div.img-wrap-decks').on('click', function () {
        $.ajax({
                url: '/decks/dropcard',
                type: 'get',
                data: 'card=' + $(this).data('card') + '&deck=' + $(this).data('deck'),
                succes:
                    window.location.reload()
            });
    });
});