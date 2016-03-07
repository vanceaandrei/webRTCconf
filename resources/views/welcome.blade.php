@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Your Webcam <br>
                    <video autoplay id = "webcam" style = "transform: rotateY(180deg);
    -webkit-transform:rotateY(180deg);"></video>
                    <script type="text/javascript">
                        var stream;
                        var video = document.getElementById('webcam');
                        navigator.webkitGetUserMedia(
                            {video:true , audio: false}, // Options
                            function(localMediaStream) { // Success
                                stream = localMediaStream;
                                video.src = window.webkitURL.createObjectURL(stream);
                            },
                            function(err) { // Failure
                                alert('getUserMedia failed: Code ' + err.code);
                            }
                        );
                         
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
