#!/usr/bin/python
import json
import random


with open('accessible.json') as data_file:
    data = json.load(data_file)


response=random.sample(data,20)
print "Content-type: application/json\n\n"
print json.dumps(response)
