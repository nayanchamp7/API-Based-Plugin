/**
 * Awesome Users Admin JS
 *
 * Copyright (c) 2019 Awesome Motive
 * Licensed under the GPLv2+ license.
 */
jQuery(document).ready(function ($) {
    'use strict';

    $.abp_js = {
        ajax_url: '',
        execute: true,
        init: function () {
            //assign ajax url
            this.ajax_url = abp_js_data.ajaxurl;

            //events
            //$(document).on('click', '', this.eventCallUp);

            //methods
            let getLocalData = localStorage.getItem('awesomeUsers');
            if( null === getLocalData ) {
                this.getUsers();
            } else {
                getLocalData = JSON.parse(getLocalData);
                this.createList(getLocalData.data);
            }

        },

        createList: function(data) {
            let headers = data.data.headers;
            let users = data.data.rows;
            jQuery.each(headers, function(index, item) {
                let header_items = $('<th>').attr({
                    scope: 'col',
                    id: 'event',
                    class: 'manage-column column-event column-primary',
                }).text(item);

                header_items.appendTo('.abp-wrapper table thead tr');
                header_items.clone().appendTo('.abp-wrapper table tfoot tr');
            });
            jQuery.each(users, function(index, item) {
                let user_item_td = $('<td>').attr({
                    scope: 'col',
                    id: 'event',
                    class: 'manage-column column-event column-primary',
                });

                let row = $('<tr>');

                user_item_td.text(item['id']).appendTo(row);
                user_item_td.clone().text(item['fname']).appendTo(row);
                user_item_td.clone().text(item['lname']).appendTo(row);
                user_item_td.clone().text(item['email']).appendTo(row);
                user_item_td.clone().text(item['date']).appendTo(row);

                $('.abp-wrapper table tbody').append(row);
            });
        },

        getUsers: function() {
            $.get( "https://miusage.com/v1/challenge/1/", function( data, status ) {
                if( "success" === status ) {
                    $.abp_js.execute = false;
                    let localData = {};
                    localData.execute = $.abp_js.execute;
                    localData.last_execution_time = new Date();
                    localData.data = data;
                    localStorage.setItem('awesomeUsers', JSON.stringify(localData));
                    $.abp_js.createList(data);
                }
            });
        },


    };

    $.abp_js.init();
});