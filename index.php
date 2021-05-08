<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>

<style>
    *{
        margin: 0;
        padding: 0;
    }
</style>

<video id="video" width="100%" height="100%" controls>
    <source src="podcast.mp4" type="video/mp4">
</video>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>

    var conn = new WebSocket('ws://'+ <?php echo "asdas"?> +':8080');
    var video = document.getElementById("video");
    var status = true;


    video.onplay = function (){
        conn.send(JSON.stringify({
            currentTime : video.currentTime,
            paused: false
        }));
    }
    video.onpause = function (){
        conn.send(JSON.stringify({
            currentTime : video.currentTime,
            paused: true
        }));
    }

    function updateVideo(data) {

        if(status == false) return;

        if (data.currentTime != video.currentTime ) {
            video.currentTime  = data.currentTime;
        }

        if (data.paused == true) {
            video.pause();
        }

        if (data.paused == false) {
            video.play();
        }

    }

    conn.onmessage = function (e) {
        console.log(data);
        var data = JSON.parse(e.data);
        updateVideo(data);
    };

    function clickToVideo(){
        status = true;

        console.log("tiklandi");

        conn.send(JSON.stringify({
            currentTime : video.currentTime,
        }));
    }

    $(function (){
        $("video").click(function (){
            clickToVideo();
        });
    })

</script>
</body>
</html>