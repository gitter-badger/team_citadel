$(function() {
    var req = null;
    var oldSearch = '';
    $('#search-bar').on("keyup", function(e) {
        if ($(!'.search-dropdown-menu').children()) {
            $('.search-dropdown-menu').hide()
        };
        var str = $(e.target);
        var searchValue = $('form').serialize();
        // thing that emmited the event
        var $this = $(this);
        var newSearch = $this.val();
        if (newSearch != oldSearch) {
            $('.search-dropdown-menu').empty();
            oldSearch = newSearch;
            if ($this.val() != '') {
                // abort previous request
                if (req != null) {
                    req.abort()
                };
                // ajax for sending form inputs to the quicksearch route
                req = $.get('/quicksearch/cards/', searchValue).done(function( data ) {
                    for (var i = 0; i < data.length; i++) {
                        if (i == 0) {
                            $('.search-dropdown-menu').append('<li role="presentation" class="dropdown-header">Card suggestions for ' + newSearch + '</li>');
                            $('.search-dropdown-menu').append('<li role="presentation" class="divider"></li>');
                        };
                        var id = data[i].id;
                        $('.search-dropdown-menu').append('<li>' + "<a href='/card/" + id + "'>" + "<img class='mini-search-img' src='" + "/images/cards/"  + id + ".jpeg'" + "'>"  +  data[i].name + "</a>" + '</li>');
                        if (i+1 != data.length) {
                            $('.search-dropdown-menu').append('<li role="presentation" class="divider"></li>');
                        };
                    }
                    if (data.length == 0) {
                        $('.search-dropdown-menu').hide();
                    } else {
                        $('.search-dropdown-menu').show();
                    }
                });
            }
            if ($this.val() == '') {
                $('.search-dropdown-menu').hide();
            };
        }
    });
});