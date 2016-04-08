#!/usr/bin/env python
# coding=utf-8
import urllib
import urllib2
import time
url = 'http://addons.bbdfun.com/TreeHole/Index/sendArticle'

# pid 学校代号， mask 用户名（为空时默认为‘透明人’）， content 消息体
values = {
        'pid':'14', #汕职院代号为14
        'mask':'c0hb1rd', # 发言人ID，空时为透明人
        'content':'<a href="https://github.com/c0hb1rd/Web_spider">点击获取刷屏脚本源码</a><br><img src="http://cohbird.space/web4.png">' # 内容
    }

for i in range(10): # 循环发消息1次
    data = urllib.urlencode(values)
    req = urllib2.Request(url, data)
    response = urllib2.urlopen(req)

'''
while True:
    data = urllib.urlencode(values)
    req = urllib2.Request(url, data)
    response = urllib2.urlopen(req)
'''
