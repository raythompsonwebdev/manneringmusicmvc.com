<?php
namespace Madb\Entity;

class Video
{
    public $videoid;
    public $video_artist;
    public $video_title;
    public $video_link;
    public $video_genre;
    public $video_image;

    public function __construct()
    {
    }

    public function getVideoId()
    {

        return $this->videoid;
    }
        
    public function getArtist()
    {

        return $this->video_artist;
    }

    public function getVideo()
    {

        return $this->video_link;
    }

    public function getVideoTitle()
    {

        return $this->video_title;
    }
}
