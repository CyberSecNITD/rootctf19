#!/usr/bin/python2.7

flag = "root@ctf{g0t_4n_e4sy_fl4g_f0r_y0u}"
print ''.join(format(ord(x), 'b').rjust(8, '0') for x in flag)
