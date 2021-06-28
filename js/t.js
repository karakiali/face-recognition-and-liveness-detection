const video = document.getElementById('video')
const butCapture = document.getElementById('capture')
const butDetect = document.getElementById('detect')
const capturedImg = document.getElementById('captured')
const canvas = document.createElement('canvas')
const msgItem = document.getElementById('message')


Promise.all([
    faceapi.nets.tinyFaceDetector.loadFromUri('./models'),
    faceapi.nets.faceLandmark68Net.loadFromUri('./models'),
    faceapi.nets.faceRecognitionNet.loadFromUri('./models'),
    faceapi.nets.faceExpressionNet.loadFromUri('./models'),
]).then(startVideo)


function startVideo(){
    navigator.getUserMedia(
        { video: {} },
        stream => video.srcObject = stream,
        err => console.error(err)
    )
}


butDetect.addEventListener('click',()=>{
    captureDetect()
})

async function captureDetect(){

    var context = canvas.getContext('2d')
    canvas.width = video.width
    canvas.height = video.height
    const displaySize = { width: video.width, height: video.height }
    msgItem.innerHTML = "Processing..."
    var iterations = 0;
    while(iterations<50)
    {
       iterations++; 

        context.clearRect(0, 0, canvas.width, canvas.height);
        context.drawImage(video, 0, 0, video.width, video.height)
//        var data = canvas.toDataURL('image/png')
        var detection = await faceapi.detectSingleFace(canvas, new faceapi.TinyFaceDetectorOptions())

        if(detection)
        {
            const resizedDetection = faceapi.resizeResults(detection, displaySize)
//            faceapi.draw.drawDetections(canvas, [resizedDetection])

            var result = await faceapi.detectSingleFace(canvas, new faceapi.TinyFaceDetectorOptions()).withFaceLandmarks().withFaceDescriptor()
            let descstring = JSON.stringify(result.descriptor);
            document.getElementById("desc").value = descstring;
            console.log(descstring);
//            console.log(document.getElementById("desc").value)
//            console.log(result.descriptor)
            const img = document.createElement("img");
            img.src = canvas.toDataURL('image/webp');
            document.getElementById('captured').innerHTML = "";
            document.getElementById('captured').appendChild(img)
//            data = canvas.toDataURL('image/png')
//            capturedImg.setAttribute('src', data)
            msgItem.innerHTML = "Done"
            break

        }
        
    }  
    if(iterations>40)
        {
          msgItem.innerHTML = "no face detected"
              
        }
}

butCapture.addEventListener('click', () => {

    var context = canvas.getContext('2d')

    canvas.width = video.width
    canvas.height = video.height
    context.clearRect(0, 0, canvas.width, canvas.height);

    context.drawImage(video, 0, 0, video.width, video.height)
    const img = document.createElement("img");
            img.src = canvas.toDataURL('image/webp');
            document.getElementById('captured').innerHTML = "";
            document.getElementById('captured').appendChild(img)
//    var data = canvas.toDataURL('image/png')
//    capturedImg.setAttribute('src', data)

  })

