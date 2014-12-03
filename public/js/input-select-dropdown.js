$(document).ready(function(){
        $('#searchbox').selectize({
            valueField: 'url',
            labelField: 'name',
            searchField: ['name'],
            maxOptions: 10,
            options: [],
            create: false,


        });
    });