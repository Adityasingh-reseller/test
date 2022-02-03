FROM debian:latest
LABEL MAINTAINER="https://github.com/fireprojects/phisher"

WORKDIR /gphisher/
ADD . /gphisher

RUN apt update && \
    apt full-upgrade -y && \
    apt install -y curl unzip wget && \
    apt install --no-install-recommends -y php && \
    apt clean
CMD ["./gphisher.sh"]