# TweetSplitterWebApp
A web application that uses Twitter oAuth Rest API in php to allow user to make a tweet and if the tweets's length is  greater than 140 characters then it splits the tweet in chunks of 140 characters length and posted it on twitter.

Tools and Technologies Used :

Operating System : Ubuntu 16.04 xenial

Server : Localhost

FrontEnd : Bootstrap CDN

Backend : Php 7.0.15

Concepts Used : 

-> https://dev.twitter.com/web/sign-in/desktop-browser

-> https://dev.twitter.com/web/sign-in/implementing

-> https://twitteroauth.com/

Requirements :

-> Created application at apps.twitter.com to allow access to Twitter API

-> Get the API key and API secret 

-> Used abraham/twitteroauth php library (https://github.com/abraham/twitteroauth) which allows to connect to Twitter using oAuth.

-> Deployed the application on free web hosting (www.000webhost.com)

-> The application is live at : https://misogynous-ices.000webhostapp.com/


Work Flow of Application : 

-> Enter the text you want to tweet.

-> Click the button "Tweet this to Twitter".

-> Click the button "Login with Twitter".

-> You will be redirected back to the Tweet Splitter Web app's home page.

-> You can check that the text will be posted to your twitter account in chunks of strings of 140 character length (if the input text length is greater than 140).
