FROM ubuntu:18.04


RUN apt-get update && \
       apt-get install -y --no-install-recommends apt-utils && \
       apt-get -y install sudo





## for apt to be noninteractive
ENV DEBIAN_FRONTEND noninteractive
ENV DEBCONF_NONINTERACTIVE_SEEN true

## preesed tzdata, update package index, upgrade packages and install needed software
RUN echo "tzdata tzdata/Areas select Asia" > /tmp/preseed.txt; \
    echo "tzdata tzdata/Zones/Asia select Riyadh" >> /tmp/preseed.txt; \
    debconf-set-selections /tmp/preseed.txt && \
    apt-get update && \
    apt-get install -y tzdata


RUN sudo apt-get install apache2 -y


RUN apt-get install php7.0 -y
RUN apt-get install php libapache2-mod-php -y
RUN apt-get install openjdk-17-jre-headless -y
RUN rm -rf /var/www/html/
ADD * /var/www/html/
RUN chmod 777 /var/www/html
RUN chmod 777 /var/www
RUN chmod 777 /var

RUN rm /etc/php/7.2/cli/php.ini
RUN rm /etc/php/7.2/apache2/php.ini
RUN rm /etc/php/7.2/phpdbg/php.ini



ADD ./php.ini /etc/php/7.2/cli/
ADD ./php.ini /etc/php/7.2/apache2/
ADD ./php.ini /etc/php/7.2/phpdbg/


EXPOSE 80


CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND" ]