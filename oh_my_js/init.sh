# socat -d -d TCP-LISTEN:2323,reuseaddr,fork EXEC:"python2 q0.py"
python2 -m SimpleHTTPServer 8080 .
