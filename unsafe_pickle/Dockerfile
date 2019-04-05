FROM alpine:latest

RUN apk add --no-cache python2 socat
ADD q1.py /opt/
ADD init.sh /opt/

WORKDIR /opt

CMD ["sh", "init.sh"]
