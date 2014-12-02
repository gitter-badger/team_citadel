$( document ).ready( function(){


    $('#search-cards').on('click', function(event) {
        var series = $('#seriesdata').val();
        var dataList = document.getElementById('json-datalist');
        var input = document.getElementById('ajax');

        // Create a new XMLHttpRequest.
        var request = new XMLHttpRequest();

        $.ajax({
            type: "get",
            url: "/decks/find/addCard",
            data:'series=' + series,
            success: function (data) {
                if(data.length > 0){
                    $('#carddata').empty();
                    var jsonOptions = JSON.parse(data);
                    jsonOptions.forEach(function(item) {
                        // Create a new <option> element.
                        var option = document.createElement('option');
                        // Set the value using the item in the JSON array.
                        option.value = item;
                        // Add the <option> element to the <datalist>.
                        dataList.appendChild(option);
                    });
                    // Update the placeholder text.
                    input.placeholder = "e.g. datalist";
                } else {
                    $('#carddata').empty();
                    // An error occured :(
                    input.placeholder = "Couldn't load datalist options :(";
                }
            }
        });
      });

// Handle state changes for the request.
request.onreadystatechange = function(response) {
  if (request.readyState === 4) {
    if (request.status === 200) {
      // Parse the JSON


      // Loop over the JSON array.
      jsonOptions.forEach(function(item) {
        // Create a new <option> element.
        var option = document.createElement('option');
        // Set the value using the item in the JSON array.
        option.value = item;
        // Add the <option> element to the <datalist>.
        dataList.appendChild(option);
      });


    } else {
      // An error occured :(
      input.placeholder = "Couldn't load datalist options :(";
    }
  }
};

// Update the placeholder text.
input.placeholder = "Loading options...";

// Set up and make the request.
request.open('GET', 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/4621/html-elements.json', true);
request.send();

});