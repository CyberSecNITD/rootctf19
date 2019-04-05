#!/usr/bin/env python
import pickle
import socket

PORT = 10007

soc = socket.socket()
soc.bind(('0.0.0.0', PORT))

soc.listen(36)      
print "socket is listening"            
  
# a forever loop until we interrupt it or  
# an error occurs 
while True: 
    # Establish connection with client. 
    c, addr = soc.accept()      
    print 'Got connection from', addr 
    
    # send a thank you message to the client.  
    c.send('Thank you for connecting') 
    data = c.recv(1024)
    payload = pickle.loads(data)
    #print "HERE!"
    #soc.send(payload)
    
    # Close the connection with the client 
    # c.close()

