<div class="amu-wrapper" id="amu-wrapper">
    <div class="amu-header">
        <?php echo sprintf('<h1>%s</h1>', __('Awesome Users', 'awesome-users')); ?>
    </div>
    <div id="wp-body">
        <div id="wpbody-content">
            <div class="amu-links">
                <?php echo sprintf('<a href="#" class="amu-button">%s</a>', __('Refresh', 'awesome-users')); ?>
            </div>
            <table class="wp-list-table widefat fixed striped table-view-list events">
                <thead>
                    <tr></tr>
                </thead>

                <tbody id="the-list" data-wp-lists="list:event"></tbody>

                <tfoot>
                    <tr></tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>