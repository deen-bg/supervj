<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class convert_youtube {

    function getYoutubeEmbedUrl($url){
        // $url = 'https://www.youtube.com/watch?v=3OptGLA4EMM&list=RDCMUCx96GiJ3qYw2sHccPp5dY_g&index=6';

        $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_]+)\??/i';
        $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))(\w+)/i';
    
        if (preg_match($longUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
        
        if (preg_match($shortUrlRegex, $url, $matches)) {
            $youtube_id = $matches[count($matches) - 1];
        }
        return 'https://www.youtube.com/embed/' . $youtube_id ;
    }
}
