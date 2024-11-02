<?php 

class Ajax{
    public function __construct(){
        add_action('wp_ajax_sspp_save_settings_post', array($this, 'sspp_save_settings_ajax_callback'));
        add_action('wp_ajax_sspp_show_settings_on_load', array($this, 'sspp_show_settings_ajax_callback'));
    }


    public function sspp_save_settings_ajax_callback() {
        check_ajax_referer('sspp-save-settings');
    
        
        $is_enable = isset($_POST['sspp_enable_disable']) ? sanitize_text_field(wp_unslash($_POST['sspp_enable_disable'])) : '';
        $selected_template = isset($_POST['sspp_select_template']) ? sanitize_text_field(wp_unslash($_POST['sspp_select_template'])) : '';
    
        
        update_option('sspp_enable_disable', $is_enable, true);
        update_option('sspp_select_template', $selected_template, true);
    
        wp_send_json_success([
            'success' => true,
            'message' => 'save settings successfully'
        ]);
    }

    public function sspp_show_settings_ajax_callback(){

        // data 
        $default = [
            'is_enable' => get_option('sspp_enable_disable', true),
            'selected_template' => get_option('sspp_select_template', true)
        ];

        wp_send_json(['success' => true, 'data' => $default]);
    }
    
}