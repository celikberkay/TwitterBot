<?php
class Twitter {
    var $tweetUser = null;
    var $xml = null;
    var $DOE;
    // die on error
    function __construct($tweetUser, $DOE = true) {
        $this -> tweetUser = $tweetUser;
        $this -> DOE = $DOE;
        $this -> _connect();
    }
 
    private function _connect() {
        if(!@$this -> xml = simplexml_load_file('http://api.twitter.com/1/users/show.xml?screen_name=' . $this -> tweetUser)) {
            if($this -> DOE) {
                die("Twitter::_connect() Hata: `<em>{$this->tweetUser}</em>` isimli kullanici Twitter'da bulunamadi.");
            } else {
                return false;
            }
        }
    }

	// Total tweet number
    public function Tweet() {
        return $this -> xml -> statuses_count[0];
    }
	// follower 
    public function Follower() {
        return $this -> xml -> followers_count[0];
    }
	// following
    public function Following() {
        return $this -> xml -> friends_count[0];
    }
	//last tweet
    public function Latest_Tweet() {
        return $this -> xml -> status -> text;
    }
}
?> 