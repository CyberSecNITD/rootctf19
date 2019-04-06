FROM alpine:latest

RUN apk add --no-cache socat
ADD masterCanaryOverwrite /opt/
ADD init.sh /opt/

WORKDIR /opt

CMD ["sh", "init.sh"]
