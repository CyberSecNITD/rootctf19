FROM python:3.7.3-alpine3.8

RUN pip install bottle
RUN apk add --no-cache imagemagick

ADD . /opt/

WORKDIR /opt

CMD ["sh", "init.sh"]
