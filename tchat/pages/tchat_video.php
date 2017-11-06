<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdn.pubnub.com/pubnub-3.7.14.min.js"></script>
<script src="https://cdn.pubnub.com/webrtc/webrtc.js"></script>
<h2 class="header header-form" value="Bonjour ">Bonjour vous etes en communication video avec <?php echo $_GET['user']?> </h2>


    <script src="https://www.gstatic.com/firebasejs/3.6.4/firebase.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <body onload="showMyFace()">
    <video id="yourVideo" autoplay muted></video>
    <video id="friendsVideo" autoplay></video>
    <br />
    <button class="video_button" onclick="showFriendsFace()" type="button" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span> Call</button>
  
  
</body>