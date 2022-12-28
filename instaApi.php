<?php
class Instagram
{
    protected $instaMediaLimit;
    protected $instaBusinessAccount;
    protected $instaAccessToken;
    protected $baseUrl;
    
    public function __construct()
    {
        $this->version              = 'v10.0';
        $this->instaMediaLimit      = 36;
        $this->instaBusinessAccount = '';
        $this->instaAccessToken     = '';
        $this->baseUrl = 'https://graph.facebook.com/'
                            . $this->version .'/'
                            . $this->instaBusinessAccount
                            . '?fields=name%2Cmedia.limit('. $this->instaMediaLimit .')'
                            . '%7Bcaption%2Cmedia_url%2Cthumbnail_url%2Cpermalink%2Ctimestamp%7D'
                            . '&access_token=' . $this->instaAccessToken;
    }
    
    protected function curl_get_contents( $url ){
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_URL, $url );
        curl_setopt( $ch, CURLOPT_HEADER, false );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch, CURLOPT_TIMEOUT, 5 );
        curl_setopt( $ch, CURLOPT_FAILONERROR, true );
        $result = curl_exec( $ch );
        curl_close( $ch );
        return $result;
    }

    public function getPost(): ?array
    {
        $rawJson = $this->curl_get_contents("$this->baseUrl");
        $json = mb_convert_encoding($rawJson, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
        $obj = json_decode($json, true);
        $insta = [];
        if( isset( $obj['media']['data'] ) ){
            foreach ($obj['media']['data'] as $mediaData => $info) {
                $data = [
                    'img' => !empty($info['thumbnail_url']) ? $info['thumbnail_url'] : $info['media_url'],
                    'caption' => $info['caption'],
                    'link' => $info['permalink'],
                ];
                $insta[] = $data;
            }
            return $insta;
        }
        return null;
    }
}