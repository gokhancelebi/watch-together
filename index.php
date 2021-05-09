<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <style>

        * {
            margin: 0;
            padding: 0;
        }

        body {

        }

        video {
            z-index: 1;
        }

        .videosubbar {
            width: 100%;
            bottom: 200px !important;
            font-size: 50px !important;
            text-align: center !important;
            z-index: 99999;
            box-sizing: border-box;
        }
    </style>

</head>
<body>

<video id="video"  width="600px" height="400px" controls>
    <source src="video.mp4" type="video/mp4">
    <track label="Turkish" kind="captions" srclang="tr" lang="tr" src="sub.vtt" default>
</video>


<script src="captionator.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="socket.js"></script>
</body>
</html>