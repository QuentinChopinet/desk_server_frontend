#!/bin/bash

sleep 1
python /var/www/html/test/toggle_halo.py
sleep 1

gpio -g mode 17 out
gpio -g write 17 1
sleep 1
gpio -g write 17 0
