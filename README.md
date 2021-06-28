# face-recognition-and-liveness-detection
IDENTITY AUTHENTICATION FOR ONLINE EXAMS USING FACE RECOGNITION AND LIVENESS DETECTION


project objective is to prevent cheating in online exams, and that cannot be with only by password login. So we add face recognition and its anti-spoofing mechanism “liveness detection” to have anti-cheating system where it recognizes and detects the presence of student, then return the results. This system runs in the client side in the web browser, since face recognition on server side for a large number of students will be slow and hard to execute, so server handle data, and based on the id of logged in user, it sends embedding vector representing his/her face to the client web browser to be used in the face recognition process. Both face recognition and liveness detection uses deep learning models, but that for the second was built and trained in python and then converted to Tensorflow.js model. 


How to run:
1-download the code as it is 
2- create sql database with name "onlinerec"
3-in databse folder (in the code), there 3 tables, create this tables on your database "onlinerec"
4-run the cod it must works


make sure that folders,files,tables,and tables attributes are te same as in the code.
