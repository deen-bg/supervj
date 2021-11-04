<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class convertYoutube extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->helper('url');
        $this->load->library('upload'); // lib upload
        $this->load->library('session');
	}

    // function convertYoutube($string) {
    //     return preg_replace(
    //         "/\s*[a-zA-Z\/\/:\.]*youtu(be.com\/watch\?v=|.be\/)([a-zA-Z0-9\-_]+)([a-zA-Z0-9\/\*\-\_\?\&\;\%\=\.]*)/i",
    //         "<iframe width=\"420\" height=\"315\" src=\"//www.youtube.com/embed/$2\" allowfullscreen></iframe>",
    //         $string
    //     );
    // }
    
    // $text = "Youtube long url: https://www.youtube.com/watch?v=3OptGLA4EMM&list=RDCMUCx96GiJ3qYw2sHccPp5dY_g&index=6";
    
    // echo convertYoutube($text);

    // $url
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
            //echo 'https://www.youtube.com/embed/' . $youtube_id ;
    }

}
