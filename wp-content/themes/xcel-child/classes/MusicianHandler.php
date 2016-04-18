<?php
class MusicianHandler {
	public $id;
	public $songs;
	public $name;
    public $image;
    public $video;
    public $hometown;
    public $state;
    public $description;

    public function __construct($id)
    {
        $this->id = $id;
        $this->name = get_the_title($id);
        $this->description = get_field('musician_description', $id);
        $this->songs = get_field('songs', $id);
        $this->image = get_field('image', $id);
        $this->video = get_field('video', $id);
        $this->hometown = get_field('hometown', $id);
        $this->state = get_field('state', $id);
        //load all woocommerce objects attached to this post
    }
    //loads song object array from an array of wc objects
    public function loadSongs($wc_objs)
    {
    	foreach ($wc_objs as $wc_obj) {
    		$songsArray[] = new Song($wc_obj);
    	}
    	return $songsArray;
    }

    public function renderBotM() {

        $songs = $this->songs;
        $html = '<div class="musician" id="' . $this->id . '">';
        $html .= '<div id="featuredleft">';
        $html .=    '<h2>' . $this->name . '</h2>';
        $html .=    $this->img;
        $html .= '</div>';
        $html .= '<div id="featuredright">';
        $html .= '<p id="BotMDesc">' . $this->description . '</p><a id="readmore" href="javascript:void(0)">Read More --></a>';
        $html .= '<h3>Notable Tracks</h3>';
        $html .= "<ul class='songList'>";
        foreach ($songs as $song) {
           $html .= $song->renderBotM();
        }
        $html .="</ul>";
        $html .= '</div>';
        $html .= '</div>';

        return $html;

    }


    public function renderSubBand() {

        $songs = $this->songs;
        $html = '<div class="musicianAB" id="' . $this->id . '">';
        $html .=    '<div class="subMusicianImg">' . $this->img . '</div>';
        $html .=    '<h2>' . $this->name . '</h2>';
        $html .= "<ul class='songList'>";
        foreach ($songs as $song) {
           $html .= $song->renderSubBand();
        }
         $html .= "</ul>";
        $html .= '</div>';

        return $html;

    }
}