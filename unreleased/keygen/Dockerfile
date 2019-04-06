FROM alpine:latest

RUN apk add --no-cache socat openssl
ADD keygen /opt/
ADD flag.txt.enc /opt/
ADD init.sh /opt/

WORKDIR /opt

CMD ["sh", "init.sh"]
