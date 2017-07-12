<?php
/**
 * GET FBID FROM LINK USERNAME
 * Author : fb.com/trojan.nguyen.103
 * Blog : https://jack098.blogspot.com
 */
header("Access-Control-Allow-Origin: *"); //bắt buộc - thông số để get được Json cho APP - tham khảo : https://goo.gl/ox3gf3
class getFbid
{
  function __construct($Array)
  {
    if(isset($Array["username"], $Array["access_token"])) {
      $this->LinkUserName = $Array["username"];
      $this->access_token = $Array["access_token"];
    }
  }
  public function get()
  {
    # Get Fbid
    $link = json_decode(file_get_contents('https://graph.facebook.com/?ids='.$this->LinkUserName.'&fields=id&access_token='.$this->access_token));
    $username = $this->LinkUserName;
    $array = array(
      'fbid' => $link->$username->id //Get ID
    );
    return $array;
  }
  public function OutputJson($Array)
  {
    # Export Json
    if(!is_array($Array)) die(0);
    echo json_encode($Array);
  }
}
if(isset($_GET["link"]) && filter_var($_GET["link"], FILTER_VALIDATE_URL)){
  $LinkUserName = array(
    'username' => $_GET["link"],
    'access_token' => 'EAACW5Fg5N2IBAP3RlQh6vMgkdWGcoqJxZCJtNTNMyS5lVzGZClYLwe00rjXR8ixSfTGsZClZAtLXbWv0cMsxjpAsMH4noSOx6E2DDFGQXx91Jxp1KoXK4RIR0CgolTzGn8dxHMFcuAntZAPZBcJDkRTyFmbJxbSMm3QotPgJnXCZBfI49QiCZCojlOBrgt3A7N8ZD'
  );
  $getFbid = new getFbid($LinkUserName);
  $getFbid->OutputJson($getFbid->get());
}
?>