#!/bin/bash

.mysql/run-mysqld.sh &
.apache2/run-apache2.sh &

tail -f .apache2/log/*
#wait
