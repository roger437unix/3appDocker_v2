!#/bin/bash

clear
read -p 'Rede Docker configurada no "docker-compose"? [default: appnet]: ' RED
if [ -z $var ]; then
    RED="appnet"
fi

REDE=$(pwd |awk -F"/" '{print $NF}')_$RED
CONTAINERS_NAMES=$(docker network inspect $REDE| grep Name | cut -d'"' -f4)

for i in $CONTAINERS_NAMES
do
  if [ $i = "zabbix-agent" ]; then
      printf "\033[41m"
  fi
  docker inspect "$i" | grep '"Name": "/' | cut -d'/' -f2 | cut -d'"' -f1
  docker inspect "$i" | grep '"IPAddress": "1' | cut -d'"' -f4
  if [ $i = "zabbix-agent" ]; then
      printf "\033[0m"
  fi
  echo
done
