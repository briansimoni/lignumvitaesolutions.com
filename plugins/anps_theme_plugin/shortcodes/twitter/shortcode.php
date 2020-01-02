<?php
if(!function_exists('anps_twitter_func')) {
    function anps_twitter_func($atts, $content) {
        extract( shortcode_atts( array(
                    'title' => '',
                    'color' => '',
                    'slug' => '',
                    'title_color' => '#000000',
                    'text_color' => '#7f7f7f',
                    'tw_number' => '3'
            ), $atts ) );

        $tw_number = intval($tw_number);
        if ( $tw_number <= 0 ) {
            $tw_number = 3;
        }
        if ( $tw_number > 20 ) {
            $tw_number = 20;
        }

       include_once WP_PLUGIN_DIR . '/anps_theme_plugin/twitter/TwitterAPIExchange.php';
        $settings = array(
            'oauth_access_token' => "1485322933-oo8YU1ZTz5E4Zt92hTTbCdJoZxIJIabghjnsPkX",
            'oauth_access_token_secret' => "RfXHN2OXMkBYp3IaEqrBmPhUYR2N61P8pyHf8QXqM",
            'consumer_key' => "Zr397FLlTFM4RVBsoLVgA",
            'consumer_secret' => "3Z2wNAG2vvunam2mfJATxnJcThnqw1qu02Xy8QlqFI"
        );
        $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
        $getfield = '?screen_name=' . $content . '&count=' . $tw_number;
        $requestMethod = 'GET';
        $twitter = new TwitterAPIExchange($settings);
        $tweets = json_decode($twitter->setGetfield($getfield)
                     ->buildOauth($url, $requestMethod)
                     ->performRequest());
        $return = '<section class="carousel anps-twitter text-center" >';
        if ($title != '') {
            $return .= '<h2 class="title" style="color:' . $title_color .'">'.$title.'</h2>';
        }
        $return .= '<div class="owl-carousel">';
        $j=0;
        foreach( $tweets as $tweet ) {
            if($j=="0") {
                $class_active = ' active';
            } else {
                $class_active = '';
            }
            $tweet_text = $tweet->text;
            $tweet_text = preg_replace('/http:\/\/([a-z0-9_\.\-\+\&\!\#\~\/\,]+)/i', '<a href="http://$1" target="_blank">http://$1</a>', $tweet_text); //replace links
            $tweet_text = preg_replace('/https:\/\/([a-z0-9_\.\-\+\&\!\#\~\/\,]+)/i', '<a href="https://$1" target="_blank">https://$1</a>', $tweet_text); //replace links
            $tweet_text = preg_replace('/@([a-z0-9_]+)/i', '<a href="http://twitter.com/$1" target="_blank">@$1</a>', $tweet_text); //replace users
            $return .= '<div class="owl-item text-center" style="color:' . $text_color . '">' . $tweet_text . '</div>';
            $j++;
        }
        $return .= "</div>";

        $return .= '<div class="twitter-owl-nav owl-nav-pull-right">';
        $return .= '<button class="owlprev"><i class="fa fa-angle-left"></i></button>';
        $return .= '<button class="owlnext"><i class="fa fa-angle-right"></i></button>';
        $return .= '</div>';

        $return .= '</section>';
        return $return;
    }
}
add_shortcode('twitter', 'anps_twitter_func');