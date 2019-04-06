import binascii
from random import randint

flag = "root@ctf{w4tch_0u7_y0ur_r4nd0m_g3n3r4t0rs}"

def do_cbc(parts):
    IV = randint(0, 1)
    enc = []
    for i in range(len(parts)):
        IV = int(binascii.hexlify(parts[i]), 16) ^ IV
        enc.append(IV)
    return enc

parts = []

for i in range(len(flag)/7):
    parts.append(flag[i*7: (i+1)*7])

print do_cbc(parts)
