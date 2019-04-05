FROM alpine:latest

RUN apk add --no-cache php
ADD q6.php /opt/index.php
ADD init.sh /opt/

WORKDIR /opt

CMD ["sh", "init.sh"]
