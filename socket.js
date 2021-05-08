
var conn = new WebSocket('ws://162.55.60.146:8080');
var vid = document.getElementById("video");
var status = false;


// document.getElementById("video").onplaying = function () {
//
//     console.log('onplaying');
//     status = true;
//
//     conn.send(JSON.stringify({
//         currentTime: vid.currentTime,
//         paused: false
//     }));
// }

// document.getElementById("video").onpause = function () {
//     status = true;
//     conn.send(JSON.stringify({
//         currentTime: vid.currentTime,
//         paused: true
//     }));
//
// }

function updateVideo(data) {


    if (data.currentTime != document.getElementById("video").currentTime) {
        document.getElementById("video").currentTime = data.currentTime;
    }

    console.log(typeof data.paused);


    if (typeof data.paused !== 'undefined') {

        if (document.getElementById("video").paused == false && data.paused == true) {
            document.getElementById("video").pause();
        }

        if (document.getElementById("video").paused == true && data.paused == false) {
            document.getElementById("video").play();
        }
    }

}

conn.onmessage = function (e) {

    var data = JSON.parse(e.data);
    console.log(e.data);
    updateVideo(data);
};

function clickToVideo() {


    setTimeout(function (){
        conn.send(JSON.stringify({
            currentTime: document.getElementById("video").currentTime,
            paused: document.getElementById("video").paused
        }));
    },100);
}

$(document).on('click',"#video",function (){
    console.log({
        currentTime:this.currentTime,
        paused: !this.paused
    });

    conn.send(JSON.stringify({
        currentTime:this.currentTime,
        paused: !this.paused
    }));
});

