FROM alpine:latest

RUN apk add --no-cache python2 socat
ADD ques.py /opt/
ADD init.sh /opt/

WORKDIR /opt

CMD ["sh", "init.sh"]
