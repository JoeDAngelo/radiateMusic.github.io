<?php
class SongHandler {
    public $songObject;
	public $id;
	public $name;
    public $songPath;
    public $musician;
    public $album;

    public function __construct($id)
    {
        $this->name = get_the_title($id);
        $this->img = get_field('album_image', $id);
        $this->songPath = get_field('song_path', $id);
        $this->woocommerceObject = get_field('woocommerce_object', $id);
        $this->musician = get_field('musician', $id);
    }

    public function homePageRender() {
        $html = '<div class="homeSongContainer">';
            $html .= $this->img;
            $html .= '<span class="homeSongOverlay">';
            $html .= '<p>' . $this->name . '</p>';
            $html .= '<a href="/music/#'. $slug .'">' . $band_name . '</a>';
            $html .= '</span>';
            $html .= '<element class="playButton"><img class="song" audiourl="'. $this->src .'" src="wp-content/uploads/2016/01/test-play-button.jpg"></element>';
        $html .= '</div>';

        /*$html .= '';
        $html .= '';*/
        return $html;
    }

    public function ourPickRender() {
        $img = $this->getImg();
        $slug = $this->getBandSlug();
        $band_name = $this->getBandName();
        $html = '<div class="ourPickContainer">';
            $html .= $img;
            //$html .= '<span class="homeSongOverlay">';
           /* $html .= '<a href="/music/#'. $slug .'">' . $band_name . '</a>';*/
            //$html .= '</span>';
            $html .= '<element class="playButton"><img class="song" audiourl="'. $this->src .'" src="http://localhost/radiate/wp-content/uploads/2016/01/test-play-button.jpg"></element>';
            $html .= '<p style="margin-left:20%;">' . $this->name . '<i class="fa fa-shopping-cart" style="    margin-left: 25%;"></i></p>';
        $html .= '</div>';
        return $html;
    }
}