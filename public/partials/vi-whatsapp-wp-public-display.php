<?php

/**
 * Provide a public-facing view for the plugin
 *
 * This file is used to markup the public-facing aspects of the plugin.
 *
 * @link       https://github.com/vishvega/vi-whatsapp-wp
 * @since      1.0.0
 *
 * @package    Vi_Whatsapp_WP
 * @subpackage Vi_Whatsapp_WP/public/partials
 */
?>

<?php include_once "svg_sprites.php" ?>

<?php // Saved Options / Preferences ?>
<?php 
$whatsapp_number    = get_option( $this->option_name . '_contact_num' );  
$view_as            = get_option( $this->option_name . '_frontview' );  

// View as sub options
// 1. Show effect pulse on whatsapp icon
$show_effects_pulse = 1;
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<?php // isa NOT admin NOR login/register page ?>
<?php if ( 
        !is_admin() && 
        !($GLOBALS['pagenow'] === 'wp-login.php' && ! empty( $_REQUEST['action'] ) && $_REQUEST['action'] === 'register') &&
        !( $GLOBALS['pagenow'] === 'wp-login.php' )
    ) : ?>
<?php //if(1): ?>
 
    <!-- current_user_can( 'manage_options' ) -->
<?php //Publicly rendered Widget ?>


<div class="whatsapp_for_wordpress_vi-public" lol="<?php echo $whatsapp_number  ?>" >

<?php // 1. Basic widget ?>

    <?php if( $view_as == 1 ): ?>
    <div class="whatsapp_for_wordpress_vi-public-basic <?php echo ($show_effects_pulse == 1) ? "effects_pulse" : "" ?> " >
        <a 
            href="https://api.whatsapp.com/send?phone=+94777777777&amp;text=Hello YourCompany!" 
            target="_blank" 
            class="wa-float-btn" 
            rel="noreferrer noopener">
                <img 
                    src="<?php echo esc_url( trailingslashit(plugin_dir_url( __DIR__ ))."images/whatsapp.svg" ) ?>" 
                    alt="Connect via Whatsapp">
        </a>
    </div>
    <?php endif; ?>

</div>

<?php // 2. A popup widget with Agent info, Button to start the chat and initial greeting message. No user input is available on this.  ?>

    <?php if( $view_as == 2 ): ?>
    <div class="whatsapp_for_wordpress_vi-public-basepop">
        <div class="whatsapp_for_wordpress_vi-public-basepop-btn">
            <a 
                href="javascript:void(0)"
                id="whatsapp_for_wordpress_vi-public-basepop-btn"
                class="wa-float-btn" 
                rel="noreferrer noopener">
                    <img
                        class="whatsapp_for_wordpress_vi-public-basepop-btn-deficon" 
                        src="<?php echo esc_url( trailingslashit(plugin_dir_url( __DIR__ ))."images/whatsapp.svg" ) ?>" 
                        alt="Connect via Whatsapp">
                    <img
                        class="whatsapp_for_wordpress_vi-public-basepop-btn-openicon" 
                        src="<?php echo esc_url( trailingslashit(plugin_dir_url( __DIR__ ))."images/btn_activated.png" ) ?>" 
                        alt="Connect via Whatsapp">
                    <span>Need Help?</span>
            </a>
        </div>
        <div class="whatsapp_for_wordpress_vi-public-basepop-inner">
            <div class="whatsapp_for_wordpress_vi-public-basepop-view">
                <div class="whatsapp_for_wordpress_vi-public-basepop-view-headr">
                    <div class="whatsapp_for_wordpress_vi-public-basepop-view-headr-agentimg">
                        <img 
                            src="<?php echo esc_url( trailingslashit(plugin_dir_url( __DIR__ ))."images/agent.jpg" ) ?>" 
                            alt="agent">
                    </div>
                    <div class="whatsapp_for_wordpress_vi-public-basepop-view-headr-agentname">
                        Donna Myers
                    </div>
                </div>
                <div 
                    class="whatsapp_for_wordpress_vi-public-basepop-view-body"
                    style="background-image:url(<?php echo esc_url( trailingslashit(plugin_dir_url( __DIR__ ))."images/chat_window_bg.jpg" ) ?>)">
                    <div class="whatsapp_for_wordpress_vi-public-basepop-view-body-inner">
                        <div class="whatsapp_for_wordpress_vi-public-basepop-view-body-greet">
                            <div class="whatsapp_for_wordpress_vi-public-basepop-view-body-greet-txt">
                                <span class="whatsapp_for_wordpress_vi-public-basepop-view-body-greet-txt-agent">Donna</span>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores rem nulla quas soluta natus nemo aliquid qui, provident?</p>
                                <span class="time">16.44</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="whatsapp_for_wordpress_vi-public-basepop-view-footr">
                    <a 
                        href="https://api.whatsapp.com/send?phone=+94777777777&amp;text=Hello YourCompany!" 
                        target="_blank" 
                        class="wa-float-btn" 
                        rel="noreferrer noopener">
                        <img 
                            src="<?php echo esc_url( trailingslashit(plugin_dir_url( __DIR__ ))."images/whatsapp.svg" ) ?>" 
                            alt="Connect via Whatsapp">
                        <span>Start Chat</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if($view_as == 3): ?>
    <div class="whatsapp_for_wordpress_vi-public-intrcpop">
        interactive
    </div>
    <?php endif; ?>



<?php // 2. Advanced Widget with Agent info, initial greeting message and input  for visitor to type first message, then send button, and hide the widget on submit  ?>
<?php if( $view_as == 69 ): ?>
<div class="whatsapp_for_wordpress_vi-public <?php //echo ($view_as == 2) ? "" : "just_hide_this" ?> ">
    <div class="wa_float_advanced1">
        <div class="wa_float_advanced1-inner">
            <div class="wa_float_advanced1-agent-info">
                <div class="wa_float_advanced1-agent-info-actions">
                    <div class="wa_float_advanced1-agent-info-actions-btn">
                        <a href="#">
                            <svg class="icon">
                                <use xlink:href="#submenu"></use>
                            </svg>
                        </a>
                        <div class="wa_float_advanced1-agent-info-actions-btn-menu">
                            <ul>
                                <li>
                                    <a href="#" id="actions_fullwidth">
                                        <svg class="icon">
                                            <use xlink:href="#fullwidth"></use>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" id="actions_minus">
                                        <svg class="icon">
                                            <use xlink:href="#minus"></use>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" id="actions_close">
                                        <svg class="icon">
                                            <use xlink:href="#close"></use>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="wa_float_advanced1-agent-info-inner">
                    <div class="wa_float_advanced1-agent-info-picture">
                        <img src="<?php echo esc_url( trailingslashit(plugin_dir_url( __DIR__ ))."images/donna.jpg" ) ?>" alt="Agent">
                    </div>
                    <h5 class="wa_float_advanced1-agent-info-name">Donna Paulsen</h5>
                    <div class="wa_float_advanced1-agent-info-dept">
                        
                    </div>
                </div>
            </div>

            <div class="wa_float_advanced1-chatarea">
                
                <div class="wa_float_advanced1-chatarea-init-msg">
                    <div class="wa_float_advanced1-chatarea-init-msg-agent">
                        <figure class="wa_float_advanced1-chatarea-init-msg-agent-avatar">
                            <img src="<?php echo esc_url( trailingslashit(plugin_dir_url( __DIR__ ))."images/donna.jpg" ) ?>">
                        </figure>
                        <div class="wa_float_advanced1-chatarea-init-msg-agent-msg">
                            <span class="init_msg">Hi there, I'm Donna and how can I help you today?</span>
                            <span class="init_times">
                                <div class="init_times-timestamp">11:24 AM</div>
                                <div class="init_times-status">
                                    <div class="init_times-status-sent-delivered">✓</div>
                                    <div class="init_times-status-sent-read">✓</div>
                                </div>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="wa_float_advanced1-chatarea-replybox">
                    <textarea name="wa_float_chatarea-replybox" id="wa_float_chatarea-replybox"></textarea>
                    <a href="" class="send_btn">Send</a>
                </div>
            </div>
        </div>
    </div>

</div>

<?php endif; ?>





<?php // isa NOT dmin ?>
<?php endif ?>