import json
from pprint import pprint
import os



posterIds=[]
forbidden='http://ia.media-imdb.com'
correct='https://images-na.ssl-images-amazon.com'
with open('res.json') as data_file:
    data = json.load(data_file)
    print len(data)
    '''''
    for m in data:
        if m['Poster']:
            posterIds.append(m)

m['Poster']= m['Poster'].replace(forbidden,correct)
print m['Poster']



with open('test.json', 'w') as outfile:
    json.dump(posterIds, outfile)
    '''