# Single key XOR

flag = "root@ctf{frequency_analysis_is_cool}"
enc_flag = ''.join(chr(ord(e) ^ ord('2')) for e in flag)

print enc_flag
