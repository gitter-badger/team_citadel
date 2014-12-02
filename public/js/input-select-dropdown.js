$( document ).ready( function(){

    // $('#cardresults').on('keyup', function(){

    //         $.ajax({
    //             url: "/decks/find/addCard",
    //             dataType: "json",
    //             data: {
    //                 term : $("#cardresults").val(),
    //                 series : $("#seriesdata").val()
    //               },

    //             success: function(data) {
    //                 $.map( data, function( card ) {
    //                     console.log(card.name);
    //                     console.log(card.id)
    //                 });
    //             }
    //         });
    //  });
    //

    $("#typeahead").typeahead(function() {
        source: ["YouTube", "Facebook", "Google"]
    });
});