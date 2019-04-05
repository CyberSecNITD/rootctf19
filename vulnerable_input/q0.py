#!/usr/bin/env python2.7

from random import randint

flag = "root@ctf{!npu7_!5_4_buggy_funct!0n}"

secret = randint(1, 5000)
a = input()

if a == secret:
    print flag
else:
    print "Try again Kiddo!"
    exit(0)
