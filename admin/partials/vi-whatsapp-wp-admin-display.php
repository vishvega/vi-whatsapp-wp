<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://github.com/vishvega/vi-whatsapp-wp
 * @since      1.0.0
 *
 * @package    Vi_Whatsapp_WP
 * @subpackage Vi_Whatsapp_WP/admin/partials
 */
?>
<?php include_once 'vi-whatsapp-wp-admin-assets.php'; ?>


<?php 
// Vars
$txt_domain = "vi-whatsapp-wp";
?>
<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="whatsapp_for_wordpress_vi-admin wrap">
    <div class="whatsapp_for_wordpress_vi-admin-inner">

        <div class="whatsapp_for_wordpress_vi-admin-title wrap">
            <h1>
                <!-- <span><?php //echo get_assets("dashboard_icon"); ?></span> -->
                <?php esc_html_e( get_admin_page_title(), $txt_domain ); ?>
            </h1>
        </div>

        <?php // Admin main contents ?>
        <div class="whatsapp_for_wordpress_vi-admin-main">
            <div class="whatsapp_for_wordpress_vi-admin-main-inner card card_full">
                <div class="whatsapp_for_wordpress_vi-admin-main-config-basic whatsapp_for_wordpress_vi-admin-accord-wrap">
                    <div class="whatsapp_for_wordpress_vi-admin-main-config-basic-head">
                        <a class="whatsapp_for_wordpress_vi-admin-accord-head" href="javascript:void(0)">Basic Settings</a>
                    </div>
                    <div class="whatsapp_for_wordpress_vi-admin-main-config-basic-body whatsapp_for_wordpress_vi-admin-accord-body">
                        <?php // Basoc Config Form ?>
                        <div class="whatsapp_for_wordpress_vi-admin-main-config-basic-body-form">
                            <form 
                                action="options.php" 
                                method="post"
                                class=""
                                id="<?php echo "form_".$this->option_name . '_general' ?>">
                                    <?php 
                                        settings_fields( $this->option_name . '_general' ); // Settings group name
                                        do_settings_sections( $this->plugin_name ); // page slug
                                        submit_button(); //Save changes button
                                    ?>
                            </form>
                        </div>

                        <?php // Basic Config Quick look panel ?>
                        <div class="whatsapp_for_wordpress_vi-admin-main-config-basic-body-qlook">
                            <div class="whatsapp_for_wordpress_vi-admin-main-config-basic-body-qlook-logo">
                                <img src="<?php echo esc_url( trailingslashit(plugin_dir_url( __DIR__ ))."images/whatsapp-for-wp-vi-logo-transparent.png" ) ?>" alt="<?php echo $this->plugin_name ?>">
                            </div>
                            <div class="whatsapp_for_wordpress_vi-admin-main-config-basic-body-qlook-in">
                                <h2>Whatsapp for WordPress</h2>
                            </div>
                        </div>


                        


                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="whatsapp_for_wordpress_vi-admin-logger">
    <div class="logger">
        <?php // Settings Logger ?>
            <pre>
                <?php 
                    $settingsErrors = get_settings_errors();
                    print_r($settingsErrors);
                ?>
            </pre>

            <pre>
                <span>post count</span>
                <p>
                    <span>
                        <?php echo( "_contact_num : ".get_option( $this->option_name . '_contact_num' ) ) ?>
                    </span>
                    <span>
                        <?php echo( "_frontview : ".get_option( $this->option_name . '_frontview' ) ) ?>
                    </span>
                </p>
            </pre>

            <pre>
                <?php print_r($this) ?>
            </pre>
    </div>
</div>



<?php /* 

<div class="whatsapp_for_wordpress_vi-admin wrap">
    <div class="whatsapp_for_wordpress_vi-admin-inner">

        <div class="whatsapp_for_wordpress_vi-admin-title wrap">
            <h1>
                <!-- <span><?php //echo get_assets("dashboard_icon"); ?></span> -->
                <?php esc_html_e( get_admin_page_title(), 'Whatsapp_For_Wordpress_Vi' ); ?>
            </h1>
        </div>

        <div class="whatsapp_for_wordpress_vi-admin-main">
            <?php //Temp ?>
            <div class="whatsapp_for_wordpress_vi-admin-main-temp card hide_this">
                <h2 class="title">Categories and Tags Converter</h2>
                <p> If you want to convert your categories to tags (or vice versa), use the <a href="import.php">Categories and Tags Converter</a> available from the Import screen.</p>
            </div>

            <div class="whatsapp_for_wordpress_vi-admin-main-basicsettings card card_full">
                <h2 class="title">Basic Settings</h2>
                <div class="whatsapp_for_wordpress_vi-admin-main-basicsettings-form">
                    <form 
                        action="options.php" 
                        method="post"
                        class=""
                        id="<?php echo "form_".$this->option_name . '_general' ?>">
                            <?php 
                                settings_fields( $this->option_name . '_general' ); // Settings group name
                                do_settings_sections( $this->plugin_name ); // page slug
                                submit_button(); //Save changes button
                            ?>
                    </form>

                </div>
            </div>


            <div class="logger">
                <?php // Settings Logger ?>
                    <pre>
                        <?php 
                            $settingsErrors = get_settings_errors();
                            print_r($settingsErrors);
                        ?>
                    </pre>

                    <pre>
                        <span>post count</span>
                        <p>
                            <span>
                                <?php echo( "_contact_num : ".get_option( $this->option_name . '_contact_num' ) ) ?>
                            </span>
                            <span>
                                <?php echo( "_frontview : ".get_option( $this->option_name . '_frontview' ) ) ?>
                            </span>
                        </p>
                    </pre>

                    <pre>
                        <?php print_r($this) ?>
                    </pre>
            </div>

        </div>
    </div>
</div>
*/ ?>
