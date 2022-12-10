#!/usr/bin/env python
import RPi.GPIO as GPIO

GPIO.setwarnings(False)
GPIO.setmode(GPIO.BOARD)

GPIO.setup(35,GPIO.OUT)
GPIO.setup(36,GPIO.OUT)
GPIO.setup(37,GPIO.OUT)
GPIO.setup(38,GPIO.OUT)

GPIO.output(36, True)
GPIO.output(37, True)
GPIO.setup(35,False)
GPIO.setup(38,False)