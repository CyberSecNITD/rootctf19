FROM ubuntu:18.04

RUN apt-get update && apt-get install python3 python3-pip imagemagick -y
RUN pip3 install bottle

ADD . /opt/

WORKDIR /opt

CMD ["sh", "init.sh"]
