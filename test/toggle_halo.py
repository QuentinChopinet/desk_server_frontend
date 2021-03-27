#!/usr/bin/env python

import RPi.GPIO as GPIO
GPIO.setmode(GPIO.BCM)
GPIO.setup(22, GPIO.OUT)
GPIO.output(22, not(GPIO.input(22)))

#GPIO.setup(23, GPIO.OUT)
#GPIO.output(23, 1)
