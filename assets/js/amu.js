/**
 * Awesome Users Admin JS
 *
 * Copyright (c) 2019 Awesome Motive
 * Licensed under the GPLv2+ license.
 */
jQuery(document).ready(function ($) {
    'use strict';

    $.amu_js = {
        init: function () {
            //events
            $(document).on('click', '.amu-button', this.refreshData);

            // get difference time between last execution time and current time in hour
            let time_diff = this.getTimeDiff();

            //methods
            let getLocalData = localStorage.getItem('awesomeUsers');
            if( null === getLocalData || ( time_diff > 1 ) ) {
                this.getUsers();
            } else {
                getLocalData = JSON.parse(getLocalData);
                this.createList(getLocalData.data);
            }

        },

        getTimeDiff: function () {
            let final_hour = 0;
            let local_data = localStorage.getItem('awesomeUsers');
            if( null !== local_data ) {
                local_data = JSON.parse(local_data);
                let last_time = local_data.last_execution_time;
                let now = new Date().getTime();

                let diff_time = '';
                if (last_time < now) {
                    diff_time = now - last_time;
                }else{
                    diff_time = last_time - now;
                }

                let date_diff = new Date(diff_time);
                final_hour = date_diff.getHours() - 5;
            }

            return final_hour;
        },

        createList: function(data) {

            //clean dom
            $('.amu-wrapper table thead tr').html('');
            $('.amu-wrapper table tfoot tr').html('');
            $('.amu-wrapper table tbody').html('');

            let headers = data.data.headers;
            let users = data.data.rows;

            jQuery.each(headers, function(index, item) {
                let header_items = $('<th>').attr({
                    scope: 'col',
                    id: 'event',
                    class: 'manage-column column-event column-primary',
                }).text(item);

                header_items.appendTo('.amu-wrapper table thead tr');
                header_items.clone().appendTo('.amu-wrapper table tfoot tr');
            });

            jQuery.each(users, function(index, item) {
                let user_item_td = $('<td>').attr({
                    scope: 'col',
                    id: 'event',
                    class: 'manage-column column-event column-primary',
                });

                let row = $('<tr>');

                let date = new Date(item['date']);
                    let new_date = new Date(date);
                let new_time = new_date.toLocaleString();
                    date = item['date'];

                user_item_td.text(item['id']).appendTo(row);
                user_item_td.clone().text(item['fname']).appendTo(row);
                user_item_td.clone().text(item['lname']).appendTo(row);
                user_item_td.clone().text(item['email']).appendTo(row);
                user_item_td.clone().text(date).appendTo(row);

                $('.amu-wrapper table tbody').append(row);
            });
        },

        getUsers: function() {
            //load spinner
            $('.amu-wrapper table').prepend('<div class="amu-spinner"><div class="amu-spinner-content"><span class="amu-spinner-img"></span> Loading Data...</div></div>');

            //api call to get users
            $.get( "https://miusage.com/v1/challenge/1/", function( data, status ) {
                if( "success" === status ) {
                    $.amu_js.execute = false;
                    let localData = {};
                    localData.last_execution_time = new Date().getTime();
                    localData.data = data;
                    localStorage.setItem('awesomeUsers', JSON.stringify(localData));
                    $.amu_js.createList(data);
                    $('.amu-spinner').remove();
                }
            });
        },

        refreshData: function(e) {
            e.preventDefault();

            //refresh and get users
            $.amu_js.getUsers();
        }
    };

    // expose to the global scope
    window.amu_js = $.amu_js;

    //init main js
    $.amu_js.init();
});