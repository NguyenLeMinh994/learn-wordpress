<?php
/**
 * Plugin Name: Word Count Settings
 * Plugin URL: https://www.google.com/
 * Description: _>.
 * Version: 1.0.0
 * Author: kurosama
 */
if(!class_exists('WordCountSettings')){
    class WordCountSettings {
        function __construct(){
            add_action('admin_menu',array($this,'adminPage'));
            add_action('admin_init',array($this,'settings'));
            add_filter('the_content',array($this,'ifWrap'));
        }

        function ifWrap($content){
            if((is_main_query() && is_single()) || (get_option('wcp_wordcount','1') || get_option('wcp_charactercount','1') || get_option('wcp_realtime','1'))){
                return $this->createHTML($content);
            }

            return $content;
        }

        function createHTML($content){
            $wordCounts ='';
            $html = "<h3>".get_option('wcp_headline','Post Statistic')."</h3><p>";

            if(get_option('wcp_wordcount','1') || get_option('wcp_realtime','1')){
                $wordCounts = str_word_count(strip_tags($content));
            }

            if(get_option('wcp_wordcount','1')){
                $html.="This post has {$wordCounts} words.<br>";
            }

            if(get_option('wcp_charactercount','1')){
                $characterCount = strlen(strip_tags($content));
                $html.="This post has {$characterCount} characters.<br>";
            }

            if(get_option('wcp_realtime','1')){
                $minutes = round($wordCounts/225);
                $html.="This post will take about {$minutes} minute(s) to read.<br>";
            }

            $html.="</p>";
            if(get_option('wcp_location','0') == '0'){
                return $html.$content;
            }
            return $content.$html;
        }

        function settings(){
            add_settings_section( 'wcp_first_section',null,null,'word-count-settings');

            // Display Location
            add_settings_field('wcp_location', 'Display Location',array($this,'locationHTML'),'word-count-settings',"wcp_first_section");
            register_setting("wordcountplugin","wcp_location",array(
                'sanitize_callback' => [$this,'sanitizeLocation'],
                'default' => '0'));

            // Headline Text
            add_settings_field('wcp_headline', 'Headline Text',array($this,'headlineHTML'),'word-count-settings',"wcp_first_section");
            register_setting("wordcountplugin","wcp_headline",array(
                'sanitize_callback' => 'sanitize_text_field',
                'default' => 'Post Statistic'));
            
            // Word Count
            add_settings_field('wcp_wordcount', 'Word Count',array($this,'wordcountHTML'),'word-count-settings',"wcp_first_section");
            register_setting("wordcountplugin","wcp_wordcount",array(
                'sanitize_callback' => 'sanitize_text_field',
                'default' => '1'));

            // Character Count
            add_settings_field('wcp_charactercount', 'Character Count',array($this,'charactercountHTML'),'word-count-settings',"wcp_first_section");
            register_setting("wordcountplugin","wcp_charactercount",array(
                'sanitize_callback' => 'sanitize_text_field',
                'default' => '1'));

            // Real time
            add_settings_field('wcp_realtime', 'Real time',array($this,'realtimeHTML'),'word-count-settings',"wcp_first_section");
            register_setting("wordcountplugin","wcp_realtime",array(
                'sanitize_callback' => 'sanitize_text_field',
                'default' => '1'));
        }

        function sanitizeLocation($input){
            if($input !=1 && $input !=0){
                add_settings_error('wcp_location','wcp_location_error','Display Location have to be Beginning or End');
                return get_option('wcp_location');
            }
            return $input;
        }

        function realtimeHTML(){
            ?>
              <input type="checkbox" name="wcp_realtime" value="1" <?php checked(get_option('wcp_realtime'),'1') ?>/>
            <?php
        }

        function charactercountHTML(){
            ?>
              <input type="checkbox" name="wcp_charactercount" value="1" <?php checked(get_option('wcp_charactercount'),'1') ?>/>
            <?php
        }
        function wordcountHTML(){
            ?>
              <input type="checkbox" name="wcp_wordcount" value="1" <?php checked(get_option('wcp_wordcount'),'1') ?>/>
            <?php
        }

        function headlineHTML(){
            ?>
              <input type="text" name="wcp_headline" value="<?php echo get_option('wcp_headline') ?>" />
            <?php
        }
        function locationHTML(){
            ?>
                <select name="wcp_location">
                    <option value="0" <?php selected(get_option('wcp_location'),'0');?>>Beginning of post </option>
                    <option value="1" <?php selected(get_option('wcp_location'),'1');?>>End of post</option>
                </select>
            <?php
        }

        function adminPage(){
            add_options_page( "Word Count Settings", "Word Count", "manage_options","word-count-settings",array($this,"ourHTML"));
        }


        function ourHTML(){
            ?>
            <div class="wrap">
                <h1>Word Count Settings </h1>
                <form action="options.php" method="POST">
                    <?php 
                    settings_fields('wordcountplugin');
                    do_settings_sections('word-count-settings'); 
                    submit_button();
                    ?>
                    
                </form>
            </div>
            <?php
        }
    }

    $wordCountSettings = new WordCountSettings();
}


