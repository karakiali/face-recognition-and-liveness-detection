# face-recognition-and-liveness-detection
IDENTITY AUTHENTICATION FOR ONLINE EXAMS USING FACE RECOGNITION AND LIVENESS DETECTION


Our objective is to prevent cheating in online exams. This phenomenon can’t be done with password login only, so face recognition and its anti-spoofing mechanism “liveness detection” are added to have anti-cheating system where it recognizes and detects the presence of the students, then returns the results. This system runs in the client side via the web browser because face recognition on server side for a large many students will be slow and hard to execute, so the server can handle data, and based on the ID of the logged-in user, it sends an embedding vector representing his/her face to the client web browser to be used in the face recognition process. Both face recognition and liveness detection use deep learning models, but that for liveness detection, which was built and trained in python and then converted to Tensorflow.JS model. 


How to run:
1-download the code as it is 
2- create sql database with name "onlinerec"
3-in databse folder (in the code), there 3 tables, create this tables on your database "onlinerec"
4-run the cod it must works


make sure that folders,files,tables,and tables attributes are te same as in the code.
