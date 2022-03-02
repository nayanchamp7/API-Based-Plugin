<?php
/**
 * CLI class
 *
 * @class    CLI
 * @version  1.0.0
 */

namespace AMU\Library;

/**
 * CLI class.
 */
class CLI {
    /**
     * Constructor.
     */
    public function __construct() {
        add_action( 'admin_footer', array( $this, 'amu_run_footer' ) );
    }

    /**
     * Run footer
     */
    public function amu_run_footer() {
        ?>
        <script type="text/javascript">
            //refresh and get users data
            window.amu_js.getUsers();
        </script>
        <?php
    }
}