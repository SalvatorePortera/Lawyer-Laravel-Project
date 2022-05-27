"use strict";

$.typeahead({
    input: '.liveSearch',
    minLength: 1,
    maxItem: 0,
    order: "asc",
    hint: true,
    maxItemPerGroup: 5,
    dropdownFilter: "all",
    href: SET_DOMAIN +"/{{route}}",
    display: "name",
    template: function (query, item) {
         return '<span class="row">{{name}}</span>';
    },
    source:{ 
        ajax: [{
            type: "POST",
            url: SET_DOMAIN + '/' + 'search',
            data: {'_token': $('meta[name="csrf-token"]').attr('content'),'search':"{{query}}"}
        }]
    }
});