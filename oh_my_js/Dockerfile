FROM alpine:latest

RUN apk add --no-cache python2
ADD index.html /opt/
ADD init.sh /opt/

WORKDIR /opt

CMD ["sh", "init.sh"]
