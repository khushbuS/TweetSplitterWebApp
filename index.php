<?php

// Load the required library files
require_once('twitteroauth/OAuth.php');
require_once('twitteroauth/twitteroauth.php');
require_once('TweetSplitterApp.php');

// define the consumer key, secret key and callback url
define('CONSUMER_KEY', 'YY8wVYL0VgoQtcYDvFJSv3psd');
define('CONSUMER_SECRET', '4BcP3unLqlplwayhLv1FqsnOHHcVf1ZaFRCRQv8DlFBjasecyU');
define('OAUTH_CALLBACK', 'https://misogynous-ices.000webhostapp.com/');

// start the session
session_start();

if(isset($_POST["submit"]))
       {   
          $_SESSION['tweet']= $_POST["text"];
       }


// to handle logout request
if(isset($_GET['logout'])){
	
        //unset the session
	session_unset();
	
        // redirect to same page to remove url parameters
	$redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  	header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
}


// if user session is not enabled then get the login url
if(!isset($_SESSION['data']) && !isset($_GET['oauth_token'])) {
	
        // creating a new twitter connection object
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
         
	// get the token from connection object
	$request_token = $connection->getRequestToken(OAUTH_CALLBACK);
 
      	// if request_token exists then get the token and secret and store in the session
	if($request_token){
		$token = $request_token['oauth_token'];
		$_SESSION['request_token'] = $token ;
		$_SESSION['request_token_secret'] = $request_token['oauth_token_secret'];
		
                // get the login url from getauthorizeurl method
		$login_url = $connection->getAuthorizeURL($token);
	}
}

// if its a callback url
if(isset($_GET['oauth_token'])){
	
        // create a new twitter connection object with request token
	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $_SESSION['request_token'], $_SESSION['request_token_secret']);
	
        // get the access token from getAccesToken method
	$access_token = $connection->getAccessToken($_REQUEST['oauth_verifier']);
	if($access_token){	
		
                // create another connection object with access token
		$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
		
                // set the parameters array with attributes include_entities false
		$params =array('include_entities'=>'false');
		
                // get the data
		$data = $connection->get('account/verify_credentials',$params);
		if($data){
			
                        // store the data in the session
                        // getting the text input by the user to tweet
                         $msg=$_SESSION['tweet'];  
                         $len=strlen($msg);
                         
                        // Checking for the tweet length, if less than equal to 140 post it, otherwise split

                         if($len<=140){
			                   $post=$connection->post('statuses/update',array('status'=>$_SESSION['tweet']));
                         }
                         else
                         {
                           $n=ceil($len/140);
                           $s=0;
                           $e=140;
                           while($n && $e<=$len)
                           {
                            $m=substr($msg,$s,$e);
                            $post=$connection->post('statuses/update',array('status'=>$m));
                            $s=$e+1;
                            $e=($e+140)%$len;
                            $n=$n-1;
                           }
                         }
                        $_SESSION['data']=$data;
                        
			// redirect to same page to remove url parameters
			  $redirect = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];
  			header('Location: ' . filter_var($redirect, FILTER_SANITIZE_URL));
		}
	}
}

if(isset($login_url) && !isset($_SESSION['data'])){
	
      
       echo "<div style='padding: 120px 100px;background-color: #f6f6f6'>";
       echo "<div style='width:150px;margin-bottom:50px;margin-left:auto;margin-right:auto'>";
       echo "<a href='$login_url'><button>Login with twitter </button></a>";
       echo "</div>";
       echo "</div>";
       
	
}

else{
	// get the data stored from the session
	 $data = $_SESSION['data'];
         echo "<div style='padding: 100px 100px;background-color: #f6f6f6'>";
         echo "<div style='width:50px;margin-bottom:50px;margin-left:auto;margin-right:auto'>";
       
	// echo the logout button
   echo "<a href='?logout=true'><button>Logout</button></a>";
        echo "</div>";
        echo "</div>";
}
