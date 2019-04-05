FROM alpine:latest

RUN apk add --no-cache python3 socat
ADD ques.py /opt/
ADD init.sh /opt/

WORKDIR /opt

CMD ['sh', 'init.sh']
