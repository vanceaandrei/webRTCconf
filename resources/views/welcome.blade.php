@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Your WEBCAM <br>
                    
                <canvas id="canvas" width="600" height="600">
                </canvas>
                    <div id="buttonWrapper">
                 <input type="button" id="play" value="pause">
                 <input type="button" id="plus" value="+">
                 <input type="button" id="minus" value="-">
                  <input type="button" id="rotateleft" value="rotate left">
                  <input type="button" id="rotateright" value="rotate rightt">
        </div>
             <video autoplay id = "webcam"></video>
         <script>
         var stream;
                var video = document.getElementById("webcam");
                var canvas = document.getElementById("canvas");
                var ctx = canvas.getContext('2d');
        
            navigator.webkitGetUserMedia(
  {video: true, audio: false}, // Options
  function(localMediaStream) { // Success
    stream = localMediaStream;
    video.src = window.webkitURL.createObjectURL(stream);
  },
  function(err) { // Failure
    alert('getUserMedia failed: Code ' + err.code);
  }
);
             document.addEventListener('DOMContentLoaded', video);
             document.getElementById("play").addEventListener("click", function(){
            if(video.paused){
                     video.play();
                     play.innerHTML = 'pause';
                   } else {
                     video.pause();
                     play.innerHTML = 'play';
                   }

                },false);
             var zoom = 1,
             rotate = 0;
             var i,j,t;
             var properties = ['transform', 'WebkitTransform', 'MozTransform',
                            'msTransform', 'OTransform'],
             prop = properties[0];
              for(i=0,j=properties.length;i<j;i++){
                      if(typeof stage.style[properties[i]] !== 'undefined'){
                         prop = properties[i];
             break;
             }
               }

              document.getElementById("plus").addEventListener("click", function(){
                  zoom = zoom + 0.1;
                  video.style[prop]='scale('+zoom+') rotate('+rotate+'deg)';


            },false);  
            document.getElementById("minus").addEventListener("click", function(){
            zoom = zoom - 0.1;
                   video.style[prop]='scale('+zoom+') rotate('+rotate+'deg)';   

             },false); 
             document.getElementById("rotateleft").addEventListener("click", function(){
             rotate = rotate + 5;
                   video.style[prop]='rotate('+rotate+'deg) scale('+zoom+')';   

             },false);

             document.getElementById("rotateright").addEventListener("click", function(){
             rotate = rotate - 5;
                   video.style[prop]='rotate('+rotate+'deg) scale('+zoom+')';

             },false);   

 </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
