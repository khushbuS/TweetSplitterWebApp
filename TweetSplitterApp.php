<!DOCTYPE html>
<head>
  <title>Tweet Splitter : Split your long tweet </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Tweet Splitter">
  
  <!--Bootstrap CDN -->
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
	.jumbotron {
		background-color: #33d1ff;
		color: #ffffff;
		padding: 100px 50px;
	}
	.textarea {
    resize: none;
}
.centered
{
    text-align:center;
    margin-top: 12px;
}
</style>
</head>

<body>
<div class="jumbotron text-center"> 
   <h1>Tweet Splitter</h1>
   <p>Split your long tweet</p>
   <div class="col-sm-8  col-md-offset-2 well">
    <form accept-charset="UTF-8" action="" method="POST">
        <textarea class="form-control" id="text" name="text" placeholder="Enter your tweet here " rows="4"> </textarea>
 <input type="submit" name="submit" value='Tweet this to Twitter' style="margin:55px;background-color:#0039e6;color:#ffffff;">
    </form>
   </div>
</div>
</body>
</html>
