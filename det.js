
Webcam.set({
    width : 200,
    height : 200,
    image_format:'jpeg',
    jpeg_quality:90
})
Webcam.attach("#camera")

console.log.time()
function take_snapshot(){
            const result = document.getElementById('results')
            Webcam.snap(function(data_uri){
//                result.innerHTML = '<img  id="refimg" src="'+data_uri+'"/>';

                $(document).ready(function(){
                
                  async function face(){
                      
                      const MODEL_URL = './models'
    
                      await faceapi.loadSsdMobilenetv1Model(MODEL_URL)
                      await faceapi.loadFaceLandmarkModel(MODEL_URL)
                      await faceapi.loadFaceRecognitionModel(MODEL_URL)
    
                     const img = await faceapi.fetchImage(data_uri)
                     
//                      const img= document.getElementById('refimg')
                      let fullFaceDescriptions = await faceapi.detectAllFaces(img).withFaceLandmarks().withFaceDescriptors()
                      if (fullFaceDescriptions){
                      const canvas = $('#reflay').get(0)
                      faceapi.matchDimensions(canvas, img)
    
                      fullFaceDescriptions = faceapi.resizeResults(fullFaceDescriptions, img)
//                      faceapi.draw.drawDetections(canvas, fullFaceDescriptions)
                      
                      
                             descstring= document.getElementById("desc").value 
//                              const faceDescriptors = [fullFaceDescription.descriptor]
//                              let descstring = JSON.stringify(fullFaceDescription.descriptor)
                              let descarray = new Float32Array(Object.values(JSON.parse(descstring))); 
//                              console.log (descarray)
                              
                              labeledFaceDescriptors = new faceapi.LabeledFaceDescriptors("true", [descarray])
                      
                        
                      const maxDescriptorDistance = 0.5
                      const faceMatcher = new faceapi.FaceMatcher(labeledFaceDescriptors, maxDescriptorDistance)
    
                      const results = fullFaceDescriptions.map(fd => faceMatcher.findBestMatch(fd.descriptor))
    
                      results.forEach((bestMatch) => {
//                          const box = fullFaceDescriptions[i].detection.box
                          const text = bestMatch.toString()
//                          const drawBox = new faceapi.draw.DrawBox(box, { label: text })
//                          drawBox.draw(canvas)
//                          const s = document.getElementById('s')
//                          var str = 'he'
//                          s.innerHTML = text + str ;
                            const rec = document.getElementById('rec');
                            rec.value = text;
                            var  my_time = new Date();
                             const time = document.getElementById('time');
                             time.value = my_time;
                          run(img);
                      })
    
                      }else{
                          console.log ("no face detected")
                      }
                  }
                  
                  face()
                  
              })  
            }
            )}

async function run(img){
        
        const MODEL = 'mo/model.json';
        const model = await tf.loadLayersModel(MODEL);
        
//        img1 = document.getElementById('img1');
        
        let tensorImg =   tf.browser.fromPixels(img).resizeNearestNeighbor([32, 32]).toFloat().expandDims();
        let scale = tf.scalar(255.0);
        tensorImgScaled = tf.div(tensorImg,scale);
        tensorImgScaled =  tf.reverse(tensorImgScaled, -1);
//        tensorImgScaled.print();
        const result = await model.predict(tensorImgScaled).data();
        // const input = tf.tensor2d([10.0], [1,1]);
        
        console.log (result)
        
        if (result[1] > result[0]) {
            const live = document.getElementById('live');
                            live.value = "real";
        }else{
            const live = document.getElementById('live');
                            live.value = "fake";
        }
        aj();
	}
        console.log.time()
        console.timeEnd('doSomething')
// take snapshot and crop face 

